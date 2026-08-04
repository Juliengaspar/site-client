<?php
$titleChiffre = get_field("title__chiffre");
$exemplesChiffreTableaux = get_field("exemples__chiffres");

?>
<section class="Chiffres" aria-labelledby="chiffres-title"  itemscope itemtype="https://schema.org/ItemList">

    <?php if (!empty($titleChiffre)): ?>
        <h2 id="chiffres-title" class="chiffres__title" itemprop="name"><?= esc_html($titleChiffre) ?></h2>
    <?php endif;?>
        <?php if (!empty($exemplesChiffreTableaux)): ?>
            <ul class="chiffres__grid"  itemprop="itemListElement">
                <?php foreach ($exemplesChiffreTableaux as $item):

                    $number = $item['exemple__chiffrer'];
                    $image = $item['image__exemple__chiffre'];
                    $title = $item['name__exemple'];
                    $desc = $item['description__exemple__chiffre'];
                    ?>

                    <li class="chiffre-card">

                        <?php if ($number): ?>
                            <p class="chiffre-card__number" itemprop="name">
                                <?= esc_html($number); ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($image): ?>
                            <div class="chiffre-card__img-wrapper">
                                <img
                                        class="chiffre-card__img"
                                        src="<?= esc_url($image['url']); ?>"
                                        alt="<?= esc_attr($image['alt'] ?: 'Illustration'); ?>"
                                        loading="lazy"
                                        itemprop="image"
                                >
                            </div>
                        <?php endif; ?>

                        <?php if ($title): ?>
                            <h3 class="chiffre-card__title subtitle"  itemprop="name">
                                <?= esc_html($title); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($desc): ?>
                            <div class="chiffre-card__desc" itemprop="description">
                                <?= wp_kses_post($desc); ?>
                            </div>
                        <?php endif; ?>

                    </li>

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
</section>