
<?php
$redirectionDemande = get_field('retours__accueil');
?>
<div class="redirection__demande__link">
    <p>Votre demande a bien été envoyée.</p>
    <a href="<?php echo esc_url(home_url('/')); ?>" title="   <?= $redirectionDemande['title'] ?>" class="redirection__demande__link__btn">
        <?= $redirectionDemande['title'] ?>
    </a>
</div>