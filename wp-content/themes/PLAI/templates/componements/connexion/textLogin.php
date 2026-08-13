<?php
$titleConnextion = get_field('title__page');
$explicationConnextion = get_field('title__explication');
$reddirectionConnextion = get_field('contenu__explication');
?>

<section class="form__container">
    <h2 class="sro"><?= $titleConnextion ?></h2>

    <section class="form__container__form">
        <h3 class="form__container__form__title">
            <?= $explicationConnextion ?>
        </h3>

        <div class="form__container__form__contenu">
            <?= $reddirectionConnextion ?>
        </div>
    </section>
</section>