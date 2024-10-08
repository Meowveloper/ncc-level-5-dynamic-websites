<!DOCTYPE html>
<?php
ob_start();
$currentPage = "admin_contact_list";
$pageType = 1;
require_once("Controller/ContactController.php");

use Controller\ContactController;

$contactController = new ContactController();


if (isset($_POST['btnSearch'])) :
  $contacts = $contactController->searchOrGetAllContacts($_POST['search']);
else :
  $contacts = $contactController->searchOrGetAllContacts();
endif;

usort($contacts, function ($a, $b) {
  return strtotime($b->created_at) - strtotime($a->created_at);
});

if (isset($_GET['delete'])) : 
  $contactController->deleteFromContactList($_GET['delete']);
endif;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/contact-list.css">
</head>

<body>
  <?php include_once("layouts/nav.php"); ?>
  <header class="flex justify-center items-center px-70px gap-5rem">
    <h1>Online Safety Campaign</h1>
    <div>
      <form action="" method="POST">
        <input type="text" name="search" placeholder="Search for members" value="<?= isset($_POST['btnSearch']) ? $_POST['search'] : "" ?>">
        <button type="submit" name="btnSearch" class="bgBlueButton cursor-pointer">Search</button>
        <button type="button" name="btnSearch" class="bgWhiteButton cursor-pointer">
          <a href="contact-list.php" class="text-decoration-none cursor-pointer">Clear</a>
        </button>
      </form>
    </div>
  </header>

  <main id="admin_social_media_apps" class="px-70px">
    <section class="flex flex-wrap justify-center items-stretch gap-2rem">
      <?php if (count($contacts) < 1) : ?>
        <h2>
          <?= (isset($_POST['btnSearch']) and $_POST['search'] != '') ? "Cannot find anything on " . $_POST['search'] . "." : "Members have sent no message..." ?>
        </h2>
        <?php
      else :
        foreach ($contacts as $item) : ?>
          <div class="w-400px shadow relative p-20px rounded-10px bg-primary-light-blue-25-opa30">
            <div class="links">

              <p><span>Email: </span><?= $item->email ?></p>
              <div>
                <h2 class="text-primary-color">
                  Message
                </h2>
                <p class="text-justify">
                  <?= $item->message ?>
                </p>
                <div class="mb-65px">Sent at : <?= $item->created_at ?> </div>
              </div>
              <button class="bgBlueButton w-151px h-44px absolute bottom-10px left-20px cursor-pointer">
                <a href="contact-list.php?delete=<?= $item->id ?>" class="cursor-pointer text-decoration-none">Delete</a>
              </button>
            </div>
          </div>
      <?php endforeach;
      endif;
      ?>
    </section>
  </main>

  <?php include_once("layouts/footer.php") ?>
</body>

<script>
</script>

</html>
<?php
ob_end_flush();
