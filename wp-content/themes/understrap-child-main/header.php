<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
	/>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action( 'wp_body_open' ); ?>

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-8 col-lg-3">
					<?php the_custom_logo(); ?>
				</div>

				<nav class="header_nav col-lg-9 d-lg-flex">
					<ul class="list-unstyled">
						<li>
							<a href="#sobremim">
								Sobre Mim
							</a>	
						</li>
						<li>
							<a href="#areasdeatuacao">
								Áreas de Atuação
							</a>
						</li>
						<li>
							<a href="#relatosdeclientes">
								Relatos de Clientes
							</a>
						</li>
						<li>
							<a href="#vamosconversar">
								Vamos Conversar?
							</a>
						</li>
					</ul>

					<?php
					// Busca os contatos do CPT 'contact', ordenando pelo campo ACF 'priority' (do maior para o menor)
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

					<ul class="list-unstyled header_nav__socials">
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
				</nav>
				
				<button class="header_nav__toggle d-lg-none">
					<span>
						+
					</span>
				</button>
				
			</div>
		</div>
	</header>

	<div class="floatButton-whatsapp">
		<a href="https://api.whatsapp.com/send?phone=5513997224404" target="_blank" rel="noopener noreferrer">
			<i class="fa-brands fa-whatsapp"></i>
		</a>
	</div>
	<div class="site" id="page">

