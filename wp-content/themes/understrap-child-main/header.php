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

					<ul class="list-unstyled header_nav__socials">
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

