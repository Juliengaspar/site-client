<?php
$titleChiffre = get_field("title__chiffre");
$exemplesChiffreTableaux = get_field("exemples__chiffres");

?>
<section class="Chiffre">

    <?php if (!empty($titleChiffre)): ?>
        <h2><?= $titleChiffre ?></h2>
    <?php endif;?>
    <section>
        <?php if (!empty($exemplesChiffreTableaux)): ?>
            <div class="advantages__grid">
                <?php foreach ($exemplesChiffreTableaux as $exemplesChiffreTableau): ?>
                <h3><?= $exemplesChiffreTableau['exemple__chiffrer'] ?></h3>
                <div>
                    <img src="<?= $exemplesChiffreTableau['image__exemple__chiffre']['url'] ?>" alt="<?= $exemplesChiffreTableau['image__exemple__chiffre']['alt'] ?>">
                </div>

                <section>
                    <h4><?= $exemplesChiffreTableau['name__exemple'] ?></h4>
                    <div><?= $exemplesChiffreTableau['description__exemple__chiffre'] ?></div>
                </section>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</section>