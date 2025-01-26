<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=League+Spartan:wght@100..900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../css/style.css" />

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
</head>

<body>
  <!-- NAVIGATION -->
  </nav>
  <?php include('navigation.php'); ?>

  <!-- -->

  <!-- TITLE -->
  <div
    style="
        background-image: url(../assets/contact-bg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
      ">
    <div class="title-bg">
      <div class="title">Contact Us</div>
    </div>
  </div>

  <div class="contact-caption">
    <p>We would love to hear from you! Feel free to reach out anytime.</p>
  </div>

  <section class="contact">
    <h2 class="contact-title">Get in Touch</h2>
    <p class="contact-text">
      If you have any questions or concerns, please use the form below to
      reach us.
    </p>
    <form class="contact-form">
      <div class="form-group">
        <label for="name">Your Name</label><br />
        <input type="text" id="name" placeholder="Enter your name" required />
      </div>
      <div class="form-group">
        <label for="email">Your Email</label><br />
        <input
          type="email"
          id="email"
          placeholder="Enter your email"
          required />
      </div>
      <div class="form-group">
        <label for="message">Your Message</label><br />
        <textarea
          id="message"
          rows="5"
          placeholder="Enter your message"
          required></textarea>
      </div>
      <button type="submit" class="contact-btn">Send Message</button>
    </form>
  </section>

  <
    <!--Footer-->
    <?php include('footer.php') ?>
    
    <!-- -->
</body>

</html>