<?php
include('../database/db.php');

// VIEW TEACHERS
$sqlFETCH = "SELECT * FROM teachers";
$stmtFETCH = $pdo->prepare($sqlFETCH);
$stmtFETCH->execute();
$teachers = $stmtFETCH->fetchAll(PDO::FETCH_ASSOC);

// VIEW ACTIVITIES
$sqlActivities = "SELECT * FROM activities";
$stmtActivities = $pdo->prepare($sqlActivities);
$stmtActivities->execute();
$activities = $stmtActivities->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educare</title>
    <link rel="stylesheet" href="../css/style.css">

    <!--Google Links-->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://font.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

    <!-- -->

</head>

<body>
    <header>

        <!-- Navigation  -->
        <?php include('navigation.php'); ?>

        <!-- -->
        <br>
        <br>
        <br>

        <main>
            <section class="hero">
                <p style="padding-bottom: 10px;">World-class education for young minds.</p>
                <a href="../html/bring.html">
                    <button id="button1">Bring Your Kid to Educare..</button></a>
            </section>

            <!-- DYNAMIC WAY OF ADDING ACTIVITES FROM THE DATABASE-->
            <section class="features">
                <?php foreach ($activities as $activity): ?>
                    <div class="feature-card">
                        <img src="<?php echo htmlspecialchars($activity['image']); ?>">
                        <p><?php echo htmlspecialchars($activity['name']); ?></p>
                    </div>
                <?php endforeach; ?>
            </section>


            <section class="gallery">
                <h2>Our Gallery</h2>
                <div class="gallery-grid">
                    <img src="../assets/gallery.jpg" alt="Gallery Image 1">
                    <img src="../assets/gallery1.jpg" alt="Gallery Image 2">
                    <img src="../assets/gallery2.jpg" alt="Gallery Image 3">
                    <img src="../assets/gallery3.jpg" alt="Gallery Image 4">
                </div>
            </section>

            <section class="testimonials">
                <h2>What Parents Say</h2>
                <div class="testimonial-card">
                    <p>"Educare has provided my child with the best education experience. Highly recommended!"</p>
                    <h4>- Sarah Johnson</h4>
                </div>
                <div class="testimonial-card">
                    <p>"Educare is the best school in region."</p>
                    <h4>-John Smith</h4>
                </div>
                <div class="testimonial-card">
                    <p>"The teachers are fantastic and the environment is so welcoming. My kids love it here."</p>
                    <h4>- Michael Lee</h4>
                </div>
            </section>

            <!-- DYNAMIC WAY OF ADDING TEACHERS FROM THE DATABASE-->
            <section class="team">
                <h2>Meet Our Team</h2>
                <div class="team-grid">
                    <?php foreach ($teachers as $teacher): ?>
                        <div class="team-member">
                            <img src="<?php echo htmlspecialchars($teacher['image']); ?>" alt="<?php echo htmlspecialchars($teacher['name']); ?>">
                            <h4><?php echo htmlspecialchars($teacher['name']); ?></h4>
                            <p><?php echo htmlspecialchars($teacher['subject']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

        </main>

        <!--Footer-->
        <?php include('footer.php') ?>

        <!-- -->


</body>

</html>