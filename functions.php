<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}







/*
* Creating a function to create our CPT
* we need to define what things our custom post should support, in support attribute 
* i've added thumbnail support and other supports as well
*/
  
function custom_post_type() {
  
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Cars', 'Post Type General Name', 'assignment' ),
			'singular_name'       => _x( 'Car', 'Post Type Singular Name', 'assignment' ),
			'menu_name'           => __( 'Cars', 'assignment' ),
			'parent_item_colon'   => __( 'Parent Car', 'assignment' ),
			'all_items'           => __( 'All Cars', 'assignment' ),
			'view_item'           => __( 'View Car', 'assignment' ),
			'add_new_item'        => __( 'Add New Cars', 'assignment' ),
			'add_new'             => __( 'Add New', 'assignment' ),
			'edit_item'           => __( 'Edit Car', 'assignment' ),
			'update_item'         => __( 'Update Car', 'assignment' ),
			'search_items'        => __( 'Search Car', 'assignment' ),
			'not_found'           => __( 'Not Found', 'assignment' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'assignment' ),
		);
		  
	// Set other options for Custom Post Type
	//here in this array you can see supports attribute and taxonomies attribute where we allow post to show these things
	$args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cars' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'taxonomies'         => array('category'),
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
		  
		// Registering your Custom Post Type
		register_post_type( 'cars', $args );
	  
	}
	  
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	  
	add_action( 'init', 'custom_post_type', 10 );





	function custom_meta_boxes( $post ) {

		add_meta_box('cars_additional_meta', 'Car Additional Information', 'cars_additional_meta_callback', 'cars' );

		function cars_additional_meta_callback( $post ) {

			$rent_per_day = get_post_meta( get_the_ID(), 'rent_per_day', true ) ?: '';
			// var_dump($rent_per_day); die;

			?>
			<div>
				<label for="rent_per_day"></label>
				<p>Rent per day</p>
				<input type="tel" name="rent_per_day" id="rent_per_day" value="<?php echo $rent_per_day; ?>">
			</div>
			<?php

		}

	}
	add_action( 'add_meta_boxes', 'custom_meta_boxes' );



	function custom_meta_boxes_save( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}

		update_post_meta( $post_id, "rent_per_day", sanitize_text_field( $_POST["rent_per_day"] ) );


	};
	add_action( 'save_post', 'custom_meta_boxes_save' );


function fn_nav_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Header Menu', 'text-domain' ),
      'footer' => __( 'Footer Menu', 'text-domain' )
     )
   );
 }
 add_action( 'init', 'fn_nav_menus' );


function Understrap_theme_styles() {
	wp_enqueue_style('style', get_stylesheet_uri());

	wp_enqueue_style('swiper-bundle', get_template_directory_uri().'css/theme-bootstrap4.min.css');
}
add_action('wp_enqueue_scripts','Understrap_theme_styles');
/**
 * Generated by the WordPress Meta Box Generator
 * https://jeremyhixon.com/tool/wordpress-meta-box-generator/
 * 
 * Retrieving the values:
 * Petrol Tank Capacity(L) = get_post_meta( get_the_ID(), 'cars_custom_fields_petrol-tank-capacityl', true )
 * Manual or Automatic = get_post_meta( get_the_ID(), 'cars_custom_fields_manual-or-automatic', true )
 * People Capacity = get_post_meta( get_the_ID(), 'cars_custom_fields_people-capacity', true )
 */
class Cars_Custom_Fields {
	private $config = '{"title":"cars custom fields","prefix":"cars_custom_fields_","domain":"cars-custom-fields","class_name":"Cars_Custom_Fields","post-type":["post"],"context":"normal","priority":"high","cpt":"cars","fields":[{"type":"number","label":"Petrol Tank Capacity(L)","id":"cars_custom_fields_petrol-tank-capacityl"},{"type":"select","label":"Manual or Automatic","options":"Manual\r\nAutomatic","id":"cars_custom_fields_manual-or-automatic"},{"type":"number","label":"People Capacity","id":"cars_custom_fields_people-capacity"}]}';

	public function __construct() {
		$this->config = json_decode( $this->config, true );
		$this->process_cpts();
		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		add_action( 'save_post', [ $this, 'save_post' ] );
	}

	public function process_cpts() {
		if ( !empty( $this->config['cpt'] ) ) {
			if ( empty( $this->config['post-type'] ) ) {
				$this->config['post-type'] = [];
			}
			$parts = explode( ',', $this->config['cpt'] );
			$parts = array_map( 'trim', $parts );
			$this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
		}
	}

	public function add_meta_boxes() {
		foreach ( $this->config['post-type'] as $screen ) {
			add_meta_box(
				sanitize_title( $this->config['title'] ),
				$this->config['title'],
				[ $this, 'add_meta_box_callback' ],
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				default:
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
			}
		}
	}

	public function add_meta_box_callback() {
		$this->fields_table();
	}

	private function fields_table() {
		?><table class="form-table" role="presentation">
			<tbody><?php
				foreach ( $this->config['fields'] as $field ) {
					?><tr>
						<th scope="row"><?php $this->label( $field ); ?></th>
						<td><?php $this->field( $field ); ?></td>
					</tr><?php
				}
			?></tbody>
		</table><?php
	}

	private function label( $field ) {
		switch ( $field['type'] ) {
			default:
				printf(
					'<label class="" for="%s">%s</label>',
					$field['id'], $field['label']
				);
		}
	}

	private function field( $field ) {
		switch ( $field['type'] ) {
			case 'number':
				$this->input_minmax( $field );
				break;
			case 'select':
				$this->select( $field );
				break;
			default:
				$this->input( $field );
		}
	}

	private function input( $field ) {
		printf(
			'<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
			isset( $field['class'] ) ? $field['class'] : '',
			$field['id'], $field['id'],
			isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function input_minmax( $field ) {
		printf(
			'<input class="regular-text" id="%s" %s %s name="%s" %s type="%s" value="%s">',
			$field['id'],
			isset( $field['max'] ) ? "max='{$field['max']}'" : '',
			isset( $field['min'] ) ? "min='{$field['min']}'" : '',
			$field['id'],
			isset( $field['step'] ) ? "step='{$field['step']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function select( $field ) {
		printf(
			'<select id="%s" name="%s">%s</select>',
			$field['id'], $field['id'],
			$this->select_options( $field )
		);
	}

	private function select_selected( $field, $current ) {
		$value = $this->value( $field );
		if ( $value === $current ) {
			return 'selected';
		}
		return '';
	}

	private function select_options( $field ) {
		$output = [];
		$options = explode( "\r\n", $field['options'] );
		$i = 0;
		foreach ( $options as $option ) {
			$pair = explode( ':', $option );
			$pair = array_map( 'trim', $pair );
			$output[] = sprintf(
				'<option %s value="%s"> %s</option>',
				$this->select_selected( $field, $pair[0] ),
				$pair[0], $pair[0]
			);
			$i++;
		}
		return implode( '<br>', $output );
	}

	private function value( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
		} else if ( isset( $field['default'] ) ) {
			$value = $field['default'];
		} else {
			return '';
		}
		return str_replace( '\u0027', "'", $value );
	}

}
new Cars_Custom_Fields;

?>
<?php
add_action( 'wp_footer', 'my_action_javascript' ); // Write our JS below here

function my_action_javascript() { ?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
		var page =2;
jquery(#load_more).click(function(){
            
        var ajaxurl = <?php echo admin_url(admin-ajax.php) ?>;
		var data = {
			'action': 'my_action',
			'page': page
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
                 //jquery(#post).append(response);
			console.log(page++);
		});
	});});
	</script> <?php
}

 

add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {


	wp_die(); // this is required to terminate immediately and return a proper response
}