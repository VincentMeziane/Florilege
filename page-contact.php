<?php
/*
Template Name: Page Contact
*/

get_header();
?>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
		<section id="pages" class="haut">
			<section id="topContact">
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
				<div class="content-block">
					<form id="form-in" name="" action="<?php echo get_permalink(); ?>" method="post">
						<ul>

							<ul>
								<li>
									<label for="name">Nom *</label>
									<input type="text" class="input-text" name="name" id="name" placeholder="Nom" required="required">
								</li>
								<li>
									<label for="name">Prénom *</label>
									<input type="text" class="input-text" name="surname" id="surname" placeholder="Prénom" required="required">
								</li>
								<li>
									<label for="name">Téléphone</label>
									<input type="text" class="input-text" name="phone" id="phone" placeholder="01 02 03 04 05" required="required">
								</li>
								<li>
									<label for="name">Mail *</label>
									<input type="text" class="input-text" name="email" id="email" placeholder="mail@xyz.fr" required="required">

								</li>
								<li>
									<label for="select">Demande *</label>
									<select name="select">
										<option valeur="boutique">Informations sur la boutique</option>
										<option valeur="contact">Contact</option>
									</select>

								</li>
							</ul>
							<li id="textareaform">
								<label for="name">Message</label>
								<textarea class="input-text" name="msg" id="msg" rows="10" cols="50" placeholder="Écrivez votre message ici..."></textarea>
								<p>* Champs obligatoires</p>
							</li>
						</ul>
						<div id="bottomform">
							<p>Je valide nom inscription</p>
							<button class='btn_form' value='Envoyer'>Envoyer</button>
						</div>
					</form>
				</div>
			</section>
			<section id="bottomContact">
				<?php
				$title = get_theme_mod('decoTitle');
				$urlFd = get_theme_mod('decoTitleFond');
				$urlFt = get_theme_mod('decoTitleFront');
				if ($title == 'oui' && !empty($urlFd) && !empty($urlFt)) {
				?>
					<div class="titlestyle">
						<div class="imgtitle"><img class="imgfond" src="<?php echo $urlFd; ?>" alt="imagefond"><img class="imgfrontl" src="<?php echo $urlFt; ?>" alt="imageface"></div>
						<h2>Nous trouver</h2>
						<div class="imgtitle"><img class="imgfondturn" src="<?php echo $urlFd; ?>" alt="imagefond"></div>
					</div>
				<?php
				} else { ?>
					<h2>Nous trouver</h2>
				<?php
				}
				?>
				</div>
				<div id="sectionbottom">
					<div class="gmap"><?php
										if (get_theme_mod('gmapshow') == 1 && !empty(get_theme_mod('gmapLat')) && !empty(get_theme_mod('gmapLong'))) :;
										?>
							<div id="gmapContainer"></div>
							<script type="text/javascript" class="scriptJsGmap">
								function gmap() {
									var map = new google.maps.Map(document.getElementById('gmapContainer'), {
										center: {
											lat: <?php echo get_theme_mod('gmapLat'); ?>,
											lng: <?php echo get_theme_mod('gmapLong'); ?>
										},
										zoom: <?php echo get_theme_mod('zoom', '15'); ?>
									})
								}
							</script>
					</div>
				<?php endif;
										$jour = get_theme_mod('jour');
										$heur = get_theme_mod('heur');
										if (!empty($jour) && !empty($heur)) : ?>
					<article id="infoHoraires">
						<h2>Horaires d'ouverture :</h2>
						<p>Du <?php echo $jour; ?></p>
						<p>De <?php echo $heur; ?></p>
						<?php $dimanche = get_theme_mod('dimanche');
											if (!empty($dimanche)) : ?>
							<p>Et <?php echo $dimanche; ?></p>
					</article>
			<?php endif;
										endif; ?>
				</div>
				</div><!-- gmap -->
			</section><!-- bottomContact -->
		</section><!-- haut -->
<?php endwhile;
endif; ?>

<?php
get_footer(); ?>