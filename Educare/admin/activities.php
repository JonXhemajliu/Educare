<?php
include('../database/db.php');

$message = ''; // Variable to store success/error messages

// ADDING ACTIVITIES
if (isset($_POST['addActivity'])) {
    $name = $_POST["name"];
    $image = $_FILES["image"]; // Get the uploaded file

    if (empty($name) || empty($image['name'])) {
        $message = "Error: One or more form fields are empty.";
    } else {
        // Handle file upload
        $uploadDir = "../uploads/"; // Directory to store uploaded images
        $uploadFile = $uploadDir . basename($image['name']);

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            // Insert activity data into the database
            $sql = "INSERT INTO activities (name, image) VALUES (:name, :image)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                'name' => $name,
                'image' => $uploadFile
            ]);

            if ($result) {
                $message = "Activity added successfully!";
            } else {
                $message = "Error: Failed to insert data.";
            }
        } else {
            $message = "Error: Failed to upload image.";
        }
    }
}

// DELETING ACTIVITIES
if (isset($_POST['deleteActivity']) && isset($_POST['activity_id']) && !empty($_POST['activity_id'])) {
    $activity_id = $_POST['activity_id'];

    // Check if the activity_id exists and is not empty
    if (!empty($activity_id)) {
        $sqlDELETE = "DELETE FROM activities WHERE id = :activity_id";
        $stmtDELETE = $pdo->prepare($sqlDELETE);
        $resultDELETE = $stmtDELETE->execute(['activity_id' => $activity_id]);

        if ($resultDELETE) {
            $message = "Activity deleted successfully!";
        } else {
            $message = "Error: Activity could not be deleted.";
        }
    } else {
        $message = "Error: No activity selected for deletion.";
    }
} else {
    // If there was an attempt to delete but no activity_id was provided
    if (isset($_POST['deleteActivity']) && empty($_POST['activity_id'])) {
        $message = "Error: Activity ID not found.";
    }
}

// VIEW ACTIVITIES
$sqlFETCH = "SELECT * FROM activities";
$stmtFETCH = $pdo->prepare($sqlFETCH);
$stmtFETCH->execute();

// UPDATING ACTIVITIES
if (isset($_POST['updateActivity'])) {
    $activity_id = $_POST['activity_id'];
    $name = $_POST['name'];
    $image = $_FILES['image']; // Get the uploaded file

    if (!empty($name)) {
        // If a new image is uploaded
        if (!empty($image['name'])) {
            $uploadDir = "../uploads/";
            $uploadFile = $uploadDir . basename($image['name']);

            // Move the uploaded file
            if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
                $image = $uploadFile;
            } else {
                $message = "Error: Failed to upload image.";
                return;
            }
        } else {
            // Keep the existing image path
            $sqlFetchImage = "SELECT image FROM activities WHERE id = :activity_id";
            $stmtFetchImage = $pdo->prepare($sqlFetchImage);
            $stmtFetchImage->execute(['activity_id' => $activity_id]);
            $image = $stmtFetchImage->fetchColumn();
        }

        // Update the activity's data
        $sqlUPDATE = "UPDATE activities SET name = :name, image = :image WHERE id = :activity_id";
        $stmtUPDATE = $pdo->prepare($sqlUPDATE);
        $resultUPDATE = $stmtUPDATE->execute([
            'name' => $name,
            'image' => $image,
            'activity_id' => $activity_id
        ]);

        if ($resultUPDATE) {
            $message = "Activity updated successfully!";
            header("Location: activities.php");
            exit;
        } else {
            $message = "Error: Failed to update activity.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <script defer src="activities.js"></script>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <hr>
            <li><a href="teachers.php">Teachers</a></li>
            <li><a href="activities.php">Activities</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="navbar">
            <h1>Dashboard</h1>
        </div>
        <div class="content">
            <div class="table-container">
                <h2>Manage Activities</h2>

                <?php if (!empty($message)) : ?>
                    <div class="message <?php echo (strpos($message, 'Error') === false) ? 'success' : 'error'; ?>" id="messageBox">
                        <span><?php echo $message; ?></span>
                        <button class="close-btn" onclick="closeMessage()">×</button>
                    </div>
                <?php endif; ?>

                <button class="btn btn-add" onclick="openAddModal()">Add Activity</button>

                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="activityTableBody">
                        <?php while ($info = $stmtFETCH->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo $info['name']; ?></td>
                                <td>
                                    <?php if (!empty($info['image'])): ?>
                                        <img src="<?php echo $info['image']; ?>" alt="Activity Image" style="width: 50px; height: 50px;">
                                    <?php else: ?>
                                        No Image
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form method="POST" action="">
                                        <input type="hidden" name="activity_id" value="<?php echo $info['id']; ?>">
                                        <button type="button" onclick="openEditModal('<?php echo $info['id']; ?>', '<?php echo $info['name']; ?>')" class="btn btn-edit">Edit</button>
                                        <button type="submit" name="deleteActivity" class="btn btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Activity Modal -->
    <div id="editActivityModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Activity</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="activity_id" id="edit_activity_id">
                <div class="form-group">
                    <label for="edit_name">Name:</label>
                    <input type="text" id="edit_name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="edit_image">Upload New Image:</label>
                    <input type="file" id="edit_image" name="image" accept="image/*">
                </div>
                <button type="submit" name="updateActivity" class="btn-submit">Update Activity</button>
            </form>
        </div>
    </div>

    <!-- Add Activity Modal -->
    <div id="addActivityModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddModal()">&times;</span>
            <h2>Add Activity</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="image">Upload Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" name="addActivity" class="btn-submit">Add Activity</button>
            </form>
        </div>
    </div>

    <form id="deleteForm" method="POST">
        <input type="hidden" name="activity_id" id="activityIdToDelete">
        <input type="hidden" name="deleteActivity">
    </form>

</body>

</html>