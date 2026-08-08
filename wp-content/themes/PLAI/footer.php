<?php
$footer = dw_get_navigation_links('footer');
$logo__img = get_field('logo__footer',  'option');
$phone_number = get_field('phone_number', 'option');
$contact_mail = get_field('contact_mail', 'option');
$copyrinthe = get_field('text__copyrinthe', 'option');
?>

<footer class="footer">
        <section class="footer__top">
        <h2 class="sro">Pied de page</h2>

            <section class="footer__partenaires">
                <h3 class="footer__partenaires__title">PLAI</h3>
                        <ul class="footer__partenaires__liste">
                <?php
                $galerie = get_field('galerie__partenaires', 'option');
                ?>

                <?php if ($galerie && is_array($galerie)) :
                    foreach ($galerie as $image) :?>
                    <li>
                        <img src="<?= esc_url($image['url']); ?>"
                             alt="<?= esc_attr($image['alt'] ?? 'Partenaire'); ?>"
                             class="footer__partenaires__img"
                             loading="lazy"
                             width="<?= esc_attr($image['width'] ?? ''); ?>"
                             height="<?= esc_attr($image['height'] ?? ''); ?>"
                    </li>
                    <?php endforeach; ?>

                <?php endif; ?>
                        </ul>

            </section>
            <div class="footer__img">
                <?php if ($logo__img && isset($logo__img['url'])) : ?>
                <img src="<?= esc_url($logo__img['url']); ?>" alt="<?= esc_attr($logo__img['alt']); ?>"  class="footer__logo"
                     >
                <?php endif; ?>

<!--                --><?php //if (!empty($social_media)) : ?>
<!--                    <ul class="footer__socials" role="list">-->
<!--                        --><?php //foreach ($social_media as $link) : ?>
<!--                            <li class="footer__social-item">-->
<!--                                <a class="footer__social-link" href="--><?php //= $link->href ?><!--" title="--><?php //= $link->label ?><!--">--><?php //= $link->label ?><!--</a>-->
<!--                            </li>-->
<!--                        --><?php //endforeach; ?>
<!--                    </ul>-->
<!--                --><?php //endif; ?>
            </div>
            <nav class="footer__nav" aria-labelledby="footer-nav-title">
                <h2 class="footer__title" id="footer-nav-title">Navigation</h2>
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


        </section>

    <section class="footer__bottom">
        <p class="footer__copyright">
            <?= wp_kses_post($copyrinthe ?? '&copy; ' . date('Y') . ' PLAI – Tous droits réservés.'); ?>
        </p>
    </section>
</footer>
