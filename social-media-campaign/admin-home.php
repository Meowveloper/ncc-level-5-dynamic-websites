<!DOCTYPE html>
<?php
ob_start();
$currentPage = "admin_home";
$pageType = 1;
require_once("Controller/ContactController.php");
require_once("Controller/HowParentHelpController.php");
require_once("Controller/NewsLetterController.php");
require_once("Controller/ServiceController.php");
require_once("Controller/MemberController.php");
require_once("Controller/SocialMediaAppController.php");

use Controller\ContactController;
use Controller\HowParentHelpController;
use Controller\NewsLetterController;
use Controller\ServiceController;
use Controller\MemberController;
use Controller\SocialMediaAppController;

$contactController = new ContactController();
$howParentHelpController = new HowParentHelpController();
$newsLetterController = new NewsLetterController();
$serviceController = new ServiceController();
$memberController = new MemberController();
$socialMediaAppController = new SocialMediaAppController();


if (isset($_POST['btnSearch'])) :
  $contacts = $contactController->searchOrGetAllContacts($_POST['search']);
else :
  $contacts = $contactController->searchOrGetAllContacts();
endif;
$howParentHelps = $howParentHelpController->getAllHowParentHelps();
$newsletters = $newsLetterController->getAllNewsletters();
$services = $serviceController->searchOrGetAllServices();
$members = $memberController->searchOrGetAllMembers();
$socialMediaApps = $socialMediaAppController->getAllSocialMediaApps();
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/admin-home.css">
</head>

<body>
  <?php include_once("layouts/nav.php"); ?>
  <header class="flex justify-center items-center px-70px gap-5rem">
    <h1>Online Safety Campaign</h1>
    <!-- <div>
      <form action="" method="POST">
        <input type="text" name="search" placeholder="Search for members" value="<?= isset($_POST['btnSearch']) ? $_POST['search'] : "" ?>">
        <button type="submit" name="btnSearch" class="bgBlueButton">Search</button>
        <button type="button" name="btnSearch" class="bgWhiteButton">
          <a href="contact-list.php" class="text-decoration-none">Clear</a>
        </button>
      </form>
    </div> -->
  </header>

  <main id="admin_social_media_apps" class="px-70px">
    <section class="cardContainer">

      <div class="card shadow">
        <div class="flex justify-start items-center gap-1rem">
          <img src="assets/people.svg" alt="" width="70px" height="70px">
          <span class="fs-30px font-bolder"><?= count($members) ?> <span class="fs-16px">member<?= count($members) > 1 ? "s" : '' ?></span></span>
        </div>
        <p class="text-gray-2">are using our website</p>
      </div>

      <div class="card shadow">
        <div class="flex justify-start items-center gap-1rem">
          <img src="assets/info.svg" alt="" width="70px" height="70px">
          <span class="fs-30px font-bolder"><?= count($howParentHelps) ?> <span class="fs-16px">post<?= count($howParentHelps) > 1 ? "s" : '' ?></span></span>
        </div>
        <p class="text-gray-2">of how parents can help</p>
      </div>

      <div class="card shadow">
        <div class="flex justify-start items-center gap-1rem">
          <img src="assets/newsletter.svg" alt="" width="70px" height="70px">
          <span class="fs-30px font-bolder"><?= count($newsletters) ?> <span class="fs-16px">post<?= count($newsletters) > 1 ? "s" : '' ?></span></span>
        </div>
        <p class="text-gray-2">of newsletters</p>
      </div>
      <div class="card shadow">
        <div class="flex justify-start items-center gap-1rem">
          <img src="assets/service.svg" alt="" width="70px" height="70px">
          <span class="fs-30px font-bolder"><?= count($services) ?> <span class="fs-16px">type<?= count($services) > 1 ? "s" : '' ?></span></span>
        </div>
        <p class="text-gray-2"><?= count($services) > 1 ? "have " : "has " ?>been offering.</p>
      </div>
      <div class="card shadow">
        <div class="flex justify-start items-center gap-1rem">
          <img src="assets/contact.svg" alt="" width="70px" height="70px">
          <span class="fs-30px font-bolder"><?= count($contacts) ?> <span class="fs-16px">message<?= count($contacts) > 1 ? "s" : '' ?></span></span>
        </div>
        <p class="text-gray-2"><?= count($contacts) > 1 ? "have " : "has " ?>been sent by the users.</p>
      </div>
      <div class="card shadow">
        <div class="flex justify-start items-center gap-1rem">
          <img src="assets/smile.svg" alt="" width="70px" height="70px">
          <span class="fs-30px font-bolder"><?= count($socialMediaApps) ?> <span class="fs-16px">secure social media app<?= count($socialMediaApps) > 1 ? "s" : '' ?></span></span>
        </div>
        <p class="text-gray-2"><?= count($socialMediaApps) > 1 ? "have " : "has " ?>been shown.</p>
      </div>

    </section>
  </main>

  <?php include_once("layouts/footer.php") ?>
</body>

<script></script>

</html>
<?php
ob_end_flush();
