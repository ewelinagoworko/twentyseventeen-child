<?php
/**
 * Template Name: Wiadomości
 *
 */

//tworzymy template page dla wiadomosci:

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php 
				// the query
				$the_query = new WP_Query( array('post_type' => 'slides') ); ?>

				<?php if ( $the_query->have_posts() ) : ?>

					<!-- pagination here -->

					<!-- the loop -->
					<div class="main-slider"><?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
								<h2><?php the_title(); ?></h2>
							</div>
							
						<?php endwhile; ?></div>
					<!-- end of the loop -->
					


					<!-- pagination here -->

					<?php wp_reset_postdata(); ?>

				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
			
		

			
				<?php 
				// the query
				$the_query = new WP_Query( array('post_type' => 'news') ); ?>

				<?php if ( $the_query->have_posts() ) : ?>

					<!-- pagination here -->

					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
						
							<?php the_post_thumbnail('thumbnail'); ?>
							
							<!-- alternatywny sposob:
							$thumbnail_id = get_post_thumbnail_id( $post->ID );
							$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); -->
							
						<!-- <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""> alternatywny sposob na wyswietlanie obrazkow wyrazniajacych kolo tytulow wiadomosci -->
						
						<!--alternatywne: <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt ?>">
						<?php the_post_thumbnail('thumbnail'); ?> -->
						
						<?php the_content(); ?> <!-- wyciagamy tekst wpisu, zeby pojawil sie przy obrazku i tytule -->
					<?php endwhile; ?>
					<!-- end of the loop -->
					


					<!-- pagination here -->

					<?php wp_reset_postdata(); ?>

				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
