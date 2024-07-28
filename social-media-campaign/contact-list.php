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
    <section class="cardContainer">
      <?php if (count($contacts) < 1) : ?>
        <h2>
          <?= (isset($_POST['btnSearch']) and $_POST['search'] != '') ? "Cannot find anything on " . $_POST['search'] . "." : "Members has sent no message" ?>
        </h2>
        <?php
      else :
        foreach ($contacts as $item) : ?>
          <div class="card shadow">
            <div class="links">
  
              <p><span>Email: </span><?= $item->email ?></p>
              <div>
                <h2 class="text-primary-color">
                  Message
                </h2>
                <p>
                  <?= $item->message ?>
                </p>
              </div>
              
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
  window.onload = () => {
    const banUserButtons = document.querySelectorAll(".btnBanUser");
    const promoteToAdminButtons = document.querySelectorAll(".btnPromoteToAdmin");
    const removeFromAdminButtons = document.querySelectorAll(".btnRemoveFromAdmin");

    banUserButtons.forEach(item => {
      item.addEventListener("click", () => {
        if (window.confirm(`Are you sure you want to delete the user ${item.dataset.name} with the ID of ${item.dataset.id}??`)) {
          window.location.href = `member-list.php?isDelete=1&deleteId=${item.dataset.id}`;
        }
      })
    });

    promoteToAdminButtons.forEach(item => {
      item.addEventListener("click", () => {
        if (window.confirm(`Are you sure you want to promote the user ${item.dataset.name} with the ID of ${item.dataset.id} to an admin??`)) {
          window.location.href = `member-list.php?changeRole=1&changeRoleId=${item.dataset.id}&roleToChange=1`;
        }
      });
    });

    removeFromAdminButtons.forEach(item => {
      item.addEventListener("click", () => {
        if (window.confirm(`Are you sure you want to change the role of the user ${item.dataset.name} with the ID of ${item.dataset.id} to a user??`)) {
          window.location.href = `member-list.php?changeRole=1&changeRoleId=${item.dataset.id}&roleToChange=0`;
        }
      });
    });
  }
</script>

</html>
<?php
ob_end_flush();
