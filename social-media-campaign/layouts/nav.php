<?php
session_start();
require_once("Middleware/Auth.php");
use Middleware\Auth;
Auth::matchUserType($pageType);
?>
<?php if (!isset($_SESSION['user'])) : ?>
    <nav>
        <div>
            <img src="assets/logo.jpg" alt="" width="80px" height="80px" class="logoPic">
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
            <img src="assets/logo.jpg" alt="" width="80px" height="80px" class="logoPic">
        </div>
        <ul>
            <li class="link"><a href="./admin-home.php" class="<?= $currentPage == 'admin_home' ? 'navBarActive' : '' ?>">Home</a></li>
            <li class="link"><a href="./service-setup.php">Service</a></li>
            <li class="link"><a href="./newsletter-setup.php">Newsletter</a></li>
            <li class="link"><a href="./how-parent-help-setup.php">How Parents Help</a></li>
            <li class="link"><a href="./social-media-app-setup.php" class="<?= $currentPage == 'admin_social_media_app_setup' ? 'navBarActive' : '' ?>">Social Media Apps</a></li>
            <li class="link"><a href="./contact-list.php">Contact List</a></li>
            <li class="link"><a href="./member-list.php">Member List</a></li>
            <li class="link"><a href="./logout.php">Logout</a></li>
        </ul>
    </nav>
<?php endif; ?>

<?php if (isset($_SESSION['user']) and $_SESSION['user']->role == 0) : ?>
    
    <nav>
        <div>
            <img src="assets/logo.jpg" alt="" width="80px" height="80px" class="logoPic">
        </div>
        <ul>
            <li class="link"><a href="home.php" class="<?= $currentPage == 'user_home' ? 'navBarActive' : '' ?>">Home</a></li>
            <li class="link"><a href="information.php">Information</a></li>
            <li>
                Campaigns
                <ul>
                    <li class="link">
                        <a href="popular-apps.php">Popular Apps</a>
                    </li>
                    <li class="link">
                        <a href="parents-help.php">Parents Help</a>
                    </li>
                    <li class="link">
                        <a href="livestreaming.php">Livestreaming</a>
                    </li>
                </ul>
            </li>

            <li class="link"><a href="contact.php">Contact</a></li>
            <li class="link"><a href="legislation.php">Legislation</a></li>
            <li class="link"><a href="./logout.php">Logout</a></li>
        </ul>
        <form action="/search" method="get" class="search-input">
            <input type="text" id="search" name="search" placeholder="Search..." />
            <button type="submit">Search</button>
        </form>
    </nav>
<?php endif; ?>
