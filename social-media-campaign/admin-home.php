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

  <main id="admin_social_media_apps" class="mt-40px">
    <h1 class="w-full mb-2rem text-center">Online Safety Campaign</h1>
    <section class="w-full flex justify-even items-center flex-wrap mb-3rem bg-primary-light-blue-25-opa30 py-2rem gap-2rem">
      
      <div class="w-400px text-justify text-gray-2">
      <span class="fs-30px fw-bold text-primary-color">Ohh..cool admin</span>, You stand at the precipice of the digital cosmos, a celestial steward shaping the minds of tomorrow's navigators. This domain is your dominion, a sanctuary where knowledge and wisdom converge to shield young souls from the cosmic storms of the digital realm. With each word and image, you sow the seeds of digital citizenship, nurturing a generation of enlightened explorers. Your work is not merely administration; it is a cosmic responsibility.
      <div>
        <button class="bgBlueButton w-151px h-44px cursor-pointer mt-20px">
          <a href="admin-profile.php" class="cursor-pointer text-decoration-none">Go To Profile</a>
        </button>
      </div>
      </div>
      <img src="assets/admin-home.jpg" class="w-400px rounded-10px shadow" alt="">
    </section>
    <section class="cardContainer px-70px">

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
