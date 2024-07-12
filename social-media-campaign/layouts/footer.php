<?php 
function getHere(string $currentPage) : string 
{
    if ($currentPage == "guest_home") : return "Home";
    elseif($currentPage == "login") : return "Login";
    elseif($currentPage == "admin_home") : return "Home";
    elseif($currentPage == "admin_service_setup") : return "Service Setup";
    elseif($currentPage == "admin_social_media_app_setup") : return "Social Media Apps Setup";
    elseif($currentPage == "admin_newsletter_setup") : return "News Letter Setup";
    elseif($currentPage == "admin_how_parent_help_setup") : return "How Parent Help Setup";
    elseif($currentPage == "admin_member_list") : return "Member List";
    elseif($currentPage == "admin_contact_list") : return "Contact List";
    elseif($currentPage == "user_home") : return "Home";
    elseif($currentPage == "user_contact") : return "Contact";
    elseif($currentPage == "user_parent_help") : return "How Parents Can Help";
    elseif($currentPage == "user_newsletter") : return "Newsletters";
    elseif($currentPage == "user_service") : return "Services";
    elseif($currentPage == "user_legislation") : return "Legislation";
    elseif($currentPage == "user_information") : return "Information";
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