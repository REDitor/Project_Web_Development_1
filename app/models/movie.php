<?php
namespace models;

use JsonSerializable;

class Movie extends Item implements JsonSerializable
{
    private int $durationInMinutes;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return int
     */
    public function getDurationInMinutes(): int
    {
        return $this->durationInMinutes;
    }

    /**
     * @param int $durationInMinutes
     */
    public function setDurationInMinutes(int $durationInMinutes): void
    {
        $this->durationInMinutes = $durationInMinutes;
    }
}