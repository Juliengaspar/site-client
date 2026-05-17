<?php
$titleConnextion = get_field('title__page');
$explicationConnextion = get_field('title__explication');
$reddirectionConnextion = get_field('contenu__explication');
?>

<section class="form__container">
    <h2><?= $titleConnextion ?></h2>

    <section>
        <h3 class="form__title">
            <?= $explicationConnextion ?>
        </h3>

        <div>
            <?= $reddirectionConnextion ?>
        </div>
    </section>
</section>