<?php

namespace App\Controller\Blog;

class ViewBlogController
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function handleAction($blogId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM blogs WHERE id = ?');
        $stmt->execute([$blogId]);

        $blog = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (false === $blog) {
            print 'Blog not found';
            exit();
        }

        include __DIR__.'/../../Resources/views/blog/view.php';
    }
}
