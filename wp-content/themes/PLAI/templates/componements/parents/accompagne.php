<?php
// Correction : on vérifie 'falc' (pas facl) et on simplifie la condition
$falc = isset($_GET['falc']) && $_GET['falc'] === 'true';

$title = $falc ? get_field('accompagne__title__falc') : get_field('accompagne__title');
$descritpion = $falc ? get_field('accompagne__description__falc') : get_field('accompagne__description');
?>

<?php if (!$falc): ?>
    <section>
        <?php if (!empty($title)): ?>
            <h3>
                <?= $title; ?>
            </h3>
        <?php endif; ?>
        <div>
            <?php if (!empty($descritpion)): ?>
                <?= $descritpion?>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <section>
        <?php if (!empty($title)): ?>
            <h3>
                <?= $title; ?>
            </h3>
        <?php endif; ?>
        <div>
            <?php if (!empty($descritpion)): ?>
                <?= $descritpion?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
