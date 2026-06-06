<?php
$presentationTitle = get_field("titile__presentation");
$presentationTitlePole = get_field("presentation__pole");
$presentationDescription = get_field("description__pole");
$presentationImage = get_field("presentation__image");
?>
<section class="Presentation acceuil" itemscope itemtype="https://schema.org/Organization">

    <?php if (!empty($presentationTitle)): ?>
    <h2 class="title__second__aceuil " itemprop="name"><?= $presentationTitle ?></h2>
    <?php endif;?>
    <section class="presentation__pole">
        <div>
            <?php if (!empty($presentationTitlePole)): ?>
                <h3 class="presentation__pole__title subtitle"><?= $presentationTitlePole ?></h3>
            <?php endif;?>
            <?php if (!empty($presentationDescription)): ?>
                <div class="description__Acceuil" itemprop="description"><?= $presentationDescription ?></div>
            <?php endif;?>
        </div>

        <?php if (!empty($presentationImage)): ?>
            <div>
                <img src="<?= $presentationImage['url'] ?>" alt="<?= $presentationImage['alt'] ?>" width="<?= $presentationImage['width'] ?>" height="<?= $presentationImage['height'] ?>" itemprop="image"
                >
            </div>
        <?php endif;?>
    </section>



</section>