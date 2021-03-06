<?php

use services\ShowsService;

include 'autoload.php';

class ShowsController
{
    private ShowsService $shows_service;

    public function __construct() {
        $this->shows_service = new ShowsService();
    }

    public function index() {
        echo json_encode($this->shows_service->getAll());
    }
}