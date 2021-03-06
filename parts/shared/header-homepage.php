<?php

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
	  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
	  $r = hexdec(substr($hex,0,2));
	  $g = hexdec(substr($hex,2,2));
	  $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

?>


<header id="header-desktop">
	<header id="header-homepage">
		
		<ul id="header-slider">
			<?php $args = array(
			'numberposts'      => 4,
			'offset'           => 0,
			'orderby'          => 'menu_order',
			'order'            => 'DESC',
			'post_type'        => 'header_slide',
			'post_status'      => 'publish',
			'suppress_filters' => true );
			
			$header_slides = get_posts( $args );
			
			foreach ( $header_slides as $post ) : setup_postdata( $post ); ?>
				<li style="background: linear-gradient( rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4) ), url('<?php print_custom_field('header_image:to_image_src'); ?>') no-repeat center 30%; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
					
					<?php
						$related_post = get_custom_field('related_program:get_post');
						$program_color = $related_post['program_color'];
						if ($program_color  != ''):
							$rgb = hex2rgb($program_color);
					 ?>
						<h1><span style="background-color: rgba(<?php echo $rgb[0] ?>,<?php echo $rgb[1] ?>,<?php echo $rgb[2] ?>,.7);"><?php the_title(); ?></span></h1>
						<span class="header-slider-content-color">
							<?php the_content(); ?>
							<div class="program-color-header-slide" style="display: none; background-color: #<?php echo $program_color ?>;"></div>
						</span>
					<?php else: ?>
						<h1><span><?php the_title(); ?></span></h1>
						<span class="header-slider-content"><?php the_content(); ?></span>
					<?php endif; ?>
					
				</li>
			<?php endforeach;
			wp_reset_postdata();
			?>
		</ul>
		
		<div id="header-content">
			
			<div id="site-logo"><a href="<?php echo home_url(); ?>">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 185 99.6" enable-background="new 0 0 185 99.6" xml:space="preserve" width="158" height="85">
				<g>
					<g>
						<path fill="#FFFFFF" d="M31.9,29c0.7-0.8,1.1-1.8,1.1-3.1c0-2.9-1.5-4.3-4.6-4.3h-4.5v8.5h4.5C30,30.1,31.2,29.8,31.9,29z"/>
						<path fill="#FFFFFF" d="M154.2,21.6h-3v24h3c3.8,0,6.5-0.9,8.1-2.7c1.5-1.8,2.3-4.9,2.3-9.4c0-4.3-0.8-7.3-2.4-9.2
							C160.5,22.5,157.8,21.6,154.2,21.6z"/>
						<path fill="#FFFFFF" d="M29.3,36h-5.3v9.6h5.3c3.6,0,5.4-1.6,5.4-4.8C34.7,37.6,32.9,36,29.3,36z"/>
						<path fill="#FFFFFF" d="M0,0v67.3h185V0H0z M29.5,51.5H13.1v-5.9h3.5v-24h-3.5v-5.9h16.4c7.2,0,10.9,3.2,10.9,9.7
							c0,1.7-0.4,3.2-1.3,4.5c-0.8,1.3-1.9,2.2-3.2,2.6c1.6,0.4,3.1,1.4,4.3,3.1s1.9,3.5,1.9,5.5C42,48,37.8,51.5,29.5,51.5z M80.2,21.6
							h-3.4V38c0,2.4-0.3,4.6-1,6.4c-0.7,1.8-1.6,3.3-2.9,4.4c-1.2,1.1-2.7,1.9-4.3,2.5c-1.6,0.5-3.5,0.8-5.6,0.8
							c-2.1,0-3.9-0.3-5.6-0.8s-3.1-1.4-4.3-2.5c-1.2-1.1-2.2-2.6-2.8-4.4c-0.7-1.8-1-4-1-6.4V21.6h-3.3v-5.9H61v5.9h-4.4v16.3
							c0,2.6,0.5,4.6,1.6,5.8c1.1,1.2,2.7,1.8,4.9,1.8c2.2,0,3.8-0.6,4.9-1.9c1.1-1.2,1.6-3.2,1.6-5.8V21.6h-4.4v-5.9h14.9V21.6z
							 M101.4,21.6h-3.9v24h3.9v5.9H86.2v-5.9h4v-24h-4v-5.9h15.2V21.6z M134.4,51.5h-25.9v-5.9h3.5v-24h-3.5v-5.9H123v5.9h-3.7v24h8.3
							v-6.9h6.8V51.5z M170.9,41.7c-0.6,2.2-1.7,4-3.2,5.5c-1.5,1.5-3.4,2.6-5.8,3.3c-2.4,0.7-5.4,1-8.9,1h-12.7v-5.9h3.6v-24h-3.6v-5.9
							h12.7c3.5,0,6.5,0.3,8.9,1c2.4,0.7,4.3,1.7,5.8,3.2c1.5,1.5,2.6,3.3,3.2,5.5c0.6,2.2,1,4.9,1,8.1
							C171.8,36.8,171.5,39.5,170.9,41.7z"/>
					</g>
					<g>
						<path fill="#FFFFFF" d="M0,99.3v-3.3h2.3V82.4H0V79h8.6v3.3H6.4v13.6h2.2v3.3H0z"/>
						<path fill="#FFFFFF" d="M15.7,99.3v-3.3h1.9V82.4h-1.9V79h6.5L30,92.5V82.4h-2.7V79H36v3.3h-1.9v16.9h-4.4l-7.9-13.5v10.2h3.1v3.3
							H15.7z"/>
						<path fill="#FFFFFF" d="M42.2,92.6h3.4l0.8,3.2c0.6,0.3,1.5,0.4,2.8,0.4c0.9,0,1.6-0.2,2-0.6c0.5-0.4,0.7-1,0.7-1.6
							c0-0.5-0.1-1-0.4-1.4s-0.7-0.7-1.2-0.9l-3.3-1.2c-1.8-0.6-3-1.4-3.7-2.4c-0.7-0.9-1-2.2-1-3.7c0-0.7,0.1-1.4,0.4-2
							s0.6-1.3,1.1-1.9c0.5-0.6,1.2-1.1,2.2-1.4c0.9-0.4,2-0.5,3.2-0.5c1.2,0,2.3,0.1,3.5,0.4c1.2,0.3,2.2,0.7,2.9,1.1v5.4h-3.5
							l-0.6-3.3c-0.8-0.2-1.6-0.3-2.3-0.3c-0.8,0-1.4,0.2-1.9,0.7c-0.5,0.4-0.7,1-0.7,1.6c0,1.1,0.6,1.8,1.7,2.2l3,1.1
							c1,0.3,1.8,0.7,2.5,1.1c0.7,0.4,1.2,0.9,1.5,1.4c0.4,0.5,0.6,1,0.8,1.6c0.1,0.6,0.2,1.2,0.2,1.9c0,0.6-0.1,1.1-0.2,1.7
							s-0.4,1.1-0.8,1.6c-0.4,0.5-0.8,1-1.4,1.4c-0.5,0.4-1.2,0.7-2,1c-0.8,0.2-1.7,0.4-2.7,0.4c-2.6,0-4.9-0.5-6.9-1.5L42.2,92.6z"/>
						<path fill="#FFFFFF" d="M61.5,85.6V79H78v6.5h-3.4v-3.2h-2.9v13.6h2.7v3.3h-9.5v-3.3h2.7V82.4h-2.7v3.2H61.5z"/>
						<path fill="#FFFFFF" d="M85,99.3v-3.3h2.3V82.4H85V79h8.6v3.3h-2.2v13.6h2.2v3.3H85z"/>
						<path fill="#FFFFFF" d="M100.1,85.6V79h16.5v6.5h-3.4v-3.2h-2.9v13.6h2.7v3.3h-9.5v-3.3h2.7V82.4h-2.7v3.2H100.1z"/>
						<path fill="#FFFFFF" d="M122.5,82.4V79h8.4v3.3h-2.5v9.2c0,1.5,0.3,2.6,0.9,3.3c0.6,0.7,1.5,1,2.8,1c1.2,0,2.2-0.3,2.8-1
							c0.6-0.7,0.9-1.8,0.9-3.3v-9.2h-2.5V79h8.4v3.3h-1.9v9.2c0,1.4-0.2,2.6-0.6,3.6c-0.4,1-0.9,1.9-1.6,2.5c-0.7,0.6-1.5,1.1-2.4,1.4
							c-0.9,0.3-2,0.5-3.1,0.5s-2.2-0.2-3.1-0.5c-0.9-0.3-1.7-0.8-2.4-1.4c-0.7-0.6-1.2-1.5-1.6-2.5c-0.4-1-0.6-2.2-0.6-3.6v-9.2H122.5z
							"/>
						<path fill="#FFFFFF" d="M147,85.6V79h16.5v6.5h-3.4v-3.2h-2.9v13.6h2.7v3.3h-9.5v-3.3h2.7V82.4h-2.7v3.2H147z"/>
						<path fill="#FFFFFF" d="M169.5,99.3v-3.3h2V82.4h-2V79h15.4v6.3h-3.8v-3h-5.5v5.1h5.7v3.3h-5.7v5.1h5.5v-3h3.9v6.3H169.5z"/>
					</g>
				</g>
				</svg>
			</a></div>
			
			<nav role="navigation" class="site-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				
				<div id="st-trigger-effects">
					
					<div data-effect="st-effect-4" class="icon icon-search" id="menu-search"></div>
					<div data-effect="st-effect-5" class="icon icon-mail tooltips" id="menu-newsletter"><span>Newsletter</span></div>
					
				</div>
			</nav>
			
		</div>
	</header>
</header>

<header id="header-mobile" class="header-mobile-homepage">
	<div id="header-content">
		<div id="site-logo"><a href="<?php echo home_url(); ?>">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 185 99.6" enable-background="new 0 0 185 99.6" xml:space="preserve" width="158" height="85">
			<g>
				<g>
					<path fill="#FFFFFF" d="M31.9,29c0.7-0.8,1.1-1.8,1.1-3.1c0-2.9-1.5-4.3-4.6-4.3h-4.5v8.5h4.5C30,30.1,31.2,29.8,31.9,29z"/>
					<path fill="#FFFFFF" d="M154.2,21.6h-3v24h3c3.8,0,6.5-0.9,8.1-2.7c1.5-1.8,2.3-4.9,2.3-9.4c0-4.3-0.8-7.3-2.4-9.2
						C160.5,22.5,157.8,21.6,154.2,21.6z"/>
					<path fill="#FFFFFF" d="M29.3,36h-5.3v9.6h5.3c3.6,0,5.4-1.6,5.4-4.8C34.7,37.6,32.9,36,29.3,36z"/>
					<path fill="#FFFFFF" d="M0,0v67.3h185V0H0z M29.5,51.5H13.1v-5.9h3.5v-24h-3.5v-5.9h16.4c7.2,0,10.9,3.2,10.9,9.7
						c0,1.7-0.4,3.2-1.3,4.5c-0.8,1.3-1.9,2.2-3.2,2.6c1.6,0.4,3.1,1.4,4.3,3.1s1.9,3.5,1.9,5.5C42,48,37.8,51.5,29.5,51.5z M80.2,21.6
						h-3.4V38c0,2.4-0.3,4.6-1,6.4c-0.7,1.8-1.6,3.3-2.9,4.4c-1.2,1.1-2.7,1.9-4.3,2.5c-1.6,0.5-3.5,0.8-5.6,0.8
						c-2.1,0-3.9-0.3-5.6-0.8s-3.1-1.4-4.3-2.5c-1.2-1.1-2.2-2.6-2.8-4.4c-0.7-1.8-1-4-1-6.4V21.6h-3.3v-5.9H61v5.9h-4.4v16.3
						c0,2.6,0.5,4.6,1.6,5.8c1.1,1.2,2.7,1.8,4.9,1.8c2.2,0,3.8-0.6,4.9-1.9c1.1-1.2,1.6-3.2,1.6-5.8V21.6h-4.4v-5.9h14.9V21.6z
						 M101.4,21.6h-3.9v24h3.9v5.9H86.2v-5.9h4v-24h-4v-5.9h15.2V21.6z M134.4,51.5h-25.9v-5.9h3.5v-24h-3.5v-5.9H123v5.9h-3.7v24h8.3
						v-6.9h6.8V51.5z M170.9,41.7c-0.6,2.2-1.7,4-3.2,5.5c-1.5,1.5-3.4,2.6-5.8,3.3c-2.4,0.7-5.4,1-8.9,1h-12.7v-5.9h3.6v-24h-3.6v-5.9
						h12.7c3.5,0,6.5,0.3,8.9,1c2.4,0.7,4.3,1.7,5.8,3.2c1.5,1.5,2.6,3.3,3.2,5.5c0.6,2.2,1,4.9,1,8.1
						C171.8,36.8,171.5,39.5,170.9,41.7z"/>
				</g>
				<g>
					<path fill="#FFFFFF" d="M0,99.3v-3.3h2.3V82.4H0V79h8.6v3.3H6.4v13.6h2.2v3.3H0z"/>
					<path fill="#FFFFFF" d="M15.7,99.3v-3.3h1.9V82.4h-1.9V79h6.5L30,92.5V82.4h-2.7V79H36v3.3h-1.9v16.9h-4.4l-7.9-13.5v10.2h3.1v3.3
						H15.7z"/>
					<path fill="#FFFFFF" d="M42.2,92.6h3.4l0.8,3.2c0.6,0.3,1.5,0.4,2.8,0.4c0.9,0,1.6-0.2,2-0.6c0.5-0.4,0.7-1,0.7-1.6
						c0-0.5-0.1-1-0.4-1.4s-0.7-0.7-1.2-0.9l-3.3-1.2c-1.8-0.6-3-1.4-3.7-2.4c-0.7-0.9-1-2.2-1-3.7c0-0.7,0.1-1.4,0.4-2
						s0.6-1.3,1.1-1.9c0.5-0.6,1.2-1.1,2.2-1.4c0.9-0.4,2-0.5,3.2-0.5c1.2,0,2.3,0.1,3.5,0.4c1.2,0.3,2.2,0.7,2.9,1.1v5.4h-3.5
						l-0.6-3.3c-0.8-0.2-1.6-0.3-2.3-0.3c-0.8,0-1.4,0.2-1.9,0.7c-0.5,0.4-0.7,1-0.7,1.6c0,1.1,0.6,1.8,1.7,2.2l3,1.1
						c1,0.3,1.8,0.7,2.5,1.1c0.7,0.4,1.2,0.9,1.5,1.4c0.4,0.5,0.6,1,0.8,1.6c0.1,0.6,0.2,1.2,0.2,1.9c0,0.6-0.1,1.1-0.2,1.7
						s-0.4,1.1-0.8,1.6c-0.4,0.5-0.8,1-1.4,1.4c-0.5,0.4-1.2,0.7-2,1c-0.8,0.2-1.7,0.4-2.7,0.4c-2.6,0-4.9-0.5-6.9-1.5L42.2,92.6z"/>
					<path fill="#FFFFFF" d="M61.5,85.6V79H78v6.5h-3.4v-3.2h-2.9v13.6h2.7v3.3h-9.5v-3.3h2.7V82.4h-2.7v3.2H61.5z"/>
					<path fill="#FFFFFF" d="M85,99.3v-3.3h2.3V82.4H85V79h8.6v3.3h-2.2v13.6h2.2v3.3H85z"/>
					<path fill="#FFFFFF" d="M100.1,85.6V79h16.5v6.5h-3.4v-3.2h-2.9v13.6h2.7v3.3h-9.5v-3.3h2.7V82.4h-2.7v3.2H100.1z"/>
					<path fill="#FFFFFF" d="M122.5,82.4V79h8.4v3.3h-2.5v9.2c0,1.5,0.3,2.6,0.9,3.3c0.6,0.7,1.5,1,2.8,1c1.2,0,2.2-0.3,2.8-1
						c0.6-0.7,0.9-1.8,0.9-3.3v-9.2h-2.5V79h8.4v3.3h-1.9v9.2c0,1.4-0.2,2.6-0.6,3.6c-0.4,1-0.9,1.9-1.6,2.5c-0.7,0.6-1.5,1.1-2.4,1.4
						c-0.9,0.3-2,0.5-3.1,0.5s-2.2-0.2-3.1-0.5c-0.9-0.3-1.7-0.8-2.4-1.4c-0.7-0.6-1.2-1.5-1.6-2.5c-0.4-1-0.6-2.2-0.6-3.6v-9.2H122.5z
						"/>
					<path fill="#FFFFFF" d="M147,85.6V79h16.5v6.5h-3.4v-3.2h-2.9v13.6h2.7v3.3h-9.5v-3.3h2.7V82.4h-2.7v3.2H147z"/>
					<path fill="#FFFFFF" d="M169.5,99.3v-3.3h2V82.4h-2V79h15.4v6.3h-3.8v-3h-5.5v5.1h5.7v3.3h-5.7v5.1h5.5v-3h3.9v6.3H169.5z"/>
				</g>
			</g>
			</svg>
		</a></div>
		<nav role="navigation" id="mobile-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
		<a href="#mobile-menu" id="mobile-menu-button">
			<span class="icon icon-menu">
			</span>
		</a>
	</div>
</header>
