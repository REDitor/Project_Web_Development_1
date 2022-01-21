<?php
require_once __DIR__ . '/../repositories/showsrepository.php';

class ShowsService
{
    public function getAll()
    {
        $repository = new ShowsRepository();
        return $repository->getAll();
    }
}