<!DOCTYPE html>
<?php
ob_start();
$currentPage = "admin_service_setup";
$pageType = 1;
require_once("Controller/ServiceController.php");

use Controller\ServiceController;

$serviceController = new ServiceController();


if (isset($_GET['isEdit'])) :
  $itemToEdit = $serviceController->getWithID($_GET['editId']);
endif;

if (isset($_GET['isDelete'])) :
  $serviceController->delete($_GET['deleteId']);
endif;

if (isset($_POST['btnSearch'])) :
  $services = $serviceController->searchOrGetAllServices($_POST['search']);
else :
  $services = $serviceController->searchOrGetAllServices();
endif;

if (isset($_POST['btnServiceFormSubmit'])) :
  $actionIsStore = isset($_GET['isEdit']) ? false : true;
  $serviceController->serviceFormSubmit($actionIsStore);
endif;

if (isset($_POST['btnCancel'])) :
  header("location:service-setup.php");
  exit();
endif;
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Safety Campaign</title>
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/service-setup.css">
</head>

<body>
  <?php include_once("layouts/nav.php"); ?>
  <header class="flex justify-center items-center px-70px gap-5rem">
    <h1>Online Safety Campaign</h1>
    <div>
      <form action="" method="POST">
        <input type="text" name="search" placeholder="Search for the services" value="<?= isset($_POST['btnSearch']) ? $_POST['search'] : "" ?>">
        <button type="submit" name="btnSearch" class="bgBlueButton">Search</button>
        <button type="button" name="btnSearch" class="bgWhiteButton">
          <a href="service-setup.php" class="text-decoration-none">Clear</a>
        </button>
      </form>
    </div>
  </header>

  <main id="admin_social_media_apps" class="px-70px">
    <section class="formContainer">
      <h2><?= isset($_GET['isEdit']) ? "Edit $itemToEdit->title" : "Create a New Service" ?></h2>
      <!-- Contact Form -->
      <form id="serviceForm" action="#" method="post">
        <?php if (isset($_GET['isEdit'])) : ?>
          <input type="hidden" name="id" value="<?= $itemToEdit->id ?>">
        <?php endif; ?>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required value="<?= isset($itemToEdit) ? $itemToEdit->title : "" ?>" />

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required value="<?= isset($itemToEdit) ? $itemToEdit->description : "" ?>" />

        <label for="info">Info:</label>
        <textarea type="text" id="info" name="info" required><?= isset($itemToEdit) ? $itemToEdit->info : "" ?></textarea>
        <button type="submit" id="btnServiceFormSubmit" name="btnServiceFormSubmit" class="bgBlueButton" style="font-size:16px;">
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
      <?php if (count($services) < 1) : ?>
        <h2>
          <?= (isset($_POST['btnSearch']) and $_POST['search'] != '') ? "Cannot find anything on " . $_POST['search'] . "." : "No services added. Will you do the honor?" ?>
        </h2>
        <?php
      else :
        foreach ($services as $item) : ?>
          <div class="card shadow">
            <div class="flex justify-start items-center gap-1rem">
              <p style="font-size: 18px; text-transform: capitalize; font-weight: 700;">
                <?= $item->title ?>
              </p>
            </div>
            <div class="links">
              <p><span>Description:</span> <?= "$item->description" ?></p><br>
              <p><span>Info:</span> <?= "$item->info" ?></p>
            </div>
            <div class="buttons flex justify-start gap-1rem">
              <button class="bgBlueButton">
                <a class="text-decoration-none" href="service-setup.php?isEdit=1&editId=<?= $item->id ?>">Edit</a>
              </button>
              <button class="bgWhiteButton">
                <a class="text-decoration-none" href="service-setup.php?isDelete=1&deleteId=<?= $item->id ?>">Delete</a>
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
  const serviceForm = document.getElementById("serviceForm");
  const validators = useValidators();
  const validations = getValidations();
  window.onload = () => {
    serviceForm.addEventListener("submit", (e) => {
      if (validations.overAll()) {
        socialMediaAppForm.submit();
      } else {
        alert("VALIDATION FAIL!!!\nThe title should have at least 3 words.\nDescription should have at least 5 words.\nInfo should have at least 10 words.\nAll data must be texts.");
        e.preventDefault();
        return;
      }
    });
  };


  function getValidations() {

    const overAll = () => {
      const title = document.getElementById("title").value;
      const description = document.getElementById("description").value;
      const info = document.getElementById("info").value;
      return (validators.isText(title) && 
        validators.isText(description) && 
        validators.isText(info) && 
        validators.checkLength(title, 3) &&
        validators.checkLength(description, 5) &&
        validators.checkLength(info, 10)
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
