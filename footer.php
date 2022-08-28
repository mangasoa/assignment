<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
<div class="container-fluid bg-light">
<div class="container ">
  <footer class="row  py-5 my-5 border-top footer ">
    <div style="max-width: 289px;">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <h2>MORNET</h2>
      </a>
      <p class="text-muted">Our vision is to product convenience and help increase your sales business.</p>
    </div>
    
    <div class="column-1 ">
      <h5>About</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">How it works</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Featured</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Partnershop</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Business Relation</a></li>
      </ul>
    </div>

    <div class="column-1">
      <h5>Community</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Events</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Blog</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Podcast</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Invite a friend</a></li>
      </ul>
    </div>

    <div class="column-1" style="padding-right: 19vh !important;">
      <h5>Socials</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Discord</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Instagram</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Twitter</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Facebook</a></li>
      </ul>
    </div>
  </footer>
</div>
</div>
<!-- #page we need this extra closing tag here -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
 <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<?php wp_footer(); ?>

</body>

</html>

