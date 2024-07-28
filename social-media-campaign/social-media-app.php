<!DOCTYPE html>
<?php
$currentPage = "user_social_media_app";
$pageType = 2;
require_once "Controller/SocialMediaAppController.php";
use Controller\SocialMediaAppController;
$socialMediaAppController = new SocialMediaAppController();


if (isset($_GET['search'])) :
    $search = $_GET['search'];
    $socialMediaApps = $socialMediaAppController->getAllSocialMediaApps($search);
else :
    $socialMediaApps = $socialMediaAppController->getAllSocialMediaApps();
endif;
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/user/newsletter.css">
</head>

<body>
    <?php
    require_once "layouts/nav.php";
    ?>
    <header>
        <h1>Popular Social Media Applications</h1>
    </header>

    
    <main id="user_social_media_app">
        <?php if(count($socialMediaApps) > 0) : ?>
            <section class="flex justify-center items-center flex-wrap gap-2rem px-100px flex-1-1-auto">
                <?php if(isset($_GET['search'])) :  ?>
                    <div class="w-full">
                        <p class="text-center fs-20px">Search result on : <span class="fw-bold">sfsad</span></p>
                        <div class="text-center">
                            <button class="bgBlueButton w-151px h-44px">
                                <a class="text-decoration-none" href="social-media-app.php">Clear search</a>
                            </button>
                        </div>
                    </div>
                <?php endif;  ?>
                <?php foreach($socialMediaApps as $item) : ?>
                    <div class="flex justify-start gap-1rem items-center bg-primary-light-blue-25 p-20px shadow rounded-10px">
                        <div>
                            <img src="<?= "images/$item->logo" ?>" alt="" class="w-100px h-100px rounded-full">
                        </div>

                        <div class="flex column gap-10px justify-center items-center">
                            <p class="fs-20px fw-bold"><?= $item->name ?></p>
                            <button class="bgBlueButton w-200px h-44px">Go To <?= $item->name ?></button>
                            <button class="bgBlueButton w-200px h-44px">Go To <?= $item->name ?>'s Privacy Settings</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <?php if(count($socialMediaApps) < 1) : ?>
            <section class="w-full px-100px">
                <p class="text-red fs-18px text-center"><?= isset($_GET['search']) ? "Nothing found on : $search" : "Admins haven't add any social media apps to our system database." ?></p>
            </section>    
        <?php endif; ?>
    </main>

    <?php require_once "layouts/footer.php" ?>
</body>

</html>