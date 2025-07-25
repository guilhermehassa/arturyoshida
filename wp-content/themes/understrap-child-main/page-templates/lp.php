<?php
/**
 * Template Name: LP Artur Yoshida
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="wrapper" id="page-wrapper">
  <?php $hero = get_field('hero'); ?> 
  <section class="hero" style="background-image: url('<?= $hero['background']['url']; ?>');">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-11 col-lg-10">
          <h1 class="h2">
            <?= $hero['title']; ?>
          </h1>
          <?php if($hero['button']) : ?>
            <a href="<?= $hero['button']['url']; ?>" class="defaultButton" target="<?= $hero['button']['target']; ?>">
              <?= $hero['button']['title']; ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <?php $sobre = get_field('sobre'); ?>
  <section class="about" id="sobremim">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 col-lg-3 about_title">
          <h2 class="h1"><?= $sobre['title']; ?></h2>
          <img src="<?= $sobre['image']['url'] ?>" alt="<?= $sobre['image']['alt'] ?>">
        </div>
        <div class="col-12 col-lg-8 offset-lg-1 about_text">
          <?= $sobre['content']; ?>
        </div>
      </div>
    </div>
  </section>

  <?php $break = get_field('break'); ?>
  <?php if($break) : ?>
    <section class="break">
      <div class="container">
        <div class="row justify-content-center justify-content-lg-start">
          <div class="col-10 col-lg-8">
            <?= $break  ?>          
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php
    // Busca os CPTs de slug 'area-de-atuacao'
    $args = array(
      'post_type'      => 'area-de-atuacao',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    );
    $expertises_query = new WP_Query($args);
  ?>

  <?php if ($expertises_query->have_posts()) : ?>
    <section class="expertises" id="areasdeatuacao">
      <div class="container">
        <div class="row justify-content-center justify-content-lg-between">
          <div class="col-12 mb-4 mg-lg-5">
            <h2 class="h1 text-center">Áreas de Atuação</h2>
          </div>
          <?php while ($expertises_query->have_posts()) : $expertises_query->the_post(); ?>
            <?php $icon = get_field('icone'); ?>
            <div class="col-10 col-lg-6 expertises_card">
              <div class="expertises_card__title">
                <i class="fa-solid fa-<?= $icon; ?>"></i>
                <h3 class="h5"><?php the_title(); ?></h3>
              </div>
              <div class="expertises_card__content">
                <?php the_content(); ?>
              </div>
              <a href="#vamosconversar" class="defaultButton">
                FALAR SOBRE ESTE ASSUNTO
              </a>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
    // Busca os CPTs de slug 'relato'
    $relatos_args = array(
      'post_type'      => 'relato',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    );
    $relatos_query = new WP_Query($relatos_args);
  ?>
  
  <?php if ($relatos_query->have_posts()) : ?>
    <?php $testimonials = get_field('testimonials'); ?>
    <section class="testimonials" id="relatosdeclientes">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-3 mb-lg-5">
            <h2 class="h1"><?= $testimonials['title'] ?></h2>
          </div>
          <div class="col-12">
            <div class="swiper testimonials_swiper">
              <div class="swiper-wrapper">
                <?php while ($relatos_query->have_posts()) : $relatos_query->the_post(); ?>
                  <div class="swiper-slide item">
                    <?= esc_html(get_the_content()); ?>
                    <div class="item_title">
                      <h3 class="h6"><?= esc_html(get_the_title()); ?></h3>
                      <svg width="94" height="17" viewBox="0 0 94 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.875 0.5625L11.9062 4.71875L16.375 5.375C16.75 5.4375 17.0625 5.6875 17.1875 6.0625C17.3125 6.40625 17.2188 6.8125 16.9375 7.0625L13.6875 10.2812L14.4688 14.8438C14.5312 15.2188 14.375 15.5938 14.0625 15.8125C13.75 16.0625 13.3438 16.0625 13 15.9062L9 13.75L4.96875 15.9062C4.65625 16.0625 4.25 16.0625 3.9375 15.8125C3.625 15.5938 3.46875 15.2188 3.53125 14.8438L4.28125 10.2812L1.03125 7.0625C0.78125 6.8125 0.6875 6.40625 0.78125 6.0625C0.90625 5.6875 1.21875 5.4375 1.59375 5.375L6.09375 4.71875L8.09375 0.5625C8.25 0.21875 8.59375 0 9 0C9.375 0 9.71875 0.21875 9.875 0.5625ZM28.875 0.5625L30.9062 4.71875L35.375 5.375C35.75 5.4375 36.0625 5.6875 36.1875 6.0625C36.3125 6.40625 36.2188 6.8125 35.9375 7.0625L32.6875 10.2812L33.4688 14.8438C33.5312 15.2188 33.375 15.5938 33.0625 15.8125C32.75 16.0625 32.3438 16.0625 32 15.9062L28 13.75L23.9688 15.9062C23.6562 16.0625 23.25 16.0625 22.9375 15.8125C22.625 15.5938 22.4688 15.2188 22.5312 14.8438L23.2812 10.2812L20.0312 7.0625C19.7812 6.8125 19.6875 6.40625 19.7812 6.0625C19.9062 5.6875 20.2188 5.4375 20.5938 5.375L25.0938 4.71875L27.0938 0.5625C27.25 0.21875 27.5938 0 28 0C28.375 0 28.7188 0.21875 28.875 0.5625ZM47.875 0.5625L49.9062 4.71875L54.375 5.375C54.75 5.4375 55.0625 5.6875 55.1875 6.0625C55.3125 6.40625 55.2188 6.8125 54.9375 7.0625L51.6875 10.2812L52.4688 14.8438C52.5312 15.2188 52.375 15.5938 52.0625 15.8125C51.75 16.0625 51.3438 16.0625 51 15.9062L47 13.75L42.9688 15.9062C42.6562 16.0625 42.25 16.0625 41.9375 15.8125C41.625 15.5938 41.4688 15.2188 41.5312 14.8438L42.2812 10.2812L39.0312 7.0625C38.7812 6.8125 38.6875 6.40625 38.7812 6.0625C38.9062 5.6875 39.2188 5.4375 39.5938 5.375L44.0938 4.71875L46.0938 0.5625C46.25 0.21875 46.5938 0 47 0C47.375 0 47.7188 0.21875 47.875 0.5625ZM66.875 0.5625L68.9062 4.71875L73.375 5.375C73.75 5.4375 74.0625 5.6875 74.1875 6.0625C74.3125 6.40625 74.2188 6.8125 73.9375 7.0625L70.6875 10.2812L71.4688 14.8438C71.5312 15.2188 71.375 15.5938 71.0625 15.8125C70.75 16.0625 70.3438 16.0625 70 15.9062L66 13.75L61.9688 15.9062C61.6562 16.0625 61.25 16.0625 60.9375 15.8125C60.625 15.5938 60.4688 15.2188 60.5312 14.8438L61.2812 10.2812L58.0312 7.0625C57.7812 6.8125 57.6875 6.40625 57.7812 6.0625C57.9062 5.6875 58.2188 5.4375 58.5938 5.375L63.0938 4.71875L65.0938 0.5625C65.25 0.21875 65.5938 0 66 0C66.375 0 66.7188 0.21875 66.875 0.5625ZM85.875 0.5625L87.9062 4.71875L92.375 5.375C92.75 5.4375 93.0625 5.6875 93.1875 6.0625C93.3125 6.40625 93.2188 6.8125 92.9375 7.0625L89.6875 10.2812L90.4688 14.8438C90.5312 15.2188 90.375 15.5938 90.0625 15.8125C89.75 16.0625 89.3438 16.0625 89 15.9062L85 13.75L80.9688 15.9062C80.6562 16.0625 80.25 16.0625 79.9375 15.8125C79.625 15.5938 79.4688 15.2188 79.5312 14.8438L80.2812 10.2812L77.0312 7.0625C76.7812 6.8125 76.6875 6.40625 76.7812 6.0625C76.9062 5.6875 77.2188 5.4375 77.5938 5.375L82.0938 4.71875L84.0938 0.5625C84.25 0.21875 84.5938 0 85 0C85.375 0 85.7188 0.21875 85.875 0.5625Z" fill="#D7AD23"/>
                      </svg>

                    </div>
                  </div>
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php $contact = get_field('contact'); ?>
  <section class="contact" id="vamosconversar">
    <div class="container">
      <div class="row justify-content-center" id="vamosconversar">
        <div class="col-10 col-lg-4 contact_title">
          <h2 class="h1"><?= $contact['title']; ?></h2>
          <svg width="272" height="272" viewBox="0 0 272 272" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_135_492)">
            <path d="M272 136C272 175.691 254.995 211.413 227.872 236.274C223.128 240.627 218.072 244.646 212.742 248.293C209.565 250.471 206.292 252.513 202.927 254.413C199.387 256.423 195.748 258.275 192.018 259.963C191.787 260.069 191.557 260.172 191.323 260.274C185.539 262.855 179.538 265.041 173.362 266.802C171.708 267.274 170.042 267.717 168.362 268.123C160.901 269.946 153.199 271.154 145.313 271.685C142.234 271.894 139.13 272 136 272C125.073 272 114.449 270.711 104.268 268.277C103.203 268.024 102.137 267.757 101.083 267.471C100.029 267.197 98.978 266.904 97.9345 266.6C92.8972 265.136 87.9809 263.386 83.2035 261.372C34.3167 240.758 0 192.384 0 136C0 60.8907 60.8907 0 136 0C211.109 0 272 60.8907 272 136Z" fill="#F2F2F2"/>
            <path d="M168.362 220.371V268.123C160.901 269.946 153.199 271.154 145.313 271.685C142.234 271.894 139.13 272 136 272C125.073 272 114.449 270.711 104.268 268.277C103.203 268.024 102.137 267.757 101.083 267.471C100.029 267.197 98.978 266.904 97.9344 266.6V220.371H168.362Z" fill="#090814"/>
            <path d="M98.2971 136.835L78.6777 191.428L59.0586 186.916L83.2648 131.469C81.4687 127.825 81.1637 123.112 82.8011 118.525C85.666 110.5 93.3726 105.916 100.014 108.287C106.656 110.658 109.718 119.086 106.853 127.111C105.215 131.698 101.995 135.152 98.2971 136.835Z" fill="#ED9DA0"/>
            <path d="M99.6032 138.062C99.4232 138.062 99.2414 138.042 99.062 138C98.3641 137.836 97.7851 137.372 97.4742 136.726L91.3945 124.106C91.0446 123.38 91.0877 122.536 91.5093 121.849L105.426 99.1495C105.803 98.5353 106.43 98.1316 107.145 98.0419L109.652 97.7286C110.619 97.6108 111.581 98.1083 112.035 98.9749L117.561 109.524C117.95 110.268 117.913 111.171 117.464 111.881L101.593 136.964C101.447 137.195 101.264 137.397 101.05 137.564C100.63 137.891 100.122 138.062 99.6032 138.062Z" fill="black"/>
            <path d="M100.171 133.132C100.098 133.132 100.024 133.127 99.9501 133.118C99.2659 133.037 98.69 132.586 98.4478 131.94L95.3811 123.772C95.1807 123.238 95.2363 122.653 95.5336 122.167L107.734 102.222C108.066 101.68 108.642 101.352 109.277 101.343C109.939 101.351 110.498 101.649 110.845 102.183L115.707 109.697C116.109 110.318 116.1 111.116 115.685 111.728L101.687 132.327C101.342 132.836 100.775 133.132 100.171 133.132Z" fill="#0097B2"/>
            <path d="M158.922 100.044C159.648 84.4523 147.598 71.2243 132.007 70.498C116.415 69.7717 103.187 81.8222 102.461 97.4136C101.872 110.058 109.687 121.147 120.979 125.275L124.756 161.596L153.657 139.708C153.657 139.708 148.004 131.772 145.183 122.99C153.036 118.289 158.464 109.872 158.922 100.044Z" fill="#ED9DA0"/>
            <path d="M102.778 252.89L99.7725 249.424L105.447 220.371L108.214 206.2L108.771 203.337L119.984 145.928L121.207 137.969L122.265 137.625L122.4 137.581L147.36 129.429L147.7 129.315L151.214 128.169L160.707 135.824L173.362 266.802C171.708 267.274 170.042 267.717 168.362 268.123C160.901 269.946 153.199 271.154 145.313 271.685C142.235 271.894 139.13 272 136 272C125.073 272 114.449 270.711 104.268 268.277C100.259 261.655 107.735 258.609 107.735 258.609L102.778 252.89Z" fill="#0097B2"/>
            <path d="M123.352 144.398L123.081 145.489L108.771 203.337L108.346 205.061L108.214 206.2L106.563 220.371L102.778 252.89L101.083 267.471C100.029 267.197 98.9781 266.904 97.9345 266.6C92.8973 265.136 87.9809 263.386 83.2036 261.372C84.1041 239.755 90.7816 208.012 90.8913 207.481C86.5899 215.44 55.9851 224.01 55.9851 224.01L43.7399 215.458V191.553L55.3737 175.628L67.6229 155.421C68.4026 152.891 69.567 151.09 70.9909 149.834C72.5139 148.483 74.3332 147.762 76.292 147.44C82.3213 146.451 89.6758 149.259 93.7907 149.373C94.9547 149.409 95.8628 149.226 96.4044 148.685C96.679 148.41 96.9828 148.147 97.3125 147.894C101.398 144.746 109.265 143.171 109.265 143.171L121.818 133.412L121.851 133.639L122.4 137.581L123.352 144.398Z" fill="#090814"/>
            <path d="M141.406 80.1726C138.141 81.5315 134.183 81.0671 131.322 78.9892C124.317 82.7719 115.892 83.8441 108.163 81.9364C107.012 84.9934 104.692 87.5936 101.785 89.0846C101.671 84.8525 103.122 80.5957 105.798 77.3151C103.369 78.4069 100.939 79.4987 98.5101 80.5905C100.324 77.9705 102.138 75.3505 103.952 72.7305L104.365 72.373C102.173 71.773 99.9805 71.173 97.7881 70.5731C101.934 68.4362 106.757 67.6384 111.37 68.3265C110.561 66.4177 108.729 64.9797 106.683 64.6474C111.521 63.6232 116.36 62.5991 121.198 61.5749L121.033 62.1706C127.523 60.708 134.201 59.2375 140.774 60.2671C147.347 61.2967 153.88 65.4227 155.746 71.8085L155.777 71.4659C159.718 71.5522 163.57 73.5743 165.88 76.7685C168.189 79.9627 168.902 84.255 167.749 88.0243C166.366 92.5455 162.488 96.3916 162.691 101.115L162.513 101.152C163.797 108.366 151.178 118.922 145.09 123C147.67 121.797 150.72 117.177 149.99 114.426C149.259 111.675 155.888 101.332 153.052 101.566C151.459 101.697 142.816 99.2838 141.626 95.8331C140.623 92.9258 139.612 89.7833 140.491 86.8363C140.838 85.6736 141.466 84.6083 141.792 83.4397C142.118 82.2711 142.079 80.8838 141.241 80.0065L141.406 80.1726Z" fill="#090814"/>
            <path d="M86.1512 188.713L97.9358 145.623C97.9358 145.623 85.2407 154.196 77.5132 138.886L55.9867 175.018L86.1512 188.713Z" fill="#090814"/>
            <path d="M212.742 248.293C209.565 250.471 206.292 252.513 202.927 254.413L205.71 246.674L212.742 248.293Z" fill="#ED9DA0"/>
            <path d="M227.872 236.274C223.128 240.627 218.072 244.646 212.742 248.293C209.565 250.471 206.292 252.514 202.927 254.413C199.387 256.423 195.748 258.276 192.018 259.963C191.787 260.07 191.557 260.172 191.323 260.274C185.539 262.855 179.538 265.041 173.362 266.802C171.708 267.274 170.042 267.717 168.362 268.123C160.901 269.946 153.199 271.154 145.313 271.685C143.512 256.566 141.608 238.053 140.602 220.371C139.21 195.957 139.529 173.132 144.182 163.024C144.182 163.024 146.188 153.806 147.239 144.57C147.898 138.771 148.183 132.969 147.36 129.429C146.935 127.595 146.21 126.368 145.09 126.061C145.09 126.061 145.536 126.046 146.287 126.057H146.291C150.336 126.131 163.251 127.049 163.767 135.824L199.288 150.523L227.872 236.274Z" fill="#090814"/>
            <path d="M195.317 244.822L192.018 259.963C191.787 260.07 191.557 260.172 191.323 260.274L194.687 244.84L183.679 205.329L184.268 205.168L195.317 244.822Z" fill="white"/>
            </g>
            <defs>
            <clipPath id="clip0_135_492">
            <rect width="272" height="272" fill="white"/>
            </clipPath>
            </defs>
          </svg>

        </div>
        <div class="col-10 col-lg-5 offset-lg-1 contact_text">
          <?= $contact['text']; ?>
          <div class="contact_form">
            <?= do_shortcode('[contact-form-7 id="0d46591" title="Contato"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</main>

<?php
get_footer();
