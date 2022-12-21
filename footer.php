<?php
/**
 * The template for displaying the footer
 */
 global $archi_option; 
?>
<?php 
    if(isset($archi_option['header_layout']) and $archi_option['header_layout']!="htop_page" ){
        get_template_part('framework/footers/footer-sidenav'); 
    }else{  
?>
	<!-- footer begin -->
	<footer <?php if ( !is_active_sidebar( 'footer-area-1' ) && !is_active_sidebar( 'footer-area-2' ) && !is_active_sidebar( 'footer-area-3' ) && !is_active_sidebar( 'footer-area-4' ) ){ ?>class="no-padding"<?php } ?> >
		
		<?php if ( is_active_sidebar( 'footer-area-1' ) || is_active_sidebar( 'footer-area-2' ) || is_active_sidebar( 'footer-area-3' ) || is_active_sidebar( 'footer-area-4' ) ){ ?>
			<div class="main-footer">
	            <div class="container">
	                <div class="row">
	                    <?php get_sidebar('footer');?>
	                </div>    
	            </div>
	        </div>
		<?php } ?>

		<div class="subfooter <?php if(isset($archi_option['footer_layout']) and $archi_option['footer_layout']=="footer2" ){echo 'padtop80 padbottom80 footer-2';} ?>">
			<div class="container">
				<div class="row">
					<?php if(isset($archi_option['footer_layout']) and $archi_option['footer_layout']=="footer2" ){ ?>
						<div class="col-md-3">
	                        <img src="<?php echo esc_url($archi_option['logo_footer']['url']); ?>" class="logo-small" alt=""><br>
	                    </div>
					<?php } ?>
					<div class="col-md-6">
						<?php echo htmlspecialchars_decode( do_shortcode( $archi_option['footer_text'] ) ); ?>                     
					</div>

					<?php if($archi_option['switch_footer_social']!=false){ ?>
						<div class="<?php if(isset($archi_option['footer_layout']) and $archi_option['footer_layout']=='footer2' ){echo 'col-md-3';}else{echo 'col-md-6';} ?> text-right">
							<div class="social-icons">
								<ul>
									<?php if($archi_option['facebook']!=''){ ?>                                    
										<li><a target="_blank" href="<?php echo esc_url($archi_option['facebook']); ?>"><i class="fa fa-facebook"></i></a></li>                                    
									<?php } ?>                                
									<?php if($archi_option['twitter']!=''){ ?>                                    
										<li><a target="_blank" href="<?php echo esc_url($archi_option['twitter']); ?>"><i class="fa fa-twitter"></i></a></li>                                    
									<?php } ?>                                
									<?php if($archi_option['google']!=''){ ?>                                    
										<li><a target="_blank" href="<?php echo esc_url($archi_option['google']); ?>"><i class="fa fa-google-plus"></i></a></li>                                    
									<?php } ?>
									<?php if($archi_option['dribbble']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['dribbble']); ?>"><i class="fa fa-dribbble"></i></a></li>
									<?php } ?>
									<?php if($archi_option['pinterest']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
									<?php } ?>
									<?php if($archi_option['linkedin']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
									<?php } ?>                                
									<?php if($archi_option['youtube']!=''){ ?>                                    
										<li><a target="_blank" href="<?php echo esc_url($archi_option['youtube']); ?>"><i class="fa fa-youtube"></i></a></li>                                    
									<?php } ?>  
									<?php if($archi_option['vimeo']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a></li>
									<?php } ?>									                                                            
									<?php if($archi_option['skype']!=''){ ?>
										<li><a href="<?php echo esc_attr($archi_option['skype']); ?>"><i class="fa fa-skype"></i></a></li>
									<?php } ?>                               
									<?php if($archi_option['instagram']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['instagram']); ?>"><i class="fa fa-instagram"></i></a></li>
									<?php } ?>  
									<?php if($archi_option['github']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['github']); ?>"><i class="fa fa-github"></i></a></li>
									<?php } ?>
									<?php if($archi_option['tumblr']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['tumblr']); ?>"><i class="fa fa-tumblr-square"></i></a></li>
									<?php } ?>
									<?php if($archi_option['soundcloud']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['soundcloud']); ?>"><i class="fa fa-soundcloud"></i></a></li>
									<?php } ?>
									<?php if($archi_option['behance']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['behance']); ?>"><i class="fa  fa-behance"></i></a></li>
									<?php } ?>
									<?php if($archi_option['lastfm']!=''){ ?>
										<li><a target="_blank" href="<?php echo esc_url($archi_option['lastfm']); ?>"><i class="fa fa-lastfm"></i></a></li>
									<?php } ?>
									<?php if($archi_option['rss']!=''){ ?>                                    
										<li><a target="_blank" href="<?php echo esc_url($archi_option['rss']); ?>"><i class="fa fa-rss"></i></a></li>                                    
									<?php } ?>
									<?php if($archi_option['social_extend']!=''){ 
		                                echo htmlspecialchars_decode( do_shortcode( $archi_option['social_extend'] ) );
		                            } ?> 
	                            </ul>                                  
							</div>
						</div>  
					<?php } ?>                      
				</div>
			</div>
		</div>

		<a id="back-to-top" href="#" class="show"></a>
	</footer>

</div><!-- #wrapper -->

<?php } ?>    
<?php wp_footer(); ?>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'bPKzn2scgg';var d=document;var w=window;function l(){
  var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
  s.src = '//code.jivosite.com/script/widget/'+widget_id
    ; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
  if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
  else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(51069107, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/51069107" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>