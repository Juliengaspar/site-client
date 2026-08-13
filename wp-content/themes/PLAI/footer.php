<?php
$footer = dw_get_navigation_links('footer');
$title__nav = get_field('titile__liste__links',  'option');
$logo__img = get_field('logo__footer',  'option');
$logo__liege = get_field('logo__liege',  'option');
$logo__text = get_field('logo__footer__texte',  'option');
$phone_number = get_field('phone_number', 'option');
$contact_mail = get_field('contact_mail', 'option');
$title__information = get_field('title__information', 'option');
$text__information = get_field('description__information', 'option');
$copyrinthe = get_field('text__copyrinthe', 'option');
?>

<footer class="footer">
        <section class="footer__top">
        <h2 class="sro">footer</h2>

            <section class="footer__partenaires">
                <h3 class="footer__partenaires__title">PLAI</h3>
                <div class="footer__logos">

                    <?php if ($logo__img && isset($logo__img['url'])) : ?>

                        <img
                                src="<?= esc_url($logo__img['url']); ?>"
                                alt="<?= esc_attr($logo__img['alt']); ?>"
                                class="footer__logo"
                                srcset="
                    <?= esc_url(wp_get_attachment_image_url($logo__img['ID'], 'square-small')); ?> 400w,
                    <?= esc_url(wp_get_attachment_image_url($logo__img['ID'], 'square-medium')); ?> 800w,
                    <?= esc_url(wp_get_attachment_image_url($logo__img['ID'], 'square-large')); ?> 1200w
                "
                                sizes="(max-width: 768px) 40vw, 180px"
                        >

                    <?php endif; ?>


                    <?php if ($logo__liege && isset($logo__liege['url'])) : ?>

                        <img
                                src="<?= esc_url($logo__liege['url']); ?>"
                                alt="<?= esc_attr($logo__liege['alt']); ?>"
                                class="footer__logo"
                                srcset="
                    <?= esc_url(wp_get_attachment_image_url($logo__liege['ID'], 'square-small')); ?> 400w,
                    <?= esc_url(wp_get_attachment_image_url($logo__liege['ID'], 'square-medium')); ?> 800w,
                    <?= esc_url(wp_get_attachment_image_url($logo__liege['ID'], 'square-large')); ?> 1200w
                "
                                sizes="(max-width: 768px) 40vw, 180px"
                        >

                    <?php endif; ?>

                </div>
                <div class="footer__text">
                    <?= wp_kses_post($logo__text) ?>
                </div>



            </section>
            <nav class="footer__nav" aria-labelledby="footer-nav-title">
                <h2 class="footer__title" id="footer-nav-title"><?= $title__nav ?></h2>
                <?php if (!empty($footer)) : ?>
                <ul class="footer__list" role="list">
                    <?php foreach ($footer as $link) : ?>
                        <li class="footer__item">
                            <a class="footer__link" href="<?= esc_url($link->href) ?>"><?= esc_html($link->label) ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </nav>

            <section class="informations">
                <h2 class="informations__title"><?=  esc_html($title__information)?></h2>
                <div class="informations__description">
                    <?=  wp_kses_post($text__information)?>
                </div>
            </section>


        </section>

    <section class="footer__bottom">
        <p class="footer__copyright">
            <?= wp_kses_post($copyrinthe ?? '&copy; ' . date('Y') . ' PLAI – Tous droits réservés.'); ?>
        </p>
    </section>
</footer>
