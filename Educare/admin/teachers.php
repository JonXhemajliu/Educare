<?php
include('../database/db.php');

$message = ''; // Variable to store success/error messages

// ADDING TEACHERS
if (isset($_POST['addTeacher'])) {
    $name = $_POST["name"];
    $subject = $_POST["subject"];

    if (empty($name) || empty($subject)) {
        $message = "Error: One or more form fields are empty.";
    } else {
        $sql = "INSERT INTO teachers (name, subject) VALUES (:name, :subject)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute(['name' => $name, 'subject' => $subject]);

        if ($result) {
            $message = "Teacher added successfully!";
        } else {
            $message = "Error: Failed to insert data.";
        }
    }
}

// DELETING TEACHERS
if (isset($_POST['deleteTeacher']) && isset($_POST['teacher_id']) && !empty($_POST['teacher_id'])) {
    $teacher_id = $_POST['teacher_id'];

    // Check if the teacher_id exists and is not empty
    if (!empty($teacher_id)) {
        $sqlDELETE = "DELETE FROM teachers WHERE id = :teacher_id";
        $stmtDELETE = $pdo->prepare($sqlDELETE);
        $resultDELETE = $stmtDELETE->execute(['teacher_id' => $teacher_id]);

        if ($resultDELETE) {
            $message = "Teacher deleted successfully!";
        } else {
            $message = "Error: Teacher could not be deleted.";
        }
    } else {
        $message = "Error: No teacher selected for deletion.";
    }
} else {
    // If there was an attempt to delete but no teacher_id was provided
    if (isset($_POST['deleteTeacher']) && empty($_POST['teacher_id'])) {
        $message = "Error: Teacher ID not found.";
    }
}

// VIEW TEACHERS
$sqlFETCH = "SELECT * FROM teachers";
$stmtFETCH = $pdo->prepare($sqlFETCH);
$stmtFETCH->execute();


// UPDATING TEACHERS
if (isset($_POST['updateTeachers'])) {
    $teacher_id = $_POST['teacher_id'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];


    if (!empty($name) && !empty($subject)) {
        $sqlUPDATE = "UPDATE teachers SET name = :name, subject = :subject WHERE id = :teacher_id";
        $stmtUPDATE = $pdo->prepare($sqlUPDATE);
        $resultUPDATE = $stmtUPDATE->execute(['name' => $name, 'subject' => $subject, 'teacher_id' => $teacher_id]);

        if ($resultUPDATE) {
            $message = "Teacher updated successfully!";
            header("Location: teachers.php");
            exit;
        } else {
            $message = "Error: Failed to update teacher.";
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
    <script defer src="admin.js"></script>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <hr>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="teachers.php">Teachers</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="navbar">
            <h1>Dashboard</h1>
        </div>
        <div class="content">
            <div class="table-container">
                <h2>Manage Teachers</h2>

                <?php if (!empty($message)) : ?>
                    <div class="message <?php echo (strpos($message, 'Error') === false) ? 'success' : 'error'; ?>" id="messageBox">
                        <span><?php echo $message; ?></span>
                        <button class="close-btn" onclick="closeMessage()">×</button>
                    </div>
                <?php endif; ?>



                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="teacherTableBody">
                        <?php while ($info = $stmtFETCH->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo $info['name']; ?></td>
                                <td><?php echo $info['subject']; ?></td>
                                <td>
                                    <form method="POST" action="">
                                        <input type="hidden" name="teacher_id" value="<?php echo $info['ID']; ?>">
                                        <button type="button" onclick="openEditModal('<?php echo $info['ID']; ?>', '<?php echo $info['name']; ?>', '<?php echo $info['subject']; ?>')" class="btn btn-edit">Edit</button>
                                        <button type="submit" name="deleteTeacher" class="btn btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <button class="btn btn-add" onclick="openModal()">Add Teacher</button>
                </table>

            </div>
        </div>
    </div>

    <div id="editTeacherModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Teacher</h2>
            <form action="" method="POST">
                <input type="hidden" name="teacher_id" id="edit_teacher_id">
                <div class="form-group">
                    <label for="edit_name">Name:</label>
                    <input type="text" id="edit_name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="edit_subject">Subject:</label>
                    <input type="text" id="edit_subject" name="subject" required>
                </div>
                <button type="submit" name="updateTeachers" class="btn-submit">Update Teacher</button>
            </form>
        </div>
    </div>

    <div id="addTeacherModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Add Teacher</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <button type="submit" name="addTeacher" class="btn-submit">Add Teacher</button>
            </form>
        </div>
    </div>

    <form id="deleteForm" method="POST">
        <input type="hidden" name="teacher_id" id="teacherIdToDelete">
        <input type="hidden" name="deleteTeacher">
    </form>

</body>

</html>