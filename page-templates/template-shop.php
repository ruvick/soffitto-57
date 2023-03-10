<?php
/**
 * Template Name: Template Shop
 */
get_header(); ?>

    <?php global $archi_option; ?>
    <?php if($archi_option['subpage-switch']!=false){ ?>

        <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom"
            <?php if( function_exists( 'rwmb_meta' ) ) { ?>       
            <?php $images = rwmb_meta( '_cmb_subheader_image', "type=image" ); ?>
            <?php if($images){ foreach ( $images as $image ) { ?>
            <?php 
            $img =  $image['full_url']; ?>
              style="background-image: url('<?php echo esc_url($img); ?>');"
            <?php } } ?>
        <?php } ?>
        >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <? // do_shortcode('[contact-form-7 id="2203" title="Без названия"]'); ?>
                    <?php
                    if(function_exists('archi_breadcrumbs')):
                        archi_breadcrumbs();
                    endif;
                    ?>
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <?php }else{ ?>
        <section class="no-subpage"></section>
    <?php } ?>

    <div id="content" class="sbar">
        <div class="container">
            <div class="row">                    
                <div class="col-md-9">                   
                    <?php while (have_posts()) : the_post()?>                                                                
                        <?php the_content(); ?>
                    <?php endwhile; ?>                
                </div>
                <div class="col-md-3">
                    <?php get_sidebar('shop');?>
                </div>                        
            </div>
        </div>
    </div>

<?php get_footer(); ?>