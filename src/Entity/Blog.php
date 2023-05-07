<?php

namespace App\Entity;

class Blog
{
    private int $id;
    private \DateTime $createdAt;
//    private string $title;
    private string $preview;
    private string $content;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPreview(): string
    {
        return $this->preview;
    }

    public function setPreview(string $preview): void
    {
        $this->preview = $preview;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

}