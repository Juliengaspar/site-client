<?php
$parentsTitle = get_field("title__acceuil__parents");
$parentsDescription = get_field("description__acceuil__parents");
$parentsLink = get_field("link__acceuil__parents");
?>
<section class="Presentation">

    <?php if (!empty($parentsTitle)): ?>
        <h2><?= $parentsTitle ?></h2>
    <?php endif;?>
        <?php if (!empty($parentsDescription)): ?>
            <div><?= $parentsDescription ?></div>
        <?php endif;?>
    <div>
        <?php if (!empty($parentsLink)): ?>
        <a href="<?=$parentsLink['url']?>"><?= $parentsLink['title'] ?></a>
        <?php endif;?>
    </div>





</section>