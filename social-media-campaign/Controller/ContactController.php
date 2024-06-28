<?php
namespace Controllers;

require_once("Model/Contact.php");
use Model\Contact;

class ContactController extends Contact
{
    public function getAllContacts () :array
    {
        $data = $this->index();
        return $data;
    }
}