<!DOCTYPE html>
<?php
require_once("Controller/MemberController.php");
use Controller\MemberController;

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
  include_once("layouts/nav.php");
  ?>
  <header>
    <h1>Online Safety Campaign</h1>
  </header>
  <main>
    <section id="contact">
      <h2>Register Your Account</h2>
      <?php
      if (isset($_GET['registerError'])) :
        echo "Register error. " . $_GET['message'];
      endif
      ?>
      <!-- Contact Form -->
      <form action="#" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required></input>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required></input>

        <button type="submit" name="btnRegister" class="bgBlueButton">Register</button>
      </form>

      <!-- Privacy Policy Link -->
      <p>
        Before sending a message, please review our
        <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
      </p>

      <?php
      if (isset($_POST['btnRegister'])) :
        $memberController = new MemberController();
        $memberController->register();
      endif
      ?>
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