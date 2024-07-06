<!DOCTYPE html>
<?php
ob_start();
$currentPage = "admin_newsletter_setup";
$pageType = 1;
require_once("Controller/NewsLetterController.php");

use Controller\NewsLetterController;

$newsLetterController = new NewsLetterController();


if (isset($_GET['isEdit'])) :
  $itemToEdit = $newsLetterController->getWithID($_GET['editId']);
endif;

if (isset($_GET['isDelete'])) :
  $newsLetterController->delete($_GET['deleteId']);
endif;

if(isset($_POST['btnSearch'])) : 
  $newsletters = $newsLetterController->getAllNewsletters($_POST['search']);
else : 
  $newsletters = $newsLetterController->getAllNewsletters();
endif;

if (isset($_POST['btnNewsletterFormSubmit'])) :
  $actionIsStore = isset($_GET['isEdit']) ? false : true;
  $newsLetterController->newsLetterFormSubmit($actionIsStore);
endif;

if (isset($_POST['btnCancel'])) :
  header("location:newsletter-setup.php");
  exit();
endif;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/newsletter-setup.css">
</head>

<body>
  <?php include_once("layouts/nav.php"); ?>
  <header class="flex justify-center items-center px-70px gap-5rem">
    <h1>Online Safety Campaign</h1>
    <div>
      <form action="" method="POST">
        <input type="text" name="search" placeholder="Search for the newsletters" value="<?= isset($_POST['btnSearch']) ? $_POST['search'] : "" ?>">
        <button type="submit" name="btnSearch" class="bgBlueButton">Search</button>
        <button type="button" name="btnSearch" class="bgWhiteButton">
          <a href="newsletter-setup.php" class="text-decoration-none">Clear</a>
        </button>
      </form>
    </div>
  </header>

  <main id="admin_social_media_apps" class="px-70px">
    <section class="formContainer">
      <h2><?= isset($_GET['isEdit']) ? "Edit $itemToEdit->title" : "Create a New Newsletter" ?></h2>
      
      <form id="newsLetterForm" action="#" method="POST" enctype="multipart/form-data">
        <?php if (isset($_GET['isEdit'])) : ?>
          <input type="hidden" name="id" value="<?= $itemToEdit->id ?>">
        <?php endif; ?>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required value="<?= isset($itemToEdit) ? $itemToEdit->title : "" ?>" />

        <label for="content">Content:</label>
        <textarea type="text" id="content" name="content" required><?= isset($itemToEdit) ? $itemToEdit->content : "" ?></textarea>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required />
        <span id="imageErrorIndicator" class="text-red hidden">Please choose an image that ends in .jpg/.png/.jpeg</span>

        <button type="submit" id="btnNewsletterFormSubmit" name="btnNewsletterFormSubmit" class="bgBlueButton" style="font-size:16px;">
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
      <?php if (count($newsletters) < 1) : ?>
        <h2>
          <?= (isset($_POST['btnSearch']) and $_POST['search'] != '') ? "Cannot find anything on " . $_POST['search'] . "." : "No newsletters added. Will you do the honor?" ?>
        </h2>
        <?php
      else :
        foreach ($newsletters as $item) : ?>
          <div class="card shadow">
            <div class="column justify-start items-center gap-1rem">
              <img src="<?= "images/$item->image" ?>" alt="" width="100%" height="200px" class="rounded-20px">
              <p style="font-size: 18px; text-transform: capitalize; font-weight: 700;">
                <?= $item->title ?>
              </p>
            </div>
            <div class="links">
              <p><span>Content: </span><?= $item->content ?></p>
            </div>
            <div class="buttons flex justify-start gap-1rem">
              <button class="bgBlueButton">
                <a class="text-decoration-none" href="newsletter-setup.php?isEdit=1&editId=<?= $item->id ?>">Edit</a>
              </button>
              <button class="bgWhiteButton">
                <a class="text-decoration-none" href="newsletter-setup.php?isDelete=1&deleteId=<?= $item->id ?>">Delete</a>
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
  const newsLetterForm = document.getElementById("newsLetterForm");
  const fileImage = document.getElementById("image");
  const imageErrorIndicator = document.getElementById("imageErrorIndicator");
  const validators = useValidators();
  const validations = getValidations();
  let imageIsImage = false;

  window.onload = () => {
    newsLetterForm.addEventListener("submit", (e) => {
      if (validations.overAll()) {
        socialMediaAppForm.submit();
      } else {
        alert("VALIDATION FAIL!!!\nThe title should have at least 3 words.\nContent should have at least 10 words.\nThe chosen file must be an image.");
        e.preventDefault();
        return;
      }
    });
    fileImage.addEventListener("change", (e) => {
      imageIsImage = validators.isImage(e.target.files[0]);
      if (validators.isImage(e.target.files[0])) {
        imageErrorIndicator.classList.remove("block");
        imageErrorIndicator.classList.add("hidden");
      } else {
        imageErrorIndicator.classList.remove("hidden");
        imageErrorIndicator.classList.add("block");
      }
    });


  }


  function getValidations() {

    const overAll = () => {
      const title = document.getElementById("title").value;
      const content = document.getElementById("content").value;
      return (validators.isText(title) && 
        validators.isText(content) && 
        validators.checkLength(title, 3) &&
        validators.checkLength(content, 10)
        && imageIsImage
      );
    }

    return {
      overAll
    }
  }
</script>

</html>
<?php
ob_end_flush();
