<?php get_header();



if (have_posts()) : while (have_posts()) : the_post();
?>
		<div class="unArticle">
			<h2>
				<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
			</h2>
			<?php the_excerpt(); ?>
			<p class="infos">
				<?php comments_number('Aucun commentaire', '1 commentaire', '% commentaires'); ?>
			</p>

		</div>
<?php endwhile;
	the_posts_pagination();
endif; ?>
</section>
<?php
get_footer();
?>