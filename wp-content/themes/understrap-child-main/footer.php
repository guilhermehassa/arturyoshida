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
        <ul class="list-unstyled">
          <li>
            <a href="" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-whatsapp"></i>
              (13) 99722-4404
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/arturyoshida/" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-linkedin"></i>
              /artur-yoshida-327915287
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/arturyoshida/" target="_blank" rel="noopener noreferrer">
              <i class="fa-brands fa-instagram"></i>
              _arturyoshida
            </a>
          </li>
          <li>
            <a href="mailto:contato@arturyoshida.adv.br" target="_blank" rel="noopener noreferrer">
              <i class="fa-solid fa-envelope"></i>
              contato@arturyoshida.adv.br
            </a>
          </li>	
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

