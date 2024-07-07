<!DOCTYPE html>
<?php
ob_start();
$currentPage = "admin_how_parent_help_setup";
$pageType = 1;
require_once("Controller/HowParentHelpController.php");

use Controller\HowParentHelpController;

$howParentHelpController = new HowParentHelpController();


if (isset($_GET['isEdit'])) :
  $itemToEdit = $howParentHelpController->getWithID($_GET['editId']);
endif;

if (isset($_GET['isDelete'])) :
  $howParentHelpController->delete($_GET['deleteId']);
endif;

if (isset($_POST['btnSearch'])) :
  $howParentHelps = $howParentHelpController->getAllHowParentHelps($_POST['search']);
else :
  $howParentHelps = $howParentHelpController->getAllHowParentHelps();
endif;

if (isset($_POST['btnHowParentHelpFormSubmit'])) :
  $actionIsStore = isset($_GET['isEdit']) ? false : true;
  $howParentHelpController->howParentHelpFormSubmit($actionIsStore);
endif;

// if (isset($_POST['btnCancel'])) :
//   header("location:newsletter-setup.php");
//   exit();
// endif;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/how-parent-help-setup.css">
</head>

<body>
  <?php include_once("layouts/nav.php"); ?>
  <header class="flex justify-center items-center px-70px gap-5rem">
    <h1>Online Safety Campaign</h1>
    <div>
      <form action="" method="POST">
        <input type="text" name="search" placeholder="Search for how parents can help" value="<?= isset($_POST['btnSearch']) ? $_POST['search'] : "" ?>">
        <button type="submit" name="btnSearch" class="bgBlueButton">Search</button>
        <button type="button" name="btnSearch" class="bgWhiteButton">
          <a href="how-parent-help-setup.php" class="text-decoration-none">Clear</a>
        </button>
      </form>
    </div>
  </header>

  <main id="admin_social_media_apps" class="px-70px">
    <section class="formContainer">
      <h2><?= isset($_GET['isEdit']) ? "Edit $itemToEdit->description" : "Create a New How a Parent Can Help" ?></h2>

      <form id="howParentHelpForm" action="#" method="POST" enctype="multipart/form-data">
        <?php if (isset($_GET['isEdit'])) : ?>
          <input type="hidden" name="id" value="<?= $itemToEdit->id ?>">
        <?php endif; ?>
        <label for="description">Description:</label>
        <textarea type="text" id="description" name="description" required><?= isset($itemToEdit) ? $itemToEdit->description : "" ?></textarea>

        <label for="image_1">Image 1:</label>
        <input type="file" id="image_1" name="image_1" required />
        <span id="image1ErrorIndicator" class="text-red hidden">Please choose an image that ends in .jpg/.png/.jpeg</span>

        <label for="image_2">Image 2:</label>
        <input type="file" id="image_2" name="image_2" required />
        <span id="image2ErrorIndicator" class="text-red hidden">Please choose an image that ends in .jpg/.png/.jpeg</span>

        <button type="submit" id="btnHowParentHelpFormSubmit" name="btnHowParentHelpFormSubmit" class="bgBlueButton" style="font-size:16px;">
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
      <?php if (count($howParentHelps) < 1) : ?>
        <h2>
          <?= (isset($_POST['btnSearch']) and $_POST['search'] != '') ? "Cannot find anything on " . $_POST['search'] . "." : "No How parents can help added. Will you do the honor?" ?>
        </h2>
        <?php
      else :
        foreach ($howParentHelps as $item) : ?>
          <div class="card shadow">
            <div class="row justify-center items-center gap-1rem">
              <img src="<?= "images/$item->image_1" ?>" alt="" width="45%" height="200px">
              <img src="<?= "images/$item->image_2" ?>" alt="" width="45%" height="200px">
            </div>
            <div class="links">
              <p><span>Description: </span><?= $item->description ?></p>
            </div>
            <div class="buttons flex justify-start gap-1rem">
              <button class="bgBlueButton">
                <a class="text-decoration-none" href="how-parent-help-setup.php?isEdit=1&editId=<?= $item->id ?>">Edit</a>
              </button>
              <button class="bgWhiteButton">
                <a class="text-decoration-none" href="how-parent-help-setup.php?isDelete=1&deleteId=<?= $item->id ?>">Delete</a>
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
  const howParentHelpForm = document.getElementById("howParentHelpForm");
  const fileImage1 = document.getElementById("image_1");
  const fileImage2 = document.getElementById("image_2");
  const image1ErrorIndicator = document.getElementById("image1ErrorIndicator");
  const image2ErrorIndicator = document.getElementById("image2ErrorIndicator");
  const validators = useValidators();
  const validations = getValidations();
  let image1IsImage = false;
  let image2IsImage = false;

  window.onload = () => {
    howParentHelpForm.addEventListener("submit", (e) => {
      if (validations.overAll()) {
        howParentHelpForm.submit();
      } else {
        alert("VALIDATION FAIL!!!\nThe Description should have at least 5 words.\nBoth the chosen files must be images.");
        e.preventDefault();
        return;
      }
    });
    fileImage1.addEventListener("change", (e) => {
      image1IsImage = validators.isImage(e.target.files[0]);
      validations.imageValidation(e, image1IsImage, image1ErrorIndicator)
    });
    fileImage2.addEventListener("change", (e) => {
      image2IsImage = validators.isImage(e.target.files[0]);
      validations.imageValidation(e, image2IsImage, image2ErrorIndicator)
    });
  }


  function getValidations() {

    const imageValidation = (e, imageIsImage, imageErrorIndicator) => {
      if (validators.isImage(e.target.files[0])) {
        imageErrorIndicator.classList.remove("block");
        imageErrorIndicator.classList.add("hidden");
      } else {
        imageErrorIndicator.classList.remove("hidden");
        imageErrorIndicator.classList.add("block");
      }
    };


    const overAll = () => {
      const description = document.getElementById("description").value;
      console.log("IS text", validators.isText(description));
      console.log("IS length", validators.checkLength(description, 5));
      console.log(image1IsImage, image2IsImage);
      return (
        validators.isText(description) &&
        validators.checkLength(description, 5) &&
        image1IsImage && image2IsImage
      );
    }

    return {
      overAll,
      imageValidation
    }
  }
</script>

</html>
<?php
ob_end_flush();
