<?php
$link = get_field('redirection__demande');
?>

<div class="link">
    <?php if ($link): ?>
    <a href="<?= $link['url'] ?>" class="btn"><?= $link['title'] ?></a>

    <?php endif; ?>
</div>

