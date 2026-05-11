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

// 🔹 MENUS (corrigé + propre)
function plai_register_menus() {
    register_nav_menus([
        'header'        => 'Menu principal',
        'footer'        => 'Menu footer',
        'social-media'  => 'Réseaux sociaux',
        'utils'         => 'Liens utiles',
        'navigation__private' => 'Menu navigation privée', // 🔥 ton menu ici
    ]);
}
add_action('after_setup_theme', 'plai_register_menus');

// 🔥 DÉCLARATION DES MENUS (CORRIGÉE)

// Déclaration des menus dans wordpress
register_nav_menu('header', 'Menu principal');
register_nav_menu('footer', 'Le menu de navigation de fin de page');
register_nav_menu('social-media', 'Le menu de navigation pour les réseaux sociaux');
register_nav_menu('utils', 'Le menu de navigation pour les ressources utiles');


//resources
// CPT Ressources
function create_cpt_ressources() {
    register_post_type('ressource',
        array(
            'labels' => array(
                'name' => 'Ressources',
                'singular_name' => 'Ressource',
                'add_new_item' => 'Ajouter une ressource',
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-book',
            'supports' => array('title'),
        )
    );
}
add_action('init', 'create_cpt_ressources');


// Taxonomie Type de ressource
function create_taxonomie_type_ressource() {
    register_taxonomy(
        'type_ressource',
        'ressource',
        array(
            'label' => 'Types de ressources',
            'hierarchical' => true,
            'rewrite' => array('slug' => 'type-ressource'),
        )
    );
}
add_action('init', 'create_taxonomie_type_ressource');


//resources
// CPT ia
function create_cpt_ia() {
    register_post_type('ia',
        array(
            'labels' => array(
                'name' => 'ia',
                'singular_name' => 'ia',
                'add_new_item' => 'Ajouter une ia',
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-book',
            'supports' => array('title'),
        )
    );
}
add_action('init', 'create_cpt_ia');


// Taxonomie Type de ia
function create_taxonomie_type_ia() {
    register_taxonomy(
        'type_ia',
        'ia',
        array(
            'label' => 'Types de ia',
            'hierarchical' => true,
            'rewrite' => array('slug' => 'type-ia'),
        )
    );
}
add_action('init', 'create_taxonomie_type_ia');

//resources text
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title' => 'Options Ressources',
        'menu_title' => 'Ressources Intro',
        'menu_slug'  => 'ressources-intro',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}

function dw_get_navigation_links(string $location): array
{
    //recupérer l'objet W pour le menu
    // Récupérer l'objet W¨pour le menu
    $locations = get_nav_menu_locations();
    if (!isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[ $location ];
    $nav =  wp_get_nav_menu_items( $nav_id );//retour les parametre du menu
    //Transformer le menu en tableaux de lien, chaque lien va être un objet personalisé

    // 🔥 CORRECTION : Vérifier que $nav est un tableau avant de boucler
    if (!$nav || !is_array($nav)) {
        return [];
    }

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


function create_documents_cpt() {

    register_post_type('documents',
        array(
            'labels' => array(
                'name' => __('Documents'),
                'singular_name' => __('Document')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'documents'),
            'menu_icon' => 'dashicons-media-document',
            'supports' => array('title', 'editor'),
        )
    );

    // Taxonomie (catégories)
    register_taxonomy('categorie_document', 'documents', array(
        'label' => 'Catégories',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'categorie-document'),
    ));
}

add_action('init', 'create_documents_cpt');


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

if( function_exists('acf_add_options_page') ) {

    // Page parente
    $parent = acf_add_options_page([
        'page_title' => 'Options du thème',
        'menu_title' => 'Options',
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-admin-settings', // Icône dans le menu
        'position'   => 58 // Position dans le menu admin
    ]);

    // Sous-page Header
    acf_add_options_page([
        'page_title'  => 'Header',
        'menu_title'  => 'Header',
        'menu_slug'   => 'header-settings',
        'parent_slug' => $parent['menu_slug'], // Rattachement au parent
        'capability'  => 'edit_posts',
        'redirect'    => false
    ]);

    // Sous-page Footer
    acf_add_options_page([
        'page_title'  => 'Footer',
        'menu_title'  => 'Footer',
        'menu_slug'   => 'footer-settings',
        'parent_slug' => $parent['menu_slug'],
        'capability'  => 'edit_posts',
        'redirect'    => false
    ]);
}



add_image_size('sqaure-small', 400, 400, true );//nom /size/recadrage;
add_image_size('sqaure-medium', 800, 800, true );//nom /size/recadrage;
add_image_size('sqaure-large', 1200, 1200, true );//nom /size/recadrage;