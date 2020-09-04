<?php
/*
Template Name: Page Equipe
*/

get_header(); ?>
<section id="articles" class="haut team">
<div class="titlestyle-container">
<?php
    $title=get_theme_mod('decoTitle');   
    $urlFd=get_theme_mod('decoTitleFond');
    $urlFt=get_theme_mod('decoTitleFront');
    if($title=='oui' && !empty($urlFd) && !empty($urlFt)){
 
    ?><div class="titlestyle">
    <div class="imgtitle"><img class="imgfond" src="<?php  echo $urlFd;?>" alt="imagefond"></div>
    <h2><?php the_title();?></h2>
    <div class="imgtitle"><img class="imgfondturn" src="<?php  echo $urlFd;?>" alt="imagefond"><img class="imgfrontr" src="<?php  echo $urlFt;?>" alt="imageface"></div>
    </div>
    <?php
    }
    else{?>
        <h2><?php the_title();?></h2>
    <?php
    }
    ?>
    </div>
    <?php
    if(have_posts()):  while(have_posts()): the_post();
    the_content();
endwhile;
endif;?>
   
</section>
<?php
get_footer(); ?>
