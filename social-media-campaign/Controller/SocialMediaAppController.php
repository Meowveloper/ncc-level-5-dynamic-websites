<?php
namespace Controller;
require_once("Model/SocialMediaApp.php");
use Model\SocialMediaApp;

class SocialMediaAppController extends SocialMediaApp
{
    public function getAllSocialMediaApps (string $search = '') : array
    {
        return $this->index($search);
    }

    public function socialMediaAppFormSubmit (bool $actionIsStore) : void 
    {
        if($actionIsStore) :
            $this->store();
        else :
            $this->update($_POST['id'] * 1);
        endif;
        header("location:social-media-app-setup.php");
        exit();
    }

    public function getWithID (int $id) : object
    {   
        return $this->show($id);
    }

    public function delete(int $id) : void
    {
        $this->destroy($id);
        header("location:social-media-app-setup.php");
        exit();
    }
}