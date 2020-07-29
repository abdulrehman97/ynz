<?php
/**
 * 404.php
 * @package WordPress
 * @subpackage Groci
 * @since Groci 1.0
 */
?>

<?php get_header(); ?>

      <section class="not-found-page section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                  <h1><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/404.png" alt="404"></h1>
                  <h1><?php esc_html_e('Sorry! Page not found.','groci'); ?></h1>
                  <p class="land"><?php esc_html_e('Unfortunately the page you are looking for has been moved or deleted.','groci'); ?></p>
                  <div class="mt-5">
                     <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-success btn-lg"><i class="mdi mdi-home"></i> <?php esc_html_e('GO TO HOME PAGE','groci'); ?></a>
                  </div>
               </div>
            </div>
         </div>
      </section>

<?php get_footer(); ?>