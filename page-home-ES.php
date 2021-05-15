<?php /* Template Name: Home ES */ ?>

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
								<li><a href="/es/audiologia-y-otros-usos/">Spain</a></li>
								<li><a href="tel:+34938437459">+34 93 8437459</a></li>
								<li><a href="tel:+34609865723">+34 609 865 723</a></li>
								<li><a href="mailto:info@studiobricks.com">info@studiobricks.com</a></li>
							</ul>
							<ul>
								<li><a href="/es/audiologia-y-otros-usos/">USA</a></li>
								<li><a href="tel:+16095418885">+1 609 541 8885</a></li>
								<li><a href="tel:+19175173841">+1 917 517 3841</a></li>
								<li><a href="mailto:usa@studiobricks.com">usa@studiobricks.com</a></li>
							</ul>
						</div>

						<div class="main_info">
							<div class="logo"><a href="/es/inicio/"><img src="/wp-content/themes/studiobricks-elementor/images/main_logo.svg" alt="Studiobricks"></a></div>
							<p>Creemos que el silencio es un superpoder para el enfoque y la creación. Nuestros espacios de aislamiento acústico te brindan este poder, brindándote la libertad de crear a tu manera y en tus términos.</p>
							<p class="margin-top-2 desktop-only"><span class="italic">Línea de productos:</span></p>
							<ul class="navigation desktop-only">
								<li>
									<a href="#Musicsection" rel="" id="anchor1" class="anchorLink">Música &amp; Grabación</a> 
									<a class="outside-link" href="/es/musica-y-grabacion/"><img src="/wp-content/themes/studiobricks-elementor/images/icon-side.svg" alt="icon"></a>
								</li>
								<li>
									<a href="#Officesection" rel="" id="anchor2" class="anchorLink">Soluciones de oficina</a>
									<a class="outside-link" href="/es/soluciones-de-oficina/"><img src="/wp-content/themes/studiobricks-elementor/images/icon-side.svg" alt="icon"></a>
								</li>
								<li>
									<a href="#Audiosection" rel="" id="anchor3" class="anchorLink">Audiología &amp; otros usos</a>
									<a class="outside-link" href="/es/audiologia-y-otros-usos/"><img src="/wp-content/themes/studiobricks-elementor/images/icon-side.svg" alt="icon"></a>
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
							<div class="arrow_anchor"><img src="/wp-content/themes/studiobricks-elementor/images/icon-down-beige.png" alt="Scroll down">Haga scroll para rotar</div>
						</div>
					</div>
					<div class="container_3 contents-fixed">
						<div class="ct content-title1 slide slide_1 display-block" id="slide_1"> 
							<div id="sprite1mobile"></div>
							<div class="arrow_anchor mobile-only"><img src="/wp-content/themes/studiobricks-elementor/images/360_icon.svg" alt="Scroll down">Deslice para rotar</div>
							<a href="/es/musica-y-grabacion/" name="Musicsection" id="Musicsection"><h3>Música &amp; Grabación</h3></a>
							<ul>
								<li>
									<div class="container_list"><a class="title_small" href="/es/musica-y-grabacion/">One / One Plus / One XXL</a>
										Cabinas compactas y flexibles para locución, narración y práctica musical. Ideal para estudios de grabación domésticos o pequeños.</div>
								</li>
								<li>
									<div class="container_list"><a class="title_small" href="/es/musica-y-grabacion/">Double / Triple Wall Custom Booths</a>
										Cabinas personalizadas de última generación equipadas con paredes dobles o triples para producción de sonido.</div>
								</li>
								<li>
									<div class="container_list"><a class="title_small" href="/es/musica-y-grabacion/">Voiceover Edition</a>
										El kit de herramientas ideal para voz en off, narración, podcast o cualquier otra producción de sonido. Amado por los profesionales de la voz en off de todo el mundo.</div>
								</li>
							</ul>
							<a href="/es/musica-y-grabacion/"><img src="/wp-content/themes/studiobricks-elementor/images/homepage_1.jpg" alt="Music & Recordings"></a>
						</div>
						<div class="ct content-title2 slide slide_2 display-block" style="display: none;" id="slide_2">
							<div id="sprite2mobile"></div>
							<div class="arrow_anchor mobile-only"><img src="/wp-content/themes/studiobricks-elementor/images/360_icon.svg" alt="Scroll down">Deslice para rotar</div>
							<a href="/es/soluciones-de-oficina/" name="Officesection" id="Officesection"><h3>Soluciones de oficina</h3></a>
							<ul>
								<li>
									<div class="container_list"><a class="title_small" href="/es/soluciones-de-oficina/">Phone Booths</a>
										Cabinas telefónicas con ruedas que ahorran espacio para mayor flexibilidad y fácil reubicación.</div>
								</li>
								<li>
									<div class="container_list"><a class="title_small" href="/es/soluciones-de-oficina/">FOCUS Booths</a>
										Cabinas silenciosas para trabajos concentrados, llamadas o videoconferencias. Ideal para la oficina en casa, trabajo remoto y espacios abiertos.</div>
								</li>
								<li>
									<div class="container_list"><a class="title_small" href="/es/soluciones-de-oficina/">FOCUS Solutions</a>
										Cabinas de reuniones más grandes para equipos, conferencias y ferias.</div>
								</li>
							</ul>
							<a href="/es/soluciones-de-oficina/"><img src="/wp-content/themes/studiobricks-elementor/images/homepage_2.jpg" alt="Soluciones de oficina"></a>
						</div>
						<div class="ct content-title3 slide slide_3 display-block" style="display: none ;" id="slide_3">
							<div id="sprite3mobile"></div>
							<div class="arrow_anchor mobile-only"><img src="/wp-content/themes/studiobricks-elementor/images/360_icon.svg" alt="Scroll down">Deslice para rotar</div>
							<a href="/es/audiologia-y-otros-usos/" name="Audiosection" id="Audiosection"><h3>Audiología &amp; otros usos</h3></a>
							<ul>
								<li>
									<div class="container_list">
										Cabinas de aislamiento acústico para pruebas de audiometría, espirometría y estudios del sueño.<br><br>
										Contáctanos para colaborar en proyectos especiales, como cabinas para dormir, cabinas de obra de reducción de sonido industrial / maquinaria, cabinas de telemedicina, aulas de formación, etc. 
									</div>
								</li>
								<li>
									<div class="container_list">
										<span class="primary-color-text">Contacte a nuestros distribuidores directamente:</span><br><br>
										<a class="title_small" href="#">En todo el mundo</a>SIBEL S.A.U. <br>
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

										<a class="title_small" href="#">Suiza</a>
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