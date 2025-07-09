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

?>

<footer class="footer">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 justify-content-center">
        <?php the_custom_logo(); ?>
        <?php
          $contacts_args = array(
            'post_type'      => 'contact',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'meta_key'       => 'priority',
            'orderby'        => 'meta_value_num',
            'order'          => 'DESC',
          );
          $contacts_query = new WP_Query($contacts_args);
        ?>

        <ul class="list-unstyled">
          <?php if ($contacts_query->have_posts()) : ?>
              <?php while ($contacts_query->have_posts()) : $contacts_query->the_post(); ?>
                <?php
                  $icon = get_field('icon'); 
                  $link = get_field('link'); 
                ?>
                <li>
                  <a href="<?= esc_url($link['url']); ?>" target="<?= esc_url($link['target']); ?>" rel="noopener noreferrer">
                    <i class="<?= esc_attr($icon); ?>"></i>
                    <?= esc_html($link['title']); ?>
                  </a>
                </li>
              <?php endwhile; wp_reset_postdata(); ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</footer>

</div><!-- #page -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<?php wp_footer(); ?>

</body>

</html>

