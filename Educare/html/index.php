<?php
include('../database/db.php');

// VIEW TEACHERS
$sqlFETCH = "SELECT * FROM teachers";
$stmtFETCH = $pdo->prepare($sqlFETCH);
$stmtFETCH->execute();
$teachers = $stmtFETCH->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Educare</title>
  <link rel="stylesheet" href="../css/style.css">
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

      <section class="features">
        <div class="feature-card">
          <img src="../assets/homenv.jpg" alt="Feature 1">
          <h3>Home Environment</h3>
          <p>Safe and secure learning environment.</p>
        </div>
        <div class="feature-card">
          <img src="../assets/active learning.png" alt="Feature 2">
          <h3>Active Learning</h3>
          <p>Engage young learners with fun activities.</p>
        </div>
        <div class="feature-card">
          <img src="../assets/creative.png" alt="Feature 3">
          <h3>Creative Lessons</h3>
          <p>Explore creativity through innovative teaching.</p>
        </div>
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

      <section class="team">
        <h2>Meet Our Team</h2>
        <div class="team-grid">
          <?php foreach ($teachers as $teacher): ?>
            <div class="team-member">
              <img src="../assets/placeholder.jpg" alt="<?php echo htmlspecialchars($teacher['name']); ?>">
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