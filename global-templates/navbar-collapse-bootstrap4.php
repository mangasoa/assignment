<?php
/**
 * Header Navbar (bootstrap4)
 *
 * @package Understrap
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-md bg-light" aria-labelledby="main-nav-label">
	<h2 id="main-nav-label" class="screen-reader-text" >
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>
  <h2 id="main-nav-label" class="screen-reader-text" >
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


<?php if ( 'container' === $container ) : ?>
	<div class="container-fluid">
<?php endif; ?>

		<!-- Your site title as branding in the menu -->
		<?php if ( ! has_custom_logo() ) { ?>

    <h1 class="navbar-brand" href="#"><a rel="home" style="color: #5533FF; font-weight: 700;" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">MORNET</a></h1>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
      <span class="navbar-toggler-icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
<g><path d="M10,180.9c0,37.8,30.6,68.4,68.4,68.4c37.8,0,68.4-30.6,68.4-68.4c0-37.8-30.6-68.4-68.4-68.4C40.6,112.6,10,143.2,10,180.9z"/><path d="M10,500c0,37.8,30.6,68.4,68.4,68.4c37.8,0,68.4-30.6,68.4-68.4c0-37.8-30.6-68.4-68.4-68.4C40.6,431.6,10,462.2,10,500L10,500z"/><path d="M10,819.1c0,37.8,30.6,68.4,68.4,68.4c37.8,0,68.4-30.6,68.4-68.4s-30.6-68.4-68.4-68.4C40.6,750.7,10,781.3,10,819.1z"/><path d="M944.4,226.5H329.1c-25.1,0-45.6-20.5-45.6-45.6l0,0c0-25.1,20.5-45.6,45.6-45.6h615.3c25.1,0,45.6,20.5,45.6,45.6l0,0C990,206,969.5,226.5,944.4,226.5z"/><path d="M944.4,545.6H329.1c-25.1,0-45.6-20.5-45.6-45.6l0,0c0-25.1,20.5-45.6,45.6-45.6h615.3c25.1,0,45.6,20.5,45.6,45.6l0,0C990,525.1,969.5,545.6,944.4,545.6z"/><path d="M944.4,864.7H329.1c-25.1,0-45.6-20.5-45.6-45.6l0,0c0-25.1,20.5-45.6,45.6-45.6h615.3c25.1,0,45.6,20.5,45.6,45.6l0,0C990,844.1,969.5,864.7,944.4,864.7z"/></g>
</svg>
</span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    	
    		<form class="form-inline d-flex my-2 my-lg-0">
				<div class="search" >
					<i class="bi bi-search"></i>
				<input class="form-control mr-sm-3 search-box " type="search" placeholder="Search something here" aria-label="Search">
			</div>
			</form>
      <ul class="navbar-nav ">
        
          <?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ml-auto ',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>
        
      </ul>
      
    </div>
    	<?php
		} else {
			the_custom_logo();
		}
		?>
  <?php if ( 'container' === $container ) : ?>
	</div><!-- .container -->
<?php endif; ?>
</nav><!-- .site-navigation -->
