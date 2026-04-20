<?php
$img = get_field('logo__plai');
$title = get_field('title__page');
$description = get_field('description__page');
?>
<section>
    <?php if (!empty($img)):?>
    <div class="acceuil__images">
        <img src="<?= $img['url']?>" alt="<?= $img['alt']?>" class="acceuil__image" width="<?= $img['width']?>" height="<?= $img['height']?>">
    </div>
    <?php endif; ?>
    <h3><?= $title ?></h3>
    <div>
        <?= $description ?>
    </div>
</section>