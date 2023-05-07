<?php

namespace App\Repository;

use App\Entity\BlogComment;

class BlogCommentRepository
{
    private \PDO $pdo;

    public function __construct (\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(BlogComment $comment): void
    {
        $sql = 'INSERT INTO blog_comments (blog_id, created_at, title, message) VALUES (?, ?, ?, ?)';

        $now = new \DateTime();

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $comment->getBlogId(),
            $now->format('Y-m-d H:i:s'),
            $comment->getTitle(),
            $comment->getMessage()
        ]);

    }

    public function findByBlog(int $blogId): array
    {
        $stmt = $this->pdo->prepare ('SELECT * FROM blog_comments WHERE blog_id = ? ORDER BY created_at DESC');
        $stmt->execute([$blogId]);

        $rawData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $comments =[];

        foreach ($rawData as $item) {
            $comment = new BlogComment();

            $comment->setId($item['id']);
            $comment->setBlogid($item['blog_id']);
            $comment->setCreatedAt(new \DateTime($item['created_at']));
            $comment->setTitle($item['title']);
            $comment->setMessage($item['message']);

            $comments [] = $comment;
        }

        return $comments;
    }
}