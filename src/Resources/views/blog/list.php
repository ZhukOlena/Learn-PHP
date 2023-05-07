<?php

/** @var array<\App\Entity\Blog> $blogs */

include_once __DIR__.'/../Fragment/header.php';

?>

<h2>List blogs</h2>

<?php foreach ($blogs as $blog): ?>

<div>
    <div style="font-size: 0.9rem;"><?=$blog->getCreatedAt()->format('Y-m-d H:i:s'); ?></div>
    <h3>
        <a href="/blogs/<?= $blog->getId()?>">
            <?php print $blog->getTitle() ?>
        </a>
    </h3>
    <p><?=$blog->getPreview() ?></p>
</div>

<hr/>
<?php endforeach; ?>
<?php include_once __DIR__.'/../Fragment/footer.php'; ?>

