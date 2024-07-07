<!DOCTYPE html>
<?php
ob_start();
$currentPage = "admin_social_media_app_setup";
$pageType = 1;
require_once("Controller/SocialMediaAppController.php");

use Controller\SocialMediaAppController;

$socialMediaAppController = new SocialMediaAppController();


if (isset($_GET['isEdit'])) :
  $itemToEdit = $socialMediaAppController->getWithID($_GET['editId']);
endif;

if (isset($_GET['isDelete'])) :
  $socialMediaAppController->delete($_GET['deleteId']);
endif;

if(isset($_POST['btnSearch'])) : 
  $apps = $socialMediaAppController->getAllSocialMediaApps($_POST['search']);
else : 
  $apps = $socialMediaAppController->getAllSocialMediaApps();
endif;

if (isset($_POST['btnSocialMediaAppFormSubmit'])) :
  $actionIsStore = isset($_GET['isEdit']) ? false : true;
  $socialMediaAppController->socialMediaAppFormSubmit($actionIsStore);
endif;

if (isset($_POST['btnCancel'])) :
  header("location:social-media-app-setup.php");
  exit();
endif;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/social-media-app-setup.css">
</head>

<body>
  <?php include_once("layouts/nav.php"); ?>
  <header class="flex justify-center items-center px-70px gap-5rem">
    <h1>Online Safety Campaign</h1>
    <div>
      <form action="" method="POST">
        <input type="text" name="search" placeholder="Search for the social media apps" value="<?= isset($_POST['btnSearch']) ? $_POST['search'] : "" ?>">
        <button type="submit" name="btnSearch" class="bgBlueButton">Search</button>
        <button type="button" name="btnSearch" class="bgWhiteButton">
          <a href="social-media-app-setup.php" class="text-decoration-none">Clear</a>
        </button>
      </form>
    </div>
  </header>

  <main id="admin_social_media_apps" class="px-70px">
    <section class="formContainer">
      <h2><?= isset($_GET['isEdit']) ? "Edit $itemToEdit->name" : "Create a New Social Media App" ?></h2>
      <!-- Contact Form -->
      <form id="socialMediaAppForm" action="#" method="post" enctype="multipart/form-data">
        <?php if (isset($_GET['isEdit'])) : ?>
          <input type="hidden" name="id" value="<?= $itemToEdit->id ?>">
        <?php endif; ?>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required value="<?= isset($itemToEdit) ? $itemToEdit->name : "" ?>" />

        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo" required />
        <span id="logoErrorIndicator" class="text-red hidden">Please choose an image that ends in .jpg/.png/.jpeg</span>

        <label for="link">Link:</label>
        <input type="url" id="link" name="link" required value="<?= isset($itemToEdit) ? $itemToEdit->link : "" ?>" />

        <label for="privacy_link">Privacy Link:</label>
        <input type="url" id="privacy_link" name="privacy_link" required value="<?= isset($itemToEdit) ? $itemToEdit->privacy_link : "" ?>" />
        <!-- <input type="hidden" name="SocialMediaAppFormSubmit"> -->
        <button type="submit" id="btnSocialMediaAppFormSubmit" name="btnSocialMediaAppFormSubmit" class="bgBlueButton" style="font-size:16px;">
          <?= isset($_GET['isEdit']) ? "Save" : "Create" ?>
        </button>

      </form>
      <?php if (isset($_GET['isEdit'])) : ?>
        <form action="#" method="POST">
          <button type="submit" name="btnCancel" class="bgWhiteButton" style="font-size: 16px; margin-top: 10px;">Cancel Edit</button>
        </form>
      <?php endif; ?>
    </section>
    <section class="cardContainer">
      <?php if (count($apps) < 1) : ?>
        <h2>
          <?= (isset($_POST['btnSearch']) and $_POST['search'] != '') ? "Cannot find anything on " . $_POST['search'] . "." : "No social media apps added. Will you do the honor?" ?>
        </h2>
        <?php
      else :
        foreach ($apps as $item) : ?>
          <div class="card shadow">
            <div class="flex justify-start items-center gap-1rem">
              <img src="<?= "images/$item->logo" ?>" alt="" width="100px" height="100px" class="rounded-full">
              <p style="font-size: 18px; text-transform: capitalize; font-weight: 700;">
                <?= $item->name ?>
              </p>
            </div>
            <div class="links">
              <a href="<?= $item->link ?>"><?= "Go to $item->name" ?></a><br>
              <a href="<?= $item->privacy_link ?>"><?= "$item->name's privacy settings" ?></a>
            </div>
            <div class="buttons flex justify-start gap-1rem">
              <button class="bgBlueButton">
                <a class="text-decoration-none" href="social-media-app-setup.php?isEdit=1&editId=<?= $item->id ?>">Edit</a>
              </button>
              <button class="bgWhiteButton">
                <a class="text-decoration-none" href="social-media-app-setup.php?isDelete=1&deleteId=<?= $item->id ?>">Delete</a>
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
<script src="validators.js"></script>
<script>
  const socialMediaAppForm = document.getElementById("socialMediaAppForm");
  const fileLogo = document.getElementById("logo");
  const logoErrorIndicator = document.getElementById("logoErrorIndicator");
  const btnSocialMediaAppFormSubmit = document.getElementById("btnSocialMediaAppFormSubmit");
  const validators = useValidators();
  const validations = getValidations();
  let logoIsImage = false;

  window.onload = () => {
    socialMediaAppForm.addEventListener("submit", (e) => {
      if (validations.overAll()) {
        socialMediaAppForm.submit();
      } else {
        alert("VALIDATION FAIL!!!\nThe name should be a text.\nLink and privacy link should be valid links.\nThe chosen file must be an image.");
        e.preventDefault();
        return;
      }
    });
    fileLogo.addEventListener("change", (e) => {
      logoIsImage = validators.isImage(e.target.files[0]);
      if (validators.isImage(e.target.files[0])) {
        logoErrorIndicator.classList.remove("block");
        logoErrorIndicator.classList.add("hidden");
      } else {
        logoErrorIndicator.classList.remove("hidden");
        logoErrorIndicator.classList.add("block");
      }
    })


  }


  function getValidations() {

    const overAll = () => {
      const name = document.getElementById("name").value;
      const link = document.getElementById("link").value;
      const privacyLink = document.getElementById("privacy_link").value;
      return validators.isText(name) && validators.isLink(link) && validators.isLink(privacyLink) && logoIsImage
    }

    return {
      overAll
    }
  }
</script>

</html>
<?php
ob_end_flush();
