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

if (isset($_GET['search'])) :
    $search = $_GET['search'];
    $newsletters = $newsLetterController->getAllNewsletters($search);
else :
    $newsletters = $newsLetterController->getAllNewsletters();
endif;
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/user/newsletter.css">
</head>

<body>
    <?php
    require_once "layouts/nav.php";
    if (isset($_GET['subscribe']) and $_GET['subscribe'] == '1') :
        $memberController->changeSubscriptionFromNewsLetter($_SESSION['user']->id, true);
    endif;
    ?>
    <header>
        <h1>Our Newsletters</h1>

    </header>
    <div class="w-fit mx-auto bg-semi-transparent rounded-10px">
        <div class="newsletterAnimation"></div>
    </div>

    <main id="user_parent_help">
        <?php if ($_SESSION['user']->subscription == 0) : ?>
            <section class="px-100px">
                <p class="text-primary-red text-center fs-20px fw-bold">
                    You need subscribe to see our newsletters collection.
                </p>
                <div class="text-center">
                    <p>Do you want to scribe?</p>
                    <button class="bgBlueButton w-151px h-44px">
                        <a href="newsletter.php?subscribe=1" class="text-decoration-none fs-18px">Subscribe</a>
                    </button>
                </div>
            </section>
        <?php else : ?>
            <?php if(count($newsletters) < 1) : ?>
                <p class="fs-18px fw-bold text-center">
                    <?= isset($_GET['search']) ? "Nothing found on " . $_GET['search'] : "There is no newsletter yet." ?>
                </p>
                <?php if(isset($_GET['search'])) : ?>
                    <div class="text-center">
                        <button class="bgBlueButton w-151px h-44px ms-2rem">
                            <a href="newsletter.php" class="text-decoration-none">Clear Search</a>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if( count($newsletters) > 0 ) : ?>
                <section class="px-100px flex flex-wrap justify-center items-stretch gap-2rem">
                    <div class="fs-18px fw-bold text-center w-full">
                        <?= isset($_GET['search']) ? "Search result on: " . $_GET['search'] : "" ?>
                        <?php if(isset($_GET['search'])) : ?>
                            <button class="bgBlueButton w-151px h-44px ms-2rem">
                                <a href="newsletter.php" class="text-decoration-none">Clear Search</a>
                            </button>
                        <?php endif; ?>
                    </div>
                    <?php foreach ($newsletters as $item) : ?>
                        <div class="w-450px bg-primary-light-blue-50-opa50 px-20px py-15px rounded-10px shadow min-h-586px">
                            <div class="flex justify-center items-center gap-1rem">
                                <img src="<?= "images/" . $item->image ?>" alt="" class="w-full h-200px">
                            </div>
                            <div class="px-10px">
                                <p class="fs-20px fw-bold"><?= $item->title ?></p>
                                <p class="text-justify text-gray-2"><span>Content: </span><?= $item->content ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>

            


        <?php endif; ?>

    </main>

    <?php require_once "layouts/footer.php" ?>
</body>

</html>