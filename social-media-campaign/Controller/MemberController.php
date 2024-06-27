<?php
namespace Controllers;
require_once('Model/Member.php');
use Model\Member;

class MemberController extends Member
{
    public function register (bool $isScriber) : void
    {
        $member = $this->store($isScriber);
        print_r($member);
    }
}