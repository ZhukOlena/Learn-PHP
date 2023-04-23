<?php include_once __DIR__.'/../Fragment/header.php'; ?>

<h2>List blogs</h2>

<?php foreach ($blogs as $blog): ?>

<div>
    <div style="font-size: 0.9rem;"><?=$blog['created_at'];?></div>
    <h3>
        <a href="/blogs/<?= $blog['id'];?>">
            <?php print $blog['title']; ?>
        </a>
    </h3>
    <p><?=$blog['preview']; ?></p>
</div>

<hr/>
<?php endforeach; ?>
<?php include_once __DIR__.'/../Fragment/footer.php'; ?>

