<?php

class Item
{
    private int $id;
    private string $title;
    private string $writer;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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