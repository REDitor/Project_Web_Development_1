<?php
use controllers\Controller;

include 'autoload.php';

class InitDBController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../initdb.php';
    }
}