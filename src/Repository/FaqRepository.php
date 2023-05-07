<?php

namespace App\Repository;

use App\Entity\Faq;

class FaqRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM faq ORDER BY priority ASC');
        $stmt->execute();

        $rawData = $stmt->fetchAll();
        $items = [];

        foreach ($rawData as $row) {
            $faq = new Faq();

            $faq->setId($row['id']);
            $faq->setCreatedAt(new \DateTime($row['created_at']));
            $faq->setQuestion($row['question']);
            $faq->setAnswer($row['answers']);

            $items[] = $faq;
        }

        return $items;
    }
}