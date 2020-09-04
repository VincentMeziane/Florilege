<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="titlestyle-container">
			<?php
			$title = get_theme_mod('decoTitle');
			$urlFd = get_theme_mod('decoTitleFond');
			$urlFt = get_theme_mod('decoTitleFront');
			if ($title == 'oui' && !empty($urlFd) && !empty($urlFt)) {
			?><div class="titlestyle">
					<div class="imgtitle"><img class="imgfond" src="<?php echo $urlFd; ?>" alt="imagefond"></div>
					<h2><?php the_title(); ?></h2>
					<div class="imgtitle"><img class="imgfondturn" src="<?php echo $urlFd; ?>" alt="imagefond"><img class="imgfrontr" src="<?php echo $urlFt; ?>" alt="imageface"></div>
				</div>
			<?php
			} else { ?>
				<h2><?php the_title(); ?></h2>
			<?php
			}
			?>
		</div>
		<?php the_content(); ?>
		<div class="line2"></div>

	<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>

<!-- Start latest post -->
<?php
$displaySlideshow = get_theme_mod('displaySlideshow');
if ($displaySlideshow == true) { ?>

<div class="titlestyle-container">
<?php
     $title=get_theme_mod('decoTitle');
     if($title=='oui' && !empty($urlFd) && !empty($urlFt)){
     ?>
     <div class="titlestyle">
     <div class="imgtitle"><img class="imgfond" src="<?php  echo $urlFd;?>" alt="imagefond"><img class="imgfrontl" src="<?php  echo $urlFt;?>" alt="imageface"></div>
     <h2>Actualités</h2>
     <div class="imgtitle"><img class="imgfondturn" src="<?php  echo $urlFd;?>" alt="imagefond"></div>
     </div>
     <?php
     } else{?>
        <h2>Actualités</h2>
    <?php
    }
    ?>
    </div>
	<?php
	$latest_post = get_posts(); // Defaults args fetch posts starting with the most recent 
	?>
	<section id="articles" class="sliderAccueil">

		<span class="actionButton buttonToPrev" id="prevBtn"><i class="fas fa-long-arrow-alt-left"></i><i class="fas fa-long-arrow-alt-up"></i></span>
		<?php
		$i = 0;
		foreach ($latest_post as $post) : setup_postdata($post);
			$i++; ?>
			<article class="article article<?= $i ?>">
				<a href="<?php the_permalink() ?>">
					<h3>
						<?php the_title() ?>
					</h3>
					<div>
						<?php the_post_thumbnail('medium')  ?>
						<?php the_excerpt(); ?>
					</div>
				</a>
			</article>

		<?php endforeach; ?>
		<span class="actionButton buttonToNext" id="nextBtn"><i class="fas fa-long-arrow-alt-right"></i><i class="fas fa-long-arrow-alt-down"></i></span>
		<?php wp_reset_query(); ?>
	</section>
<?php
}
?>
<!-- End latest post -->

</div><!-- #content -->
<?php

get_footer();
?>