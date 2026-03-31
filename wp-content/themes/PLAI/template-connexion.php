<?php /* Template Name: Connexion */?>
<?php
$titleConnextion = get_field('title__page');
$explicationConnextion = get_field('description__page');
$reddirectionConnextion = get_field('inscription__link');

?>
<?php get_header(); ?>
<section class="form__container">
    <h2 class="form__title"><?= $titleConnextion ?></h2>
    <div>
        <?= $explicationConnextion ?>
    </div>

    <!-- L'action redirige vers le fichier de base de Wordpress qui dit qui fait quoi. -->
    <form class="form" action="<?= admin_url('admin-post.php'); ?>" method="POST">
        <div class="form__group">
            <label class="form__label" for="name">Nom complet *</label>
            <input class="form__input" type="text" id="name" name="name" value="" placeholder="John Doe" required/>
            <?php if ($errors['name'] ?? null): ?>
                <p class="form__error-message"><?= $errors['name']; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__group">
            <label class="form__label" for="email">Email professionnel *</label>
            <input class="form__input" type="email" id="email" name="email" value="" placeholder="Ex: johndoe@example.com" required/>
            <?php if ($errors['email'] ?? null): ?>
                <p class="form__error-message"><?= $errors['email']; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__group">
            <label class="form__label" for="fase">N° de fase de l’école <small>N° de fase de l’école</small> *</label>
            <input class="form__input" type="text" id="fase" name="fase" value="" placeholder="Ex: 88888"/>
            <?php if ($errors['object'] ?? null): ?>
                <p class="form__error-message"><?= $errors['object']; ?></p>
            <?php endif; ?>
        </div>
        <div class="form__group">
            <label class="form__label" for="motDePasse">Mot de passe *</label>
            <input class="form__input" type="password" id="motDePasse" name="motDePasse" value="" placeholder="Ex: 88888"/>
            <?php if ($errors['object'] ?? null): ?>
                <p class="form__error-message"><?= $errors['object']; ?></p>
            <?php endif; ?>
        </div>

        <!-- Je lui dis quelle fonction il doit lancer -->
        <input type="hidden" name="action" value="hepl_contact_form"/>
        <!-- On s'assure que notre requête vient bien de notre site -->
        <input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('hepl_contact_form'); ?>"/>

        <!-- Bouton qui va soumettre le formulaire -->
        <button class="form__button" type="submit">Connexion</button>
    </form>
    <div>
        <?= $reddirectionConnextion ?>
    </div>
</section>
<?php get_footer(); ?>


