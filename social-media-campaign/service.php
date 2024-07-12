<!DOCTYPE html>
<?php 
$currentPage = "user_service";
$pageType = 2;
require_once "Controller/ServiceController.php";
use Controller\ServiceController;
$serviceController = new ServiceController();

if(isset($_GET['search'])) : 
  $services = $serviceController->searchOrGetAllServices($_GET['search']);
else : 
  $services = $serviceController->searchOrGetAllServices();
endif;
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
      <h1>Our Services</h1>
    </header>

    <main id="user_parent_help">
      <?php if(count($services) < 1) : ?>
          <p class="fs-18px font-bold text-center" style="--fs: 18px; --fw: bold;">
              <?= isset($_GET['search']) ? "Nothing found on " . $_GET['search'] : "There is services yet." ?>
          </p>
          <?php if(isset($_GET['search'])) : ?>
              <div class="text-center">
              <button class="bgBlueButton w-151px h-44px ms-2rem">
                  <a href="service.php" class="text-decoration-none">Clear Search</a>
              </button>
              </div>
          <?php endif; ?>
      <?php endif; ?>

      <?php if( count($services) > 0 ) : ?>
        <section class="px flex flex-wrap justify-center items-stretch gap" style="--px: 100px; --gap: 2rem;">
          <div class="fs fw text-center w-full" style="--fs: 18px; --fw: bold;">
              <?= isset($_GET['search']) ? "Search result on: " . $_GET['search'] : "" ?>
              <?php if(isset($_GET['search'])) : ?>
                  <button class="bgBlueButton w-151px h-44px ms-2rem">
                      <a href="parents-help.php" class="text-decoration-none">Clear Search</a>
                  </button>
              <?php endif; ?>
          </div>
          <?php foreach ($services as $item) : ?>
          <div class="w bg px py rounded shadow min-h-300px" style="--w: 450px; --bg: var(--primary-light-blue-50-opa50); --px: 20px; --py: 15px; --rounded: 10px;">
            <div>
              <p class="text-20px font-bold"><?= $item->title ?></p>
              <p class="text-gray-2">
                <span class="text-primary-color">Description: </span><?= $item->description ?>
              </p>
              <p class="text-gray-2">
                <span class="text-primary-color">Info: </span><?= $item->info ?>
              </p>
            </div>
          </div>
          <?php endforeach; ?>
      </section>
      <?php endif; ?>
      
        
    </main>

    <?php require_once "layouts/footer.php" ?>
  </body>
</html>
