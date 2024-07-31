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
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
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
      if (isset($_GET['registerError']) and $_GET['errorCode'] != 23000) :
        echo "<span class='text-primary-red'>Register error. " . $_GET['message'] . "</span>";
      endif
      ?>
      <!-- Contact Form -->
      <form action="#" method="post" id="formRegister">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
        <?php if (isset($_GET['registerError']) and $_GET['errorCode'] == 23000) : ?>
        <span class="text-primary-red">An account with this email has already existed!</span>
        <?php endif; ?>

        <label for="password">Password:</label>
        <input type="password" id="password" class="txtPasswords" name="password" required></input>
        <span id="spanPasswordLength" class="text-primary-red hidden">Password must be at least 8 characters.</span>

        <label for="password">Confirm Password:</label>
        <input type="password" id="confirm_password" class="txtPasswords" name="confirm_password" required></input>
        <span id="spanConfirmPassword" class="text-primary-red hidden">Two passwords must be a match(even space and special characters).</span>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required></input>

        <button type="submit" name="btnRegister" id="btnRegister" class="bgBlueButton">Register</button>
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
    <p>You are here: Register</p>
    <div class="footer-content">
      <p>&copy; 2024 Online Safety Campaign</p>
      <!-- Add social media buttons with relevant links -->
      <a href="#" style="color: white">Facebook</a>
      <a href="#" style="color: white; margin-left: 10px">Twitter</a>
      <a href="#" style="color: white; margin-left: 10px">Instagram</a>
    </div>
  </footer>
</body>
<script>
const txtConfirmPassword = document.getElementById("confirm_password");
const password = document.getElementById("password");
const spanConfirmPassword = document.getElementById("spanConfirmPassword");
const btnRegister = document.getElementById("btnRegister");
const spanPasswordLength = document.getElementById("spanPasswordLength");
const formRegister = document.getElementById("formRegister");
const txtPasswords =document.querySelectorAll(".txtPasswords");

window.onload = () => {
  txtPasswords.forEach(item => {
    item.addEventListener("input", () => {
      let checkPasswordLength = false;
      let checkConfirmPassword = false;
      if( password.value !== txtConfirmPassword.value ) {
        checkConfirmPassword = false;
        spanConfirmPassword.classList.remove("hidden");
        spanConfirmPassword.classList.add("block");
      }
      else {
        checkConfirmPassword = true;
        spanConfirmPassword.classList.remove("block");
        spanConfirmPassword.classList.add("hidden");
      }
      if( password.value.length < 8 ) {
        spanPasswordLength.classList.remove("hidden");
        spanPasswordLength.classList.add("block");
        checkPasswordLength = false;
      }
      else {
        spanPasswordLength.classList.remove("block");
        spanPasswordLength.classList.add("hidden");
        checkPasswordLength = true;
      }

      if(!checkConfirmPassword || !checkPasswordLength) btnRegister.disabled = true;
      else btnRegister.disabled = false;
    })
  })

  formRegister.addEventListener("submit", (e) => {
    if ((txtConfirmPassword.value !== password.value) || (password.value.length < 8)) {
      e.preventDefault();
      btnRegister.disabled = true;
      return;
    } else {
      btnRegister.disabled = false;
    }
  });

}
</script>
</html>