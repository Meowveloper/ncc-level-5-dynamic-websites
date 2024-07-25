<!DOCTYPE html>
<?php

require_once "Controller/MemberController.php";

use Controller\MemberController;

$memberController = new MemberController();
$pageType = 0;
$currentPage = "login";

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
    include_once "layouts/nav.php";
  ?>
  <header>
    <h1>Online Safety Campaign</h1>
  </header>
  <main>
    <section id="contact">
      <h2>Login</h2>
      <form action="#" method="POST" id="loginForm">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required></input>

        <?php if (isset($_GET['error'])) : ?>
          <span style="color: var(--primary-red)">Login Error!!!<br><?= $_GET['errorMessage'] ?></span>
        <?php endif; ?>
        <?php if (!$memberController->checkLogInAttemptTimes()) : ?>
          <span style="color: var(--primary-red)">You can try again in 5 mins...</span>
        <?php endif; ?>

        <button class="bgBlueButton" <?php if (!$memberController->checkLogInAttemptTimes()) echo "disabled"; ?>  type="submit" name="btnLogin">Login</button>
      </form>
      <p>
        Not a member? Register <a href="./register.php">here</a>.
      </p>
      <!-- Privacy Policy Link -->
      <p>
        Before sending a message, please review our
        <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
      </p>
    </section>
  </main>

  <?php include_once("layouts/footer.php"); ?>
</body>

</html>
<?php
if (isset($_POST['btnLogin'])) :
  $memberController->login();
endif;
