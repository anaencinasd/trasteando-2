<?php
add_action( 'wp_enqueue_scripts', 'my_enqueue_assets' );
function my_enqueue_assets() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
require 'vendor/autoload.php';

// Permitir a editores administrar formularios Gravity Forms
function add_grav_forms(){
    $role = get_role('editor');
    $role->add_cap('gform_full_access');
}
add_action('admin_init','add_grav_forms');

// Estilos por defecto Gravity Forms
add_filter( 'gform_default_styles', function( $styles ) {     
    return '{"theme":"orbital","inputPrimaryColor":"#4a8b2c","inputSize":"md","inputBorderRadius":"10","inputBorderColor":"#b8c865","inputBackgroundColor":"#fff","inputColor":"#000000","inputPrimaryColor":"#4a8b2c","labelFontSize":"16","labelColor":"#000000","descriptionColor":"#666666","buttonPrimaryBackgroundColor":"#4a8b2c","buttonPrimaryColor":"#fff"}';
} );

/** Agregar estilo a la caja de ACF en la administracion */
function my_acf_admin_head() {
    ?>
    <style type="text/css">
        .acf-fields > .acf-field {
          background-color: #74A04026;
        }
        .edit-post-meta-boxes-area .postbox-header {
          background-color: #b7c865a3;
        }
        #editor .postbox > .postbox-header:hover {
          background: #b8c865 !important;
        }
        .postbox-header {
          background-color: #b7c865a3;
        }
    </style>
    <?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');

// Cambiar slug de proyectos  */
function et_projects_custom_slug( $slug ) {
    $slug = array( 'slug' => 'proyecto' );
    return $slug;
}
add_filter( 'et_project_posttype_rewrite_args', 'et_projects_custom_slug', 10, 2 );

/// CONVOCATORIAS
/* Shortcode ACF documentos de convocatoria by sinsistema */
function documentacion_convocatoria_shortcode_plates() {
  $templates = new League\Plates\Engine(get_stylesheet_directory().'/templates');
  $documentos = get_field('conv_documentos');
  return $templates->render('documentacion-conv', ['documentos' => $documentos]); 
}
  // register shortcode
  add_shortcode('documentacion', 'documentacion_convocatoria_shortcode_plates');
  
/// PROYECTOS
/* Shortcode ACF recursos de proyecto */
function recursos_proyecto_shortcode_plates(){
    $templates = new League\Plates\Engine(get_stylesheet_directory().'/templates');
    $recursos = get_field('proy_recursos');
    return $templates->render('recursos-proyecto', ['recursos' => $recursos]); 
}
add_shortcode('recursos-proyecto', 'recursos_proyecto_shortcode_plates');

/* Shortcode ACF Actuaciones/eventos relacionados a proyecto  */
function eventos_relacionados_shortcode_plates() 
{
    $templates = new League\Plates\Engine(get_stylesheet_directory().'/templates');
    $rows = get_field('proy_actuaciones');
    return $templates->render('eventos_relacionados', ['events' => $rows]);   
}
add_shortcode('eventos-relacionados', 'eventos_relacionados_shortcode_plates');

/* Shortcode ACF Noticias relacionadas a proyecto  */
function noticias_proyecto_shortcode_plates() 
{
    $templates = new League\Plates\Engine(get_stylesheet_directory().'/templates');
    $rows = get_field('noticias_relacionadas');
    return $templates->render('noticias_relacionadas', ['post' => $rows]);   
}
add_shortcode('noticias-relacionadas', 'noticias_proyecto_shortcode_plates');

/// AGENDA-ACTUACIONES
/* Shortcode ACF proyectos relacionados - eventos by sinsistema */function proyectos_relacionados_shortcode_plates() 
{
    $templates = new League\Plates\Engine(get_stylesheet_directory().'/templates');
    $rows = get_field('proyectos_relacionados');
    //var_dump($rows);
    return $templates->render('proyectos_relacionados', ['projects' => $rows]);   
}
add_shortcode('proyectos-relacionados', 'proyectos_relacionados_shortcode_plates');