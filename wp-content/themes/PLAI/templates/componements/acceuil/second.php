<?php
$presentationTitle = get_field("titile__presentation");
$presentationTitlePole = get_field("presentation__pole");
$presentationDescription = get_field("description__pole");
$presentationImage = get_field("presentation__image");
?>
<section class="Presentation acceuil">

    <?php if (!empty($presentationTitle)): ?>
    <h2 class="title__second__aceuil title"><?= $presentationTitle ?></h2>
    <?php endif;?>
    <section class="presentation__pole">
        <div>
            <?php if (!empty($presentationTitlePole)): ?>
                <h3 class="presentation__pole__title"><?= $presentationTitlePole ?></h3>
            <?php endif;?>
            <?php if (!empty($presentationDescription)): ?>
                <div><?= $presentationDescription ?></div>
            <?php endif;?>
        </div>

        <?php if (!empty($presentationImage)): ?>
            <div>
                <img src="<?= $presentationImage['url'] ?>" alt="<?= $presentationImage['alt'] ?>" width="<?= $presentationImage['width'] ?>" height="<?= $presentationImage['height'] ?>">
            </div>
        <?php endif;?>
    </section>



</section>