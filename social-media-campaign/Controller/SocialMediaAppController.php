<?php
namespace Controller;
require_once("Model/SocialMediaApp.php");
use Model\SocialMediaApp;

class SocialMediaAppController extends SocialMediaApp
{
    public function getAllSocialMediaApps () : array
    {
        return $this->index();
    }

    public function socialMediaAppFormSubmit (bool $actionIsStore) : void 
    {
        if($actionIsStore) $this->store();
        header("location:social-media-app-setup.php");
    }
}