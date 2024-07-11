<!DOCTYPE html>
<?php 
$currentPage = "user_parent_help";
$pageType = 2;
require_once "Controller/HowParentHelpController.php";
use Controller\HowParentHelpController;
$howParentHelpController = new HowParentHelpController();
$howParentHelps = $howParentHelpController->getAllHowParentHelps();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
  </head>
  <body>
    <?php require_once "layouts/nav.php"; ?>
    <header>
      <h1>How Parents Can Help</h1>
      <!-- Custom Cursors and 3D Illustrations can be added here -->
    </header>

    <main id="user_parent_help">
      <section class="px flex flex-wrap justify-center items-stretch gap" style="--px: 100px; --gap: 5rem;">
        <?php foreach ($howParentHelps as $item) : ?>
        <div class="w bg px py rounded shadow min-h" style="--w: 450px; --bg: var(--primary-light-blue-50-opa50); --px: 20px; --py: 15px; --rounded: 10px; --min-h: 586px">
          <div class="flex justify-center items-center gap" style="--gap: 1rem;">
            <img src="<?= "images/" . $item->image_1 ?>" alt="" class="w h" style="--w: 45%; --h: 200px;">
            <img src="<?= "images/" . $item->image_1 ?>" alt="" class="w h" style="--w: 45%; --h: 200px;">
          </div>
          <div>
            <p class="text-gray-2 text-justify px" style="--px: 10px;"><span class="text-primary-color">Description: </span><?= $item->description ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </section>
        
    </main>

    <?php require_once "layouts/footer.php" ?>
  </body>
</html>
