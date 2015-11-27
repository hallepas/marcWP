<?php
/**
 * The main template file.
 *
 * @package marchaller
 */

get_header(); ?>


<section class="slide quotes">
    <div class="container">
        <ul id="quotes-list" class="quote-wrapper">
        	<?php
				$loop = new WP_Query( array( 'post_type' => 'mh_zitate'));
				while ($loop->have_posts()) : $loop->the_post();
		    ?>
		    <li><h2 class="quote"><?php the_title() ?></h2></li>
        	<?php
        		endwhile;
        	?>
            <!--<li><h2 class="quote">&laquo;Gestern, Erwin an der Kleinkunstkartoffel in ENNS.&raquo;</h2></li>
            <li><h2 class="quote">&laquo;Heute, Erwin an der Kleinkunstkartoffel in ENNS.&raquo;</h2></li>
            <li><h2 class="quote">&laquo;Morgen, Erwin an der Kleinkunstkartoffel in ENNS.&raquo;</h2></li>-->
        </ul>
    </div>
</section>

<section class="slide einleitung">
    <div class="container">
    	<?php query_posts("page_id=30");// . get_option('page_on_front')); ?>
			<?php while (have_posts()) : the_post(); ?>
		        <h2 id="info"><?php the_title(); ?></h2>
		        <h3><?php
					{ $subtitle = get_post_meta
					($post->ID, 'subtitle', $single = true); 
					if($subtitle !== '') echo $subtitle;} ?>
				</h3>
		        <div class="einleitung__text l-gap-above">
		        	<?php the_content(); ?>
		        </div>
		<?php endwhile;?>
    </div>
</section>

<section class="slide videos">
    <div class="container clearfix" id="videos">
            <?php
                $vidCount = 1;
                $loop = new WP_Query( array( 'post_type' => 'mh_videos'));
                while ($loop->have_posts()) : $loop->the_post();

                if($vidCount == 1 || ($vidCount - 1) % 3 == 0) {
                    echo '<div class="row">';
                }
            ?>
                     <div class="video  one-third column <?php if($vidCount == 1 || ($vidCount - 1) % 3 == 0)  { echo 'alpha'; } else if($vidCount % 3 == 0) { echo 'omega'; } ?>">
                        <!--<img src="img/bild_01.jpg" class="video__thumbnail stretch" />
    -->                    

<?php the_post_thumbnail('post-thumbnails', array('class' => 'stretch')); ?>

                        <h2 class="video__title"><span class="arrow"></span><?php the_title(); ?></h2>
                        <h3 class="video__subtitle"><?php the_field('subtitle'); ?></h3>
                        <div class="js-video__content  video__content  container">
                            <div class="video__content__wrapper  two-thirds column alpha">
                                <?php echo htmlspecialchars_decode (get_field('embedded')); ?>
                            </div>
                            <div class="video__content__text  one-third column omega">
                                <h2 class="video__title"><?php the_title(); ?></h2>
                                <?php the_field('text') ?>
                            </div>
                        </div>
                    </div>
            <?php
                if($vidCount % 3 == 0) {
                    echo '</div>';
                }

                $vidCount += 1;
                endwhile;
            ?>

    </div>
</section>

<section class="slide news" id="news">
    <div class="container">
        <img src="<?php echo get_template_directory_uri(); ?>/img/news-portait.png" width="100%" />
        <nav class="news-filter">
            <ul>
                <li class="news-filter__item news-filter__item--current"><a href="#">Alles</a></li>
              <!--  <li class="news-filter__item"><a href="#">Bilder</a></li>
                <li class="news-filter__item"><a href="#">Videos</a></li>-->
            </ul>
        </nav>

        <?php
                $newsCount = 1;
                $loop = new WP_Query( array( 'post_type' => 'mh_news'));
                while ($loop->have_posts()) : $loop->the_post();

                if($newsCount == 1 || ($newsCount - 1) % 3 == 0) {
                    echo '<div class="row">';
                }
            ?>

             <article class="news-box one-third column <?php if($newsCount == 1 || ($newsCount - 1) % 3 == 0)  { echo 'alpha'; } else if($newsCount % 3 == 0) { echo 'omega'; } ?>">
                <header class="news-box__header">
                    <p class="news-box__header__date"><?php the_date(); ?></p>
                    <h2 class="news-box__header__title"><?php the_title(); ?></h2>
                </header>
                <div class="news-box__body">
                    <p>
                        <?php the_content(); ?>
                    </p>
                </div>
            </article>
                    
            <?php
                if($newsCount % 3 == 0) {
                    echo '</div>';
                }

                $newsCount += 1;
                endwhile;
            ?>
    </div>
</section>

<section class="slide footer">
    <div class="container">
        <h2 id="kontakte">Management-Booking Schweiz</h2>
        <h3 class="contact__subtitle">Starfish GmbH</h3>
        <p>Artist Management, PR <span class="amp">&</span> Agency<br/>
            Erlenstrasse 2<br/>
            CH-6364 Rotkreuz</p>
        <h3 class="contact__subtitle">Rico Fischer</h3>
        <p>Phone: +41 41 240 41 11<br/>
            Mobile: +41 79 400 08 44<br/>
            E-Mail: rico.fischer@starfish.li</p>
        <h2 id="kontakte">Booking &Ouml;sterreich</h2>
 <h3 class="contact__subtitle">Humor AG</h3>
	<p>
Martina Kapral<br/>
Neubaugasse 80/10<br/>
A-1070 Wien<br/>
Mobile: +43 (0)664 / 38 27 401<br/>
Phone: +43 (0)1 236 59 34-0<br/>
E-Mail: kapral@humorag.at</p>
    </div>
</section>

<?php get_footer(); ?>