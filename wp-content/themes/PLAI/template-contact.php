<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<main class="main">

    <nav class="header__nav">
        <h2 class="sro">Barre de navigation</h2>
        <?php include('wp-content/themes/PLAI/templates/componements/navigations/navigation__private.php')?>
        <?php
        ?>
    </nav>
    <?php
    $titleContact = get_field("title__contact");
    $textContact = get_field("explications__contenu");
    ?>
    <section class="contact">
        <h2 class="contact__title"><?= $titleContact?></h2>
        <?php include ('wp-content/themes/PLAI/templates/componements/fileArriane/file__arriane.php')?>

        <div class="contact__explication">
            <?=$textContact ?>
        </div>
    </section>
    <form action="" class="contact-form" method="post">

        <?php wp_nonce_field('contact_pole_form', 'contact_pole_nonce'); ?>

        <!-- ========================= -->
        <!-- INFORMATIONS CONTACT -->
        <!-- ========================= -->

        <fieldset>
            <h3>Informations contact</h3>

            <div class="form-group full">
                <label for="ecole">
                    Nom de votre établissement scolaire *
                </label>

                <input
                        type="text"
                        id="ecole"
                        name="ecole"
                        required
                >
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label for="fase_ecole">
                        Numéro FASE de l'école
                    </label>

                    <input
                            type="number"
                            id="fase_ecole"
                            name="fase_ecole"
                    >
                </div>

                <div class="form-group">
                    <label for="fase_implantation">
                        Numéro FASE de l'implantation
                    </label>

                    <input
                            type="number"
                            id="fase_implantation"
                            name="fase_implantation"
                    >
                </div>

            </div>

            <div class="form-group full">

                <label for="po">
                    Sélectionnez votre PO
                </label>

                <select id="po" name="po">

                    <option value="">
                        Choisir...
                    </option>

                    <option>Beyne-Heusay</option>
                    <option>Chaudfontaine</option>
                    <option>Grâce-Hllogne</option>
                    <option>Liège</option>
                    <option>Neupré</option>
                    <option>Seraing</option>
                    <option>Sprimont</option>
                    <option>Trooz</option>

                </select>

            </div>

            <fieldset class="radio-group">
                <h3>Votre titre</h3>

                <label>
                    <input type="radio" name="titre" value="Directeur·rice" checked>
                    Directeur·rice
                </label>

                <label>
                    <input type="radio" name="titre" value="Référent">
                    Personne référente pour le Pôle
                </label>

            </fieldset>

            <div class="form-grid">

                <div class="form-group">
                    <label for="nom">
                        Nom *
                    </label>

                    <input
                            type="text"
                            id="nom"
                            name="nom"
                            required
                    >
                </div>

                <div class="form-group">
                    <label for="prenom">
                        Prénom *
                    </label>

                    <input
                            type="text"
                            id="prenom"
                            name="prenom"
                            required
                    >
                </div>

            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label for="email">
                        Email *
                    </label>

                    <input
                            type="email"
                            id="email"
                            name="email"
                            required
                    >
                </div>

                <div class="form-group">
                    <label for="telephone">
                        Numéro de contact *
                    </label>

                    <input
                            type="tel"
                            id="telephone"
                            name="telephone"
                            required
                    >
                </div>

            </div>

            <fieldset class="radio-group">
                <h3>
                    Pour qui sollicitez-vous un support du Pôle ?
                </h3>

                <label>
                    <input
                            type="radio"
                            name="support"
                            value="eleve"
                            checked
                    >
                    Un élève
                </label>

                <label>
                    <input
                            type="radio"
                            name="support"
                            value="equipe"
                    >
                    Un ou plusieurs membres de l'équipe éducative
                </label>

            </fieldset>

        </fieldset>

        <!-- ========================= -->
        <!-- SECTION ELEVE -->
        <!-- ========================= -->

        <fieldset>

            <h3>Section élève</h3>

            <div class="form-grid">

                <div class="form-group">
                    <label for="nom_eleve">
                        Nom de l'élève
                    </label>

                    <input
                            type="text"
                            id="nom_eleve"
                            name="nom_eleve"
                    >
                </div>

                <div class="form-group">
                    <label for="prenom_eleve">
                        Prénom de l'élève
                    </label>

                    <input
                            type="text"
                            id="prenom_eleve"
                            name="prenom_eleve"
                    >
                </div>

            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label for="classe">
                        Classe actuelle de l'élève
                    </label>

                    <input
                            type="text"
                            id="classe"
                            name="classe"
                    >
                </div>

                <div class="form-group">
                    <label for="trouble">
                        L'élève est-il porteur d'un trouble diagnostiqué ?
                    </label>

                    <select id="trouble" name="trouble">
                        <option>Oui</option>
                        <option>Non</option>
                        <option>Je ne sais pas</option>
                    </select>
                </div>

            </div>

            <div class="form-group full">

                <label for="cpms">
                    Votre CPMS est-il déjà intervenu ?
                </label>

                <select id="cpms" name="cpms">
                    <option>Oui</option>
                    <option>Non</option>
                    <option>Je ne sais pas</option>
                </select>

            </div>

        </fieldset>

        <!-- ========================= -->
        <!-- SECTION EQUIPE -->
        <!-- ========================= -->

        <fieldset>

            <h3>Section équipe</h3>

            <fieldset class="radio-group">

                <h3>
                    Qui est concerné dans votre équipe ?
                </h3>

                <label>
                    <input
                            type="radio"
                            name="equipe"
                            value="Toute l'équipe"
                            checked
                    >
                    Toute l'équipe
                </label>

                <label>
                    <input
                            type="radio"
                            name="equipe"
                            value="Quelques membres"
                    >
                    Quelques membres
                </label>

            </fieldset>

        </fieldset>

        <!-- ========================= -->
        <!-- POUR LES DEUX -->
        <!-- ========================= -->

        <fieldset>

            <h3>Pour les 2 sections</h3>

            <div class="form-group full">

                <label for="raison">
                    Expliquez la raison de votre demande *
                </label>

                <textarea
                        id="raison"
                        name="raison"
                        rows="8"
                        required
                ></textarea>

            </div>

            <div class="form-group full">

                <label for="infos">
                    Informations supplémentaires
                </label>

                <textarea
                        id="infos"
                        name="infos"
                        rows="8"
                ></textarea>

            </div>

        </fieldset>

        <div class="submit-wrapper">

            <button type="submit" class="btn-submit">
                Envoyer la demande
            </button>

        </div>

    </form>


</main>


<?php get_footer(); ?>
