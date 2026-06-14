<?php
// Correction : on vérifie 'falc' (pas facl) et on simplifie la condition
$falc = isset($_GET['falc']) && $_GET['falc'] === 'true';

$title = $falc ? get_field('accesibilte__title__falc') : get_field('accesibilte__title');
$descritpion = $falc ? get_field('accesibilte__description__falc') : get_field('accesibilte__description');
?>

<?php if (!$falc): ?>
    <section class="explications">
        <?php if (!empty($title)): ?>
        <h3 class="acceuil__title">
             <?= esc_html($title); ?>
        </h3>
            <?php endif; ?>
        <div>
            <?php if (!empty($descritpion)): ?>
            <?= esc_html($descritpion); ?>
            <?php endif; ?>
        </div>
</section>
<?php else: ?>
    <section>
        <?php if (!empty($title)): ?>
            <h3>
                <?= esc_html($title); ?>
            </h3>
        <?php endif; ?>
        <div>
            <?php if (!empty($descritpion)): ?>
                <?= esc_html($descritpion) ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
