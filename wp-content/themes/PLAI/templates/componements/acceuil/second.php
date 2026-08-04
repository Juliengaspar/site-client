<?php
$presentationTitle = get_field("titile__presentation");
$presentationTitlePole = get_field("presentation__pole");
$presentationDescription = get_field("description__pole");
$presentationImage = get_field("presentation__image");
?>
<section class="Presentation acceuil" itemscope itemtype="https://schema.org/Organization">

    <?php if (!empty($presentationTitle)): ?>
    <h3 class="title__second__aceuil " itemprop="name"><?= esc_html($presentationTitle) ?></h3>
    <?php endif;?>
    <section class="presentation__pole">
        <div>
            <?php if (!empty($presentationTitlePole)): ?>
                <h3 class="presentation__pole__title subtitle"><?= esc_html($presentationTitlePole) ?></h3>
            <?php endif;?>
            <?php if (!empty($presentationDescription)): ?>
                <div class="description__Acceuil" itemprop="description"><?= wp_kses_post($presentationDescription) ?></div>
            <?php endif;?>
        </div>

        <?php if (!empty($presentationImage)): ?>
            <div class="presentation__pole__conteneur">
                <img class="img" src="<?= esc_url($presentationImage['url']); ?>" alt="<?= esc_attr($presentationImage['alt']); ?>" itemprop="image" width="<?= esc_attr($presentationImage['width']); ?>" height="<?= esc_attr($presentationImage['height']); ?>"
                     loading="lazy"
                     decoding="async"
                     srcset="
                                <?= esc_url(wp_get_attachment_image_url($presentationImage['ID'], 'square-small')); ?> 400w,
                                <?= esc_url(wp_get_attachment_image_url($presentationImage['ID'], 'square-medium')); ?> 800w,
                                <?= esc_url(wp_get_attachment_image_url($presentationImage['ID'], 'square-large')); ?> 1200w
                                " sizes="(max-width: 768px) 90vw, (max-width: 1200px) 50vw,   400px"

            </div>
        <?php endif;?>
    </section>



</section>