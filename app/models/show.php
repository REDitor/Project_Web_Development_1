<?php
namespace models;

use JsonSerializable;

class Show extends Item implements JsonSerializable
{
    private int $numberOfEpisodes;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

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