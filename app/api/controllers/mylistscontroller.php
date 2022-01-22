<?php

namespace app\api\controllers;

use app\models\WatchList;
use app\services\WatchListService;

class MyListsController
{
    private WatchListService $watchList_service;

    public function __construct() {
        $this->watchList_service = new WatchListService();
    }

    public function index() {
        echo json_encode($this->watchList_service->getAll());  //TODO: params? change to getByUserId
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $json = file_get_contents('php://input');
            $object = json_decode($json);

            $watchList = new WatchList();
            $watchList->setName($object->name);
            $watchList->setDescription($object->description);

            $this->watchList_service->insertWatchList($watchList);
        }
    }
}