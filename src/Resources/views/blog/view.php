<?php
/** @var \App\Entity\Blog $blog  */
/** @var array<\App\Entity\BlogComment> $comments */

include_once __DIR__.'/../Fragment/header.php';

?>

<h1><?= $blog->getTitle() ?></h1>

<div><?= $blog->getContent() ?></div>

<h3>Comments:</h3>

<form method="post" action="/blogs/comments/new">
    <div>
        <h2>Title name</h2>
        <input type="text" name="title"/>
    </div>
    <div>
    <textarea name="message" placeholder="You can write your comments here"></textarea>
    </div>

    <div>
        <input type="hidden" name="blog_id" value="<?= $blog->getId() ?>"/>
        <input type="submit" value="Create comment"/>
   </div>
</form>
<hr/>

<?php foreach ($comments as $comment): ?>
<div>
    <h1>Title</h1>
    <p><?=htmlspecialchars($comment->getTitle());?></p>
    <hr/>
</div>

<div>
    <p><?= htmlspecialchars($comment->getMessage()); ?></p>
    <hr/>
</div>

<?php endforeach; ?>

<?php include_once __DIR__.'/../Fragment/footer.php'; ?>

