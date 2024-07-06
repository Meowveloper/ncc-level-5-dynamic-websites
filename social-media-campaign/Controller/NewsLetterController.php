<?php
namespace Controller;
require_once("Model/NewsLetter.php");
use Model\NewsLetter;

class NewsLetterController extends NewsLetter
{
    public function getAllNewsletters (string $search = '') : array 
    {
        return $this->index($search);
    }
    public function newsLetterFormSubmit (bool $actionIsStore) : void
    {
        if($actionIsStore) :
            $this->store();
        else :
            $this->update($_POST['id'] * 1);
        endif;
        header("location:newsletter-setup.php");
        exit();
    }

    public function getWithID (int $id) : object
    {   
        return $this->show($id);
    }

    public function delete (int $id) : void
    {
        $this->destroy($id);
        header("location:newsletter-setup.php");
        exit();
    }
}