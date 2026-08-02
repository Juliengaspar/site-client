<?php
/**
* redirections.php
* Affiche les cartes de redirection (répéteur ACF)
* Structure : section > grille > cartes
*/
?>
<?php if( have_rows('liste__redirection') ) : ?>
    <?php while( have_rows('liste__redirection') ) : the_row();
        $titeRedirection = get_sub_field('title__redirection');
        $explicationRedirection = get_sub_field('explication__redirection');
        $linkRedirection = get_sub_field('link__redirection');
        ?>
        <section class="redirections" aria-labelledby="redirections-title">

            <?php if($titeRedirection): ?>
                <h3 id="redirections-title" class="redirections__title"><?= esc_html($titeRedirection); ?></h3>
            <?php endif; ?>

            <div>

                <?php if($explicationRedirection): ?>
                    <?= wp_kses_post($explicationRedirection); ?>
                <?php endif; ?>

                <?php if($linkRedirection && is_array($linkRedirection)): ?>
                    <a href="<?= $linkRedirection['url']; ?>" title="<?= $linkRedirection['title']; ?>" class="btn"><?= $linkRedirection['title']; ?></a>

                <?php endif; ?>

            </div>

        </section>

    <?php endwhile; ?>

<?php endif; ?>