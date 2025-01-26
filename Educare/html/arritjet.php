<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=League+Spartan:wght@100..900&display=swap"
    rel="stylesheet" />
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

  <title>Arritjet</title>
</head>

<body>
  <!-- NAVIGATION -->
  <?php include('navigation.php'); ?>

  <!-- TITLE -->
  <div
    style="
        background-image: url('../assets/arritjet-bg.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
      "
    class="title-bg-img">
    <div class="title-bg">
      <div class="title">Arritjet</div>
    </div>
  </div>
  <div class="arritjet-quote">
    <div class="arritjet-quote-text">
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore
      dolores odio nihil nisi nemo aliquid quo officiis earum quidem
      ratione!"" <br /><br />- Lorem Ipsum
    </div>
  </div>

  <!--  -->

  <div class="arritjet">
    <div
      style="background-image: url(../assets/sport-bg.jpg)"
      class="arritjet-item">
      <div class="arritjet-text">
        <div class="arritjet-title">Sport</div>
        <div class="arritjet-description">Lorem, ipsum dolor sit amet...</div>
        <a href="">
          <div class="arritjet-btn">Me Shume</div>
        </a>
      </div>
    </div>
    <div
      style="background-image: url(../assets/science-bg.jpg)"
      class="arritjet-item">
      <div class="arritjet-text">
        <div class="arritjet-title">Shkence</div>
        <div class="arritjet-description">Lorem, ipsum dolor sit amet...</div>
        <a href="">
          <div class="arritjet-btn">Me Shume</div>
        </a>
      </div>
    </div>
    <div
      style="background-image: url(../assets/math-bg.jpeg)"
      class="arritjet-item">
      <div class="arritjet-text">
        <div class="arritjet-title">Matematike</div>
        <div class="arritjet-description">Lorem, ipsum dolor sit amet...</div>
        <a href="">
          <div class="arritjet-btn">Me Shume</div>
        </a>
      </div>
    </div>
    <div
      style="background-image: url(../assets/fizike.jpg)"
      class="arritjet-item">
      <div class="arritjet-text">
        <div class="arritjet-title">Fizike</div>
        <div class="arritjet-description">Lorem, ipsum dolor sit amet...</div>
        <a href="">
          <div class="arritjet-btn">Me Shume</div>
        </a>
      </div>
    </div>
    <div
      style="background-image: url(../assets/art-bg.jpg)"
      class="arritjet-item">
      <div class="arritjet-text">
        <div class="arritjet-title">Art</div>
        <div class="arritjet-description">Lorem, ipsum dolor sit amet...</div>
        <a href="">
          <div class="arritjet-btn">Me Shume</div>
        </a>
      </div>
    </div>
  </div>

  <!--Footer-->

  <?php include('footer.php'); ?>
  <!-- -->
</body>

</html>