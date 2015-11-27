<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package marchaller
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=1024">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
		setlocale (LC_ALL, 'de_DE');
	?>
	<div class="js-to-top scroll-top">
		<a href="#top">^</a>
	</div>


	<div class="termine-wrapper">
		<div class="termine-button-show js-termine-show js-termine-show-btn">
			<h2 class="termine-title">&Ouml;FFENTLICHE TOURDATEN</h2>
		</div>
		<div class="termine-flyout js-termine-flyout">
			<h2 class="termine-title js-termine-close">&Ouml;FFENTLICHE TOURDATEN</h2>
			<span title="close" class="termine-button-close js-termine-close">x</span>
			<div class="termine-flyout-inner">
				<?php

				$today = time();
				$currentTime = current_time('Ymd');

				$args = array(
					'post_type' => 'mh_termine',
					'posts_per_page' => -1,
					'meta_query' => array (
						array( 'key' => 'datum', 'compare' => '>', 'value' => $currentTime, 'type' => 'DATE')
	                		),
					'meta_key' => 'datum',
					'orderby' => 'meta_value_num',
					'order' => 'ASC'
				);

				$loop = new WP_Query( $args );
				//$events = $query->posts;

					//     query_posts('&meta_key=popularity&orderby=meta_value');
					/*$loop = new WP_Query( 
						array( 
							'post_type' => 'mh_termine', 
							'orderby' => 'datum', 
							'order' => 'asc',
							'posts_per_page' => 1000,
						));*/
					$month;
					$first = true;
setlocale(LC_ALL, 'de_DE.utf8');
					while ($loop->have_posts()) : $loop->the_post();
						if($month != strftime('%B', strtotime(get_field('datum')))) {
							if(!$first) {
								echo '</ul>';
								echo '</div>';
							}
							$month = strftime('%B', strtotime(get_field('datum')));
				?>
					<div class="termine-month">
						<h3 class="termine-title"><?php echo $month ?></h3>
						<ul class="termine-list">
							<li class="termine-list__item"><span class="termine-list-title termine-list-title--ort">Ort</span><span class="termine-list-title termine-list-title--tickets">&nbsp;</span><span class="termine-list-title termine-list-title--date">Datum / Zeit</span></li>
				<?php 
							$first = false;
						}
				?>
							<li class="termine-list__item">
								<span class="termine-ort">
									<?php echo get_field('ort') ?>
								</span>
								<span class="termine-tickets">
<?php if(get_field('ausverkauft')){ ?> 
									<span class="termine-tickets--ausverkauft">Ausverkauft</span>
<?php } else { ?>
									<?php if(strlen(get_field('tickets')) > 0) {?>
									<a href="<?php if(filter_var(get_field('tickets'), FILTER_VALIDATE_EMAIL)){echo 'mailto:';} ?><?php echo get_field('tickets') ?>" target="_blank">Tickets</a>
									<?php } ?>
<?php } ?>
	
								</span>
						<?php 
						$datum_bis = get_field( 'datum_bis');
						if($datum_bis!=$last && $datum_bis!=null){ ?> 
								<span class="termine-date">
									<?php echo strftime('%d. %b %y', strtotime(get_field('datum'))); ?> - <?php echo strftime('%d. %b %y', strtotime(get_field('datum_bis'))); ?>
								</span>
							<?php } else { ?>
							<span class="termine-date">
									<?php echo strftime('%d. %b %y', strtotime(get_field('datum'))); ?> / <?php echo get_field('zeit') ?> 
								</span>
							<?php } ?>
								
							</li>
				<?php
					endwhile;
					echo '</ul>';
					echo '</div>';
				?>
			</div>
		</div>
	</div>

 <section class="slide intro" id="top">
	<div class="container">
		<div class="six columns alpha">
			<header class="title">
			   <!-- <p>Marc Haller spielt</p>
				<h1 id="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>-->
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg" class="logo" alt="Marc Haller - Erwin aus der Schweiz" />
			</header>
			
			<nav id="site-navigation" class="main-nav" role="navigation">
				<ul class="site-nav" role="navigation">
					<li class="site-nav__step current"><a href="#home">Home</a></li>
					<li class="site-nav__step"><a href="#info">Info</a></li>
					<li class="site-nav__step js-termine-show"><a href="#">Tourdaten</a></li>
					<li class="site-nav__step"><a href="#videos">Videos</a></li>
					<li class="site-nav__step"><a href="#news">News</a></li>
					<li class="site-nav__step"><a href="#kontakte">Kontakt</a></li>
				</ul>
			</nav>
		</div>
		<div class="js-portrait ten columns omega right-aligned">
			<img src="<?php echo get_template_directory_uri(); ?>/img/intro-portrait.jpg" class="stretch" />
		</div>
	</div>
</section>