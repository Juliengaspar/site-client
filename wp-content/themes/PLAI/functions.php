<?php


include ('core/theme/configuration.php');

//travailler avec la session PHP
function hepl_sessio_flash($key, $value){
    if (! isset($_SESSION['hepl_flash'])){
        $_SESSION['hepl_flash'] = [];
    }
    $_SESSION['hepl_flash'][$key] = $value;
}

function hepl_session_get($key){
    if (isset($_SESSION['hepl_flash'][$key]) && array_key_exists($key, $_SESSION['hepl_flash'])){
        //1. Récupérer la donnée qui à été flash
        $value = $_SESSION['hepl_flash'][$key];
        //2. Suprimer la donnée de la session
        unset($_SESSION['hepl_flash'][$key]);
        //3. Retourner la données récupére
        return $value;
    }
    //La donnée n’existait pas dans la session flash, donc je retourne
    return null;
}
{

}

// Gutenberg est le nouvel éditeur de contenu propre à Wordpress
// il ne nous intéresse pas pour l'utilisation du thème que nous
// allons créer. On va donc le désactiver :

// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );
// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
// Disable default front-end styles.
add_action( 'wp_enqueue_scripts', function() {
// Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );
// Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );
// Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

add_action('init', 'init_remove_support', 100);

// Fonction qui permet de supprimer les Text-area de base sur les pages
function init_remove_support(): void
{
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
    remove_post_type_support('product', 'editor');
}

//definir mes menu
//metttre tous les lien dedans

// Déclaration des menus dans wordpress
register_nav_menu('header', 'Le menu de navigation principal qui se trouve en haut de la page');
register_nav_menu('footer', 'Le menu de navigation de fin de page');
register_nav_menu('social-media', 'Le menu de navigation pour les réseaux sociaux');
register_nav_menu('utils', 'Le menu de navigation pour les ressources utiles');

function dw_get_navigation_links(string $location): array
{
    //recupérer l'objet W pour le menu
    // Récupérer l'objet W¨pour le menu
    $locations = get_nav_menu_locations();

    if (!isset( $locations[ $location ])) {
        return [];
    }
    $nav_id = $locations[ $location ];
    $nav =  wp_get_nav_menu_items( $nav_id );//retour les parametre du menu
    //Transformer le menu en tableaux de lien, chaque lien va être un objet personalisé

    $links = [];
    //tableaux d'element , ou on va boucler ou on declarer un nouveuax obj et on dis la clef href vaux l'url de l'obj link <=> pour le labell a la fin on retourn le tableaux des lien
    foreach ($nav as $post) {
        $link = new stdClass();
        $link->href = $post->url;
        $link->label = $post->title;

        $links[] = $link;
    }
    return $links;
}
dw_get_navigation_links('header');
//parametre un string et en retour (:) en string
// function regarder si une clef est bien present dans le fichier si oui ob le fais
function dw_asset(string $file): string {
    $manifest_path = get_theme_file_path( '/public/.vite/manifest.json' );
    if ( file_exists( $manifest_path ) ) {
        //retourn un tableaux asscciatif
        $manifest = json_decode( file_get_contents( $manifest_path ), true );
//tester si le tableaux associatif possede la valleur entrée
        if ( isset($manifest['wp-content/themes/PLAI/assets/css/styles.scss']) && $file === 'css' ) {
            return get_theme_file_uri( '/public/'.$manifest['wp-content/themes/PLAI/assets/css/styles.scss']['file']);
        }
        if ( isset($manifest['wp-content/themes/PLAI/assets/js/main.js']) && $file === 'js' ) {
            return get_theme_file_uri( '/public/'.$manifest['wp-content/themes/PLAI/assets/js/main.js']['file']);

        }

    }
    return '';
}

//creation de nos premiers post type https://learn.wordpress.org/lesson/custom-post-types/
//https://developer.wordpress.org/resource/dashicons/#editor-underline

// Ajouts d'une page d'option (exemple de la documentation)
acf_add_options_page(array(
    'page_title'    => 'Theme General Settings',
    'menu_title'    => 'Theme Settings',
    'menu_slug'     => 'theme-general-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false
));

//fonction pour les chaine de traduction perssonalisées

//charger la fonction de dommaine
//charger les traduction existantes
load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');
//Crée un endroits ou il y a tous les traduction
function __hepl($translation): ?string
{
    //fonction lancer en arriers plans
    return __($translation, 'hepl-trad');
}

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_ressources',
        'title' => 'Page Ressources',
        'fields' => array(

            array(
                'key' => 'field_titre_page',
                'label' => 'Titre',
                'name' => 'titre_page',
                'type' => 'text',
            ),

            array(
                'key' => 'field_description_page',
                'label' => 'Description',
                'name' => 'description_page',
                'type' => 'textarea',
            ),

            array(
                'key' => 'field_categories',
                'label' => 'Catégories',
                'name' => 'categories',
                'type' => 'repeater',
                'sub_fields' => array(

                    array(
                        'key' => 'field_nom_categorie',
                        'label' => 'Nom de la catégorie',
                        'name' => 'nom_categorie',
                        'type' => 'text',
                    ),

                    array(
                        'key' => 'field_ressources',
                        'label' => 'Ressources',
                        'name' => 'ressources',
                        'type' => 'repeater',
                        'sub_fields' => array(

                            array(
                                'key' => 'field_titre',
                                'label' => 'Titre',
                                'name' => 'titre',
                                'type' => 'text',
                            ),

                            array(
                                'key' => 'field_description',
                                'label' => 'Description',
                                'name' => 'description',
                                'type' => 'textarea',
                            ),

                            array(
                                'key' => 'field_lien',
                                'label' => 'Lien',
                                'name' => 'lien',
                                'type' => 'url',
                            ),

                            array(
                                'key' => 'field_image',
                                'label' => 'Image',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'url',
                            ),

                        ),
                    ),

                ),
            ),

        ),

        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => 'ID_DE_TA_PAGE', // remplace par l'ID
                ),
            ),
        ),

    ));

endif;

add_image_size('sqaure-small', 400, 400, true );//nom /size/recadrage;
add_image_size('sqaure-medium', 800, 800, true );//nom /size/recadrage;
add_image_size('sqaure-large', 1200, 1200, true );//nom /size/recadrage;