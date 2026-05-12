<?php
$enseignantTitle = get_field("title__acceuil__enseignant");
$enseignantDescription = get_field("description__acceuil__enseignant");
$enseignantLink = get_field("link__acceuil__enseignant");
?>
<section class="Presentation">

    <?php if (!empty($enseignantTitle)): ?>
        <h2 class="Presentation__title"><?= $enseignantTitle ?></h2>
    <?php endif;?>
    <?php if (!empty($enseignantDescription)): ?>
        <div class="Presentation__contenu"><?= $enseignantDescription ?></div>
    <?php endif;?>
    <div class="Presentation__link">
        <?php if (!empty($enseignantLink)): ?>
            <a href="<?=$enseignantLink['url']?>" class="btn"><?= $enseignantLink['title'] ?></a>
        <?php endif;?>
    </div>
</section>