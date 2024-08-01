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
        $this->store();
        header("location:home.php");
        exit();
    }

    public function deleteFromContactList (int $id) : void 
    {   
        $this->destroy($id);
        header("location:contact-list.php");
        exit();
    }
}