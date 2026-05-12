<?php
$social_media = dw_get_navigation_links('social-media');
$footer = dw_get_navigation_links('footer');
$utils = dw_get_navigation_links('utils');
$logo__img = get_field('logo__footer',  'option');
$phone_number = get_field('phone_number', 'option');
$contact_mail = get_field('contact_mail', 'option');
$copyrinthe = get_field('text__copyrinthe', 'option');
?>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__top">
            <div class="footer__img">
                <?php

                if($logo__img): ?>
                    <img
                            src="<?= esc_url($logo__img['url']); ?>"
                            alt="<?= esc_attr($logo__img['alt']); ?>"
                    >
                <?php endif; ?>

                <?php if (!empty($social_media)) : ?>
                    <ul class="footer__socials" role="list">
                        <?php foreach ($social_media as $link) : ?>
                            <li class="footer__social-item">
                                <a class="footer__social-link" href="<?= $link->href ?>" title="<?= $link->label ?>">
                                    <?= $link->label ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <nav class="footer__nav" aria-labelledby="footer-nav-title">
                <h2 class="footer__title" id="footer-nav-title">Navigation</h2>
                <ul class="footer__list" role="list">
                    <?php foreach ($footer as $link) : ?>
                        <li class="footer__item">
                            <a class="footer__link" href="<?= $link->href ?>"><?= $link->label ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>


        </div>

        <section class="footer__bottom">
            <h3 class="footer__copyright">
                 <?= $copyrinthe?>
            </h3>
        </section>
    </div>
</footer>
