<?php
$titleChiffre = get_field("title__chiffre");
$exemplesChiffreTableaux = get_field("exemples__chiffres");

?>
<section class="Chiffres" aria-labelledby="chiffres-title">

    <?php if (!empty($titleChiffre)): ?>
        <h2 id="chiffres-title" class="chiffres__title "><?= $titleChiffre ?></h2>
    <?php endif;?>
        <?php if (!empty($exemplesChiffreTableaux)): ?>
            <section class="chiffres__grid">
                <?php foreach ($exemplesChiffreTableaux as $item):

                    $number = $item['exemple__chiffrer'];
                    $image = $item['image__exemple__chiffre'];
                    $title = $item['name__exemple'];
                    $desc = $item['description__exemple__chiffre'];
                    ?>

                    <article class="chiffre-card">

                        <?php if ($number): ?>
                            <p class="chiffre-card__number">
                                <?= esc_html($number); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($image): ?>
                            <img
                                    class="chiffre-card__img"
                                    src="<?= esc_url($image['url']); ?>"
                                    alt="<?= esc_attr($image['alt'] ?: 'Illustration'); ?>"
                                    loading="lazy"
                            >
                        <?php endif; ?>

                        <?php if ($title): ?>
                            <h3 class="chiffre-card__title">
                                <?= esc_html($title); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($desc): ?>
                            <div class="chiffre-card__desc">
                                <?= $desc; ?>
                            </div>
                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>
            </section>
        <?php endif; ?>
</section>