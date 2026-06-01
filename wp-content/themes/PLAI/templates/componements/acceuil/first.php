<?php
$logoPLaiAcceuil = get_field('logo__plai');
$titleAcceuil = get_field('title__page');
$linkFilleArriane = get_field('file__arriane__link');
?>
<section class="header__page acceuil"  itemscope itemtype="https://schema.org/Organization">
    <div class="acceuil__images">
        <img src="<?= $logoPLaiAcceuil['url']?>" alt="<?= $logoPLaiAcceuil['alt']?>" loading="eager" class="acceuil__img img" itemprop="image">
    </div>
    <h3 class="acceuil__title title" itemprop="name"><?= $titleAcceuil ?></h3>

</section>