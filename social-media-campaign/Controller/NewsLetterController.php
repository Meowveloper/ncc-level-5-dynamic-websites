<?php
namespace Controller;
require_once("Model/NewsLetter.php");
use Model\NewsLetter;

class NewsLetterController extends NewsLetter
{
    public function newsLetterSetupCreate () : object
    {
        return $this->store();
    }
}