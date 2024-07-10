<!DOCTYPE html>
<?php 
$currentPage = "guest_information";
$pageType = 0;
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
  </head>
  <body>
    <?php 
      include_once('layouts/nav.php');
    ?>
    <header>
      <h1>Online Safety Campaign</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main>
      <section id="information">
        <h2>Information</h2>
        <p>
          Welcome to the Information page of the Online Safety Campaign. Here,
          we provide details about our social media campaigns and their aims and
          vision to keep teenagers safe online.
        </p>
        <h3>Social Media Campaigns</h3>
        <p>
          Our campaigns focus on empowering teenagers to navigate the digital
          world safely. We aim to create awareness about online risks and
          promote responsible use of social media platforms.
        </p>
        <h3>Aims and Vision</h3>
        <p>
          Our primary aim is to foster a secure online environment for
          teenagers, promoting positive interactions and preventing
          cyberbullying. We envision a future where young individuals can
          explore the digital space without compromising their safety and
          well-being.
        </p>
      </section>
    </main>

    <footer>
      <p>You are here: Home</p>
      <div class="footer-content">
        <p>&copy; 2024 Online Safety Campaign</p>
        <!-- Add social media buttons with relevant links -->
        <a href="#" style="color: white">Facebook</a>
        <a href="#" style="color: white; margin-left: 10px">Twitter</a>
        <a href="#" style="color: white; margin-left: 10px">Instagram</a>
      </div>
    </footer>
  </body>
</html>
