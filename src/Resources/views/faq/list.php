<?php

/** @var array<\App\Entity\Faq> $elements */
include __DIR__.'/../Fragment/header.php';

?>

<h1>FAQ</h1>

<?php foreach ($elements as $faq): ?>

<div style="border-bottom: 1px dotted #888; margin-top: 10px; padding-bottom: 10px;">
    <div style="font-size: 0.9rem; color: #555">
        <?= $faq->getQuestion() ?>
    </div>

    <div style="padding-left: 20px;">
        <?= $faq->getAnswer(); ?>
    </div>
</div>

<?php endforeach; ?>


<?php include __DIR__.'/../Fragment/footer.php'; ?>
