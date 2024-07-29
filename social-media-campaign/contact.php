<!DOCTYPE html>
<?php
ob_start();
$currentPage = "user_contact";
$pageType = 2;
require_once("Controller/ContactController.php");
use Controller\ContactController;
$contactController = new ContactController();

if(isset($_POST['btnContactFormSubmit'])) : 
  $contactController->createContact();
endif;
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/user/contact.css">
  </head>
  <body>
    <?php include_once("layouts/nav.php"); ?>
    <header>
      <h1>Online Safety Campaign</h1>
    </header>
    <div class="w-fit mx-auto mb-3rem bg-gray-2">
      <div class="contactAnimation"></div>
    </div>

    <main>
      <section id="contact">
        <h2>Contact Us</h2>
        <p>
          Feel free to reach out to us using the contact form below. We
          appreciate your feedback and inquiries.
        </p>
        <form action="#" method="POST" class="mb-1rem">
          <input type="hidden" name="email" value="<?= $_SESSION['user']->email ?>">
          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="4" required></textarea>

          <button class="bgBlueButton cursor-pointer" type="submit" name="btnContactFormSubmit">Send Message</button>
        </form>

        Privacy Policy Link
        <p>
          Before sending a message, please review our
          <a href="" class="cursor-pointer" target="_blank">Privacy Policy</a>
        </p>
      </section>
    </main>

    <?php require_once("layouts/footer.php") ?>
  </body>
</html>
<?php
ob_end_flush();
