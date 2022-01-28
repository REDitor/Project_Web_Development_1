<?php
use controllers\Controller;

include 'autoload.php';

class mylistdetailscontroller extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/mylistdetails.php';
    }
}