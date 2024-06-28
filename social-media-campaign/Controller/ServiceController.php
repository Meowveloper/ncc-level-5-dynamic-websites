<?php
namespace Controller;
require_once("Model/Service.php");
use Model\Service;

class ServiceController extends Service
{
    public function searchOrGetAllServices(string $search = '') : array
    {
        return $this->index($search);
    }
}