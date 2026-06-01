<?php
$logoPLaiAcceuil = get_field('logo__plai', 'option');

if ($logoPLaiAcceuil) :
    ?>
    <div class="acceuil__images">
        <img
                src="<?= esc_url($logoPLaiAcceuil['url']); ?>"
                alt="<?= esc_attr($logoPLaiAcceuil['alt']); ?>"
                loading="eager"
                class="acceuil__img img"
        >
    </div>
<?php endif; ?>