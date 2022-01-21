<?php
class WatchList implements JsonSerializable
{
    private int $watchListId;
    private string $name;
    private string $description;
//    private $movies;
//    private $shows;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return int
     */
    public function getWatchListId(): int
    {
        return $this->watchListId;
    }

    /**
     * @param int $watchListId
     */
    public function setWatchListId(int $watchListId): void
    {
        $this->watchListId = $watchListId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}