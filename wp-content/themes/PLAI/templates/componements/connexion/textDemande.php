
<?php
$titleDemande = get_field('title__page');
$explicationDemande = get_field('description__page');
?>

<section class="form__container">
    <h2 class="form__container__title sro"><?= get_the_title() ?></h2>

    <section class="form__container__form">
        <h3 class="form__container__form__title">
            <?= $titleDemande ?>
        </h3>

        <div class="form__container__form__contenu">
            <?= $explicationDemande ?>
        </div>
    </section>
</section>