<?php
namespace Controller;

require_once("Model/Contact.php");
use Model\Contact;

class ContactController extends Contact
{
    public function searchOrGetAllContacts (string $search = '') :array
    {
        $data = $this->index($search);
        return $data;
    }

    public function findOrFail(int $id) : object 
    {
        return $this->show($id);
    }

    public function createContact () : void 
    {
        echo $_POST['email'];
        $this->store();
        header("location:home.php");
        exit();
    }
}