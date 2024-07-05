<?php 
function getHere(string $currentPage) : string 
{
    if($currentPage == "guest_home") : return "Home";
    elseif($currentPage == "login") : return "Login";
    else : return "Page identifier error";
    endif;
}
?>


<footer>
    <p>You are here: <span style="font-weight: 900;"><?= getHere($currentPage) ?></span></p>
    <div class="footer-content">
        <p>&copy; 2024 Online Safety Campaign</p>
        <!-- Add social media buttons with relevant links -->
        <a href="#">Facebook</a>
        <a href="#" style="margin-left: 10px">Twitter</a>
        <a href="#" style="margin-left: 10px">Instagram</a>
    </div>
</footer>