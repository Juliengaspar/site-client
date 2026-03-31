<?php
$presentationTitle = get_field("titile__presentation");
$presentationTitlePole = get_field("presentation__pole");
$presentationDescription = get_field("description__pole");
$presentationImage = get_field("presentation__image");
?>
<section class="Presentation">

    <?php if (!empty($presentationTitle)): ?>
    <h2><?= $presentationTitle ?></h2>
    <?php endif;?>
    <section>
        <?php if (!empty($presentationTitlePole)): ?>
            <h3><?= $presentationTitlePole ?></h3>
        <?php endif;?>
        <?php if (!empty($presentationDescription)): ?>
            <div><?= $presentationDescription ?></div>
        <?php endif;?>

        <?php if (!empty($presentationImage)): ?>
            <div>
                <img src="<?= $presentationImage['url'] ?>" alt="<?= $presentationImage['alt'] ?>" width="<?= $presentationImage['width'] ?>" height="<?= $presentationImage['height'] ?>">
            </div>
        <?php endif;?>
    </section>



</section>