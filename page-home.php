<?php /* Template Name: Home */ ?>

<?php

get_header('home'); // This fxn gets the header.php file and renders it ?>

<link rel="stylesheet" href="/wp-content/themes/studiobricks-elementor/assets/css/home.css">

<div id="primary">
	<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<article class="post">					
			<div class="the-content">
				<?php the_content(); ?>							
				<?php wp_link_pages(); ?>
				<div class="main-wrapper">
					<div class="container_1 contents-fixed">
						<div class="languages" id="languages">
							<h2>Freedom to be loud</h2>
							<ul>
								<ul><?php pll_the_languages(); ?></ul>
							</ul>
							<ul>
								<li><a target="_blank" href="https://www.youtube.com/user/Studiobricks">YouTube</a></li>
								<li><a target="_blank" href="https://www.instagram.com/studiobricks/">Instagram</a></li>
								<li><a target="_blank" href="https://www.facebook.com/Studiobricks/">Facebook</a></li>
								<li><a target="_blank" href="https://twitter.com/studiobricksusa">Twitter</a></li>
							</ul>
							<ul>
								<li><a href="/audiology-other-uses/">Spain</a></li>
								<li><a href="tel:+34938437459">+34 93 8437459</a></li>
								<li><a href="tel:+34609865723">+34 609 865 723</a></li>
								<li><a href="mailto:info@studiobricks.com">info@studiobricks.com</a></li>
							</ul>
							<ul>
								<li><a href="/audiology-other-uses/">USA</a></li>
								<li><a href="tel:+16095418885">+1 609 541 8885</a></li>
								<li><a href="tel:+19175173841">+1 917 517 3841</a></li>
								<li><a href="mailto:usa@studiobricks.com">usa@studiobricks.com</a></li>
							</ul>
						</div>

						<div class="main_info">
							<div class="logo"><a href="/"><img src="/wp-content/themes/studiobricks-elementor/images/main_logo.svg" alt="Studiobricks"></a></div>
							<p>We believe silence is a superpower for focus & creation. Our sound isolation spaces give you this power, 
								providing the freedom to create in your way and on your terms.</p>
							<p class="margin-top-2 desktop-only"><span class="italic">The</span> booth for</p>
							<ul class="navigation desktop-only">
								<li>
									<a href="#Musicsection" rel="" id="anchor1" class="anchorLink">Music &amp; Recording</a> 
									<a class="outside-link" href="/music-recording/"><img src="/wp-content/themes/studiobricks-elementor/images/icon-side.svg" alt="icon"></a>
								</li>
								<li>
									<a href="#Officesection" rel="" id="anchor2" class="anchorLink">Office Solutions</a>
									<a class="outside-link" href="/office-solutions/"><img src="/wp-content/themes/studiobricks-elementor/images/icon-side.svg" alt="icon"></a>
								</li>
								<li>
									<a href="#Audiosection" rel="" id="anchor3" class="anchorLink">Audiology &amp; other uses</a>
									<a class="outside-link" href="/audiology-other-uses/"><img src="/wp-content/themes/studiobricks-elementor/images/icon-side.svg" alt="icon"></a>
								</li>
							</ul>

						</div>
						<div class="patented_badge">
							<img class="desktop-only" src="/wp-content/themes/studiobricks-elementor/images/patented_mark.svg" alt="Patented">
						</div>
					</div>

					<div class="container_2 contents-fixed">
						<div id='mySpriteSpin1' class="content-right" style="display: block ;"></div>
						<div id='mySpriteSpin2' class="content-right" style="display: none ;"></div>
						<div id='mySpriteSpin3' class="content-right" style="display: none ;"></div>
						<div class="arrow_anchor_container">
							<div class="arrow_anchor"><img src="/wp-content/themes/studiobricks-elementor/images/icon-down-beige.png" alt="Scroll down">Scroll down to rotate</div>
						</div>
					</div>
					<div class="container_3 contents-fixed">
						<div class="ct content-title1 slide slide_1 display-block" id="slide_1"> 
							<div id="sprite1mobile"></div>
							<div class="arrow_anchor mobile-only"><img src="/wp-content/themes/studiobricks-elementor/images/360_icon.svg" alt="Scroll down">Swipe to rotate</div>
							<a href="/music-recording/" name="Musicsection" id="Musicsection"><h3>Music &amp; Recording</h3></a>
							<ul>
								<li>
									<div class="container_list"><a class="title_small" href="/music-recording/">One / One Plus / One XXL</a>
										Compact and flexible booths for voiceover, narration and music practice. Ideal for home or small recording studios.</div>
								</li>
								<li>
									<div class="container_list"><a class="title_small" href="/music-recording/">Double / Triple Wall Custom Booths</a>
										State-of-the-art custom booths equipped with double or triple walled for sound production.</div>
								</li>
								<li>
									<div class="container_list"><a class="title_small" href="/music-recording/">Voiceover Edition</a>
										The ideal toolkit for voiceover, narration, podcast, or any other sound production. Loved by voiceover professionals all over the world.</div>
								</li>
							</ul>
							<a href="/music-recording/"><img src="/wp-content/themes/studiobricks-elementor/images/homepage_1.jpg" alt="Music & Recordings"></a>
						</div>
						<div class="ct content-title2 slide slide_2 display-block" style="display: none;" id="slide_2">
							<div id="sprite2mobile"></div>
							<div class="arrow_anchor mobile-only"><img src="/wp-content/themes/studiobricks-elementor/images/360_icon.svg" alt="Scroll down">Swipe to rotate</div>
							<a href="/office-solutions/" name="Officesection" id="Officesection"><h3>Office Solutions</h3></a>
							<ul>
								<li>
									<div class="container_list"><a class="title_small" href="/office-solutions/">Phone Booths</a>
										Space-saving phone booths on casters for flexibility and easy relocation.</div>
								</li>
								<li>
									<div class="container_list"><a class="title_small" href="/office-solutions/">FOCUS Booths</a>
										Quiet booths for focused work, calls, or videoconferences. Ideal for the home office, remote work and open spaces.</div>
								</li>
								<li>
									<div class="container_list"><a class="title_small" href="/office-solutions/">FOCUS Solutions</a>
										Larger meeting booths for teams, conferences and tradeshows.</div>
								</li>
							</ul>
							<a href="/office-solutions/"><img src="/wp-content/themes/studiobricks-elementor/images/homepage_2.jpg" alt="Office Solutions"></a>
						</div>
						<div class="ct content-title3 slide slide_3 display-block" style="display: none ;" id="slide_3">
							<div id="sprite3mobile"></div>
							<div class="arrow_anchor mobile-only"><img src="/wp-content/themes/studiobricks-elementor/images/360_icon.svg" alt="Scroll down">Swipe to rotate</div>
							<a href="/audiology-other-uses/" name="Audiosection" id="Audiosection"><h3>Audiology &amp; other uses</h3></a>
							<ul>
								<li>
									<div class="container_list">
										Sound isolation booths for audiometry, spirometry and sleep study testing.<br><br>
										Contact us to collaborate on special projects, such as sleeping booths, industrial/ machinery sound reduction construction site booths, 	telemedicine booths, training rooms, etc. 
									</div>
								</li>
								<li>
									<div class="container_list">
										<span class="primary-color-text">Contact our distributors directly:</span><br><br>
										<a class="title_small" href="#">Worldwide</a>SIBEL S.A.U. <br>
										<a target="_blank" href="https://www.sibelmed.com/">www.sibelmed.com</a><br>
										<a href="mailto:export@sibelmed.com">export@sibelmed.com</a><br>
										<a href="tel:+34934360007">T (+34) 93 436 00 07</a><br>
										Rosellón 500 Bajos<br>
										08026 Barcelona<br>
										Spain
									</div>
								</li>
								<li>
									<div class="container_list">
										<a class="title_small" href="#">U.S.A.</a>
										STUDIOBRICKS USA
										<a href="mailto:usa@studiobricks.com">usa@studiobricks.com</a><br>
										<a href="tel:+16095418885">T (+1) 609 541 8885</a><br><br>

										<a class="title_small" href="#">Switzerland</a>
										AUDIOCARE
										<a target="_blank" href="https://audiocare.ch/">www.audiocare.ch</a><br>
										<a href="mailto:info@audiocare.ch">info@audiocare.ch</a><br>
										<a href="tel:T +41614630990">T (+41) 61 463 09 90</a>
									</div>
								</li>
							</ul>
							<img src="/wp-content/themes/studiobricks-elementor/images/homepage_3.jpg" alt="Audio Medical">
						</div>
					</div>
				</div>
			</div>						
		</article>

		<?php endwhile; ?>

		<?php else : ?>				
		<article class="post error">
			<h1 class="404">Nothing posted yet</h1>
		</article>
		<?php endif;  ?>

	</div>
</div>

<script type="text/javascript" src="/wp-content/themes/studiobricks-elementor/assets/js/rotate-sprites-home.js"></script>
