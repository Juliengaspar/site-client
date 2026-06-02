<?php
$enseignantTitle = get_field("title__acceuil__enseignant");
$enseignantDescription = get_field("description__acceuil__enseignant");
$enseignantLink = get_field("link__acceuil__enseignant");
?>
<section class="Presentation">
        <h2 class="Presentation__title"><?= $enseignantTitle ?></h2>
    <section class="contenu">
        <?php if (!empty($enseignantTitle)): ?>
            <h3 class="contenu__title ">Ressources </h3>
        <?php endif;?>
        <?php if (!empty($enseignantDescription)): ?>
            <div class="contenu__text"><?= $enseignantDescription ?></div>
        <?php endif;?>
        <div class="contenu__link">
            <?php if (!empty($enseignantLink)): ?>
                <a href="<?=$enseignantLink['url']?>" class="btn"><?= $enseignantLink['title'] ?></a>
            <?php endif;?>
        </div>

    </section>
</section>