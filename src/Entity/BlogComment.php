<?php

namespace App\Entity;

class BlogComment
{
    private int $id;
    private int $blogid;
    private \DateTime $createdAt;
    private string $title;
    private string $message;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBlogId(): int
    {
        return $this->blogid;
    }

    public function setBlogId(int $blogid): void
    {
        $this->blogid = $blogid;
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

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}