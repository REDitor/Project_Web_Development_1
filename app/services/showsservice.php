<?php
namespace services;

use repositories\ShowsRepository;

class ShowsService
{
    public function getAll()
    {
        $repository = new ShowsRepository();
        return $repository->getAll();
    }
}