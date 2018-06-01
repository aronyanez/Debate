<?php
/**
 * Plugin Name: Debate 2
 * Plugin URI: http://g4a.mx
 * Description: Este plugin agrega el debate.
 * Version: 1.0.0
 * Author: Arón Yáñez
 * Author URI: http://markdevs.com
 * Requires at least: 4.0
 * Tested up to: 4.3
 *
 * Text Domain: wprincipiante-ejemplo
 * Domain Path: /languages/
 */
defined( 'ABSPATH' ) or die( '' );



function antes_de_sidebar ( $name ) 
{


  $api_request    = 'https://dev.quadratin.com.mx/aron.json';
    $api_response = wp_remote_get( $api_request );
    $api_data = json_decode( wp_remote_retrieve_body( $api_response ), true );
if (  strtotime($api_data['inicio'])  < strtotime(current_time( 'mysql' )) && strtotime(current_time( 'mysql' )) < strtotime($api_data['fin'])):

	?>

 <style>
.videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

	@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px)
  and (-webkit-min-device-pixel-ratio: 2) {
  	.super {
			display:none;
        }
}
 

</style>
<div class="super">
<div class="contenedor">
<div class="videoWrapper">
<iframe width="360" height="200" src="<?= $api_data['url'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>
<!-- para el espacio -->
<div class="_25"></div>
</div>
</div>

<script> 
jQuery(".banner-mobile-3").before( jQuery( ".contenedor" ).clone());
</script>


<?php endif;

}

add_action( 'get_sidebar', 'antes_de_sidebar' );




