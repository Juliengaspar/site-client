<?php /* Template Name: faq */?>
<?php get_header()?>

<?php if( have_rows('faq_items') ): ?>
    <div class="faq-section">
        <?php $i = 1; while( have_rows('faq_items') ) : the_row();
            $question = get_sub_field('question');
            $reponse = get_sub_field('reponse');
            ?>
            <div class="faq-item" id="faq-<?php echo $i; ?>">
                <a href="#faq-<?php echo $i; ?>" class="faq-question">
                    <?php echo esc_html($question); ?>
                </a>
                <div class="faq-reponse">
                    <div class="faq-reponse-inner">
                        <?php echo wp_kses_post($reponse); ?>
                    </div>
                </div>
            </div>
            <?php $i++; endwhile; ?>
    </div>
<?php endif; ?>

<?php get_footer()?>
