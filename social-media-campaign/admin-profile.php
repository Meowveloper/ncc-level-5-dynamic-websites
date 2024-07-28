<!DOCTYPE html>
<?php 
ob_start();
$currentPage = "admin_profile";
$pageType = 1;
require_once "Controller/MemberController.php";
use Controller\MemberController;
$memberController = new MemberController();

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Safety Campaign</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <?php 
    require_once "layouts/nav.php";
    if(isset($_POST['btnUploadProfile'])): 
      $memberController->updateProfileFromAdminProfilePage($_SESSION['user']->id, $_POST['subscription']);
    endif; 
    ?>
    <header>
      <h1>Your Profile</h1>
      
    </header>

    <main id="user_parent_help">
        
        <section class="px-100px">
            <form action="#" method="POST" enctype="multipart/form-data" class="mx-auto bg-primary-light-blue-25-opa30 w-400px p rounded-20px" style="--bg: var(--primary-light-blue-50); --w: 400px; --p: 20px">
                <div class="relative w-full h-350px border-gray-1 rounded-10px mb-2rem">
                  <?php $profilePicPath = (!isset($_SESSION['user']->profile) or $_SESSION['user']->profile == '') ? 'assets/default-profile.png' : 'images/' . $_SESSION['user']->profile ?>
                  <img id="imgProfilePreview" src="<?= $profilePicPath ?>" data-original="<?= $profilePicPath ?>" alt="" class="w-full h-full rounded-10px">
                  <img id="imgUpload" src="assets/upload.svg" alt="" class="cursor-pointer absolute top-10px right-10px">
                  <img id="imgDelete" src="assets/delete.svg" alt="" class="cursor-pointer absolute top-10px right-40px">
                  <input id="hiddenInput" name="profile" type="file" accept="image/*" class="hidden">
                </div>
                <div class="mb-2rem">
                    <label for="" class="mb-2px block">Name</label><br>
                    <input type="text" name="name" class="w-full px-20px py-10px rounded-20px border-none outline-none shadow" required value="<?= $_SESSION['user']->name ?>">
                </div>
                <div class="mb-2rem">
                    <label for="" class="mb-px block">Email</label><br>
                    <input type="email" name="email" class="w-full px-20px py-10px rounded-20px border-none outline-none shadow" required value="<?= $_SESSION['user']->email ?>">
                </div>
                <div class="mb-2rem">
                    <label for="" class="mb-2px block">City</label><br>
                    <input type="text" name="city" class="w-full px-20px py-10px rounded-20px border-none outline-none shadow" required value="<?= $_SESSION['user']->city ?>">
                </div>
                <div class="mb-2rem">
                    <label for="" class="mb-2px block">Subscription</label>
                    Yes:<input type="radio" <?= $_SESSION['user']->subscription == 1 ? 'checked' : '' ?> value="1" name="subscription">
                    No:<input type="radio" <?= $_SESSION['user']->subscription == 0 ? 'checked' : '' ?> value="0" name="subscription">
                </div>
                <div class="w-full text-center">
                  <button name="btnUploadProfile" type="submit" class="cursor-pointer bgBlueButton w-151px h-44px">
                    Update
                  </button>
                </div>
            </form>            
        </section>

        
    </main>

    <?php require_once "layouts/footer.php" ?>
  </body>
  <script src="validators.js"></script>
  <script>
    const validators = useValidators();
    const hiddenInput =document.getElementById("hiddenInput");
    const imgProfilePreview = document.getElementById("imgProfilePreview");
    const imgUpload = document.getElementById("imgUpload");
    const imgDelete = document.getElementById("imgDelete");

    window.onload = () => {
      imgUpload.addEventListener("click", handleUploadFile);
      hiddenInput.addEventListener("change", handleFileChange); 
      imgDelete.addEventListener("click", handleClearFile);
    }
    function handleUploadFile () {
      hiddenInput.click();
    }

    function handleFileChange (e) {
      const reader = new FileReader();
      reader.onload = () => {
        imgProfilePreview.src = reader.result;
      }
      reader.readAsDataURL(e.target.files[0]);
    }

    function handleClearFile () {
      hiddenInput.value = null;
      imgProfilePreview.src = imgProfilePreview.dataset.original;
      console.log(hiddenInput.files);
    }
  </script>
</html>
<?php 
ob_end_flush();
