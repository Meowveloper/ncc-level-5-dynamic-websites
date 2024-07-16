<?php
namespace Controller;
require_once("Model/HowParentHelp.php");
use Model\HowParentHelp;

class HowParentHelpController extends HowParentHelp
{

    public function getAllHowParentHelps (string $search = '', int | null $limit = null) : array
    {
        return $this->index($search, $limit);
    }

    public function getWithID (int $id) : object 
    {
        return $this->show($id);
    }
    public function howParentHelpFormSubmit (bool $actionIsStore)
    {
        if($actionIsStore) :
            $this->store();
        else :
            $this->update($_POST['id'] * 1);
        endif;
        header("location:how-parent-help-setup.php");
        exit();
    }

    public function delete (int $id) : void
    {
        $this->destroy($id);
        header("location:how-parent-help-setup.php");
        exit();
    }


}