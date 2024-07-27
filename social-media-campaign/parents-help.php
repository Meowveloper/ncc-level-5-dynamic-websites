<!DOCTYPE html>
<?php 
$currentPage = "user_parent_help";
$pageType = 2;
require_once "Controller/HowParentHelpController.php";
use Controller\HowParentHelpController;
$howParentHelpController = new HowParentHelpController();

if(isset($_GET['search'])) : 
  $howParentHelps = $howParentHelpController->getAllHowParentHelps($_GET['search']);
else : 
  $howParentHelps = $howParentHelpController->getAllHowParentHelps();
endif;
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/user/parents-help.css">
  </head>
  <body>
    <?php require_once "layouts/nav.php"; ?>
    <header>
      <h1>How Parents Can Help</h1>
    </header>
    <div class="w-fit mx-auto">
      <div class="parentHelpAnimation"></div>
    </div>

    <main id="user_parent_help">
      <?php if(count($howParentHelps) < 1) : ?>
          <div class="flex justify-center items-center gap-2rem">
            <p class="fs-18px font-bold text-center">
                <?= isset($_GET['search']) ? "Nothing found on " . $_GET['search'] : "There is no how parents can help yet." ?>
            </p>
            <?php if(isset($_GET['search'])) : ?>
                <div class="text-center">
                <button class="bgBlueButton w-151px h-44px ms-2rem">
                    <a href="parents-help.php" class="text-decoration-none">Clear Search</a>
                </button>
                </div>
            <?php endif; ?>
          </div>
      <?php endif; ?>

      <?php if( count($howParentHelps) > 0 ) : ?>
        <section class="px-100px flex flex-wrap justify-center items-stretch gap-2rem">
          <div class="fs-18px fw-bold text-center w-full flex justify-center items-center gap-2rem">
              <?= isset($_GET['search']) ? "Search result on: " . $_GET['search'] : "" ?>
              <?php if(isset($_GET['search'])) : ?>
                  <button class="bgBlueButton w-151px h-44px ms-2rem">
                      <a href="parents-help.php" class="text-decoration-none">Clear Search</a>
                  </button>
              <?php endif; ?>
          </div>
          <?php foreach ($howParentHelps as $item) : ?>
          <div class="w-450px bg-primary-light-blue-50-opa50 px-20px py-15px rounded-10px shadow min-h-586px">
            <div class="flex justify-center items-center gap" style="--gap: 1rem;">
              <img src="<?= "images/" . $item->image_1 ?>" alt="" class="w-45-percent h-200px">
              <img src="<?= "images/" . $item->image_1 ?>" alt="" class="w-45-percent h-200px">
            </div>
            <div>
              <p class="text-gray-2 text-justify px-10px"><span class="text-primary-color">Description: </span><?= $item->description ?></p>
            </div>
          </div>
          <?php endforeach; ?>
      </section>
      <?php endif; ?>
      
        
    </main>

    <?php require_once "layouts/footer.php" ?>
  </body>
</html>
