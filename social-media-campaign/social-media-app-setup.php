<!DOCTYPE html>
<?php
$currentPage = "admin_social_media_app_setup";
$pageType = 1;
require_once("Controller/SocialMediaAppController.php");

use Controller\SocialMediaAppController;

$socialMediaAppController = new SocialMediaAppController();
$apps = $socialMediaAppController->getAllSocialMediaApps();
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
  <?php include_once("layouts/nav.php"); ?>
  <header>
    <h1>Online Safety Campaign</h1>
    <!-- Custom Cursors and 3D Illustrations can be added here -->
  </header>

  <main>
    <section id="contact">
      <h2>Create a New Social Media App</h2>
      <!-- Contact Form -->
      <form action="#" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo" required />

        <label for="link">Link:</label>
        <input type="text" id="link" name="link" required />

        <label for="privacy_link">Privacy Link:</label>
        <input type="text" id="privacy_link" name="privacy_link" required />

        <button type="submit" name="btnSocialMediaAppFormSubmit" class="bgBlueButton" style="font-size:16px;">Send Message</button>

      </form>
      <?php if(isset($_GET['isEdit'])) : ?>
      <form action="#" method="POST">
        <button type="submit" name="btnCancel" class="bgWhiteButton" style="font-size: 16px; margin-top: 10px;">Cancel Edit</button>
      </form>
      <?php endif; ?>
      <!-- Privacy Policy Link -->
      <p>
        Before sending a message, please review our
        <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.
      </p>
    </section>
    <section>
        <?php foreach ($apps as $item) : ?>
        <div>
          <img src="<?= "images/$item->logo" ?>" alt="">
        </div>
        <?php endforeach; ?>
    </section>
  </main>

  <?php include_once("layouts/footer.php") ?>
</body>

</html>
<?php
if (isset($_POST['btnSocialMediaAppFormSubmit'])) :
  $actionIsStore = isset($_GET['isEdit']) ? false : true;
  $socialMediaAppController->socialMediaAppFormSubmit($actionIsStore);
endif;

if (isset($_POST['btnCancel'])) :
  header("location:social-media-app-setup.php");
endif;
