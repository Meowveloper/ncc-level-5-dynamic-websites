<?php

require_once("../../Model/Member.php");
use Model\Member;
$memberModel = new Member();
$member = $memberModel->store(false);