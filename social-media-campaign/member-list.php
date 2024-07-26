<!DOCTYPE html>
<?php
ob_start();
$currentPage = "admin_member_list";
$pageType = 1;
require_once("Controller/MemberController.php");

use Controller\MemberController;

$memberController = new MemberController();

if(isset($_GET['changeRole'])) : 
  $memberController->changeRoleFromContactList($_GET['changeRoleId'], $_GET['roleToChange']);
endif;

if (isset($_GET['isDelete'])) :
  $memberController->delete($_GET['deleteId']);
endif;

if (isset($_POST['btnSearch'])) :
  $members = $memberController->searchOrGetAllMembers($_POST['search']);
else :
  $members = $memberController->searchOrGetAllMembers();
endif;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/member-list.css">
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
          <a href="member-list.php" class="text-decoration-none cursor-pointer">Clear</a>
        </button>
      </form>
    </div>
  </header>

  <main id="admin_social_media_apps" class="px-70px">
    <section class="cardContainer">
      <?php if (count($members) < 1) : ?>
        <h2>
          <?= (isset($_POST['btnSearch']) and $_POST['search'] != '') ? "Cannot find anything on " . $_POST['search'] . "." : "No members has registered our website" ?>
        </h2>
        <?php
      else :
        foreach ($members as $item) : ?>
          <div class="card shadow">
            <div class="row justify-center items-center gap-1rem">
              <?php if (isset($item->profile) and $item->profile != '') : ?>
                <img src="<?= "images/$item->profile" ?>" alt="" width="100%" height="200px" class="rounded-10px">
              <?php else : ?>
                <img src="assets/default-profile.png" alt="" width="100%" height="200px" class="rounded-10px">
              <?php endif; ?>
            </div>
            <div class="links">
              <p><span>Name: </span><?= $item->name ?> <?= ($_SESSION['user']->id === $item->id) ? '<span style="font-weight: bold;">(You)</span>' : '' ?></p>
              <p><span>Email: </span><?= $item->email ?></p>
              <p><span>City: </span><?= $item->city ?></p>
              <p><span>Subscription: </span><?= !!$item->subscription ? "Yes" : "No" ?></p>
              <p><span>Role: </span><?= !!$item->role ? "Admin" : "User" ?></p>
              <p><span>Owner?? </span><?= !!$item->owner ? "Yes" : "No" ?></p>
            </div>
            <?php if ($_SESSION['user']->id !== $item->id and $item->owner !== 1) : ?>
              <div class="buttons flex justify-start gap-1rem">
                <?php if($item->role !== 1) : ?>
                <button class="bgWhiteButton cursor-pointer btnBanUser text-red" data-id="<?= $item->id ?>" data-name="<?= $item->name ?>">
                  Ban User
                </button>
                <?php endif; ?>
                <?php if ($item->role === 1) : ?>
                  <button class="bgWhiteButton cursor-pointer font-bold btnRemoveFromAdmin" data-id="<?= $item->id ?>" data-name="<?= $item->name ?>">
                    Remove from Admins
                  </button>
                <?php else : ?>
                  <button class="bgBlueButton cursor-pointer btnPromoteToAdmin" data-id="<?= $item->id ?>" data-name="<?= $item->name ?>">
                    Promote to Admin
                  </button>
                <?php endif; ?>
              </div>
            <?php endif; ?>
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
