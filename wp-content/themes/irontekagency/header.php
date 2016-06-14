<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package irontekagency
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="single-gray-ajax" class="pop hide">
		<a href="#" class="close">
			<svg width="40px" height="40px" viewBox="1846 35 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<g id="close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(1846.000000, 35.000000)">
							<path d="M37.9866667,39.5652174 C37.5837681,39.5652174 37.1785507,39.4110145 36.8707246,39.1031884 L0.896811594,3.12927536 C0.28057971,2.51362319 0.28057971,1.51246377 0.896811594,0.896811594 C1.51246377,0.28057971 2.51362319,0.28057971 3.12927536,0.896811594 L39.1031884,36.8707246 C39.7194203,37.4863768 39.7194203,38.4875362 39.1031884,39.1031884 C38.7953623,39.4110145 38.3901449,39.5652174 37.9866667,39.5652174 L37.9866667,39.5652174 Z" id="Fill-1" fill="#C0C5CF"></path>
							<path d="M2.01333333,39.5652174 C1.60985507,39.5652174 1.20463768,39.4110145 0.896811594,39.1031884 C0.28057971,38.4875362 0.28057971,37.4863768 0.896811594,36.8707246 L36.8707246,0.896811594 C37.4863768,0.28057971 38.4875362,0.28057971 39.1031884,0.896811594 C39.7194203,1.51246377 39.7194203,2.51362319 39.1031884,3.12927536 L3.12927536,39.1031884 C2.82144928,39.4110145 2.41855072,39.5652174 2.01333333,39.5652174 L2.01333333,39.5652174 Z" id="Fill-2" fill="#C0C5CF"></path>
					</g>
			</svg>
		</a>
		<div class="container"></div>
	</div>
	<div id="page" class="site">
		<nav id="nav" class="navbar navbar-default navbar-fixed-top main_nav" role="navigation">
			<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand logo-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">

						<svg width="44px" height="53px" viewBox="15 4 44 53" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						    <defs>
						        <filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-1">
						            <feOffset dx="-1" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
						            <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
						            <feColorMatrix values="0 0 0 0 0.298841759   0 0 0 0 0.337834653   0 0 0 0 0.425568665  0 0 0 0.326341712 0" type="matrix" in="shadowBlurOuter1" result="shadowMatrixOuter1"></feColorMatrix>
						            <feMerge>
						                <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
						                <feMergeNode in="SourceGraphic"></feMergeNode>
						            </feMerge>
						        </filter>
						    </defs>
						    <g id="icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(15.000000, 4.000000)">
						        <g id="i" transform="translate(1.009754, 0.000000)" fill="#50E3C2">
						            <rect id="Rectangle-1" fill-opacity="0.274286685" x="0.0535296259" y="0.972265583" width="21.7389401" height="21.4090205" rx="10.7045102"></rect>
						            <rect id="Rectangle-1" x="6.60712202" y="7.4263978" width="8.63175529" height="8.50075601" rx="4.25037801"></rect>
						        </g>
						        <g id="t" transform="translate(0.313824, 17.692453)" fill="#FFFFFF">
						            <rect id="Rectangle-1" x="7.9676782" y="1.03162189" width="7.65094943" height="29.2651256" rx="3.82547472"></rect>
						            <rect id="Rectangle-1" transform="translate(7.821075, 4.826269) rotate(-270.000000) translate(-7.821075, -4.826269) " x="3.96789763" y="-2.70808224" width="7.70635454" height="15.0687029" rx="3.85317727"></rect>
						        </g>
						        <g id="a" filter="url(#filter-1)" transform="translate(14.158008, 18.037939)" fill="#FFFFFF">
						            <path d="M1.39991484,5.95474784 C1.6785924,5.44749368 2.5162393,4.33518268 2.85523784,3.90458081 C3.41389858,3.19496016 4.05447041,2.5894253 4.77695556,2.08797282 C6.65839918,0.782126531 9.45364492,0.129213177 13.1627766,0.129213177 C16.5314566,0.129213177 19.0400105,0.521843505 20.6885135,1.30711594 C22.3370165,2.09238837 23.4972226,3.08940471 24.1691668,4.29819486 C24.8411109,5.50698501 25.177078,7.7260081 25.177078,10.9553307 L25.0964451,19.6374005 C25.0964451,22.1079205 25.2173932,23.9299017 25.4592931,25.1033987 C25.701193,26.2768957 18.905632,27.6489088 18.6189359,26.6783473 C18.4935063,26.237183 18.4039151,25.946019 18.3501595,25.8048464 C17.0600268,27.0401064 15.6803221,27.9665375 14.2110043,28.5841675 C12.7416864,29.2017975 11.1738402,29.5106079 9.50741873,29.5106079 C6.56878298,29.5106079 4.25285021,28.7253472 2.55955095,27.1548024 C0.866251695,25.5842575 0.019614765,23.599048 0.019614765,21.1991143 C0.019614765,19.6109228 0.404856966,18.1948067 1.17535292,16.9507234 C1.94584888,15.7066401 3.02542296,14.7537395 4.41410754,14.0919931 C5.80279211,13.4302467 7.80515565,12.8523301 10.4212582,12.3582261 C13.9512048,11.705303 16.3970448,11.0965054 17.7588516,10.5318151 L17.7588516,9.79066279 C17.7588516,8.3612905 17.4004868,7.34221628 16.6837464,6.73340956 C15.9670059,6.12460284 14.6141787,5.82020405 12.625224,5.82020405 C11.2813357,5.82020405 10.2331185,6.08048707 9.4805411,6.60106093 C9.0126213,6.92473103 8.60012068,7.40018151 8.24303483,8.02741895 C8.02580269,8.40899703 7.78075732,8.84602146 7.60454068,9.33994955 C7.60454068,9.33994955 0.941891367,6.7884508 1.39991484,5.95474784 Z M17.7588516,15.3757748 C16.7912521,15.693413 15.2592424,16.0728086 13.1627766,16.5139729 C11.0663109,16.9551372 9.69556538,17.3874717 9.05049899,17.8109895 C8.0649809,18.4992057 7.57222925,19.3726979 7.57222925,20.4314922 C7.57222925,21.4726399 7.96643057,22.3726016 8.75484504,23.1314042 C9.54325951,23.8902068 10.5466811,24.2696023 11.7651398,24.2696023 C13.1269466,24.2696023 14.4260191,23.8284447 15.6623964,22.9461161 C16.5762404,22.2755464 17.1765015,21.4549931 17.4631977,20.4844317 C17.6603013,19.8491551 17.7588516,18.6403831 17.7588516,16.8580794 L17.7588516,15.3757748 Z"></path>
						            <rect id="Rectangle-1" x="18.5453901" y="22.8231943" width="7.15590064" height="7.04729958" rx="3.52364979"></rect>
						            <rect id="Rectangle-1" x="0.728940136" y="4.48083596" width="7.15590064" height="7.04729958" rx="3.52364979"></rect>
						        </g>
						    </g>
						</svg>
							</a>
							<a class="navbar-brand text-brand xs-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>">Irontek Agency</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
							<?php wp_nav_menu(array(
								'container_class' => 'menu-header',
								'theme_location' => 'primary',
								'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
								'walker' => new BS3_Walker_Nav_Menu,
								'menu' => 'primary'
							)); ?>
						</div><!-- /.navbar-collapse -->
				</div>
		</nav>
		<div id="content" class="site-content">
