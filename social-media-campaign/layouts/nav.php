<?php
session_start();
require_once "Middleware/Auth.php";

use Middleware\Auth;

Auth::matchUserType($pageType);
?>
<?php if (isset($_GET['btnNavSearch'])) :
    $keyWord = $_GET['search'];
    $page = $_GET['page'];
    header("location:" . $page . ".php?search=$keyWord");

endif; ?>

<?php if (!isset($_SESSION['user'])) : ?>
    <nav>
        <div>
            <img src="assets/logo.jpg" alt="" width="80px" height="80px" class="rounded-full">
        </div>
        <ul>
            <li class="link">
                <a href="./index.php" class="<?= $currentPage == 'guest_home' ? 'navBarActive' : '' ?>">Home</a>
            </li>
            <li class="link">
                <a href="./b-information.php" class="<?= $currentPage == 'guest_information' ? 'navBarActive' : '' ?>">Information</a>
            </li>
            <li class="link">
                <a href="./b-legislation.php" class="<?= $currentPage == 'guest_legislation' ? 'navBarActive' : '' ?>">Legislation</a>
            </li>
            <li class="link">
                <a href="./login.php" class="<?= $currentPage == 'login' ? 'navBarActive' : '' ?>">Login</a>
            </li>
        </ul>
    </nav>

<?php endif; ?>


<?php if (isset($_SESSION['user']) and $_SESSION['user']->role == 1) : ?>   
    <nav>
        <div>
            <img src="assets/logo.jpg" alt="" width="80px" height="80px" class="rounded-full">
        </div>
        <ul>
            <li class="link"><a href="./admin-home.php" class="<?= $currentPage == 'admin_home' ? 'navBarActive' : '' ?>">Home</a></li>
            <li class="link"><a href="./service-setup.php" class="<?= $currentPage == 'admin_service_setup' ? 'navBarActive' : '' ?>">Service</a></li>
            <li class="link"><a href="./newsletter-setup.php" class="<?= $currentPage == 'admin_newsletter_setup' ? 'navBarActive' : '' ?>">Newsletter</a></li>
            <li class="link"><a href="./how-parent-help-setup.php" class="<?= $currentPage == 'admin_how_parent_help_setup' ? 'navBarActive' : '' ?>">How Parents Help</a></li>
            <li class="link"><a href="./social-media-app-setup.php" class="<?= $currentPage == 'admin_social_media_app_setup' ? 'navBarActive' : '' ?>">Social Media Apps</a></li>
            <li class="link"><a href="./contact-list.php" class="<?= $currentPage == 'admin_contact_list' ? 'navBarActive' : '' ?>">Contact List</a></li>
            <li class="link"><a href="./member-list.php" class="<?= $currentPage == 'admin_member_list' ? 'navBarActive' : '' ?>">Member List</a></li>
            <li class="link"><a href="./logout.php">Logout</a></li>
        </ul>
    </nav>
<?php endif; ?>

<?php if (isset($_SESSION['user']) and $_SESSION['user']->role == 0) : ?>

    <nav>
        <div>
            <img src="assets/logo.jpg" alt="" width="80px" height="80px" class="rounded-full">
        </div>
        <ul>
            <li class="link"><a href="home.php" class="<?= $currentPage == 'user_home' ? 'navBarActive' : '' ?>">Home</a></li>
            <li class="link"><a href="information.php" class="<?= $currentPage == 'user_information' ? 'navBarActive' : '' ?>">Information</a></li>
            <li>
                Campaigns
                <ul>
                    <li class="link <?= $currentPage == 'user_parent_help' ? 'bg' : '' ?>" style="--bg: var(--primary-light-blue-25)">
                        <a class="text-gray-2" href="parents-help.php">Parents Help</a>
                    </li>
                    <li class="link <?= $currentPage == 'user_newsletter' ? 'bg' : '' ?>" style="--bg: var(--primary-light-blue-25)">
                        <a class="text-gray-2" href="newsletter.php">Newsletters</a>
                    </li>
                    <li class="link <?= $currentPage == 'user_service' ? 'bg' : '' ?>" style="--bg: var(--primary-light-blue-25)">
                        <a class="text-gray-2" href="service.php">Service</a>
                    </li>
                    <li class="link <?= $currentPage == 'user_livestreaming' ? 'bg' : '' ?>" style="--bg: var(--primary-light-blue-25)">
                        <a class="text-gray-2" href="livestreaming.php">Livestreaming</a>
                    </li>
                </ul>
            </li>

            <li class="link"><a href="contact.php" class="<?= $currentPage == 'user_contact' ? 'navBarActive' : '' ?>">Contact</a></li>
            <li class="link"><a href="legislation.php" class="<?= $currentPage == 'user_legislation' ? 'navBarActive' : '' ?>">Legislation</a></li>
            <li class="link"><a href="./logout.php">Logout</a></li>
        </ul>
        <form action="#" method="GET" class="flex justify-center items-stretch">
            <input class="outline-none" type="text" id="search" name="search" placeholder="Search..." required />
            <select required name="page" class="h w" style="--h: 30px; --w: 150px;">
                <option value="" disabled selected>Search In</option>
                <option value="newsletter">Newsletter</option>
                <option value="service">Service</option>
                <option value="home">Social Media Apps</option>
                <option value="parents-help">How Parents Help</option>
            </select>
            <button name="btnNavSearch" class="bgBlueButton w h" style="--w: 100px; --h: 30px;" type="submit">Search</button>
        </form>
    </nav>
<?php endif; ?>