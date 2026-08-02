<?php
$logoPLaiAcceuil = get_field('logo__plai');
$titleAcceuil = get_field('title__page');
$linkFilleArriane = get_field('file__arriane__link');
?>
<section class="header__page acceuil"  itemscope itemtype="https://schema.org/Organization">
    <div class="acceuil__images">
        <img src="<?= $logoPLaiAcceuil['url']?>" alt="<?= $logoPLaiAcceuil['alt']?>" loading="eager" class="acceuil__img img" itemprop="image"
                    srcset="
                    <?= esc_url(wp_get_attachment_image_url($logoPLaiAcceuil['ID'], 'square-small')); ?> 400w,
                    <?= esc_url(wp_get_attachment_image_url($logoPLaiAcceuil['ID'], 'square-medium')); ?> 800w,
                    <?= esc_url(wp_get_attachment_image_url($logoPLaiAcceuil['ID'], 'square-large')); ?> 1200w
                     " sizes="(max-width: 768px) 90vw, (max-width: 1200px) 50vw,   400px" >
    </div>
    <h2 class="acceuil__title" itemprop="name"><?= $titleAcceuil ?></h2>


</section>