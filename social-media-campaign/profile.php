<!DOCTYPE html>
<?php 
$currentPage = "user_newsletter";
$pageType = 2;
require_once "Controller/NewsLetterController.php";
require_once "Controller/MemberController.php";
use Controller\MemberController;
use Controller\NewsLetterController;
$newsLetterController = new NewsLetterController();
$memberController = new MemberController();
$newsletters = $newsLetterController->getAllNewsletters();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
  </head>
  <body>
    <?php 
    require_once "layouts/nav.php"; 
    if(isset($_GET['subscribe']) and $_GET['subscribe'] == '1') : 
        $memberController->changeSubscriptionFromNewsLetter($_SESSION['user']->id, true);
    endif;
    ?>
    <header>
      <h1>Our Newsletters</h1>
      
    </header>

    <main id="user_parent_help">
        <?php if($_SESSION['user']->subscription == 0) : ?>
        <section class="px" style="--px: 100px;">
            <p class="text-primary-red text-center fs fw" style="--fs: 20px; --fw: bold;">
                You need subscribe to see our newsletters collection.
            </p>
            <div class="text-center">
                <p>Do you want to scribe?</p>
                <button class="bgBlueButton w h" style="--w: 151px; --h: 44px;">
                    <a href="newsletter.php?subscribe=1" class="text-decoration-none fs" style="--fs: 18px;">Subscribe</a>
                </button>
            </div>
        </section>
        <?php else : ?>
        <section class="px flex flex-wrap justify-center items-stretch gap" style="--px: 100px; --gap: 5rem;">
            <?php foreach ($newsletters as $item) : ?>
            <div class="w bg px py rounded shadow min-h" style="--w: 450px; --bg: var(--primary-light-blue-50-opa50); --px: 20px; --py: 15px; --rounded: 10px; --min-h: 586px">
            <div class="flex justify-center items-center gap" style="--gap: 1rem;">
                <img src="<?= "images/" . $item->image ?>" alt="" class="w h" style="--w: 100%; --h: 200px;">
            </div>
            <div class="px" style="--px: 10px;">
                <p class="fs fw" style="--fs: 20px; --fw: bold;"><?= $item->title ?></p>
                <p class="text-justify text-gray-2"><span>Content: </span><?= $item->content ?></p>
            </div>
            </div>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>
        
    </main>

    <?php require_once "layouts/footer.php" ?>
  </body>
</html>
