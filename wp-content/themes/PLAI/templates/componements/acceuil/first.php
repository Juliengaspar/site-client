<?php
$logoPLaiAcceuil = get_field('logo__plai');
$titleAcceuil = get_field('title__page');
$linkFilleArriane = get_field('file__arriane__link');
?>
<section class="acceuil">
    <div class="acceuil__images">
        <img src="<?= $logoPLaiAcceuil['url']?>" alt="<?= $logoPLaiAcceuil['alt']?>" class="acceuil__image" width="<?= $logoPLaiAcceuil['width']?>" height="<?= $logoPLaiAcceuil['height']?>">
    </div>
    <h3 class="acceuil__title"><?= $titleAcceuil ?></h3>

</section>