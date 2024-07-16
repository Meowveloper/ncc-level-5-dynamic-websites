<?php
namespace Controller;
require_once("Model/Service.php");
use Model\Service;

class ServiceController extends Service
{
    public function searchOrGetAllServices(string $search = '', int | null $limit = null) : array
    {
        return $this->index($search, $limit);
    }

    public function getWithID ($id) : object 
    {
        return $this->show($id);
    }

    public function serviceFormSubmit (bool $actionIsStore) : void
    {
        if($actionIsStore) :
            $this->store();
        else :
            $this->update($_POST['id'] * 1);
        endif;
        header("location:service-setup.php");
        exit();
    }

    public function delete (int $id) : void
    {
        $this->destroy($id);
        header("location:service-setup.php");
        exit();
    }
}