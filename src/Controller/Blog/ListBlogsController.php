<?php

namespace App\Controller\Blog;

class ListBlogsController
{
    /**
     * @var \PDO
     */
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->PDO = $pdo;
    }

    public function handleAction ()
    {
        $stmt = $this->PDO->prepare('SELECT * FROM blogs ORDER BY created_at DESC');
        $stmt->execute();

        $blogs = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        include_once __DIR__.'/../../Resources/views/blog/list.php';

    }
}