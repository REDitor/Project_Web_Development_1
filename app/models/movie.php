<?php
namespace app\models;

class Movie extends Item
{
    private int $durationInMinutes;

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