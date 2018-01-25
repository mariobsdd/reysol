<?php
add_theme_support( 'post-thumbnails' );
add_action('wp_enqueue_scripts', 'get_the_scripts');
add_action('wp_enqueue_scripts', 'get_the_styles');
add_action('init','create_carta_post');
add_action('init','create_menuEventos_post');
show_admin_bar(false);
add_theme_support('menus');
register_nav_menu('header','Menú que aparece en la barra superior');
function get_the_styles(){
    $url = get_template_directory_uri();
    wp_enqueue_style('reset', $url.'/css/reset.css');
    wp_enqueue_style('style', $url.'/style.css');
    wp_enqueue_style('header', $url.'/css/header.css');
    if (is_home())
        wp_enqueue_style('home', $url.'/css/home.css');
    wp_enqueue_style('footer', $url.'/css/footer.css');
    if (is_page())
        wp_enqueue_style('page', $url.'/css/page.css');
    if (is_page('menu-a-la-carta') || is_page('eventos'))
        wp_enqueue_style('menus', $url.'/css/menus.css');
    wp_enqueue_style('slick', $url.'/css/slick.css');
}
function remove_images( $content ) {
   $postOutput = preg_replace('/<img[^>]+./','', $content);
   return $postOutput;
}
add_filter( 'the_content', 'remove_images', 10000 );
function get_the_scripts(){
    global $post;   
    $url =get_template_directory_uri();
    wp_register_script("indexScript",$url."/js/index.js");
    $trans = array(
        'ajaxUrl'=>get_bloginfo('wpurl').'/wp-admin/admin-ajax.php',
        'templateUrl'=>$url,
        'index'=>get_bloginfo('wpurl')
    );
    wp_localize_script('indexScript','url',$trans);
    wp_register_script("jquery",$url."/js/framework/jquery-3.2.1.min.js", array(), true);
    wp_enqueue_script("jquery");
    wp_enqueue_script('slick', $url.'/js/framework/slick.min.js', array(), true);
    wp_enqueue_script("indexScript");
   }
function create_carta_post() {
    $labels = array(
        'name' => 'Productos',
        'singular_name' => 'Producto',
        'add_new' => 'Agregar nuevo producto al menú',
        'add_new_item' => 'Agregar nuevo producto',
        'edit_item' => 'Editar producto',
        'new_item' => 'Nuevo producto',
        'all_items' => 'Todos los productos',
        'view_item' => 'Ver producto',
        'search_items' => 'Buscar todos los productos',
        'not_found' =>  'Producto no encontrado',
        'not_found_in_trash' => 'No hay productos en Papelera de Reciclaje',
        'parent_item_colon' => '',
        'menu_name' => 'Menú a la Carta',
        'supports' => 'custom-fields',  
    );

    register_post_type('carta', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'supports' => array('title', 'editor','page-attributes'),
        'rewrite' => array('slug' => 'productos'),
        'taxonomies' => array('category')
        )
    );
}
function create_menuEventos_post() {
    $labels = array(
        'name' => 'Menu',
        'singular_name' => 'Menú',
        'add_new' => 'Agregar nuevo menú a eventos',
        'add_new_item' => 'Agregar nuevo menú',
        'edit_item' => 'Editar menú',
        'new_item' => 'Nuevo menú',
        'all_items' => 'Todos los menús',
        'view_item' => 'Ver menú',
        'search_items' => 'Buscar todos los menús',
        'not_found' =>  'Menú no encontrado',
        'not_found_in_trash' => 'No hay menús en Papelera de Reciclaje',
        'parent_item_colon' => '',
        'menu_name' => 'Menús para Eventos',
        'supports' => 'custom-fields',  
    );

    register_post_type('menu', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'supports' => array('title', 'editor'),
        'rewrite' => array('slug' => 'menus'),
        )
    );
}
function edit_traduction_category_field( $term ){
    $term_id = $term->term_id;     
?>
    <tr class="form-field">
        <th scope="row">
            <label for="_traduction"><?php echo 'Ingrese la traducción en inglés:' ?></label>
            <td>
                <textarea name="_traduction" id="_traduction"><?php echo(get_term_meta($term_id,'_traduction',true));?>
                </textarea>                   
            </td>
        </th>
    </tr>
<?php
} 
add_action( 'category_edit_form_fields', 'edit_traduction_category_field' ); 
add_action( 'category_add_form_fields', 'add_english_description', 10, 2 );
function add_english_description($term) {
    global $post;
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    $traduction = get_term_meta($term->ID, '_traduction', true);
    echo '<div class="form-field term-description-traduction-wrap">';
    echo '<label for="_traduction">Ingrese la traducción de la descripción:</label>';
    echo '<textarea name="_traduction" id="_traduction" value="' . $traduction . '" class="widefat"></textarea></div>';
}
function edit_menu_order_category_field( $term ){
    $term_id = $term->term_id;     
    echo '<tr class="form-field">';
    echo '<th scope="row">';
    echo '<label for="_menuOrder"> Ingrese el orden de apariencia en "Menú a la Carta"</label>';
    echo '<td>';
    echo '<input type="number" step="1" min="1" name="_menuOrder" id="_menuOrder" value="'. get_term_meta($term_id,'_menuOrder',true) . '"/>';
    echo '</td>';
    echo '</th>';
    echo '</tr>';
} 
add_action( 'category_edit_form_fields', 'edit_menu_order_category_field' ); 
add_action( 'category_add_form_fields', 'add_menu_order', 10, 2 );
function add_menu_order($term) {
    global $post;
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    $menuOrder = get_term_meta($term->ID, '_menuOrder', true);
    echo '<div class="form-field term-menu-order-wrap">';
    echo '<label for="_menuOrder">Ingrese el orden de apariencia en "Menú a la Carta"</label>';
    echo '<input type="number" step="1" min="1" name="_menuOrder" id="_menuOrder" value="' . $menuOrder . '" class="widefat"/></div>';
}
function save_traduction_meta( $term_id ){ 
  
//    if ( isset( $_POST['_traduction'] ) ) {

        // Be careful with the intval here. If it's text you could use sanitize_text_field()
        $traduction = isset ( $_POST['_traduction'] ) ? sanitize_text_field($_POST['_traduction']) : '';
        $menuOrder = isset ( $_POST['_menuOrder'] ) ? intval($_POST['_menuOrder']) : '';
        // Save the option array.
        update_term_meta($term_id, '_traduction',$traduction);
        update_term_meta($term_id, '_menuOrder',$menuOrder);
 
  //  } 
} // save_tax_meta
add_action( 'create_category', 'save_traduction_meta', 10, 2 );    
add_action( 'edited_category', 'save_traduction_meta', 10, 2 );
add_action('add_meta_boxes', 'add_custom_post_types_metaboxes');
function add_custom_post_types_metaboxes() {
    //Menú a la carta
    add_meta_box('price_product', 'Precio del producto', 'product_price', 'carta', 'side', 'default');
    add_meta_box('translation_product', 'Traducción de la descripción del servicio', 'product_translation', 'carta', 'side', 'default');
    // Menú para eventos
    add_meta_box('price_menu', 'Precio del Menú', 'menu_price', 'menu', 'side', 'default');
}
function product_price(){
    global $post;
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'"/>';
    $priceproduct = get_post_meta($post->ID,'_priceproduct',true);
    echo '<p>Precio del producto (Q.): </p>';
    echo '<input type="text" name="_price" value="'.$priceproduct.'" class="widefat"/>';
}
function product_translation(){
    global $post;
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'"/>';
    $translationproduct = get_post_meta($post->ID,'_translationproduct',true);
    echo '<p>Traducción en inglés de la descripción del producto: </p>';
    echo '<input type="text" name="_translation" value="'.$translationproduct.'" class="widefat"/>';
}
function menu_price(){
    global $post;
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'"/>';
    $priceMenu = get_post_meta($post->ID,'_priceMenu',true);
    echo '<p>Precio del Menú (Q.): </p>';
    echo '<input type="text" name="_priceMenu" value="'.$priceMenu.'" class="widefat"/>';
}
add_action('save_post','save_metaboxes',1,2);
function save_metaboxes($post_id,$post){
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }

    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
    $events_meta['_priceproduct'] = floatval($_POST['_price']);
    $events_meta['_translationproduct'] = sanitize_text_field($_POST['_translation']);
    $events_meta['_priceMenu'] = floatval($_POST['_priceMenu']);
    foreach ($events_meta as $key => $value) { 
        if( $post->post_type == 'revision' ) return; 
        $value = implode(',', (array)$value); 
        if(get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else { 
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key);
    }
}

/*function headercarta($pages){
	$currentIsChild = false;
	$cartaHTML = "<ul>";
	foreach ($pages as $page) {
		$currentIsChild = $page->parent;
		if ($currentIsChild){
			$cartaHTML += "<a href='" + get_permalink($page->ID) + "'>"+ $page->post_title + "</a>"
		} else{
			$cartaHTML += "<li><a href='" + (has_children($page->ID) ? '' :get_permalink($page->ID)) + "' </li>"
		}
	}
}

function has_children($pageID) {
    $children = get_pages( array( 'child_of' => $pageID ) );
    return ($children) ? true : false;
}*/

function add_slug_body_class( $classes ) {
    global $post;
    if ( is_singular( 'page' ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );
?>