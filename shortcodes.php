<?php 
// Custom Heading
add_shortcode('heading','heading_func');
function heading_func($atts, $content = null){
	extract(shortcode_atts(array(
		'text'		=>	'',
		'tag'		=> 	'',
		'size'		=>	'',
		'color'		=>	'',
		'align'		=>	'',		
		'class'		=>	'',
	), $atts));
	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');	
	$cl = (!empty($class) ? ' class= "'.$class.'"' : '');
	ob_start(); ?>
	
	<?php echo htmlspecialchars_decode('<'. $tag . $cl .' style="' . $size1 . $align1 . $color1 . '" > '. $text .'</'.$tag.'>'); ?>
	
<?php
    return ob_get_clean();
}

// Line solid
add_shortcode('line_solid', 'line_solid_func');
function line_solid_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'	=> '',
		'style' => 'none',
	), $atts));
	$line_style = '';
	if ($style == 'line_dark') {
		$line_style = 'line-dark';
	}elseif ($style == 'line_light') {
		$line_style = 'line-light';
	}else{
		$line_style = '';
	}
	ob_start(); 
?>
	<div class="<?php echo esc_attr( $line_style ); ?> separator"><span><?php if($icon != ''){ ?><i class="fa fa-<?php echo esc_attr($icon); ?>"></i><?php }else{ echo '<i class="fa fa-circle"></i>';} ?></span></div>
	<div class="spacer-single"></div>	      
<?php
    return ob_get_clean();
}

// Our Team
add_shortcode('team', 'team_func');
function team_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',
		'name'		=>	'',
		'job'		=>	'',
		'icon1'		=>	'',
		'icon2'		=>	'',
		'icon3'		=>	'',
		'icon4'		=>	'',
		'url1'		=>	'',
		'url2'		=>	'',
		'url3'		=>	'',
		'url4'		=>	'',
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];

	$icon11 = (!empty($icon1) ? '<a href="'.esc_url($url1).'" target="_blank"><i class="fa fa-'.esc_attr($icon1).' fa-lg"></i></a>' : '');
	$icon22 = (!empty($icon2) ? '<a href="'.esc_url($url2).'" target="_blank"><i class="fa fa-'.esc_attr($icon2).' fa-lg"></i></a>' : '');
	$icon33 = (!empty($icon3) ? '<a href="'.esc_url($url3).'" target="_blank"><i class="fa fa-'.esc_attr($icon3).' fa-lg"></i></a>' : '');
	$icon44 = (!empty($icon4) ? '<a href="'.esc_url($url4).'" target="_blank"><i class="fa fa-'.esc_attr($icon4).' fa-lg"></i></a>' : '');

	ob_start(); ?>

    <!-- team member -->
    <div class="de-team-list team-box wow fadeInUp">
    	<?php if($img != ''){ ?>
	        <div class="team-pic">
	        	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="" />            
	        </div>
        <?php } ?>
        <div class="team-desc">
            <h3><?php echo htmlspecialchars_decode($name); ?></h3>
            <?php if($job != ''){ ?><p class="lead"><?php echo htmlspecialchars_decode($job); ?></p><?php } ?>
            <div class="small-border"></div>
            <?php if($content != ''){ ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
            <div class="social">
                <?php echo htmlspecialchars_decode($icon11); ?>
                <?php echo htmlspecialchars_decode($icon22); ?>
                <?php echo htmlspecialchars_decode($icon33); ?>
                <?php echo htmlspecialchars_decode($icon44); ?>
            </div>
        </div>
    </div>
    <!-- team close -->

<?php
    return ob_get_clean();
}

// Our Team 2
add_shortcode('team2', 'team2_func');
function team2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',
		'name'		=>	'',
		'job'		=>	'',
		'socials' => '',
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	$socials = (array) vc_param_group_parse_atts( $socials );
	ob_start(); ?>

    <!-- team member -->
    <div class="de-team-list-2 team-box">
    	<?php if($img != ''){ ?>
	        <div class="team-pic">
	        	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="" />            
	        </div>
        <?php } ?>
        <div class="team-desc">
            <h3><?php echo esc_attr($name); ?></h3>
            <?php if($job != ''){ ?><p class="lead"><?php echo esc_attr($job); ?></p><?php } ?>
            <div class="small-border"></div>
            <?php if($content != ''){ ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
            <div class="social">
                <?php 
					foreach ( $socials as $data ) {
						$data['social_icon'] = isset( $data['social_icon'] ) ? $data['social_icon'] : '';
						$data['social_url'] = isset( $data['social_url'] ) ? $data['social_url'] : '';
				?>
					<a href="<?php echo esc_attr($data['social_url']); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr($data['social_icon']); ?> fa-lg"></i></a>
				<?php } ?>
            </div>
        </div>
    </div>
    <!-- team close -->

<?php
    return ob_get_clean();
}

// Video Player 
add_shortcode('videoplayer', 'videoplayer_func');
function videoplayer_func($atts, $content = null){
	extract(shortcode_atts(array(
		'video'  => '',
	), $atts));
	ob_start(); ?>
	
	<iframe height="450" src="<?php echo esc_url($video); ?>"></iframe>
	
<?php
    return ob_get_clean();
}

// Buttons
add_shortcode('button', 'button_func');
function button_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btntext' 	=> '',
		'btnlink' 	=> '',
		'css'       => '',
		'class'     => '',
		'custom_links_target'		=>  '',
	), $atts));
	$custom_links_target = (!empty($custom_links_target) ? $custom_links_target : '_self' );
	ob_start(); 
?>			

	<?php if ($btnlink != '') { ?>
		<a href="<?php echo esc_url($btnlink); ?>" target="<?php echo esc_attr($custom_links_target); ?>" class="btn btn-line-black btn-big <?php echo vc_shortcode_custom_css_class( $css ) .' '. esc_attr($class); ?>"><?php echo htmlspecialchars_decode($btntext); ?></a>
	<?php } ?>
    
<?php 
	return ob_get_clean();
}

// OT Buttons 2
add_shortcode('button2', 'button2_func');
function button2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'linkbox'	=>  '',
		'class' 	=> '',
		'css'       => '',
	), $atts));
	$url = vc_build_link( $linkbox );
	$class1 = ( !empty($class) ? $class : 'btn btn-line-black btn-big' );
	ob_start(); 
?>			
	<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
		echo '<a href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" class="btn ' . $class1 . vc_shortcode_custom_css_class( $css ) . '">' . esc_attr( $url['title'] ) . '</a>';
	} ?>
	
<?php 
	return ob_get_clean();
}

// Featured Boxes
add_shortcode('ot_featured_boxes', 'ot_featured_boxes_func');
function ot_featured_boxes_func($atts, $content = null){
   extract(shortcode_atts(array(
      'simple_textfield'   => '',
      'titles' => '',
      'columns' => '',
      'class'  => '',
      'target' =>  '',
      'animation' => '',
   ), $atts));
   $titles = (array) vc_param_group_parse_atts( $titles );   
   ob_start(); 
?>

   <div class="display-table <?php echo esc_attr($class); ?>">
      <?php 
      	$i=1;
        foreach ( $titles as $data ) {
            $data['title'] = isset( $data['title'] ) ? $data['title'] : '';
            $data['desc'] = isset( $data['desc'] ) ? $data['desc'] : '';
            $data['bgimage'] = isset( $data['bgimage'] ) ? $data['bgimage'] : '';
            $data['btntext'] = isset( $data['btntext'] ) ? $data['btntext'] : '';
            $data['btnlink'] = isset( $data['btnlink'] ) ? $data['btnlink'] : '';            
            $img = wp_get_attachment_image_src($data['bgimage'],'full');
            $img = $img[0];
      ?>
         <div class="<?php if($columns == 2){echo 'col-md-6';}elseif ($columns == 3) {echo 'col-md-4';}else{echo 'col-md-3';} ?> text-middle text-light <?php if($animation != 'disable'){ echo 'wow fadeInRight'; } ?>" <?php if($animation != 'disable'){ ?>data-wow-delay="<?php echo esc_attr($i); ?>s"<?php } ?> data-bgimage="url(<?php echo esc_url($img); ?>)">
            <div class="mask-overlay"></div>
            <div class="padding60 z-index-2">
                <?php if($data['title'] != ''){ ?><h3><?php echo $data['title']; ?></h3><?php } ?>
                <?php if($data['desc'] != ''){ ?><p><?php echo $data['desc']; ?></p><?php } ?>
                <?php if($data['btnlink'] != ''){ ?><a href="<?php echo esc_url($data['btnlink']); ?>" target="<?php if($target == '_blank'){ echo '_blank'; }else{ echo '_self'; } ?>" class="btn-line btn-fullwidth"><?php echo esc_attr($data['btntext']); ?></a><?php } ?>
            </div>
         </div>
      <?php $i++; } ?>
   </div>

<?php
    return ob_get_clean();
}

// Featured Boxes 2
add_shortcode('ot_featured_boxes2', 'ot_featured_boxes2_func');
function ot_featured_boxes2_func($atts, $content = null){
   extract(shortcode_atts(array(
      'simple_textfield'   => '',
      'titles' => '',
      'columns' => '',
      'class'  => '',
      'target' =>  '',
      'animation' => '',
   ), $atts));
   $titles = (array) vc_param_group_parse_atts( $titles );   
   ob_start(); 
?>

   <div class="row">
      <?php 
      	$i=1;
        foreach ( $titles as $data ) {
            $data['title'] = isset( $data['title'] ) ? $data['title'] : '';
            $data['desc'] = isset( $data['desc'] ) ? $data['desc'] : '';
            $data['bgimage'] = isset( $data['bgimage'] ) ? $data['bgimage'] : '';
            $data['btntext'] = isset( $data['btntext'] ) ? $data['btntext'] : '';
            $data['btnlink'] = isset( $data['btnlink'] ) ? $data['btnlink'] : '';            
            $img = wp_get_attachment_image_src($data['bgimage'],'full');
            $img = $img[0];
      ?>
      	<div class="<?php if($columns == 2){echo 'col-md-6';}elseif ($columns == 3) {echo 'col-md-4';}else{echo 'col-md-3';} ?> <?php echo esc_attr($class); ?> text-middle text-light <?php if($animation != 'disable'){ echo 'wow fadeInRight'; } ?>" <?php if($animation != 'disable'){ ?>data-wow-delay="<?php echo esc_attr($i); ?>s"<?php } ?> >
            <div class="shadow-soft" data-bgimage="url(<?php echo esc_url($img); ?>)">
                <div class="padding40 overlay60">
                    <?php if($data['title'] != ''){ ?><h3><?php echo $data['title']; ?></h3><?php } ?>
                	<?php if($data['desc'] != ''){ ?><p><?php echo $data['desc']; ?></p><?php } ?>
                    <?php if($data['btnlink'] != ''){ ?><a href="<?php echo esc_url($data['btnlink']); ?>" target="<?php if($target == '_blank'){ echo '_blank'; }else{ echo '_self'; } ?>" class="btn-line btn-fullwidth"><?php echo esc_attr($data['btntext']); ?></a><?php } ?>
                </div>
            </div>
        </div>
      <?php $i++; } ?>
   </div>

<?php
    return ob_get_clean();
}

// OT Home HTML5 Video
add_shortcode('home_video', 'home_video_func');
function home_video_func($atts, $content = null){
	extract(shortcode_atts(array(
		'video1'	=>  '',	
		'video2'	=>  '',
		'stitle'	=>  '',
		'btnlink'	=>  '',
		'btntext'	=>  '',
		'bgvideo'	=>  '',	
		'video_overlay'   =>  'overlay',
		'titles' => '',
		'custom_links_target'		=>  '',			
	), $atts));
	$titles = (array) vc_param_group_parse_atts( $titles );
	$img = wp_get_attachment_image_src($bgvideo,'full');
	$img = $img[0];
	$custom_links_target = (!empty($custom_links_target) ? $custom_links_target : '_self' );
	ob_start(); 
?>
	
	<div class="de-video-container full-height no-padding">
        <div class="de-video-content">
            <div class="text-center">
            	<?php if($stitle != ''){ ?>
	                <div class="teaser-text">
	                    <?php echo htmlspecialchars_decode($stitle); ?>
	                </div>
	                <div class="spacer-single"></div>
                <?php } ?>

                <div class="text-slider border-deco">
	                <?php 
						foreach ( $titles as $data ) {
							$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
					?>					 
						<div class="text-item"><?php echo htmlspecialchars_decode($data['title']); ?></div>    
					<?php } ?>  
                </div>
                <div class="spacer-single"></div>
                <?php if($btnlink != ''){ ?><a href="<?php echo esc_url($btnlink); ?>" target="<?php echo esc_attr($custom_links_target); ?>" class="btn-slider"><?php echo esc_attr($btntext); ?></a><?php } ?>
            </div>
        </div>

        <?php if ($video_overlay == 'dotted') { ?>
        	<div class="de-video-overlay dotted"></div>
        <?php }elseif ($video_overlay == 'overlay') {?>
        	<div class="de-video-overlay"></div>
        <?php }else{} ?> 

        <!-- load your video here -->
        <video autoplay="" loop="" muted="" poster="<?php echo esc_url($img); ?>">
            <?php if($video1 != ''){ ?> <source src="<?php echo esc_url($video1); ?>" type="video/mp4"> <?php } ?>
			<?php if($video2 != ''){ ?> <source src="<?php echo esc_url($video2); ?>" type="video/webm"> <?php } ?>
        </video>
    </div>

<?php
    return ob_get_clean();
}

// OT Home Parallax
add_shortcode('home_parallax', 'home_parallax_func');
function home_parallax_func($atts, $content = null){
	extract(shortcode_atts(array(	
		'stitle'	=>  '',
		'btnlink'	=>  '',
		'btntext'	=>  '',	
		'titles' => '',
		'btn_extra_class' => '',
		'custom_links_target'		=>  '',		
	), $atts));	
	$titles = (array) vc_param_group_parse_atts( $titles );
	$btn_extra_class1 = (!empty($btn_extra_class)) ? $btn_extra_class : 'btn-slider';
	$custom_links_target = (!empty($custom_links_target) ? $custom_links_target : '_self' );
	ob_start(); 
?>	
   
    <div class="center-y text-center">
    	<?php if($stitle != ''){ ?>
	        <div class="teaser-text">
	            <?php echo htmlspecialchars_decode($stitle) ?>
	        </div>
        <?php } ?>
        <div class="spacer-single"></div>
        <div class="text-slider border-deco">
        	<?php 
				foreach ( $titles as $data ) {
					$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
			?>					 
				<div class="text-item"><?php echo htmlspecialchars_decode($data['title']); ?></div>    
			<?php } ?>
        </div>
        <div class="spacer-double"></div>
        <div class="cleafix"></div>
        <?php if($btnlink != ''){ ?><a href="<?php echo esc_url($btnlink); ?>" target="<?php echo esc_attr($custom_links_target); ?>" class="<?php echo esc_attr($btn_extra_class1); ?>"><?php echo esc_attr($btntext); ?></a><?php } ?>
    </div>
   
<?php
    return ob_get_clean();
}

// OT Home Parallax 2 - use for Home Minimal
add_shortcode('home_parallax2', 'home_parallax2_func');
function home_parallax2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'logo'      =>  '',	
		'btnlink'	=>  '',	
		'titles' => ''
	), $atts));	
		$url_image = wp_get_attachment_image_src($logo, ''); 
		$image_src = $url_image[0];
		$titles = (array) vc_param_group_parse_atts( $titles );
	ob_start(); 
?>	
	<?php if ($logo != '') { ?>
		<div class="banner-logo text-center">
	        <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	    </div>
	<?php } ?>

    <div class="<?php if($logo != ''){ echo 'vertical-align'; }else{ echo 'center-y'; } ?> text-center">
        <div class="spacer-double"></div>
        <div class="text-slider border-deco">
        	<?php 
				foreach ( $titles as $data ) {
					$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
			?>					 
				<div class="text-item"><h1 class="title-2"><?php echo htmlspecialchars_decode($data['title']); ?></h1></div>    
			<?php } ?>
        </div>
        <div class="spacer-double"></div>
        <div class="spacer-double"></div>
    </div>

	<?php if($btnlink != ''){ ?>
		<a href="<?php echo esc_url($btnlink); ?>" class="scroll-to">
			<span class="mouse">
				<span class="scroll"></span>
			</span>
		</a>
	<?php } ?>
   
<?php
    return ob_get_clean();
}

// OT Home Text Static
add_shortcode('home_text', 'home_text_func');
function home_text_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'	=>  '',		
		'subtitle'	=>  '',		
	), $atts));	
	ob_start(); 
?>	
    <div class="center-y text-center">
    	<?php if ($title != '') { ?>
	        <div class="teaser-text">
		        <?php echo htmlspecialchars_decode($title) ?>	        
	        </div>
	        <div class="spacer-single"></div>
        <?php } ?>
        <?php if ($subtitle != '') { ?>
	        <h2 class="hero"><?php echo htmlspecialchars_decode($subtitle) ?></h2>
	        <div class="spacer-double"></div>
	        <div class="spacer-double"></div>
        <?php } ?>
    </div>
   
<?php
    return ob_get_clean();
}

// OT Home Parallax Image Landing
add_shortcode('home_landing', 'home_landing_func');
function home_landing_func($atts, $content = null){
	extract(shortcode_atts(array(
		'logo'	=>  '',		
		'title'	=>  '',
		'stitle'	=>  '',
		'linkbox'	=>  '',			
	), $atts));	
	$url = vc_build_link( $linkbox );
	$url_image = wp_get_attachment_image_src($logo, ''); 
	$image_src = $url_image[0];
	ob_start(); 
?>	
	
	<?php if ($logo != '') { ?>
		<div class="banner-logo text-center">
	        <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	    </div>
	<?php } ?>
   
    <div class="<?php if($logo != ''){ echo 'vertical-align'; }else{ echo 'center-y'; } ?> text-center">
    	<?php if ($logo != '') { ?>
			<div class="spacer-single"></div>
		<?php }else{ ?> 
			<div class="spacer-double"></div>
		<?php } ?>

    	<?php if($title != ''){ ?>
	        <h1 class="title"><?php echo htmlspecialchars_decode($title) ?></h1>
	    <?php  }  ?> 
	    
	    <?php if($stitle != ''){ ?>
	    	<div class="small-border"></div>
	    <?php }else{ ?>   
	    	<div class="spacer-single"></div>
	    <?php } ?>

        <?php if($stitle != ''){ ?>        	
	        <span class="teaser"><?php echo htmlspecialchars_decode($stitle) ?></span>
	        <div class="spacer-double"></div>
        <?php } ?>
        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
			echo '<a href="' . esc_attr( $url['url'] ) . '" class="btn-slider scroll-to" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
		} ?>        
    </div>
    
<?php
    return ob_get_clean();
}

// OT Home Landing Page HTML5 Video
add_shortcode('video_landing', 'video_landing_func');
function video_landing_func($atts, $content = null){
	extract(shortcode_atts(array(
		'logo'	=>  '',
		'mp4'	=>  '',	
		'webm'	=>  '',
		'title'	=>  '',
		'stitle'	=>  '',
		'linkbox'	=>  '',		
		'bgvideo'	=>  '',	
		'video_overlay'   =>  'overlay',		
	), $atts));
	$url = vc_build_link( $linkbox );
	$logo1 = wp_get_attachment_image_src($logo,'full');
	$logo1 = $logo1[0];

	$bgvideo1 = wp_get_attachment_image_src($bgvideo,'full');
	$bgvideo1 = $bgvideo1[0];
	ob_start(); 
?>
	<div class="full-height no-padding text-light" data-speed="5" data-type="background">
        <div class="de-video-container">
            <div class="de-video-content">
                <div class="text-center">
                	<?php if ($logo != '') { ?>
						<div class="text-center">
							<img src="<?php echo esc_url($logo1); ?>" alt="logo">
						</div>	
						<div class="spacer-double"></div>
						<div class="spacer-double"></div>
					<?php } ?>					
					
					<?php if($title != ''){ ?>
						<h1 class="title"><?php echo htmlspecialchars_decode($title); ?></h1>
						<div class="small-border"></div>
					<?php } ?>	
					
					<?php if($stitle != ''){ ?>
						<span class="teaser"><?php echo htmlspecialchars_decode($stitle); ?></span>
						<div class="spacer-double"></div>
                	<?php } ?>					
					
					<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
						echo '<a href="' . esc_attr( $url['url'] ) . '" class="btn-slider scroll-to" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
					} ?> 					                    
                </div>
            </div>

            <?php if ($video_overlay == 'dotted') { ?>
            	<div class="de-video-overlay dotted"></div>
            <?php }elseif ($video_overlay == 'overlay') {?>
            	<div class="de-video-overlay"></div>
            <?php }else{} ?>

            <video autoplay="" loop="" muted="" poster="<?php echo esc_url($bgvideo1); ?>">
                <?php if($mp4 != ''){ ?> <source src="<?php echo esc_url($mp4); ?>" type="video/mp4"> <?php } ?>
				<?php if($webm != ''){ ?> <source src="<?php echo esc_url($webm); ?>" type="video/webm"> <?php } ?>
            </video>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// OT Home Moving Background - New added 23/9/2016
add_shortcode('movingbg', 'movingbg_func');
function movingbg_func($atts, $content = null){
	extract(shortcode_atts(array(			
		'stitle'	=>  '',
		'bgmoving'	=> 	'',
		'linkbox'	=>	'',
		'time'	    => 	'',
		'titles' => '',
	), $atts));
	
	$url = vc_build_link( $linkbox );
	$img = wp_get_attachment_image_src($bgmoving,'full');
	$img = $img[0];

	$time1 = (!empty($time)) ? $time : 10;

	$titles = (array) vc_param_group_parse_atts( $titles );

	ob_start(); ?>

	<div class="de-video-container full-height no-padding">
		<div class="de-video-content">
			<div class="text-center">

		    	<?php if($stitle != ''){ ?>
			        <div class="teaser-text">
			            <?php echo htmlspecialchars_decode($stitle) ?>
			        </div>
			        <div class="spacer-single"></div>
		        <?php } ?>	

		        <div class="text-slider <?php if($stitle != ''){ echo'style-2'; }?> border-deco">
		            <?php 
						foreach ( $titles as $data ) {
							$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
					?>					 
						<div class="text-item"><?php echo htmlspecialchars_decode($data['title']); ?></div>    
					<?php } ?>
		        </div>

		        <?php if($stitle != ''){ ?>
		        	<div class="spacer-single"></div>
		        <?php }else{ ?>
					<div class="spacer-double"></div>
		        <?php } ?>

		        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '<a class="btn-slider" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" >' . esc_attr( $url['title'] ) . '</a>';
				} ?>		        
		    </div>	
		</div>			
		<div class="moving-home" style="background-image: url('<?php echo esc_url($img); ?>');"></div>				
	</div>
	<script type="text/javascript">		
		(function($) { "use strict";
			// Moving Background Image
			var x = 0;
	        setInterval(function(){
	            x-=1;
	            $('.moving-home').css('background-position', x + 'px 0');
	        }, <?php echo esc_attr($time1) ?>);
		})(jQuery);
	</script>		
<?php
    return ob_get_clean();
}

// OT Home Youtube Video - New added 23/9/2016
add_shortcode('home_youtubevideo', 'home_youtubevideo_func');
function home_youtubevideo_func($atts, $content = null){
	extract(shortcode_atts(array(				
		'stitle'	=>  '',
		'video_link'	=> 	'',
		'linkbox'	=>	'',	
		'video_overlay'   =>  'overlay',
		'titles' => ''
	), $atts));
	$titles = (array) vc_param_group_parse_atts( $titles );
	$url = vc_build_link( $linkbox );

	ob_start(); ?>

	<!-- youtube video background begin -->
    <div id="section-video-bg" class="full-height no-padding" data-speed="5" data-type="background">
        <div class="de-video-container">
            <div class="de-video-content">
                <div class="text-center">

                	<?php if($stitle != ''){ ?>
				        <div class="teaser-text">
				            <?php echo htmlspecialchars_decode($stitle) ?>
				        </div>
				        <div class="spacer-single"></div>
			        <?php }else{
			        	echo '<div class="spacer-double"></div>';
			        } ?>

					<div class="text-slider style-2 border-deco">
						<?php 
							foreach ( $titles as $data ) {
								$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
						?>					 
							<div class="text-item"><?php echo htmlspecialchars_decode($data['title']); ?></div>    
						<?php } ?>
					</div>

					<?php if($stitle != ''){ ?>
				        <div class="spacer-single"></div>
			        <?php }else{
			        	echo '<div class="spacer-double"></div>';
			        } ?>

			        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
						echo '<a class="btn-slider border-op-20" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" >' . esc_attr( $url['title'] ) . '</a>';
					} ?>
                </div>
            </div>

            <?php if ($video_overlay == 'dotted') { ?>
            	<div class="de-video-overlay dotted"></div>
            <?php }elseif ($video_overlay == 'overlay') {?>
            	<div class="de-video-overlay"></div>
            <?php }else{} ?>            
			
			<!-- Video Background - Here you need to replace the videoURL with your youtube video URL -->
			<a id="bgndVideo" class="player" data-property="{videoURL:'<?php echo esc_attr( $video_link ); ?>',containment:'#section-video-bg',autoPlay:true, mute:false, startAt:5, opacity:1}">youtube</a>
        </div>
    </div>
    <!-- youtube video background close -->	
<?php
    return ob_get_clean();
}

// OT Home Let it snow
add_shortcode('home_letitsnow', 'home_letitsnow_func');
function home_letitsnow_func($atts, $content = null){
	extract(shortcode_atts(array(	
		'title'     => '',
		'stitle'	=>  '',
		'linkbox'	=>  '',
		'logo'	=>  '',		
	), $atts));		
	$url = vc_build_link( $linkbox );
	$img = wp_get_attachment_image_src($logo, "full");
	$img = $img[0];
	ob_start(); 
?>		
	<?php if($logo != ''){ ?>
	<div class="<?php if($logo != ''){ echo 'vertical-align'; }else{ echo 'center-y'; } ?> text-center">		
		<div class="banner-logo text-center sm-hide">
		    <img src="<?php echo esc_url($img); ?>" alt="logo">
		</div>
	<?php } ?>

		<div class="<?php if($logo != ''){ echo 'vertical-align'; }else{ echo 'center-y'; } ?> text-center">
			<?php if($title != ''){ ?>
			    <div class="spacer-single"></div>
			    <h1 class="title-3"><strong><?php echo htmlspecialchars_decode($title) ?></strong></h1>
			    <div class="small-border"></div>
		    <?php } ?>
		    <?php if($stitle != ''){ ?>
			    <span class="teaser"><?php echo htmlspecialchars_decode($stitle) ?></span>
			    <div class="spacer-double"></div>
		    <?php } ?>
		    <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" class="btn-slider scroll-to">' . esc_attr( $url['title'] ) . '</a>';
			} ?>
		</div>

	<?php if($logo != ''){ ?>	
		<div class="spacer-double"></div>
	</div>
	<?php } ?>
   
<?php
    return ob_get_clean();
}

// OT Home Profession
add_shortcode('home_profession', 'home_profession_func');
function home_profession_func($atts, $content = null){
	extract(shortcode_atts(array(	
		'title'     => '',
		'stitle'	=>  '',
		'linkbox'	=>  '',
		'extraclass'	=>  '',
	), $atts));		
	$url = vc_build_link( $linkbox );
	$extraclass1 = (!empty($extraclass) ? esc_attr($extraclass) : 'btn-slider' );
	ob_start(); 
?>	

	<div class="center-y">		
		<?php if($title != ''){ ?>
		    <h2 class="style-3"><?php echo htmlspecialchars_decode($title) ?></h2>					    
	    <?php } ?>
	    <?php if($stitle != ''){ ?>
		    <div class="teaser-text-2"><?php echo htmlspecialchars_decode($stitle) ?></div>	
		    <div class="spacer-double"></div>				    
	    <?php } ?>
	    <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
			echo '<a href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" class="' . esc_attr( $extraclass1 ) . ' scroll-to">' . esc_attr( $url['title'] ) . '</a>';
		} ?>			
	</div>
   
<?php
    return ob_get_clean();
}

// Buttons Download - Landing Page
add_shortcode('download_btn', 'download_btn_func');
function download_btn_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon_fontawesome' 	=> '',
		'linkbox' 	=> '',
		'css' 	=> '',
	), $atts));
	$url = vc_build_link( $linkbox );
	ob_start(); 
?>			
	<div class="landing-download text-light text-center <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        <i class="<?php echo esc_attr($icon_fontawesome); ?> large id-color"></i>
        <div class="spacer-single"></div>
        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
			echo '<a href="' . esc_attr( $url['url'] ) . '" class="btn-line" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
		} ?>        
    </div>
    
<?php 
	return ob_get_clean();
}

// why choose us - Landing Page
add_shortcode('reasons', 'reasons_func');
function reasons_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon_fontawesome' 	=> '',
		'linkbox' 	=> '',
		'css' 	=> '',
		'number' 	=> '',
		'title' 	=> '',
		'desc' 	=> '',
		'reasons_type' => '',
		'box_style'  => '',
		'delay' => ''
	), $atts));
	$url = vc_build_link( $linkbox );
	$delay1 = (!empty($delay) ? esc_attr($delay) : '1' );
	ob_start(); 
?>			

	<div class="box-number <?php echo vc_shortcode_custom_css_class( $css ); if ($box_style == 'box_square'){echo 'square';} ?>">
        <span class="number bg-color wow rotateIn" data-wow-delay="<?php echo esc_attr($delay1); ?>s"> <?php if($reasons_type == 'icon_type'){ ?><i class="<?php echo esc_attr($icon_fontawesome); ?>"></i><?php }else{echo esc_attr($number); } ?></span>
        <div class="text">
            <h3>
	            <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '<a href="' . esc_attr( $url['url'] ) . '" class="btn-line" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">';
				} ?>  
					<span class="id-color"><?php echo esc_attr( $title ) ?></span>
				<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '</a>';
				} ?> 
			</h3>
            <p class="text-light"><?php echo htmlspecialchars_decode($desc); ?></p>
        </div>
    </div>
    
<?php 
	return ob_get_clean();
}

// Video Tour - Landing Page
add_shortcode('video_tour', 'video_tour_func');
function video_tour_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',		
		'video_url'		=>  '',
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	ob_start(); ?>

	<a class="popup-youtube" href="<?php echo esc_url($video_url); ?>">
        <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive">
    </a>	

<?php
    return ob_get_clean();
}

// Info Apps
add_shortcode('info_apps', 'info_apps_func');
function info_apps_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',		
		'icon'		=>  '',
		'desc'	=>  '',
		'style' =>  'right',
		'animation_delay' => '',
		'css'   =>  '',
		'icon_color' => '',
		'icontype'  => '',
		'iconawesome' => '',
		'iconimage' => '',
	), $atts));	
	$icon_color1 = (!empty($icon_color) ? 'style="color:'.esc_attr($icon_color).'"' : '');
	$animation_delay1 = (!empty($animation_delay) ? esc_attr($animation_delay) : '.5');
	$img = wp_get_attachment_image_src($iconimage,'full');
	$img = $img[0];

	$iconclass = '';
	if ($icontype == 'fontawesome') {
		$iconclass = 'fa fa-'.$iconawesome;
	}else{
		$iconclass = 'icon-'.$icon;
	}
	ob_start(); ?>		

    <div class="<?php echo vc_shortcode_custom_css_class( $css ); ?> box-icon-simple <?php if($style == 'left'){echo 'left';}elseif($style == 'center'){echo 'center';}else{echo 'right';} ?>">                
        <?php if ($icontype == 'iconimg') { ?>
	        <span class="icon-img wow bounceIn" data-wow-delay="<?php echo esc_attr($animation_delay1); ?>s">
	        	<img src="<?php echo esc_url($img); ?>">
	        </span>
	    <?php }else{ ?> 
	    	<i class="<?php echo esc_attr($iconclass); ?> wow bounceIn" data-wow-delay="<?php echo esc_attr($animation_delay1); ?>s" <?php echo $icon_color1; ?>></i>
	    <?php } ?> 
        <div class="text">
            <h3><span class="id-color"><?php echo htmlspecialchars_decode($title); ?></span></h3>
            <?php echo htmlspecialchars_decode($desc); ?>
        </div>
    </div>    

<?php
    return ob_get_clean();
}

// Info Apps 2
add_shortcode('info_apps2', 'info_apps2_func');
function info_apps2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',		
		'icon'		=>  '',
		'desc'	=>  '',
		'animation_delay' => '',
		'css'   =>  '',
		'icon_color' => '',
		'icontype'  => '',
		'iconawesome' => '',
		'iconimage' => '',
		'linkbox' => '',
		'border_box' => ''
	), $atts));	
	$icon_color1 = (!empty($icon_color) ? 'style="color:'.esc_attr($icon_color).'"' : '');
	$animation_delay1 = (!empty($animation_delay) ? esc_attr($animation_delay) : '.5');
	$img = wp_get_attachment_image_src($iconimage,'full');
	$img = $img[0];
	$iconclass = '';
	if ($icontype == 'fontawesome') {
		$iconclass = 'fa fa-'.$iconawesome;
	}else{
		$iconclass = 'icon-'.$icon;
	}
	$url = vc_build_link( $linkbox );
	ob_start(); ?>		

    <div class="<?php echo vc_shortcode_custom_css_class( $css ); ?> box-icon <?php if($border_box == 'yes'){ echo 'border'; } ?>">
	    <?php if ($icontype == 'iconimg') { ?>
	        <span class="icon-img wow fadeIn" data-wow-delay="<?php echo esc_attr($animation_delay1); ?>s">
	        	<img src="<?php echo esc_url($img); ?>">
	        </span>
	    <?php }else{ ?> 
	    	<span class="icon wow fadeIn" data-wow-delay="<?php echo esc_attr($animation_delay1); ?>s">
	        	<i class="id-color <?php echo esc_attr($iconclass); ?>" <?php echo $icon_color1; ?>></i>
	        </span>
	    <?php } ?>   
        <div class="text">
            <h3><?php echo htmlspecialchars_decode($title); ?></h3>
            <p><?php echo htmlspecialchars_decode($desc); ?></p>
            <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a  class="strong id-color" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
			} ?>
        </div>        
    </div>    

<?php
    return ob_get_clean();
}

// Testimonial Silder
add_shortcode('testslide','testslide_func');
function testslide_func($atts, $content = null){
	extract(shortcode_atts(array(
		'visible'	=>		'',
		'number'	=>		'',
		'autoplay'	=>		'no',
		'slidespeed' => '',
		'paginationspeed' => '',
		'rewindspeed' => '',
		'idcate_testimonials' => '',
	), $atts));
	$visible1 = (!empty($visible) ? $visible : 2);
	$number1 = (!empty($number) ? $number : 4);
	$slidespeed1 = (!empty($slidespeed) ? $slidespeed : 200);
	$paginationspeed1 = (!empty($paginationspeed) ? $paginationspeed : 800);
	$rewindspeed1 = (!empty($rewindspeed) ? $rewindspeed : 1000);	
	$id = uniqid( 'testimonial-carousel-' );
	ob_start(); 
?>
		
	<div id="<?php echo esc_attr($id); ?>" class="de_carousel  wow fadeInUp" data-wow-delay=".3s">
	<?php

		if ($idcate_testimonials != '') {
    		$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category_testimonial',
						'field' => 'slug',
						'terms' => explode(',',$idcate_testimonials)
					),
				),
				'post_type' => 'testimonial',
				'showposts' => $number1,
			);
    	}else{
        	$args = array(
				'post_type' => 'testimonial',
				'showposts' => $number1,
			);
        }
		$testimonial = new WP_Query($args);
		if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
		$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
	?>
        <div class="col-md-6 item">
            <div class="de_testi">
                <blockquote>
                    <?php the_content(); ?>
                    <div class="de_testi_by">
                        <?php the_title(); ?><?php if($job != '') { ?>, <?php echo htmlspecialchars_decode($job); ?><?php } ?>
                    </div>
                </blockquote>

            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
    <script type="text/javascript">
    	jQuery(document).ready(function() {		
			'use strict';
			jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
			    items : <?php echo esc_attr($visible1); ?>,
				itemsDesktop : [1199,2],
				itemsDesktopSmall : [980,2],
			    itemsTablet: [768,1],
			    itemsTabletSmall: false,
			    itemsMobile : [479,1],
			    navigation : false,
				autoHeight : true,
				autoPlay : <?php if($autoplay == 'yes'){echo 'true';}else{echo 'false';} ?>,
				slideSpeed : <?php echo esc_attr($slidespeed1); ?>,
		        paginationSpeed : <?php echo esc_attr($paginationspeed1); ?>,
		        rewindSpeed : <?php echo esc_attr($rewindspeed1); ?>,
		   		navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		    });
		});
    </script>
<?php
    return ob_get_clean();
}

// Testimonial Grid
add_shortcode('testgrid','testgrid_func');
function testgrid_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'testimonial_columns'   => 	4,
		'idcate_testimonials' => '',
	), $atts));
	$number1 = (!empty($number) ? $number : 4);
	ob_start(); 
?>
	
	<div id="testimonial-masonry" class="masonry">
		<?php
			if ($idcate_testimonials != '') {
	    		$args = array(
					'tax_query' => array(
						array(
							'taxonomy' => 'category_testimonial',
							'field' => 'slug',
							'terms' => explode(',',$idcate_testimonials)
						),
					),
					'post_type' => 'testimonial',
					'showposts' => $number1,
				);
	    	}else{
	        	$args = array(
					'post_type' => 'testimonial',
					'showposts' => $number1,
				);
	        }
			$testimonial2 = new WP_Query($args);
			if($testimonial2->have_posts()) : while($testimonial2->have_posts()) : $testimonial2->the_post();
			$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
		?>
			<div class="<?php if ($testimonial_columns == 2) {echo 'col-md-6'; }elseif ($testimonial_columns == 3) { echo 'col-md-4'; }else{echo 'col-md-3';} ?> item">
				<div class="de_testi">
					<blockquote>
						<?php the_content(); ?>
						<div class="de_testi_by">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="de_testi_pic">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php endif; ?>
							<div class="de_testi_company">
								<strong><?php the_title(); ?></strong><?php if($job != '') { ?>, <?php echo htmlspecialchars_decode($job); ?><?php } ?>
							</div>
						</div>
					</blockquote>					
				</div>
			</div>     
		<?php endwhile; wp_reset_postdata(); endif; ?>		
	</div>
<?php
    return ob_get_clean();
}

// Services Grid
add_shortcode('services','services_func');
function services_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'style'     =>		'imageabove',
		'services_columns'   => 	4,
		'button_style'     =>	'full',
		'btntext'  =>  '',
		'show_btn'  =>	'yes',
		'idcate_services' => '',		
	), $atts));
	$number1 = (!empty($number) ? $number : 4);
	$btntext = (!empty($btntext) ? $btntext : 'Read More');
	ob_start(); 
?>
<div id="services-masonry" class="masonry row">
	<?php
		if ($idcate_services != '') {
    		$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category_service',
						'field' => 'slug',
						'terms' => explode(',',$idcate_services)
					),
				),
				'post_type' => 'service',
				'showposts' => $number1,
			);
    	}else{
        	$args = array(
				'post_type' => 'service',
				'showposts' => $number1,
			);
        }
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); 
	?>

	<div class="<?php if ($services_columns == 2) {echo 'col-md-6'; }elseif ($services_columns == 3) { echo 'col-md-4'; }else{echo 'col-md-3';} ?> item">
		
		<?php if($style == 'noimage'){ ?>
		
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
			<?php if ($show_btn != 'no') { ?>
				<div class="spacer-single-10"></div>								
				<a href="<?php the_permalink(); ?>" class="btn-line <?php if($button_style == 'full'){echo 'btn-fullwidth';} ?>"><?php echo esc_attr($btntext); ?></a>
			<?php } ?>

		<?php }elseif($style == 'imagebelow'){ ?>
			
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="spacer-single-10"></div>
		        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array( 'class' => 'img-responsive' )); ?></a>
			<?php endif; ?>
			<?php if ($show_btn != 'no') { ?>
				<div class="spacer-single"></div>			
				<a href="<?php the_permalink(); ?>" class="btn-line <?php if($button_style == 'full'){echo 'btn-fullwidth';} ?>"><?php echo esc_attr($btntext); ?></a>		
			<?php } ?>

		<?php }else{ ?>			
				
			<?php if ( has_post_thumbnail() ) : ?>
		        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array( 'class' => 'img-responsive' )); ?></a>
		        <div class="spacer-single"></div>
			<?php endif; ?>   
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
			<?php if ($show_btn != 'no') { ?>
				<div class="spacer-single-10"></div>								
				<a href="<?php the_permalink(); ?>" class="btn-line <?php if($button_style == 'full'){echo 'btn-fullwidth';} ?>"><?php echo esc_attr($btntext); ?></a>
			<?php } ?>

		<?php } ?>

	</div>

	<?php endwhile; wp_reset_postdata(); endif; ?>	
</div>	

<?php
    return ob_get_clean();
}	

// Services Grid 2
add_shortcode('services2','services2_func');
function services2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'services_columns'  =>  3,
		'btntext' => '',
		'show_btn'  =>	'yes',
		'idcate_services' => '',
	), $atts));
	$number1 = (!empty($number) ? $number : 3);
	$btntext = (!empty($btntext) ? $btntext : 'Read More');
	ob_start(); 
?>

<div class="display-table">
	<?php
		$i = 0;
		if ($idcate_services != '') {
    		$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category_service',
						'field' => 'slug',
						'terms' => explode(',',$idcate_services)
					),
				),
				'post_type' => 'service',
				'showposts' => $number1,
			);
    	}else{
        	$args = array(
				'post_type' => 'service',
				'showposts' => $number1,
			);
        }
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); $i++;
	?>

		<div class="<?php if ($services_columns == 2) {echo 'box-two-columns'; }elseif ($services_columns == 3) { echo 'box-one-third'; }else{echo 'box-four-columns';} ?> text-middle text-light wow fadeInRight" data-wow-delay="<?php echo esc_attr($i); ?>s" style="background-image: url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>);">
            <div class="mask-overlay"></div>
            <div class="padding40 z-index-2">
                <h3><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
                <?php if ($show_btn != 'no') { ?>
                	<a href="<?php the_permalink(); ?>" class="btn-line btn-fullwidth"><?php echo esc_attr($btntext); ?></a>
                <?php } ?>
            </div>
        </div>
	
	<?php endwhile; wp_reset_postdata(); endif; ?>	
</div>	

<?php
    return ob_get_clean();
}		

// Services Grid 3
add_shortcode('services3','services3_func');
function services3_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'services_columns'  =>  3,
		'btntext' => '',
		'show_btn'  =>	'yes',
		'idcate_services' => '',
	), $atts));
	$number1 = (!empty($number) ? $number : 3);
	$btntext = (!empty($btntext) ? $btntext : 'Read More');
	ob_start(); 
?>

<div class="row">
	<?php
		$i = 0;
		if ($idcate_services != '') {
    		$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category_service',
						'field' => 'slug',
						'terms' => explode(',',$idcate_services)
					),
				),
				'post_type' => 'service',
				'showposts' => $number1,
			);
    	}else{
        	$args = array(
				'post_type' => 'service',
				'showposts' => $number1,
			);
        }
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); $i++;
	?>

		<div class="<?php if ($services_columns == 2) {echo 'col-md-6'; }elseif ($services_columns == 3) { echo 'col-md-4'; }else{echo 'col-md-3';} ?> text-middle text-light wow fadeInRight" data-wow-delay="<?php echo esc_attr($i); ?>s">
            <div class="shadow-soft" data-bgimage="url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>)">
                <div class="padding50 overlay60">
                    <h3><?php the_title(); ?></h3>
                	<?php the_excerpt(); ?>
                	<?php if ($show_btn != 'no') { ?>
                    	<a href="<?php the_permalink(); ?>" class="btn-line btn-fullwidth"><?php echo esc_attr($btntext); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
	
	<?php endwhile; wp_reset_postdata(); endif; ?>	
</div>	

<?php
    return ob_get_clean();
}	

// Services List
add_shortcode('serviceslist','serviceslist_func');
function serviceslist_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'btntext' => '',
		'show_btn'  =>	'yes',
		'idcate_services' => '',
	), $atts));
	$number1 = (!empty($number) ? $number : 4);
	$btntext = (!empty($btntext) ? $btntext : 'Read More');
	ob_start(); 
?>

	<?php
		$i = 0;
		if ($idcate_services != '') {
    		$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'category_service',
						'field' => 'slug',
						'terms' => explode(',',$idcate_services)
					),
				),
				'post_type' => 'service',
				'showposts' => $number1,
			);
    	}else{
        	$args = array(
				'post_type' => 'service',
				'showposts' => $number1,
			);
        }
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); $i++;
	?>

		
		<section class="side-bg no-padding service-list" id="section-service-<?php echo esc_attr($i); ?>">

			<?php if ($i % 2 == 0) { ?>
			
            <div class="image-container col-md-5 pull-left" data-delay="0">
                <div class="background-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
            </div>
			
            <div class="container">
                <div class="row">
                    <div class="inner-padding">
                        <div data-wow-delay=".5s" class="col-md-6 col-md-offset-6 wow fadeInRight">
                            <h3 class="id-color"><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <?php if ($show_btn != 'no') { ?>
								<div class="spacer-single"></div>
	                            <a class="btn-line" href="<?php the_permalink(); ?>"><?php echo esc_attr($btntext); ?></a>
							<?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <?php }else{ ?>

            <div data-delay="0" class="image-container col-md-5 col-md-offset-7 pull-right right0">
                <div class="background-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
            </div>
			
            <div class="container">
                <div class="row">
                    <div class="inner-padding">
                        <div data-wow-delay=".5s" class="col-md-6 wow fadeInLeft">
                            <h3 class="id-color"><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <?php if ($show_btn != 'no') { ?>
								<div class="spacer-single"></div>
	                            <a class="btn-line" href="<?php the_permalink(); ?>"><?php echo esc_attr($btntext); ?></a>
							<?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </section>            
	
	<?php endwhile; wp_reset_postdata(); endif; ?>	

<?php
    return ob_get_clean();
}		

// Text Typing
add_shortcode('text_typing','text_typing_func');
function text_typing_func($atts, $content = null){
	extract(shortcode_atts(array(
		'text_static' => '',
		'titles' => ''
	), $atts));	
	$titles = (array) vc_param_group_parse_atts( $titles );
	ob_start(); 
?>

<div class="typing-wrap">
    <?php echo esc_attr($text_static); ?>
	<div class="typed-strings">
		<?php 
			foreach ( $titles as $data ) {
				$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
		?>
			<p><?php echo esc_attr($data['title']); ?></p>	
		<?php } ?>								
	</div>
    <span class="typed"></span>
</div>

<?php
    return ob_get_clean();
}	
			
// OT Process
add_shortcode('process','process_func');
function process_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'idcate_process' => '',
		'style_circles' => 'circles_text',
		'active_circletab' => '',
		'tabs_shape'  => '',
		'extra_class' => '',
	), $atts));

	$number1 = (!empty($number) ? $number : 6);
	$active_circletab1 = (!empty($active_circletab) ? $active_circletab : 1);
	$process_class = '';
	if ($style_circles == 'circles_textimage') {
	 	$process_class = 'process-circle-textimage';
	} elseif ($style_circles == 'circles_image') {
	 	$process_class = 'process-circle-image';
	} else{
	 	$process_class = '';
	}

	ob_start(); ?>

    <div class="de_tab tab_steps tab_<?php echo esc_attr($number1); ?> <?php echo esc_attr($extra_class); ?> <?php if($tabs_shape == 'shape_square'){ echo 'tabs-square'; } ?>">
        <ul class="de_nav <?php echo esc_attr($process_class); ?>">
	        <?php
	        	$i=1;
	        	if ($idcate_process != '') {
	        		$args = array(
						'tax_query' => array(
							array(
								'taxonomy' => 'category_process',
								'field' => 'slug',
								'terms' => explode(',',$idcate_process)
							),
						),
						'post_type' => 'process',
						'showposts' => $number1,
					);
	        	}else{
		        	$args = array(
						'post_type' => 'process',
						'showposts' => $number1,
					);
		        }
				$process = new WP_Query($args);
				if($process->have_posts()) : while($process->have_posts()) : $process->the_post(); 
			?>
	            <li class="<?php if($i==$active_circletab1){echo 'active';} ?> wow fadeIn" data-wow-delay="<?php echo esc_attr($i*0.4); ?>s">
		            <?php if ($style_circles != 'circles_text') { ?>
		            	<span class="content-mid">
		            		<div class="inner">		            				            	
			            		<?php if( function_exists( 'rwmb_meta' ) ) { ?>
					                <?php $images = rwmb_meta( '_cmb_process_icon', "type=image" ); ?>
					                <?php if($images != ''){ ?>              
					                    <?php  foreach ( $images as $image ) {  ?>
					                        <?php $img = $image['full_url']; ?>
					                        <img src="<?php echo esc_url($img); ?>" alt="<?php the_title(); ?>">
					                    <?php } ?>                
					                <?php } ?>
					            <?php } ?>
			            		<small><?php the_title(); ?></small>
		            		</div>
		            	</span>
		            <?php }else{ ?>
		            	<span><?php the_title(); ?></span>
		            <?php } ?>		            
		            <div class="v-border"></div>
	            </li>
	            
	        <?php $i++; endwhile; wp_reset_postdata();  endif; ?>
        </ul>

        <div class="de_tab_content">
	        <?php
				if ($idcate_process != '') {
	        		$args = array(
						'tax_query' => array(
							array(
								'taxonomy' => 'category_process',
								'field' => 'slug',
								'terms' => explode(',',$idcate_process)
							),
						),
						'post_type' => 'process',
						'showposts' => $number1,
					);
	        	}else{
		        	$args = array(
						'post_type' => 'process',
						'showposts' => $number1,
					);
		        }
				$process = new WP_Query($args);
				if($process->have_posts()) : while($process->have_posts()) : $process->the_post();		
			?>
	            <div id="tab-<?php the_ID(); ?>" class="de_tab_content_inner">
	                <?php the_content(); ?>
	            </div>
	        <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Quick View (use)
add_shortcode('quickview', 'quickview_func');
function quickview_func($atts, $content = null){
	extract(shortcode_atts(array(				
		'title'		=>  '',
		'photo'		=> 	'',
		'columns'   =>  '',
		'img_position' => ''
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];

	$img_halfrow = array();	
	$content_halfrow = array();	
	$animated = '';
	
	if ($img_position == 'imgright') {
		$img_halfrow[] =  'pull-right right0';
		$animated = 'fadeInLeft';
		if($columns == 4){
			$img_halfrow[] = 'col-md-4 col-md-offset-8';
			$content_halfrow[] = 'col-md-8';
		}elseif ($columns == 5) {
			$img_halfrow[] = 'col-md-5 col-md-offset-7';
			$content_halfrow[] = 'col-md-6';
		}elseif ($columns == 7) {
			$img_halfrow[] = 'col-md-7 col-md-offset-5';
			$content_halfrow[] = 'col-md-4';
		}else {
			$img_halfrow[] = 'col-md-6 col-md-offset-6';
			$content_halfrow[] = 'col-md-5';
		}
	}else {		
		$img_halfrow[] =  'pull-left';
		$animated = 'fadeInRight';
		if($columns == 4){
			$img_halfrow[] = 'col-md-4';
			$content_halfrow[] = 'col-md-8 col-md-offset-4';
		}elseif ($columns == 5) {
			$img_halfrow[] = 'col-md-5';
			$content_halfrow[] = 'col-md-6 col-md-offset-6';
		}elseif ($columns == 7) {
			$img_halfrow[] = 'col-md-7';
			$content_halfrow[] = 'col-md-3 col-md-offset-9';
		}else {
			$img_halfrow[] = 'col-md-6';
			$content_halfrow[] = 'col-md-5 col-md-offset-7';
		}
	}

	ob_start(); ?>

	<div class="side-bg">
		<div class="image-container <?php echo implode( ' ', $img_halfrow ); ?>" style="background-image:url(<?php echo esc_url($img); ?>); ?>" data-delay="0"></div>
        <div class="container">
            <div class="row">
                <div class="inner-padding">
                    <div class="<?php echo implode( ' ', $content_halfrow ); ?> wow <?php echo esc_attr($animated); ?>" data-wow-delay=".2s">
                        <h2><?php echo htmlspecialchars_decode($title); ?></h2><br/>
                        <?php echo htmlspecialchars_decode($content); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
	</div>

<?php
    return ob_get_clean();
}

// Quick View 2 - Landing Page
add_shortcode('quickview2', 'quickview2_func');
function quickview2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>  '',
		'photo'		=> 	'',
		'columns'   =>  '',
		'img_position' => ''
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];

	$img_halfrow = array();	
	$content_halfrow = array();	
	$animated = '';
	$animated2 = '';
	
	if ($img_position == 'imgright') {
		$img_halfrow[] =  'pull-right right0';
		$animated = 'fadeInLeft';
		$animated2 = 'slideInRight';
		if($columns == 4){
			$img_halfrow[] = 'col-md-4 col-md-offset-8';
			$content_halfrow[] = 'col-md-8';
		}elseif ($columns == 5) {
			$img_halfrow[] = 'col-md-5 col-md-offset-7';
			$content_halfrow[] = 'col-md-6';
		}elseif ($columns == 7) {
			$img_halfrow[] = 'col-md-7 col-md-offset-5';
			$content_halfrow[] = 'col-md-4';
		}else {
			$img_halfrow[] = 'col-md-6 col-md-offset-6';
			$content_halfrow[] = 'col-md-5';
		}
	}else {		
		$img_halfrow[] =  'pull-left';
		$animated = 'fadeInRight';
		$animated2 = 'slideInLeft';
		if($columns == 4){
			$img_halfrow[] = 'col-md-4';
			$content_halfrow[] = 'col-md-8 col-md-offset-4';
		}elseif ($columns == 5) {
			$img_halfrow[] = 'col-md-5';
			$content_halfrow[] = 'col-md-6 col-md-offset-6';
		}elseif ($columns == 7) {
			$img_halfrow[] = 'col-md-7';
			$content_halfrow[] = 'col-md-3 col-md-offset-9';
		}else {
			$img_halfrow[] = 'col-md-6 col-sm-6';
			$content_halfrow[] = 'col-md-5 col-md-offset-7';
		}
	}

	ob_start(); ?>

	<div class="side-bg">
		<div class="image-container <?php echo implode( ' ', $img_halfrow ); ?>" data-delay="0">
	        <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive hidden-phone wow <?php echo esc_attr($animated2); ?>" data-wow-duration="1.5s">
	    </div>

	    <div class="container">
	        <div class="row">
	            <div class="inner-padding">
	                <div class="<?php echo implode( ' ', $content_halfrow ); ?> wow <?php echo esc_attr($animated); ?>" data-wow-delay=".25s">
	                    <h2><?php echo htmlspecialchars_decode($title); ?></h2>
	                    <?php echo htmlspecialchars_decode($content); ?>
	                </div>
	                <div class="clearfix"></div>
	            </div>
	        </div>
	    </div>	
	</div>
	
<?php
    return ob_get_clean();
}

// Blog Slider Latest News
add_shortcode('latestblog','latestblog_func');
function latestblog_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>	'',
		'excerpt'   =>	'',
		'read_more' =>  '',
		'btntext'   =>  '',
		'show_date' =>  '',
		'visible' 	=>  '',
	), $atts));

	$number1 = (!empty($number) ? $number : 6);
	$visible1 = (!empty($visible) ? $visible : 2);
	$excerpt1 = (!empty($excerpt) ? $excerpt : 19);
	$btntext1 = (!empty($btntext) ? $btntext : 'Read More');
	$id = uniqid( 'blog-carousel-' );

	 ob_start(); ?>	
	
    <div class="clearfix"></div>			
    <ul id="<?php echo esc_attr($id); ?>" class="blog-carousel blog-list blog-snippet wow fadeInUp">
    	<?php 
		    $args = array(   
		        'post_type' => 'post',   
		        'posts_per_page' => $number1,
		    );  
		    $wp_query = new WP_Query($args);
		    while($wp_query->have_posts()) : $wp_query->the_post(); 
	    ?>
        <li class="col-md-6 item">
            <div class="post-content">
                <div class="post-image">
                    <?php $format = get_post_format();
                    	  $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
 						  $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
                    <?php if($format=='audio'){ ?>
	                    <?php if ( has_post_thumbnail() ) { ?>
	                    	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail('thumb-blog') ?>
							</a>
						<?php }else{ ?>
	                      	<?php echo rwmb_meta( '_cmb_link_audio', 'type=oembed' ); // if you want get url: $url = get_post_meta( get_the_ID(), '_cmb_link_video', true ); echo $url; ?>        
	        			<?php } ?>
                  	<?php } elseif($format=='video'){ ?>
	                  	<?php if ( has_post_thumbnail() ) { ?>
	                  		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail('thumb-blog') ?>
							</a> 
	                  	<?php }else{ ?>
	                        <?php echo rwmb_meta( '_cmb_link_video', 'type=oembed' ); // if you want get url: $url = get_post_meta( get_the_ID(), '_cmb_link_video', true ); echo $url; ?>        
	       				<?php } ?>
                  	<?php } elseif($format=='gallery'){ ?>                  	
	                  	<?php if ( has_post_thumbnail() ) { ?>
	                  		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail('thumb-blog') ?>	
							</a>												
						<?php } ?>
                  	<?php } else { ?>
	                  	<?php if ( has_post_thumbnail() ) { ?>
	                  		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail('thumb-blog') ?>
							</a>
						<?php }else{ ?>
		                    <?php if( function_exists( 'rwmb_meta' ) ) { ?>
		                        <?php $images = rwmb_meta( '_cmb_image', "type=image_advanced&size=full" ); ?>
		                        <?php if($images){ ?>
		                        	<?php  foreach ( $images as $image ) {  ?>                        
				                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				                            <?php echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />"; ?>
				                        </a>
				                    <?php } ?> 
		                        <?php } ?>
		                  	<?php } ?>
                  		<?php } ?>
                  	<?php } ?>
                </div>
                <?php if(empty($show_date)){ ?>
	                <div class="date-box">
	                    <div class="day"><?php the_time('d'); ?></div>
	                    <div class="month"><?php the_time('M'); ?></div>
	                </div>
                <?php } ?>

                <div class="post-text <?php if(!empty($show_date)){ echo 'paddleft0'; } ?>">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo archi_blog_excerpt($excerpt1); ?></p>
                </div>

                <?php if(!empty($read_more)): ?>
                	<a href="<?php the_permalink(); ?>" class="btn-more"> 
                		<?php if ($btntext != ''){ echo esc_attr($btntext1); }else{ echo esc_html__('Read More', 'archi'); } ?>
                	</a>
                <?php endif; ?>
            </div>
        </li>
       <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    <script type="text/javascript">
    	jQuery(document).ready(function() {		
			'use strict';
			jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
			    items : <?php echo esc_attr($visible1); ?>,
			    itemsDesktop : [1199, 3],
		        itemsDesktopSmall : [979, 2],
		        itemsTablet : [768, 2],
		        itemsTabletSmall : [767, 2],
		        itemsMobile : [479, 1],
			    navigation : false,
				pagination : true,
				autoPlay : true
		    });	
		});
    </script>
    
<?php
    return ob_get_clean();
}

// Blog List Latest News
add_shortcode('bloglist','bloglist_func');
function bloglist_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>	'',
		'excerpt'   =>	'',
		'read_more' =>  '',
		'btntext'   =>  '',
		'show_date' =>  '',
	), $atts));

	$number1 = (!empty($number) ? $number : 5);
	$excerpt1 = (!empty($excerpt) ? $excerpt : 30);
	$btntext1 = (!empty($btntext) ? $btntext : 'Read More');

	ob_start(); ?>	

	<ul class="blog-list">  
		<?php 
			if ( get_query_var('paged') ) {
			    $paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			    $paged = get_query_var('page');
			} else {
			    $paged = 1;
			}
		    $args = array(   
		    	'paged' => $paged,
		        'post_type' => 'post',   
		        'posts_per_page' => $number1,
		    );  
		    $the_query = new WP_Query($args);
		    while($the_query->have_posts()) : $the_query->the_post(); 
	    ?>                     
            <li class="wow fadeInUp">
	            <div class="post-content">
	                <div class="post-image">
	                    <?php 
							$format = get_post_format();
							$link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
							$link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); 
	 					?>
	                    <?php if($format=='audio'){ ?>
	                    	<?php if($link_audio != ''){ ?>
				                <?php echo rwmb_meta( '_cmb_link_audio', 'type=oembed' ); // if you want get url: $url = get_post_meta( get_the_ID(), '_cmb_link_video', true ); echo $url; ?>        
				            <?php }else{ ?>
				                <?php if ( has_post_thumbnail() ) : ?>
								    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								        <?php the_post_thumbnail('full'); ?>
								    </a>
								<?php endif; ?>
				            <?php } ?>
	                  	<?php } elseif($format=='video'){ ?>
		                  	<?php if($link_video != ''){ ?>
				                <?php echo rwmb_meta( '_cmb_link_video', 'type=oembed' ); // if you want get url: $url = get_post_meta( get_the_ID(), '_cmb_link_video', true ); echo $url; ?>        
				            <?php }else{ ?>
				                <?php if ( has_post_thumbnail() ) : ?>
				                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				                        <?php the_post_thumbnail('full'); ?>
				                    </a>
				                <?php endif; ?>
				            <?php } ?>
	                  	<?php } elseif($format=='gallery'){ ?>
	                  		<div id="owl-demo-<?php the_ID(); ?>" class="owl-carousel">
					            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
					              <?php $images = rwmb_meta( '_cmb_images', "type=image_advanced&size=full" ); ?>
					              <?php if($images){ ?>                  
					                <?php foreach ( $images as $image ) { ?>
					                  <div class="item"><?php echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />"; ?></div> 
					                <?php } ?>                                     
					              <?php } ?>
					            <?php } ?>
					        </div>
					        <script type="text/javascript">
					        	<?php global $archi_option; ?>
							  	(function($){
							  	"use strict";
								    $(document).ready(function() {
								      	$("#owl-demo-<?php the_ID(); ?>").owlCarousel({        
									        items : 1,
									        autoPlay: <?php if($archi_option['post-slide-autoplay']!=false){echo 'true';}else{echo 'false';} ?>,
									        slideSpeed : <?php echo esc_attr($archi_option['post-slide-speed']); ?>,
									        paginationSpeed : <?php echo esc_attr($archi_option['post-slide-pagination-speed']); ?>,
									        rewindSpeed : <?php echo esc_attr($archi_option['post-slide-rewind-speed']); ?>,
									        singleItem:true,
									        transitionStyle : <?php if($archi_option['post-slide-transition']!=false){echo "'fade'";}else{echo "false";} ?>,
								      	});
								    });
								})(this.jQuery);
							</script>
	                  	<?php } else { ?>
		                  	<?php if ( has_post_thumbnail() ) { ?>
		                  		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail('full') ?>
								</a>
							<?php }else{ ?>
			                    <?php if( function_exists( 'rwmb_meta' ) ) { ?>
			                        <?php $images = rwmb_meta( '_cmb_image', "type=image_advanced&size=full" ); ?>
			                        <?php if($images != ''){ ?>
			                        	<?php  foreach ( $images as $image ) {  ?>                        
					                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					                            <?php echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />"; ?>
					                        </a>
					                    <?php } ?>
			                        <?php } ?>
			                  	<?php } ?>
	                  		<?php } ?>
	                  	<?php } ?>
	                </div>
	                <?php if(empty($show_date)){ ?>
		                <div class="date-box">
		                    <div class="day"><?php the_time('d'); ?></div>
		                    <div class="month"><?php the_time('M'); ?></div>
		                </div>
	                <?php } ?>

	                <div class="post-text <?php if(!empty($show_date)){ echo 'paddleft0'; } ?>">
	                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	                    <p><?php echo archi_blog_excerpt($excerpt1); ?></p>
	                </div>

	                <?php if(!empty($read_more)): ?>
	                	<a href="<?php the_permalink(); ?>" class="btn-more"> 
	                		<?php if ($btntext != ''){ echo esc_attr($btntext1); }else{ echo esc_html__('Read More', 'archi'); } ?>
	                	</a>
	                <?php endif; ?>
	            </div>
	        </li>
        <?php endwhile; ?>       
    </ul>

    <div class="pagination w100 text-center">
        <?php
        	if ( get_query_var('paged') ) {
			    $paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			    $paged = get_query_var('page');
			} else {
			    $paged = 1;
			}
			$big = 999999999;
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'total' => $the_query->max_num_pages,                      
				'prev_text' => '<i class="fa fa-angle-double-left"></i>',
				'next_text' => '<i class="fa fa-angle-double-right"></i>',       
				'type'          => 'list',
				'end_size'      => 3,
				'mid_size'      => 3
			) );
		?>		
    </div>
    <?php wp_reset_postdata(); ?>
    
<?php
    return ob_get_clean();
}

// Our Facts
add_shortcode('ourfacts', 'ourfacts_func');
function ourfacts_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'number'    => 	'',
		'icon'		=>  '',
		'css'		=>  '',
	), $atts));
	ob_start(); ?>

	<div class="de_count <?php echo vc_shortcode_custom_css_class( $css ) ?>">
        <?php if($icon != ''){ ?><i class="icon-<?php echo esc_attr($icon); ?> wow zoomIn" data-wow-delay="0"></i><?php } ?>
        <h3 class="timer" data-to="<?php echo esc_attr($number); ?>" data-speed="2500">0</h3>
        <span><?php echo htmlspecialchars_decode($title); ?></span>
    </div>

<?php
    return ob_get_clean();
}

// Logos Client
add_shortcode('logos', 'logos_func');
function logos_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'visible'		=>  '',
		'custom_links_target'		=>  '',
	), $atts));
	$custom_links_target = (!empty($custom_links_target) ? $custom_links_target : '_self' );
	$id = uniqid('logo-carousel-');
	ob_start(); ?>

    <div class="logo-carousel">
        <ul id="<?php echo esc_attr($id); ?>" class="slides">
            <?php $img_ids = explode(",",$gallery);
            foreach( $img_ids AS $img_id ){
            $meta = wp_prepare_attachment_for_js($img_id);			
			$title = $meta['title'];	
			$caption = $meta['caption'];
			$description = $meta['description'];	
            $image_src = wp_get_attachment_image_src($img_id,''); ?>
            <li>
            <?php if ($caption != '') { ?>
            	<a href="<?php echo esc_url($caption); ?>" target="<?php echo esc_attr($custom_links_target); ?>" ><img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>"></a>
            <?php }else{ ?>
                <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>">
            <?php } ?>    
            </li>
            <?php } ?>
        </ul>
    </div> 
    <script type="text/javascript">
    	jQuery(document).ready(function() {		
			'use strict';
			jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
			    items : <?php echo esc_attr($visible); ?>,
			    itemsDesktop : [1199, 4],
		        itemsDesktopSmall : [979, 3],
		        itemsTablet : [768, 3],
		        itemsTabletSmall : [767, 2],
		        itemsMobile : [479, 1],
			    navigation : false,
				pagination : false,
				autoPlay : true
		    });	
		    // --------------------------------------------------	
			//  logo carousel hover
			jQuery("#<?php echo esc_attr($id); ?> img").on("mouseenter", function () {
			 	jQuery(this).fadeTo(150,.5);
			}).on("mouseleave", function () {
			 	jQuery(this).fadeTo(150,1);	 
		  	})	   
		});
    </script>
<?php
    return ob_get_clean();
}

// Portfolio Gallery - Landing Page
add_shortcode('folio_gallery', 'folio_gallery_func');
function folio_gallery_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'idcate'  =>   '',
	), $atts));

	$all1 = (!empty($all) ? $all : 'All Designs');
	$num1 = (!empty($num) ? $num : 8);
	$folio_gallery_isotope = uniqid( 'folio-gallery-' );
	$item_gallery_isotope = uniqid( 'item-' );
	$filters_gallery_isotope = uniqid( 'filters-' );

	ob_start(); ?>   

	<div class="container">
        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                	<?php if($all != ''){ ?><li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li><?php } ?>                   
                    <?php if($idcate != ''){ ?>
						<?php 
							$categories = explode(",",$idcate);
		                    foreach( (array)$categories as $categorie){
		                     	$cates = get_term_by('slug', $categorie, 'categories');
					            $cat_name = $cates->name;
					            $cat_slug = $cates->slug; 
				        ?>							
		                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
		                <?php } ?>  
                	<?php }else{ ?>
						<?php 
							$categories = get_terms('categories');
		                   	foreach( (array)$categories as $categorie){
			                    $cat_name = $categorie->name;
			                    $cat_slug = $categorie->slug;
			                    $cat_count = $categorie->count;
						?>
							<li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
			            <?php } ?>
			    	<?php } ?> 
                </ul>
            </div>
        </div>
        <!-- portfolio filter close -->
    </div>

    <div id="gallery" class="gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{} ?> wow fadeInUp" data-wow-delay=".3s">
        <?php 
		  	global $post;
		  	if ($idcate != '') {
		  		$args = array(
					'post_type' => 'portfolio',
					'showposts' => $num1,
					'tax_query' => array(
						array(
							'taxonomy' => 'categories',
							'field' => 'slug',
							'terms' => explode(',',$idcate),
						),
					),				
				);
		  	}else{
				$args = array(   
	            	'post_type' => 'portfolio',   
	            	'posts_per_page' => $num1,	            
	         	); 
		  	}

          	$wp_query = new WP_Query($args);
          	while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          	$format = get_post_format($post->ID);
          	$cates = get_the_terms(get_the_ID(),'categories');
          	$cate_slug = '';
          	$js_cate_slug = '';
          	foreach((array)$cates as $cate){
              	if(count($cates)>0){	                
                	$cate_slug .= $cate->slug .' ';
                	if($format=='video'){
                		$js_cate_slug .= 'video-link-' . $cate->slug .' ';                		
                	}else{
                		$js_cate_slug .= 'image-link-' . $cate->slug .' ';
                	}                	   
              	} 
          	}          		
          	$link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);		  
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?>">
            <div class="picframe">
                <a class="<?php echo $js_cate_slug; ?>" title="<?php the_title(); ?>" href="<?php if($format=='video'){echo esc_url($link_video);}else{ echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); } ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>

    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';

	   		<?php if($idcate != ''){ ?>
				<?php 
					$idcate_categories = explode(",",$idcate);
                    foreach( (array)$idcate_categories as $idcate_categorie){
                     	$js_categorie1 = get_term_by('slug', $idcate_categorie, 'categories');
			            $js_cat_slug = $js_categorie1->slug; 
		        ?>							
                  	jQuery('.<?php echo 'image-link-' . esc_js($js_cat_slug); ?>, .<?php echo 'video-link-' . esc_js($js_cat_slug); ?>').magnificPopup({
					    callbacks:{
					      	elementParse: function(item) {
						        // the class name
						        if(item.el.context.className == '<?php echo 'video-link-' . esc_js($js_cat_slug); ?> ') {
						        	item.type = 'iframe';
						        } else {
						           item.type = 'image';
						        }
					      	}
					    },
					    gallery:{
					    	enabled:true
					    },
					    type: 'image',
					    closeOnContentClick: false,
						closeBtnInside: false,
						mainClass: 'mfp-with-zoom mfp-img-mobile',
						image: {
							verticalFit: true,
							titleSrc: function(item) {
								return item.el.attr('title');				
							}
						},
					});
                <?php } ?>                  
        	<?php }else{ ?>
				<?php       
	                $js_categories = get_terms('categories');
	          		$js_cat_slug = '';
	                foreach( (array)$js_categories as $js_categorie){		            
			            $js_cat_slug = $js_categorie->slug;	      
	            ?>
	            	jQuery('.<?php echo 'image-link-' . esc_js($js_cat_slug); ?>, .<?php echo 'video-link-' . esc_js($js_cat_slug); ?>').magnificPopup({
					    callbacks:{
					      	elementParse: function(item) {
						        // the class name
						        if(item.el.context.className == '<?php echo 'video-link-' . esc_js($js_cat_slug); ?> ') {
						        	item.type = 'iframe';
						        } else {
						           item.type = 'image';
						        }
					      	}
					    },
					    gallery:{
					    	enabled:true
					    },
					    type: 'image',
					    closeOnContentClick: false,
						closeBtnInside: false,
						mainClass: 'mfp-with-zoom mfp-img-mobile',
						image: {
							verticalFit: true,
							titleSrc: function(item) {
								return item.el.attr('title');				
							}
						},
					});
			    <?php } ?>
	    	<?php } ?>

		 });
    </script>

<?php
    return ob_get_clean();
}

// Portfolio Gallery 2
add_shortcode('folio_gallery2', 'folio_gallery2_func');
function folio_gallery2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'idcate'  =>   '',
	), $atts));

	$all1 = (!empty($all) ? $all : 'All Designs');
	$num1 = (!empty($num) ? $num : 8);
	$folio_gallery_isotope = uniqid( 'folio-gallery-' );
	$item_gallery_isotope = uniqid( 'item-' );
	$filters_gallery_isotope = uniqid( 'filters-' );

	ob_start(); ?>        
	<div class="container">
        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                	<?php if($all != ''){ ?><li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li><?php } ?>                   
                    <?php if($idcate != ''){ ?>
						<?php 
							$categories = explode(",",$idcate);
		                    foreach( (array)$categories as $categorie){
		                     	$cates = get_term_by('slug', $categorie, 'categories');
					            $cat_name = $cates->name;
					            $cat_slug = $cates->slug; 
				        ?>							
		                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
		                <?php } ?>  
                	<?php }else{ ?>
						<?php 
							$categories = get_terms('categories');
		                   	foreach( (array)$categories as $categorie){
			                    $cat_name = $categorie->name;
			                    $cat_slug = $categorie->slug;
			                    $cat_count = $categorie->count;
						?>
							<li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
			            <?php } ?>
			    	<?php } ?>                   
                </ul>
            </div>
        </div>
        <!-- portfolio filter close -->
    </div>

    <div id="gallery" class="row grid_gallery gallery de-gallery wow fadeInUp" data-wow-delay=".3s">	
        <?php 
		global $post;		
        if ($idcate != '') {
		  		$args = array(
					'post_type' => 'portfolio',
					'showposts' => $num1,
					'tax_query' => array(
						array(
							'taxonomy' => 'categories',
							'field' => 'slug',
							'terms' => explode(',',$idcate),
						),
					),				
				);
		  	}else{
				$args = array(   
	            	'post_type' => 'portfolio',   
	            	'posts_per_page' => $num1,	            
	         	); 
		  	} 
        $wp_query = new WP_Query($args);
        while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
        	$format = get_post_format($post->ID);
          	$cates = get_the_terms(get_the_ID(),'categories');
          	$cate_slug = '';
          	$js_cate_slug = '';
            foreach((array)$cates as $cate){
	            if(count($cates)>0){	                
	                $cate_slug .= $cate->slug .' '; 
	                if($format=='video'){
	            		$js_cate_slug .= 'video-link-' . $cate->slug .' ';                		
	            	}else{
	            		$js_cate_slug .= 'image-link-' . $cate->slug .' ';
	            	}     
	            } 
	        }	
          	$link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
        ?>             
        <!-- gallery item -->
        <div class="<?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 6) { echo 'col-md-2'; }else{echo 'col-md-3';} ?> item <?php echo esc_attr($cate_slug); ?>">
            <div class="picframe">
                <a class="<?php echo $js_cate_slug; ?>" title="<?php the_title(); ?>" href="<?php if($format=='video'){echo esc_url($link_video);}else{ echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); } ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';

	   		<?php if($idcate != ''){ ?>
				<?php 
					$idcate_categories = explode(",",$idcate);
                    foreach( (array)$idcate_categories as $idcate_categorie){
                     	$js_categorie1 = get_term_by('slug', $idcate_categorie, 'categories');
			            $js_cat_slug = $js_categorie1->slug; 
		        ?>							
                  	jQuery('.<?php echo 'image-link-' . esc_js($js_cat_slug); ?>, .<?php echo 'video-link-' . esc_js($js_cat_slug); ?>').magnificPopup({
					    callbacks:{
					      	elementParse: function(item) {
						        // the class name
						        if(item.el.context.className == '<?php echo 'video-link-' . esc_js($js_cat_slug); ?> ') {
						        	item.type = 'iframe';
						        } else {
						           item.type = 'image';
						        }
					      	}
					    },
					    gallery:{
					    	enabled:true
					    },
					    type: 'image',
					    closeOnContentClick: false,
						closeBtnInside: false,
						mainClass: 'mfp-with-zoom mfp-img-mobile',
						image: {
							verticalFit: true,
							titleSrc: function(item) {
								return item.el.attr('title');				
							}
						},
					});
                <?php } ?>                  
        	<?php }else{ ?>
				<?php       
	                $js_categories = get_terms('categories');
	          		$js_cat_slug = '';
	                foreach( (array)$js_categories as $js_categorie){		            
			            $js_cat_slug = $js_categorie->slug;	      
	            ?>
	            	jQuery('.<?php echo 'image-link-' . esc_js($js_cat_slug); ?>, .<?php echo 'video-link-' . esc_js($js_cat_slug); ?>').magnificPopup({
					    callbacks:{
					      	elementParse: function(item) {
						        // the class name
						        if(item.el.context.className == '<?php echo 'video-link-' . esc_js($js_cat_slug); ?> ') {
						        	item.type = 'iframe';
						        } else {
						           item.type = 'image';
						        }
					      	}
					    },
					    gallery:{
					    	enabled:true
					    },
					    type: 'image',
					    closeOnContentClick: false,
						closeBtnInside: false,
						mainClass: 'mfp-with-zoom mfp-img-mobile',
						image: {
							verticalFit: true,
							titleSrc: function(item) {
								return item.el.attr('title');				
							}
						},
					});
			    <?php } ?>
	    	<?php } ?>

		 });
    </script>
<?php
    return ob_get_clean();
}

// OT Image Gallery Style 1
add_shortcode('ot_image_glallery', 'ot_image_glallery_func');
function ot_image_glallery_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'columns'		=>  '',
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'common_title' => '',
	), $atts));
	$id = uniqid( 'gallery-images-popup-' );
	ob_start(); ?>

	<div class="row archi-image-gallery grid_gallery gallery de-gallery">	
        <?php 
			$img_ids = explode(",",$gallery);
	        foreach( $img_ids AS $img_id ){
	            $meta = wp_prepare_attachment_for_js($img_id);			
				$title = $meta['title'];	
				$caption = $meta['caption'];
				$description = $meta['description'];	
	            $image_src = wp_get_attachment_image_src($img_id,''); 
        ?>     
	        <!-- gallery item -->
	        <div class="<?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 6) { echo 'col-md-2'; }else{echo 'col-md-3';} ?> item">
	            <div class="picframe">            	
	                <a class="<?php echo esc_attr($id); ?>" title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($image_src[0]); ?>">
	                    <span class="overlay">
	                        <span class="pf_text">
		                        <?php if($common_title != ''){ ?>
		                            <span class="project-name"><?php echo esc_attr($common_title); ?></span>
		                        <?php }else{ ?> 
		                        	<span class="project-name"><?php echo esc_attr($title); ?></span>
		                        <?php } ?>   
	                        </span>
	                    </span>
	                </a>
	                <?php 	     				
		                if ($cropimage == 'yes') {		                	
							$params_crop_image = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( $image_src[0], $params_crop_image );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" />
					<?php }else{ ?>
		                	<img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>"> 
		            <?php } ?>
	            </div>
	        </div>
	        <!-- close gallery item -->  
        <?php } ?>   
    </div>

    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
	   		jQuery('.<?php echo esc_attr($id); ?>').magnificPopup({
				type: 'image',
				closeOnContentClick: false,
				closeBtnInside: false,
				mainClass: 'mfp-with-zoom mfp-img-mobile',
				image: {
					verticalFit: true,
					titleSrc: function(item) {
						return item.el.attr('title');
						//return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
					}
				},
				gallery: {
					enabled: true
				}		
			}); 
		 });
    </script>
<?php
    return ob_get_clean();
}

// OT Image Gallery Style 2
add_shortcode('ot_image_glallery2', 'ot_image_glallery2_func');
function ot_image_glallery2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'columns'		=>  '',
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'gap'       =>  '',
		'common_title' => '',
	), $atts));
	$id = uniqid( 'gallery-images-popup-' );
	$gap1 = (!empty($gap) ? $gap.'px' : '0px');
	ob_start(); ?>

	<div class="archi-image-gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{ echo 'pf_4_cols'; } ?>" style="margin:0px <?php echo esc_attr($gap1); ?>">	
        <?php 
			$img_ids = explode(",",$gallery);
	        foreach( $img_ids AS $img_id ){
	            $meta = wp_prepare_attachment_for_js($img_id);			
				$title = $meta['title'];	
				$caption = $meta['caption'];
				$description = $meta['description'];	
	            $image_src = wp_get_attachment_image_src($img_id,''); 
        ?>     
	        <!-- gallery item -->
	        <div class="item">
	            <div class="picframe" style="margin:<?php echo esc_attr($gap1); ?>">          	
	                <a class="<?php echo esc_attr($id); ?>" title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($image_src[0]); ?>">
	                    <span class="overlay">
	                        <span class="pf_text">
	                            <?php if($common_title != ''){ ?>
		                            <span class="project-name"><?php echo esc_attr($common_title); ?></span>
		                        <?php }else{ ?> 
		                        	<span class="project-name"><?php echo esc_attr($title); ?></span>
		                        <?php } ?>
	                        </span>
	                    </span>
	                </a>
		            <?php 	     				
		            if ($cropimage == 'yes') {		                							
						$params_crop_image = array( 'width' => $width, 'height' => $height, 'crop' => true );
						$image = bfi_thumb( $image_src[0], $params_crop_image );	
					?>
						<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" />
					<?php }else{ ?>
		                <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>"> 
		            <?php } ?>
	            </div>
	        </div>
	        <!-- close gallery item -->  
        <?php } ?>   
    </div>

    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
	   		jQuery('.<?php echo esc_attr($id); ?>').magnificPopup({
				type: 'image',
				closeOnContentClick: false,
				closeBtnInside: false,
				mainClass: 'mfp-with-zoom mfp-img-mobile',
				image: {
					verticalFit: true,
					titleSrc: function(item) {
						return item.el.attr('title');
						//return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
					}
				},
				gallery: {
					enabled: true
				}		
			});     
		 });
    </script>
<?php
    return ob_get_clean();
}

// Album Gallery 1
add_shortcode('ot_album_glallery', 'ot_album_glallery_func');
function ot_album_glallery_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'All Designs');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>  

	<div class="container">
        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
                    <?php 
	                  $categories = get_terms('category_gallery');
	                   foreach( (array)$categories as $categorie){
	                    $cat_name = $categorie->name;
	                    $cat_slug = $categorie->slug;
	                    $cat_count = $categorie->count;
	                  ?>
	                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
	                <?php } ?>                   
                </ul>
            </div>
        </div>
        <!-- portfolio filter close -->
    </div>

    <div id="gallery" class="gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{} ?> wow fadeInUp" data-wow-delay=".3s">
        <?php 
		  global $post;	
          $args = array(   
            'post_type' => 'ot_gallery',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'category_gallery');
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){	                
                $cate_slug .= $cate->slug .' ';     
              } 
          }		  
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?>">
            <div class="picframe">
                <a class="post-<?php the_ID(); ?>" title="<?php the_title(); ?>" href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>        
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
	                <?php $images = rwmb_meta( '_cmb_image_gallery', "type=image_advanced" ); ?>
	                <?php if($images){ ?>                  
	                    <?php 
	                    foreach ( $images as $image ) { 
	                    	$img = $image['full_url'];
	                    	$imgtitle = $image['title'];
	                    	$imgcaption = $image['caption'];
	                    	$imgalt = $image['alt'];	                    	
	                    ?>
	                      <a class="album-gallery post-<?php the_ID(); ?>" title="<?php echo $imgtitle; ?>" href="<?php echo esc_url($img); ?>"></a>
	                    <?php } ?>                                     
	                <?php } ?>
	            <?php } ?>        
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>            
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
		   	<?php 
	          $args = array(   
	            'post_type' => 'ot_gallery',   
	            'posts_per_page' => $num1,	            
	          );  
	          $ot_gallery = new WP_Query($args);
	          while ($ot_gallery -> have_posts()) : $ot_gallery -> the_post(); 	         	  
	        ?>      	
		   		jQuery('.post-<?php the_ID(); ?>').magnificPopup({
					type: 'image',
					closeOnContentClick: false,
					closeBtnInside: false,
					mainClass: 'mfp-with-zoom mfp-img-mobile',
					image: {
						verticalFit: true,
						titleSrc: function(item) {
							return item.el.attr('title');
							//return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
						}
					},
					gallery: {
						enabled: true
					}		
				});   
		   	<?php endwhile; wp_reset_postdata(); ?>	
		});
    </script>

<?php
    return ob_get_clean();
}

// Album Gallery 2
add_shortcode('ot_album_glallery2', 'ot_album_glallery2_func');
function ot_album_glallery2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'All Designs');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>

	<div class="container">
        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
                    <?php 
	                  $categories = get_terms('category_gallery');
	                   foreach( (array)$categories as $categorie){
	                    $cat_name = $categorie->name;
	                    $cat_slug = $categorie->slug;
	                    $cat_count = $categorie->count;
	                  ?>
	                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
	                <?php } ?>                   
                </ul>
            </div>
        </div>
        <!-- portfolio filter close -->
    </div>

    <div id="gallery" class="row grid_gallery gallery de-gallery wow fadeInUp" data-wow-delay=".3s">	
        <?php 
		  global $post;		
          $args = array(   
            'post_type' => 'ot_gallery',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'category_gallery');
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){	                
                $cate_slug .= $cate->slug .' ';     
              } 
          }
        ?>             
        <!-- gallery item -->
        <div class="<?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 6) { echo 'col-md-2'; }else{echo 'col-md-3';} ?> item <?php echo esc_attr($cate_slug); ?>">            
            <div class="picframe">
                <a class="post-<?php the_ID(); ?>" title="<?php the_title(); ?>" href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>        
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
	                <?php $images = rwmb_meta( '_cmb_image_gallery', "type=image_advanced" ); ?>
	                <?php if($images){ ?>                  
	                    <?php 
	                    foreach ( $images as $image ) { 
	                    	$img = $image['full_url'];
	                    	$imgtitle = $image['title'];
	                    	$imgcaption = $image['caption'];
	                    	$imgalt = $image['alt'];	                    	
	                    ?>
	                      <a class="album-gallery post-<?php the_ID(); ?>" title="<?php echo $imgtitle; ?>" href="<?php echo esc_url($img); ?>"></a>
	                    <?php } ?>                                     
	                <?php } ?>
	            <?php } ?>        
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
		   	<?php 
	          $args = array(   
	            'post_type' => 'ot_gallery',   
	            'posts_per_page' => $num1,	            
	          );  
	          $ot_gallery = new WP_Query($args);
	          while ($ot_gallery -> have_posts()) : $ot_gallery -> the_post(); 	         	  
	        ?>      	
		   		jQuery('.post-<?php the_ID(); ?>').magnificPopup({
					type: 'image',
					closeOnContentClick: false,
					closeBtnInside: false,
					mainClass: 'mfp-with-zoom mfp-img-mobile',
					image: {
						verticalFit: true,
						titleSrc: function(item) {
							return item.el.attr('title');
							//return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
						}
					},
					gallery: {
						enabled: true
					}		
				});   
		   	<?php endwhile; wp_reset_postdata(); ?>	
		});
    </script>
<?php
    return ob_get_clean();
}

// Portfolio Filter
add_shortcode('foliof', 'foliof_func');
function foliof_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'show_filter'=> 'yes',
		'gap'       =>  0,
		'style'     =>  'none',
		'extraclass'=>  '',
		'arrow_btn' =>  '',  
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);	
	$gap1 = (!empty($gap) ? $gap.'px' : '0px');
	ob_start(); ?>  

	<?php if ( $show_filter == 'yes' ) { ?>
		<div class="container">
	    	<!-- portfolio filter begin -->
		    <div class="row">
		        <div class="col-md-12 text-center">
		            <ul id="filters" class="wow fadeInUp listed_taxonomy_filters" data-wow-delay="0s">
		            	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
		                <?php 
		                	$taxonomyName = "categories";
							$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));   							
							foreach ($parent_terms as $pterm) {
								echo '<li class="cate_parent"><a href="#" data-filter=".' . $pterm->slug . '">' . $pterm->name . '</a>';
									$terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => true));
									if ($terms) {
										echo '<ul>';
									}
									    foreach ($terms as $term) {								    		
											echo '<li><a href="#" data-filter=".' . $term->slug . '">' . $term->name . '</a></li>';												
									    }
									if ($terms) {
										echo '</ul>';
									}
								echo '</li>';
							}							
		                ?>                    
		            </ul>
		        </div>
		    </div>
	    	<!-- portfolio filter close -->
	    </div>
    <?php } ?>

    <div id="gallery" class="<?php echo esc_attr($extraclass); ?> gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{} ?>" style="margin:0px <?php echo esc_attr($gap1); ?>" >
        <?php 
          	if ( get_query_var('paged') ) {
			    $paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			    $paged = get_query_var('page');
			} else {
			    $paged = 1;
			}
          	$args = array(
		        'posts_per_page' => $num1,
		        'post_type' => 'portfolio',
		        'paged' => $paged,
		    );
		    $the_query = new WP_Query( $args );
		    while ( $the_query->have_posts() ) : $the_query->the_post(); 
	        $cates = get_the_terms(get_the_ID(),'categories');
	        $cate_name ='';
	        $cate_slug = '';
	            foreach((array)$cates as $cate){
	            if(count($cates)>0){
	                $cate_name .= $cate->name.'<span>, </span> ';
	                $cate_slug .= $cate->slug .' ';     
	            } 
	        }
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?>">
            <div class="picframe-new" style="margin:<?php echo esc_attr($gap1); ?>"> 
				<a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="<?php if($arrow_btn == 'no'){echo 'single-ajax-popup';}else{echo 'simple-ajax-popup-align-top';} ?>"<?php } ?> href="<?php the_permalink(); ?>">
	                <div class="mask"></div>	                
                    <div class="pr_text">
                        <div class="project-name"><?php the_title(); ?></div>
                    </div>
					<?php if ( has_post_thumbnail() ) : ?>
		                <?php 	     				
			                if ($cropimage == 'yes') {
			                	$thumbnail = get_post( get_post_thumbnail_id() );
								$image_title = $thumbnail->post_title;
								$image_caption = $thumbnail->post_excerpt;
								$image_description = $thumbnail->post_content;
								$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
								// Crop
								$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
								$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
						?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
						<?php	
			                }else{
			                	the_post_thumbnail( 'thumb-portfolio' ); 
			                }			
		                ?>
					<?php endif; ?>
				</a>
            </div>
        </div>        
        <!-- close gallery item -->
        <?php endwhile;  ?>
    </div>
    <?php if ($style == 'pagination') { ?>
	    <div class="pagination w100 text-center">
	        <?php
	        	if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}
				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $the_query->max_num_pages,                      
					'prev_text' => '<i class="fa fa-angle-double-left"></i>',
					'next_text' => '<i class="fa fa-angle-double-right"></i>',       
					'type'          => 'list',
					'end_size'      => 3,
					'mid_size'      => 3
				) );
			?>		
	    </div>
    <?php } ?>
    <?php wp_reset_postdata(); ?>
<?php
    return ob_get_clean();
}

// Portfolio Filter 2
add_shortcode('foliof2', 'foliof2_func');
function foliof2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'show_filter'=> 'yes',
		'style'     =>  'none',
		'arrow_btn' =>  '',
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?> 

	<?php if ( $show_filter == 'yes' ) { ?>
		<div class="container">
	    	<!-- portfolio filter begin -->
		    <div class="row">
		        <div class="col-md-12 text-center">
		            <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
		            	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
		                <?php 
		                  $categories = get_terms('categories');
		                   foreach( (array)$categories as $categorie){
		                    $cat_name = $categorie->name;
		                    $cat_slug = $categorie->slug;
		                    $cat_count = $categorie->count;
		                  ?>
		                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
		                <?php } ?>                    
		            </ul>
		        </div>
		    </div>
	    	<!-- portfolio filter close -->
	    </div>
    <?php } ?>
    <div id="gallery" class="gallery grid_gallery full-gallery de-gallery wow fadeInUp" data-wow-delay=".3s">
        <?php 
          	if ( get_query_var('paged') ) {
			    $paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			    $paged = get_query_var('page');
			} else {
			    $paged = 1;
			}
          	$args = array(
		        'posts_per_page' => $num1,
		        'post_type' => 'portfolio',
		        'paged' => $paged,
		    );
		    $the_query = new WP_Query( $args );
		    while ( $the_query->have_posts() ) : $the_query->the_post();  
          	$cates = get_the_terms(get_the_ID(),'categories');
          	$cate_name ='';
          	$cate_slug = '';
            foreach((array)$cates as $cate){
                if(count($cates)>0){
	                $cate_name .= $cate->name.'<span>, </span> ' ;
	                $cate_slug .= $cate->slug .' ';     
                } 
            }
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?> <?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 4) { echo 'col-md-3'; }elseif ($columns == 6) { echo 'col-md-2'; }else{} ?>">
            <div class="picframe-new" style="margin:<?php echo esc_attr($gap1); ?>"> 
				<a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="<?php if($arrow_btn == 'no'){echo 'single-ajax-popup';}else{echo 'simple-ajax-popup-align-top';} ?>"<?php } ?> href="<?php the_permalink(); ?>">
	                <div class="mask"></div>	                
                    <div class="pr_text">
                        <div class="project-name"><?php the_title(); ?></div>
                    </div>
					<?php if ( has_post_thumbnail() ) : ?>
		                <?php 	     				
			                if ($cropimage == 'yes') {
			                	$thumbnail = get_post( get_post_thumbnail_id() );
								$image_title = $thumbnail->post_title;
								$image_caption = $thumbnail->post_excerpt;
								$image_description = $thumbnail->post_content;
								$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
								// Crop
								$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
								$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
						?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
						<?php	
			                }else{
			                	the_post_thumbnail( 'thumb-portfolio' ); 
			                }			
		                ?>
					<?php endif; ?>
				</a>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile;?>
    </div>
    <?php if ($style == 'pagination') { ?>
	    <div class="pagination w100 text-center">
	        <?php
	        	if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}
				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $the_query->max_num_pages,                      
					'prev_text' => '<i class="fa fa-angle-double-left"></i>',
					'next_text' => '<i class="fa fa-angle-double-right"></i>',       
					'type'          => 'list',
					'end_size'      => 3,
					'mid_size'      => 3
				) );
			?>		
	    </div>
    <?php } ?>
    <?php wp_reset_postdata(); ?>
<?php
    return ob_get_clean();
}

// Portfolio Filter 3
add_shortcode('foliof3', 'foliof3_func');
function foliof3_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'show_filter'=> 'yes',
		'style'     =>  'none',
		'arrow_btn' =>  '',
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>  

	<?php if ( $show_filter == 'yes' ) { ?>
	<!-- portfolio filter begin -->
    <div class="row">
        <div class="col-md-12">
            <ul id="filters" class="wow fadeInUp filter3" data-wow-delay="0s">
            	<li class="pull-right"><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
                <?php 
                  $categories = get_terms('categories');
                   foreach( (array)$categories as $categorie){
                    $cat_name = $categorie->name;
                    $cat_slug = $categorie->slug;
                    $cat_count = $categorie->count;
                  ?>
                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                <?php } ?>                    
            </ul>
        </div>
    </div>
	<!-- portfolio filter close -->
	<?php } ?>

    <div id="gallery" class="gallery grid_gallery full-gallery de-gallery row wow fadeInUp" data-wow-delay=".3s">
        <?php 
          	if ( get_query_var('paged') ) {
			    $paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			    $paged = get_query_var('page');
			} else {
			    $paged = 1;
			}
          	$args = array(
		        'posts_per_page' => $num1,
		        'post_type' => 'portfolio',
		        'paged' => $paged,
		    );
		    $the_query = new WP_Query( $args );
		    while ( $the_query->have_posts() ) : $the_query->the_post();  
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_name ='';
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){
                $cate_name .= $cate->name.'<span>, </span> ' ;
                $cate_slug .= $cate->slug .' ';     
              } 
          }
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?> <?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 4) { echo 'col-md-3'; }elseif ($columns == 6) { echo 'col-md-2'; }else{} ?>">
            <div class="picframe-new" style="margin:<?php echo esc_attr($gap1); ?>"> 
				<a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="<?php if($arrow_btn == 'no'){echo 'single-ajax-popup';}else{echo 'simple-ajax-popup-align-top';} ?>"<?php } ?> href="<?php the_permalink(); ?>">
	                <div class="mask"></div>	                
                    <div class="pr_text">
                        <div class="project-name"><?php the_title(); ?></div>
                    </div>
					<?php if ( has_post_thumbnail() ) : ?>
		                <?php 	     				
			                if ($cropimage == 'yes') {
			                	$thumbnail = get_post( get_post_thumbnail_id() );
								$image_title = $thumbnail->post_title;
								$image_caption = $thumbnail->post_excerpt;
								$image_description = $thumbnail->post_content;
								$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
								// Crop
								$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
								$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
						?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
						<?php	
			                }else{
			                	the_post_thumbnail( 'thumb-portfolio' ); 
			                }			
		                ?>
					<?php endif; ?>
				</a>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; ?>
    </div>
    <?php if ($style == 'pagination') { ?>
	    <div class="pagination w100 text-center">
	        <?php
	        	if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}
				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $the_query->max_num_pages,                      
					'prev_text' => '<i class="fa fa-angle-double-left"></i>',
					'next_text' => '<i class="fa fa-angle-double-right"></i>',       
					'type'          => 'list',
					'end_size'      => 3,
					'mid_size'      => 3
				) );
			?>		
	    </div>
    <?php } ?>
    <?php wp_reset_postdata(); ?>
<?php
    return ob_get_clean();
}

//Portfolio Inverted Style
add_shortcode('foliofinverted', 'foliofinverted_func');
function foliofinverted_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'show_filter'=> 'yes',
		'style'     =>  'none',
		'arrow_btn' =>  '',
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>  

	<?php if ( $show_filter == 'yes' ) { ?>
		<!-- portfolio filter begin -->
	    <div class="row">
	        <div class="col-md-12">
	            <ul id="filters" class="wow fadeInUp filter3" data-wow-delay="0s">
	            	<li class="pull-right"><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
	                <?php 
	                  $categories = get_terms('categories');
	                   foreach( (array)$categories as $categorie){
	                    $cat_name = $categorie->name;
	                    $cat_slug = $categorie->slug;
	                    $cat_count = $categorie->count;
	                  ?>
	                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
	                <?php } ?>                    
	            </ul>
	        </div>
	    </div>
		<!-- portfolio filter close -->
	<?php } ?>

    <div id="gallery" class="gallery grid_gallery full-gallery de-gallery hover-1 row wow fadeInUp" data-wow-delay=".3s">
        <?php 
          	if ( get_query_var('paged') ) {
			    $paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			    $paged = get_query_var('page');
			} else {
			    $paged = 1;
			}
          	$args = array(
		        'posts_per_page' => $num1,
		        'post_type' => 'portfolio',
		        'paged' => $paged,
		    );
		    $the_query = new WP_Query( $args );
		    while ( $the_query->have_posts() ) : $the_query->the_post();  
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_name ='';
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){
                $cate_name .= $cate->name.'<span>, </span> ' ;
                $cate_slug .= $cate->slug .' ';     
              } 
          }
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?> <?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 4) { echo 'col-md-3'; }elseif ($columns == 6) { echo 'col-md-2'; }else{} ?>">
            <div class="picframe">
                <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="<?php if($arrow_btn == 'no'){echo 'single-ajax-popup';}else{echo 'simple-ajax-popup-align-top';} ?>"<?php } ?> href="<?php the_permalink(); ?>">
                    <span class="overlay-1">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; ?>
    </div>
    <?php if ($style == 'pagination') { ?>
	    <div class="pagination w100 text-center">
	        <?php
	        	if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}
				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $the_query->max_num_pages,                      
					'prev_text' => '<i class="fa fa-angle-double-left"></i>',
					'next_text' => '<i class="fa fa-angle-double-right"></i>',       
					'type'          => 'list',
					'end_size'      => 3,
					'mid_size'      => 3
				) );
			?>		
	    </div>
    <?php } ?>
    <?php wp_reset_postdata(); ?>
<?php
    return ob_get_clean();
}

// Portfolio Style 2
add_shortcode('foliostyle2', 'foliostyle2_func');
function foliostyle2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	3,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'show_filter'=> 'yes',
		'style'     =>  'none',
		'arrow_btn' =>  '',
		'idcate'  =>   '',
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>  

	<?php if ( $show_filter == 'yes' ) { ?>
		<div class="container">
	    	<!-- portfolio filter begin -->
		    <div class="row">
		        <div class="col-md-12 text-center">
		            <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
		            	<?php if($all != ''){ ?><li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li><?php } ?>
		            	<?php if($idcate != ''){ ?>
								<?php 
									$categories = explode(",",$idcate);
				                    foreach( (array)$categories as $categorie){
				                     	$cates = get_term_by('slug', $categorie, 'categories');
							            $cat_name = $cates->name;
							            $cat_slug = $cates->slug; 
						        ?>							
				                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
				                <?php } ?>  
		                <?php }else{ ?>
							<?php 
								$categories = get_terms('categories');
			                   	foreach( (array)$categories as $categorie){
				                    $cat_name = $categorie->name;
				                    $cat_slug = $categorie->slug;
				                    $cat_count = $categorie->count;
							?>
								<li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
				            <?php } ?>
					    <?php } ?>                  
		            </ul>
		        </div>
		    </div>
	    	<!-- portfolio filter close -->
	    </div>
    <?php } ?>

    <div id="gallery" class="row folio-style2 gallery wow fadeInUp" data-wow-delay=".3s">
        <?php 
          	if ( get_query_var('paged') ) {
			    $paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
			    $paged = get_query_var('page');
			} else {
			    $paged = 1;
			}
			if($idcate != ''){
				$args = array(
					'posts_per_page' => $num1,
			        'post_type' => 'portfolio',
			        'paged' => $paged,
					'tax_query' => array(
						array(
							'taxonomy' => 'categories',
							'field' => 'slug',
							'terms' => explode(',',$idcate),
						),
					),				
				);
			}else{	
	          	$args = array(
			        'posts_per_page' => $num1,
			        'post_type' => 'portfolio',
			        'paged' => $paged,
			    );
	        }
	          	
		    $the_query = new WP_Query( $args );
		    while ( $the_query->have_posts() ) : $the_query->the_post(); 
			$cates = get_the_terms(get_the_ID(),'categories');
			$cate_name ='';
			$cate_slug = '';
                foreach((array)$cates as $cate){
                if(count($cates)>0){
                	$cate_name .= $cate->name.'<span>/</span> ' ;
                	$cate_slug .= $cate->slug .' ';     
                } 
          	}
        ?>             
        <!-- gallery item -->
        <div class="<?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 6) { echo 'col-md-2'; }else{echo 'col-md-3';} ?> item <?php echo esc_attr($cate_slug); ?>">            
            <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="<?php if($arrow_btn == 'no'){echo 'single-ajax-popup';}else{echo 'simple-ajax-popup-align-top';} ?>"<?php } ?> href="<?php the_permalink(); ?>">
	            <div class="folio-image">		            
	            	<?php if ( has_post_thumbnail() ) : ?>
		                <?php 	     				
			                if ($cropimage == 'yes') {
			                	$thumbnail = get_post( get_post_thumbnail_id() );
								$image_title = $thumbnail->post_title;
								$image_caption = $thumbnail->post_excerpt;
								$image_description = $thumbnail->post_content;
								$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
								// Crop
								$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
								$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
						?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
						<?php	
			                }else{
			                	the_post_thumbnail( 'thumb-portfolio' ); 
			                }			
		                ?>
					<?php endif; ?>		            
	            </div>
	            <div class="folio-info">
					<h3><?php the_title(); ?></h3>
					<p><?php echo htmlspecialchars_decode($cate_name); ?></p>		
				</div>
			</a>
        </div>
        <!-- close gallery item -->
       <?php endwhile; ?>
    </div>
    <?php if ($style == 'pagination') { ?>
	    <div class="pagination w100 text-center">
	        <?php
	        	if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}
				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $the_query->max_num_pages,                      
					'prev_text' => '<i class="fa fa-angle-double-left"></i>',
					'next_text' => '<i class="fa fa-angle-double-right"></i>',       
					'type'          => 'list',
					'end_size'      => 3,
					'mid_size'      => 3
				) );
			?>		
	    </div>
    <?php } ?>
    <?php wp_reset_postdata(); ?>
<?php
    return ob_get_clean();
}

// Portfolio Category
add_shortcode('cate_portfolio', 'cate_portfolio_func');
function cate_portfolio_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'show_filter'=> 'yes',
		'show'      =>  '',
	    'idcate'  =>   '',
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'arrow_btn' =>  '',
		'cate_active' =>  '',
		'gap'       =>  0,
		'css'       => ''
	), $atts));	
	$show1 = (!empty($show) ? $show : 8);
	$cate_active1 = (!empty($cate_active) ? '.'.$cate_active : '*');
	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$portfolio_category_isotope = uniqid( 'portfolio-gallery-' );
	$item_isotope = uniqid( 'item-' );
	$filters_isotope = uniqid( 'filters-' );
	$gap1 = (!empty($gap) ? $gap.'px' : '0px');

	ob_start(); ?>  

	<?php if ( $show_filter == 'yes' ) { ?>
		<div class="container">
	    	<!-- portfolio filter begin -->
		    <div class="row">
		        <div class="col-md-12 text-center">
		            <ul id="<?php echo esc_attr($filters_isotope); ?>" class="filters wow fadeInUp" data-wow-delay="0s">
		            	<?php if($all != ''){ ?><li><a href="#" data-filter="*" <?php if($cate_active == ''){echo 'class="selected"';} ?>><?php echo esc_attr($all1); ?></a></li><?php } ?>                    
		                <?php       
		                    $categories = explode(",",$idcate);
		                    foreach( (array)$categories as $categorie){
		                     	$cates = get_term_by('slug', $categorie, 'categories');
					            $cat_name = $cates->name;
					            $cat_slug = $cates->slug;	      
		                ?>
		                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>" <?php if($cate_active != '' && $cate_active == $cat_slug ){echo 'class="selected"';} ?> ><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
		                <?php } ?>                    
		            </ul>
		        </div>
		    </div>
	    	<!-- portfolio filter close -->
    	</div>
    <?php } ?>

    <div id="<?php echo esc_attr($portfolio_category_isotope); ?>" class="gallery full-gallery de-gallery pf_full_width portfolio_category <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{} ?> wow fadeInUp <?php echo vc_shortcode_custom_css_class( $css ); ?>" data-wow-delay=".3s" style="margin: -<?php echo esc_attr($gap1); ?> <?php echo esc_attr($gap1); ?>" >
        <?php 			        				
			$args = array(
				'post_type' => 'portfolio',
				'showposts' => $show1,
				'tax_query' => array(
					array(
						'taxonomy' => 'categories',
						'field' => 'slug',
						'terms' => explode(',',$idcate),
					),
				),				
			);			
			$wp_query = new WP_Query($args);					
			while ($wp_query -> have_posts()) : $wp_query -> the_post();
			$cates = get_the_terms(get_the_ID(),'categories');
          		$cate_name ='';
          		$cate_slug = '';
				$cate_slug_popup = '';
              		foreach((array)$cates as $cate){
              			if(count($cates)>0){
                			$cate_name .= $cate->name.' ' ;
                			$cate_slug .= $cate->slug .' '; 
							$cate_slug_popup .= 'ajax-popup-' . $cate->slug . ' ';     
              			} 
          		}			
		?>          
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug) . esc_attr($item_isotope); ?>">
            <div class="picframe-new" style="margin:<?php echo esc_attr($gap1); ?>"> 
				<a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="<?php if($arrow_btn == 'no'){echo 'single-ajax-popup';}else{echo esc_attr($cate_slug_popup);} ?>"<?php } ?> href="<?php the_permalink(); ?>">
	                <div class="mask"></div>	                
                    <div class="pr_text">
                        <div class="project-name"><?php the_title(); ?></div>
                    </div>
					<?php if ( has_post_thumbnail() ) : ?>
		                <?php 	     				
			                if ($cropimage == 'yes') {
			                	$thumbnail = get_post( get_post_thumbnail_id() );
								$image_title = $thumbnail->post_title;
								$image_caption = $thumbnail->post_excerpt;
								$image_description = $thumbnail->post_content;
								$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
								// Crop
								$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
								$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
						?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
						<?php	
			                }else{
			                	the_post_thumbnail( 'thumb-portfolio' ); 
			                }			
		                ?>
					<?php endif; ?>
				</a>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div> 

    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
	   		window.onresize = function(event) {	
				jQuery('#<?php echo esc_attr($portfolio_category_isotope); ?>').isotope();			
			};	
			jQuery(window).load(function() {				
				var $container = jQuery('#<?php echo esc_attr($portfolio_category_isotope); ?>');
					$container.isotope({
						itemSelector: '.<?php echo esc_attr($item_isotope); ?>',
						filter: '<?php echo esc_attr($cate_active1); ?>'
				});	
				jQuery('#<?php echo esc_attr($filters_isotope); ?> a').on("click", function() {
					$('#<?php echo esc_attr($filters_isotope); ?> a').removeClass('selected');
	    			$(this).addClass('selected');

					var selector = jQuery(this).attr('data-filter');
					$container.isotope({ 
						filter: selector
					});
					return false;
				});
				jQuery('#<?php echo esc_attr($filters_isotope); ?> > li > a.selected').click();
			});

			<?php       
                $js_categories = explode(",",$idcate);
                foreach( (array)$js_categories as $js_categorie){
                 	$js_cates = get_term_by('slug', $js_categorie, 'categories');		            
		            $js_cat_slug = $js_cates->slug;	      
            ?>
            	jQuery('.<?php echo 'ajax-popup-' . esc_attr($js_cat_slug); ?>').magnificPopup({
			        type: 'ajax',
			        alignTop: true,
			        overflowY: 'scroll',
					fixedContentPos: true,
					callbacks: {
						beforeOpen: function() { $('html').addClass('mfp-helper'); },
						close: function() { $('html').removeClass('mfp-helper'); }
					},
					gallery: {
						enabled: true
					},
			    });		             
		    <?php } ?>
		    
		 });
    </script>   

<?php
    return ob_get_clean();
}

// Portfolio Carousel Style
add_shortcode('portfolio_carousel', 'portfolio_carousel_func');
function portfolio_carousel_func($atts, $content = null){
	extract(shortcode_atts(array(
		'show'      =>  '',
	    'idcate'  =>   '',
		'visible'   => 	'',
		'slideplay' => 	'',
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
		'arrow_btn' =>  '',
	), $atts));	
		$show1 = (!empty($show) ? $show : 8);
		$visible = (!empty($visible) ? $visible : 4);
		$slideplay = (!empty($slideplay) ? $slideplay : 'false');
		$id = uniqid( 'gallery-carousel-' );
	ob_start(); ?>  

    <div id="<?php echo esc_attr($id); ?>" class="owl-slide gallery-carousel">
    	<?php 	
    		if ($idcate != '') {					
				$args = array(
					'tax_query' => array(
						array(
							'taxonomy' => 'categories',
							'field' => 'slug',
							'terms' => explode(',',$idcate)
						),
					),
					'post_type' => 'portfolio',
					'showposts' => $show1,
				);
			}else{
				$args = array(
					'post_type' => 'portfolio',
					'showposts' => $show1,
				);
			}
			
			$wp_query = new WP_Query($args);					
			while ($wp_query -> have_posts()) : $wp_query -> the_post();  		
		?>  
	        <!-- gallery carousel-item -->
	        <div class="carousel-item">
	            <div class="picframe">
	                <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="<?php if($arrow_btn == 'no'){echo 'single-ajax-popup';}else{echo 'simple-ajax-popup-align-top';} ?>"<?php } ?> href="<?php the_permalink(); ?>">
	                    <span class="overlay-v">
	                        <span class="pf_text">
	                            <span class="project-name"><?php the_title(); ?></span>
	                        </span>
	                    </span>
	                </a>
	                <?php if ( has_post_thumbnail() ) : ?>
		                <?php 	     				
			                if ($cropimage == 'yes') {
			                	$thumbnail = get_post( get_post_thumbnail_id() );
								$image_title = $thumbnail->post_title;
								$image_caption = $thumbnail->post_excerpt;
								$image_description = $thumbnail->post_content;
								$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
								// Crop
								$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
								$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
						?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
						<?php	
			                }else{
			                	the_post_thumbnail( 'thumb-portfolio' ); 
			                }			
		                ?>
					<?php endif; ?>
	            </div>
	        </div>
	        <!-- close gallery carousel-item -->
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
		   	jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
		   		items: <?php echo esc_attr($visible); ?>,
		        navigation: true,
		        pagination: false,
		        autoPlay : <?php echo esc_attr($slideplay); ?>,
		   		navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		    });     
		 });
    </script>
<?php
    return ob_get_clean();
}

// Portfolio Masonry
add_shortcode('portfolio_masonry', 'portfolio_masonry_func');
function portfolio_masonry_func($atts, $content = null){
	extract(shortcode_atts(array(		
		'num'		=> 	8,
		'columns'   => 	4,
		'ratio_width'   => 	700,
		'ratio_height'	=> 	466,		
		'gap'       =>  0,	
		'arrow_btn' =>  '',
		'idcate'    =>  '',  
	), $atts));

	$show1 = (!empty($num) ? $num : 8);	
	$gap1 = (!empty($gap) ? $gap : 0);

	ob_start(); ?>  

	<div class="grid" data-col="<?php echo esc_attr($columns); ?>" data-gridspace="<?php echo esc_attr($gap1); ?>" data-ratio="<?php echo esc_attr($ratio_height); ?>/<?php echo esc_attr($ratio_width); ?>">    
        <?php  
        	if ($idcate != '') {					
				$args = array(
					'tax_query' => array(
						array(
							'taxonomy' => 'categories',
							'field' => 'slug',
							'terms' => explode(',',$idcate)
						),
					),
					'post_type' => 'portfolio',
					'showposts' => $show1,
				);
			}else{
				$args = array(
					'post_type' => 'portfolio',
					'showposts' => $show1,
				);
			}  
		    $the_query = new WP_Query( $args );
		    while ( $the_query->have_posts() ) : $the_query->the_post(); 
	        $cates = get_the_terms(get_the_ID(),'categories');
	        $cate_name ='';
	        $cate_slug = '';
	            foreach((array)$cates as $cate){
	            if(count($cates)>0){
	                $cate_name .= $cate->name.'<span>, </span> ';
	                $cate_slug .= $cate->slug .' ';     
	            } 
	        }
	        $portfolio_thumb_size = get_post_meta(get_the_ID(),'_cmb_portfolio_thumb_size', true);
        ?>    
	        <div class="grid-item <?php echo esc_attr($cate_slug); ?> <?php echo esc_attr($portfolio_thumb_size); ?>">
	            <!-- gallery item -->
	            <div class="item <?php echo esc_attr($cate_slug); ?>">
	                <div class="picframe">
	                    <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="<?php if($arrow_btn == 'no'){echo 'single-ajax-popup';}else{echo 'simple-ajax-popup-align-top';} ?>"<?php } ?> href="<?php the_permalink(); ?>">
	                        <span class="overlay">
	                            <span class="pf_title">
	                                <span class="project-name"><?php the_title(); ?></span>
	                            </span>
	                        </span>
	                    </a>
	                    <?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'full' ); ?>
						<?php endif; ?>
	                </div>
	            </div>
	            <!-- close gallery item -->
	        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div> 
<?php
    return ob_get_clean();
}

// Pricing Tables
add_shortcode('pricingtable','pricing_func');
function pricing_func($atts, $content = null){
    extract( shortcode_atts( array(
      'title'   	=> '',
      'price'		=> '',
      'time'		=> '',
      'width'		=> '',
      'btntext'		=> '',
      'btnlink'		=> '',
      'featured'		=> '',
      'style'		=> '',
   ), $atts ) );

    ob_start(); ?>

    <div class="pricing-box <?php if($style == 'dark') echo 'pricing-dark';?><?php if($featured == 'yes') echo ' pricing-featured';?>" style="width: <?php echo esc_attr($width); ?>;">
    	<div class="title-row">
            <h4><?php echo htmlspecialchars_decode($title); ?></h4>
        </div>
        <div class="price-row">
            <h1><?php echo htmlspecialchars_decode($price); ?></h1>
            <?php if($time != '') { ?><span><?php echo htmlspecialchars_decode($time); ?></span><?php } ?>
        </div>
        <?php echo htmlspecialchars_decode($content); ?>
        <?php if($btnlink != '') { ?><div class="btn-row"><a href="<?php echo esc_url($btnlink); ?>" class="btn btn-primary"><?php echo htmlspecialchars_decode($btntext); ?></a></div><?php } ?>
    </div>

<?php
    return ob_get_clean();
}

// Pricing Tables 2
add_shortcode('pricingtable2','pricing2_func');
function pricing2_func($atts, $content = null){
    extract( shortcode_atts( array(
      'title'   	=> '',
      'currency'    => '',  
      'price'		=> '',
      'time'		=> '',      
      'featured'	=> '',
      'linkbox'	=>  '',
      'ribbon_text' => '',
    ), $atts ) );
    $url = vc_build_link( $linkbox );
    ob_start(); ?>

<div class="pricing-s1 mb30">
	<?php if ($featured == 'yes') { ?>
		<div class="ribbon" ><?php echo esc_attr($ribbon_text); ?></div>
	<?php } ?>
	<div class="top">
		<?php if ($title != '') { ?><h2><?php echo esc_attr($title); ?></h2><?php } ?>
		<?php if ($price != '') { ?><p class="price"><span class="currency"><?php echo esc_attr($currency); ?></span> <b><?php echo esc_attr($price); ?></b> <span class="month"><?php echo esc_attr($time); ?></span></p><?php } ?>
	</div>
	<div class="bottom">
		<?php echo wpb_js_remove_wpautop($content, true); ?>
		<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
			echo '<a href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" class="btn btn-custom">' . esc_attr( $url['title'] ) . '</a>';
		} ?>
	</div>
</div>

<?php
    return ob_get_clean();
}											

// Project Slider - image carousel
add_shortcode('image_carousel', 'image_carousel_func');
function image_carousel_func($atts, $content = null){
 extract(shortcode_atts(array(
  'gallery'  =>  '',
 ), $atts));
 $id = uniqid( 'image-carousel-' );
 ob_start(); ?>

    <div class="logo-carousel">
        <ul id="<?php echo esc_attr($id); ?>" class="slides project-image-carousel">
            <?php $img_ids = explode(",",$gallery);
            foreach( $img_ids AS $img_id ){
            $image_src = wp_get_attachment_image_src($img_id,'full'); ?>
	            <li><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></li>
            <?php } ?>
        </ul>
    </div>       
    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
		   	jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
		   		singleItem: true,
		      	navigation : true,
		   		pagination : true,
		   		autoHeight : true,
		   		slideSpeed: 300,
				paginationSpeed: 400,
				transitionStyle : 'fade',
		   		navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				afterInit: makePages,
				afterUpdate: makePages
		    });  
			function makePages() {
				$.each(this.owl.userItems, function(i) {
					$('.owl-controls .owl-page').eq(i)
						.css({
							'background': 'url(' + $(this).find('img').attr('src') + ')',
							'background-size': 'cover'
						})
				});
			}	
		 });
    </script>
<?php
    return ob_get_clean();
}

// Simple Slider - images carousel
add_shortcode('simple_slider', 'simple_slider_func');
function simple_slider_func($atts, $content = null){
 extract(shortcode_atts(array(
  'gallery'  =>  '',
 ), $atts));
 $id = uniqid( 'simple-slider-' );
 ob_start(); ?>

    <div id="<?php echo esc_attr($id); ?>">
        <?php $img_ids = explode(",",$gallery);
        foreach( $img_ids AS $img_id ){
        	$meta = wp_prepare_attachment_for_js($img_id);			
			$title = $meta['title'];	
			$caption = $meta['caption'];
			$description = $meta['description'];
        	$image_src = wp_get_attachment_image_src($img_id,'full'); 
        ?>
            <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>" class="img-circle img-responsive">
        <?php } ?>
    </div>    

    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
	   		jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
		        items: 1,
		        singleItem: true,
		        navigation: false,
		        pagination: false,
		        mouseDrag: false,
		        touchDrag: false,
		        autoPlay: 4000,
		        transitionStyle: "fade"
		    });    
		 });
    </script>
<?php
    return ob_get_clean();
}

// Profile Experiences
add_shortcode('profile_experiences', 'profile_experiences_func');
function profile_experiences_func($atts, $content = null){
	extract(shortcode_atts(array(		
		'titles' => ''			
	), $atts));
	$titles = (array) vc_param_group_parse_atts( $titles );
	ob_start(); 
?>
	<div class="timeline exp">
		<?php 
			$i=0;
			foreach ( $titles as $data ) {
				$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
				$data['date'] = isset( $data['date'] ) ? $data['date'] : '';
				$data['stitle'] = isset( $data['stitle'] ) ? $data['stitle'] : '';
		?>	
	        <div class="tl-block wow fadeInUp" data-wow-delay="<?php echo $i*3; ?>">
	            <div class="tl-time">
	                <h4><?php echo htmlspecialchars_decode($data['date']); ?></h4>
	            </div>
	            <div class="tl-bar">
	                <div class="tl-line"></div>
	            </div>
	            <div class="tl-message">
	                <div class="tl-icon">&nbsp;</div>
	                <div class="tl-main">
	                    <h4 class="id-color"><?php echo htmlspecialchars_decode($data['title']); ?></h4>
	                    <?php echo htmlspecialchars_decode($data['stitle']); ?>
	                </div>
	            </div>
	        </div>
        <?php $i++; } ?>  
    </div>  
<?php
    return ob_get_clean();
}

add_shortcode( 'ot_faqs', 'ot_faqs_func' );
function ot_faqs_func( $atts, $content = null ) { // New function parameter $content is added!
    extract( shortcode_atts( array(
      'title' => '',
    ), $atts ) );
	ob_start(); 
?>
  <div class="expand">
        <h4><?php echo esc_attr($title); ?></h4>
        <div class="hidden-content">
            <?php echo wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content ?>
        </div>
    </div>
<?php
    return ob_get_clean();
}

// Google Map
add_shortcode('ggmap','ggmap_func');
function ggmap_func($atts, $content = null){
    extract( shortcode_atts( array(
	  'height'		=> '',	
      'lat'   		=> '',
      'long'	  	=> '',
      'zoom'		=> '',
      'address'		=> '',
	  'icon'		=> '',
	  'style'		=> 'dark',
	  'gmap_custom_style' => '',
   ), $atts ) );

       $id = uniqid('gmap-');		
	   $gmap_custom_style = rawurldecode( base64_decode( strip_tags( $gmap_custom_style ) ) );
	   $icon1 = wp_get_attachment_image_src($icon,'full');
	   $icon1 = $icon1[0];
   		
    ob_start(); ?>
    	 
    <div id="<?php echo esc_attr($id); ?>" style="<?php if($height != ''){ echo 'height: '.$height.'px;'; } ?>"></div>
		
	<script type="text/javascript">	
		(function($) { "use strict"
		    $(document).ready(function(){
		     
		        var locations = [
					['<div class="infobox"><span><?php echo esc_js( $address );?><span></div>', <?php echo esc_js( $lat );?>, <?php echo esc_js( $long );?>, 2]
		        ];
			
				var map = new google.maps.Map(document.getElementById('<?php echo esc_attr($id); ?>'), {
				  	zoom: <?php echo esc_js( $zoom );?>,
					scrollwheel: false,
					navigationControl: true,
					mapTypeControl: false,
					scaleControl: false,
					draggable: true,			
					styles: 
						<?php if ($style == 'light') {
						echo '[{
					        "featureType": "road.highway",
					        "elementType": "labels",
					        "stylers": [
					            {
					                "hue": "#ffffff"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": 100
					            },
					            {
					                "visibility": "off"
					            }
					        ]
					    },
					    {
					        "featureType": "landscape.natural",
					        "elementType": "all",
					        "stylers": [
					            {
					                "hue": "#ffffff"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": 100
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "road",
					        "elementType": "all",
					        "stylers": [
					            {
					                "hue": "#ffe94f"
					            },
					            {
					                "saturation": 100
					            },
					            {
					                "lightness": 4
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "road.highway",
					        "elementType": "geometry",
					        "stylers": [
					            {
					                "hue": "#ffe94f"
					            },
					            {
					                "saturation": 100
					            },
					            {
					                "lightness": 4
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "water",
					        "elementType": "geometry",
					        "stylers": [
					            {
					                "hue": "#333333"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": -74
					            },
					            {
					                "visibility": "off"
					            }
					        ]
					    }]';
				}elseif($style=='dark'){ 
					echo '[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]';
				}else{
					echo $gmap_custom_style;
				} ?>,
					center: new google.maps.LatLng(<?php echo esc_js( $lat );?>, <?php echo esc_js( $long );?>),
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			
				var infowindow = new google.maps.InfoWindow();
			
				var marker, i;
			
				for (i = 0; i < locations.length; i++) {  
					marker = new google.maps.Marker({ 
						position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
						map: map ,
						icon: '<?php echo esc_js( $icon1 );?>',
						title: '<?php echo esc_js($address); ?>'
					});
				  	google.maps.event.addListener(marker, (function(marker, i) {
						return function() {
							infowindow.setContent(locations[i][0]);
							infowindow.open(map, marker);
						}
				  	})(marker, i));
				}
		        
		    });

		})(jQuery);   	
	</script>
<?php
    return ob_get_clean();
}


// Multiple Google Maps
add_shortcode('multiggmap','multiggmap_func');
function multiggmap_func($atts, $content = null){
    extract( shortcode_atts( array(
		'height'		=> '',	
		'lat'   		=> '',
		'long'	  	=> '',
		'zoom'		=> '',
		'address'		=> '',
		'icon'		=> '',
		'style'		=> 'dark',
		'gmap_custom_style' => '',
		'titles' => '',
		'title'  => '',
		'branch' => '',
		'address' => '',
		'phone' => '',
		'fax' => '',
		'email' => '',
		'website' => '',
		'img_office' => '',
		'viewall_text' => '',
		'active_tab' => ''
   ), $atts ) );
		
	   $viewall_text = (!empty($viewall_text) ? $viewall_text : 'View All');
	   $active_tab1 = (!empty($active_tab) ? $active_tab : 0);
       $id = uniqid('gmap-');		
	   $gmap_custom_style = rawurldecode( base64_decode( strip_tags( $gmap_custom_style ) ) );
	   $titles = (array) vc_param_group_parse_atts( $titles );	   
   		
    ob_start(); ?>

	<div class="row">
		<div class="col-md-3">
			<div class="sidebar-left sidebar-control-map">
				<div id="controls"></div>
			</div>
   		</div>
		<div class="col-md-9">
			<div id="<?php echo esc_attr($id); ?>" style="<?php if($height != ''){ echo 'height: '.$height.'px;'; } ?>"></div>
		</div>
	</div>    	    

	<script type="text/javascript">	
		(function($) { "use strict"
			var LocsA = [
				<?php 
					foreach ( $titles as $data ) {
						$data['title'] = isset( $data['title'] ) ? $data['title'] : '';	
						$data['lat'] = isset( $data['lat'] ) ? $data['lat'] : '';
						$data['long'] = isset( $data['long'] ) ? $data['long'] : '';
						$data['zoom'] = isset( $data['zoom'] ) ? $data['zoom'] : '';
						$data['icon'] = isset( $data['icon'] ) ? $data['icon'] : '';
						$data['img_office'] = isset( $data['img_office'] ) ? $data['img_office'] : '';
						$data['branch'] = isset( $data['branch'] ) ? $data['branch'] : '';
						$data['address'] = isset( $data['address'] ) ? $data['address'] : '';
						$data['phone'] = isset( $data['phone'] ) ? $data['phone'] : '';
						$data['fax'] = isset( $data['fax'] ) ? $data['fax'] : '';
						$data['email'] = isset( $data['email'] ) ? $data['email'] : '';
						$data['website'] = isset( $data['website'] ) ? $data['website'] : '';

						$icon1 = wp_get_attachment_image_src($data['icon'],'full');
	   					$icon1 = $icon1[0];
	   					$img_office1 = wp_get_attachment_image_src($data['img_office'],'full');
	   					$img_office1 = $img_office1[0];
				?>
					{
						lat: <?php echo $data['lat']; ?>,
						lon: <?php echo $data['long']; ?>,
						title: '<?php echo $data['title']; ?>',
						html: [ 
							<?php if ($img_office1 != '') { ?>'<img src="<?php echo esc_url($img_office1); ?>" alt="<?php echo $data['branch']; ?>" height="230">',<?php } ?>
							<?php if ($data['branch'] != '') { ?>'<h3><?php echo $data['branch']; ?></h3>',<?php } ?>
							<?php if ($data['address'] != '') { ?>'<p><?php echo $data['address']; ?></p>',<?php } ?>
							<?php if ($data['phone'] != '') { ?>'<p><?php echo $data['phone']; ?></p>',<?php } ?>
							<?php if ($data['fax'] != '') { ?>'<p><?php echo $data['fax']; ?></p>',<?php } ?>
							<?php if ($data['email'] != '') { ?>'<p><?php echo $data['email']; ?></p>',<?php } ?>
							<?php if ($data['website'] != '') { ?>'<p><?php echo $data['website']; ?></p>',<?php } ?>
						].join(''),
						icon: '<?php echo esc_url($icon1); ?>',
						animation: google.maps.Animation.DROP,
						zoom:<?php echo $data['zoom']; ?>
					},
				<?php } ?>
			];

			new Maplace({
				locations: LocsA,
				map_div: '#<?php echo esc_js($id); ?>',
				controls_type: 'list',
				controls_on_map: false,
				view_all_text: '<?php echo esc_js( $viewall_text ); ?>',
				map_options: {
					scrollwheel: false
				},
				start: <?php echo esc_js($active_tab1); ?>,
				styles: {
					'Night': [{
						featureType: 'all',
						stylers: [
							{ invert_lightness: 'true' }
						]
					}],
					'Greyscale': [{
						featureType: 'all',
						stylers: [
							{ saturation: -100 },
							{ gamma: 0.50 }
						]
					}],					
					"Ultra Light": 
					<?php if ($style == 'light') {
						echo '[{
					        "featureType": "road.highway",
					        "elementType": "labels",
					        "stylers": [
					            {
					                "hue": "#ffffff"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": 100
					            },
					            {
					                "visibility": "off"
					            }
					        ]
					    },
					    {
					        "featureType": "landscape.natural",
					        "elementType": "all",
					        "stylers": [
					            {
					                "hue": "#ffffff"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": 100
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "road",
					        "elementType": "all",
					        "stylers": [
					            {
					                "hue": "#ffe94f"
					            },
					            {
					                "saturation": 100
					            },
					            {
					                "lightness": 4
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "road.highway",
					        "elementType": "geometry",
					        "stylers": [
					            {
					                "hue": "#ffe94f"
					            },
					            {
					                "saturation": 100
					            },
					            {
					                "lightness": 4
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "water",
					        "elementType": "geometry",
					        "stylers": [
					            {
					                "hue": "#333333"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": -74
					            },
					            {
					                "visibility": "off"
					            }
					        ]
					    }]';				
					}elseif($style=='dark'){ 
						echo '[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]';
					}else{
						echo $gmap_custom_style;
					} ?>,
				} 
			}).Load();
		})(jQuery);   	
	</script>
<?php
    return ob_get_clean();
}