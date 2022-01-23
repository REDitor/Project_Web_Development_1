<?php
namespace models;

use JsonSerializable;

class Item implements JsonSerializable
{
    protected int $itemId;
    protected string $title;
    protected string $writer;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return int
     */
    public function getItemId(): int
    {
        return $this->itemId;
    }

    /**
     * @param int $itemId
     */
    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getWriter(): string
    {
        return $this->writer;
    }

    /**
     * @param string $writer
     */
    public function setWriter(string $writer): void
    {
        $this->writer = $writer;
    }

}