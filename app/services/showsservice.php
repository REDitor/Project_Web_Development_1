<?php
namespace app\services;

use app\repositories\ShowsRepository;

class ShowsService
{
    public function getAll()
    {
        $repository = new ShowsRepository();
        return $repository->getAll();
    }
}