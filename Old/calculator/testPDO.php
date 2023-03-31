<?php


$dsn = 'mysql:host=learn-mysql1;dbname=my_new_database';

$pdo = new \PDO($dsn, 'Olena', '123');

$stmt = $pdo->prepare('SELECT * FROM calculator_history WHERE command = ? AND result > ?');

$stmt ->execute(['add', 2]);

$result = $stmt->fetchALL();

print_r($result);
