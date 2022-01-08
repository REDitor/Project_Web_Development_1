<?php

require __DIR__ . '/item.php';

class Show extends Item
{
    private int $numberOfEpisodes;

    /**
     * @return int
     */
    public function getNumberOfEpisodes(): int
    {
        return $this->numberOfEpisodes;
    }

    /**
     * @param int $numberOfEpisodes
     */
    public function setNumberOfEpisodes(int $numberOfEpisodes): void
    {
        $this->numberOfEpisodes = $numberOfEpisodes;
    }
}