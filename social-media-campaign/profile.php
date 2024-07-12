<!DOCTYPE html>
<?php 
$currentPage = "user_profile";
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
      <h1>Your Profile</h1>
      
    </header>

    <main id="user_parent_help">
        
        <section class="px-100px">
            <form action="">
                <img src="assets/default-profile.png" alt="" width="200px" height="200px">
                <div>
                    <label for="">Upload a New Profile Image</label>
                    <input type="file" accept="image/*">
                </div>
                <div>
                    <label for="">Name</label>
                    <input type="text">
                </div>
            </form>            
        </section>

        
    </main>

    <?php require_once "layouts/footer.php" ?>
  </body>
</html>
