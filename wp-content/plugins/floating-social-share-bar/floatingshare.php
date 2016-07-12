<?php
	/**
	* Plugin Name: Floating Share
	* Plugin URI: http://www.shoutmeloud.com/
	* Description: Floating Social Buttons Provide an easy way to add floating social sharing button.
	* Version: 4.1
	* Author: Harsh Agrawal		
	* Author URI: http://www.shoutmeloud.com/about
	* License: GPL2
	*/
	
	add_action('admin_menu', 'floating_social_buttons_menu');
	
	function floating_social_buttons_menu() {
	$hook_suffix = add_options_page('Floating Social Buttons Options', 'Floating Share', 'manage_options', 'floating-social-buttons', 'floating_social_buttons_option');
	}
	
	/*** Register Settings*/
	function plugin_settings_init(){register_setting( 'plugin_settings', 'plugin_settings' );}
	
	/*** Add Actions*/
	add_action( 'admin_init', 'plugin_settings_init' );
	
	
	add_action( 'wp_footer', 'footer_script' );
	
	function footer_script()
	{
		wp_enqueue_script('whatsapp_button', plugins_url.'/js/whatsapp-button.js');
	
	}
	
	
	if($_POST['plugin_settings'])
	{
	update_option('plugin_settings', $_POST['plugin_settings']);
	}
	
	function floating_social_buttons_option()
	{
	?>

<div class="wrap">
  <div id="shout-icon-options-general" class="icon32"></div>
  <h2>Floating Share</h2>
  <div id="poststuff">
    <div id="post-body" class="metabox-holder columns-2">
      <div id="post-body-content">
        <div class="meta-box-sortables ui-sortable">
          <div class="postbox">
            <h3><span>Floating Share</span></h3>
            <div class="intdatas">
              <form name="social_buttons" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
                <!--<input type="hidden" name="social_buttons_hidden" value="Y">-->
                <?php settings_fields( 'plugin_settings' ); ?>
                <?php $options = get_option( 'plugin_settings' ); ?>
                <div class="intdatasdata">
                  <table width="100%">
                    <tr>
                      <td><strong>Select the Social Share</strong></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-facebook b_facebook"></i>Facebook
                        <input id="plugin_settings[facebook]" name="plugin_settings[facebook]" type="checkbox" value="1" <?php checked( '1', ($options['facebook']) ? $options['facebook'] : '' ); ?> /></td>
                      <td><i class="fa fa-twitter b_twitter"></i>Twitter
                        <input id="plugin_settings[tweet]" name="plugin_settings[tweet]" type="checkbox" value="1" <?php checked( '1', ($options['tweet']) ? $options['tweet'] : '' ); ?> /></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-google-plus b_googleplus"></i>Google Plus
                        <input id="plugin_settings[gplus]" name="plugin_settings[gplus]" type="checkbox" value="1" <?php checked( '1', ($options['gplus']) ? $options['gplus'] : '' ); ?> /></td>
                      <td><i class="fa fa-stumbleupon b_stumbleupon"></i>Stumbleuppon
                        <input id="plugin_settings[stumbleupon]" name="plugin_settings[stumbleupon]" type="checkbox" value="1" <?php checked( '1', ($options['stumbleupon']) ? $options['stumbleupon'] : '' ); ?> /></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-pinterest b_pinterest"></i>Pinterest
                        <input id="plugin_settings[pinterest]" name="plugin_settings[pinterest]" type="checkbox" value="1" <?php checked( '1', ($options['pinterest']) ? $options['pinterest'] : '' ); ?> /></td>
                      <td><i class="fa fa-reddit b_reddit"></i>Reddit
                        <input id="plugin_settings[reddit]" name="plugin_settings[reddit]" type="checkbox" value="1" <?php checked( '1', ($options['reddit']) ? $options['reddit'] : '' ); ?> /></td>
                    </tr>
                    <tr>
                      <td><span class="b_share_shout_buffer"><img src="<?php echo plugins_url('floating-social-share-bar/default/buffer.png'); ?>" /></span><span>Buffer</span>
                        <input id="plugin_settings[buffer]" name="plugin_settings[buffer]" type="checkbox" value="1" <?php checked( '1', ($options['buffer']) ? $options['buffer'] : '' ); ?> /></td>
                      <td><span class="b_share_shout_pocket"><img src="<?php echo plugins_url('floating-social-share-bar/default/pocket-icon.png'); ?>" /></span><span>Pocket</span>
                        <input id="plugin_settings[pocket]" name="plugin_settings[pocket]" type="checkbox" value="1" <?php checked( '1', ($options['pocket']) ? $options['pocket'] : '' ); ?> /></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-whatsapp b_whatsapp"></i>
                        <input id="plugin_settings[whatsapp]" name="plugin_settings[whatsapp]" type="checkbox" value="1" <?php checked( '1', ($options['whatsapp']) ? $options['whatsapp'] : '' ); ?> />
                        Whatsapp For Mobile</td>
                    </tr>
                  </table>
                </div>
                <div class="intdatasdatatweet">
                  <h3>Twitter Name</h3>
                  <table width="60%">
                    <tr>
                      <td><strong>Enter your Twitter ID:</strong></td>
                      <td><input id="plugin_settings[twitter_name]" name="plugin_settings[twitter_name]" type="text" value="<?php echo ($options['twitter_name']) ? $options['twitter_name'] : "Shoutmeloud";?>" /></td>
                    </tr>
                    <tr>
                      <td> Note: Paste the ID Without ' @ ' Symbol </td>
                    </tr>
                  </table>
                </div>
                <div class="intdatasdatasetting">
                  <h3>Display Settings</h3>
                  <table width="60%">
                    <tr>
                      <td>Position From Top :</td>
                      <td><input id="plugin_settings[position_top]" name="plugin_settings[position_top]" type="text" value="<?php echo ($options['position_top']) ? $options['position_top'] : '240'; ?>" />
                        px</td>
                    </tr>
                    <tr>
                      <td>Position From Left or Right :</td>
                      <td><input id="plugin_settings[position_left]" name="plugin_settings[position_left]" type="text" value="<?php echo ($options['position_left']) ? $options['position_left'] : '100'; ?>" />
                        px</td>
                    </tr>
                    <tr>
                      <td>NOTE : Don't add px in display settings</td>
                    </tr>
                    <tr>
                      <td>Mobile view:</td>
                      <td><input id="plugin_settings[mstatus]" name="plugin_settings[mstatus]" type="checkbox" value="1" <?php checked( '1', ($options['mstatus']) ? $options['mstatus'] : '' ); ?> />
                        Active</td>
                    </tr>
                    <tr>
                      <td>Entry Content Count:</td>
                      <td><input id="plugin_settings[mentrycontent]" size="7" name="plugin_settings[mentrycontent]" type="text" value="<?php echo (($options['mentrycontent']) ? $options['mentrycontent'] : '240'); ?>" />
                        Character count</td>
                    </tr>
                  </table>
                  <input type="submit" name="savesetting" class="btn btn-primary" value="Save Settings"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="postbox-container-1" class="postbox-container">
        <div class="meta-box-sortables">
          <div class="postbox">
            <h3><span>About us</span></h3>
            <div class="sidebarad"> Welcome to ShoutMeloud (SML) – a blog where you will learn about making a business out of a blog . Infact, it is a community of bloggers, and members are popularly referred as “Shouter”.<br/>
              <a href="http://www.shoutmeloud.com/about" title="floating share"
	class="btn btn-primary" target="_blank">Read more</a> </div>
          </div>
          <div class="postbox">
            <h3><span>Follow on Social Network</span></h3>
            <div class="sidebarad">
              <div class="shoutme-socialicons"> <a href="https://www.facebook.com/Shoutmeloud" class="shoutme-social_icon facebook" target="_blank"><i style="padding: 8px 15px;" class="animatesocialicon1 fadeInLeft fa fa-facebook" id="animated-example"></i></a> <a href="https://twitter.com/shoutmeloud" class="shoutme-social_icon twitter" target="_blank"><i  class="animatesocialicon2 fadeInLeft fa fa-twitter" id="animated-example"></i></a> <a href="https://plus.google.com/+Shoutmeloud/posts
	" class="shoutme-social_icon google" target="_blank"><i  class="animatesocialicon3 fadeInLeft fa fa-google-plus" id="animated-example"></i></a> <a href="https://www.youtube.com/user/denharsh" class="shoutme-social_icon youtube" target="_blank"><i  class="animatesocialicon5 fadeInLeft fa fa-youtube" id="animated-example"></i></a> <a href="http://www.slideshare.net/denharsh" class="shoutme-social_icon slideshare" target="_blank"><i  class="animatesocialicon6 fadeInLeft fa fa-slideshare" id="animated-example"></i></a><a href="http://in.linkedin.com/in/denharsh" class="shoutme-social_icon linkedin" target="_blank"><i  class="animatesocialicon6 fadeInLeft fa fa-linkedin" id="animated-example"></i></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>
		.shoutme-socialicons a i { background-color:#fff !important;
	   
		color: #000;
		font-size: 21px;
		padding: 8px;
		transition: transform 0.1s ease-out 0s, background 0.2s ease 0s;
	}
	
	.shoutme-social_icon {
		display: inline-block;
		transform: translateZ(0px);
		box-shadow: 0px 0px 1px transparent;
	}
	
	.shoutme-socialicons .fa-facebook:hover {
		background-color:  #3B5998 !important;
	}
	
	.shoutme-socialicons .fa-twitter:hover {
		background-color:  #00ABF0 !important;
	}
	
	.shoutme-socialicons .fa-youtube:hover {
		background-color:  #C3181E !important;
	}
	
	.shoutme-socialicons .fa-google-plus:hover {
		background-color:  #D95232 !important;
	}
	
	.shoutme-socialicons .fa-slideshare:hover {
		background-color:#CD2B0E !important;
	}
	.shoutme-socialicons .fa-linkedin:hover {background: #52a2cc !important;}
	
	
		</style>
    <br class="clear">
  </div>
</div>
<?php
	}
	
	function floating_social_buttons_admin_enqueue_style(){
	wp_register_style('floatingshare', plugins_url("/css/floatingshare.css", __FILE__), false,filemtime( plugin_dir_path( __FILE__ ) . "/css/floatingshare.css" ) );
	wp_enqueue_style('floatingshare');
	}
	add_action('in_admin_footer','floating_social_buttons_admin_enqueue_scripts');
	
	function floating_social_buttons_admin_enqueue_scripts(){
		$options = get_option( 'plugin_settings' );	

	wp_register_style('floatingshare', plugins_url("/css/floatingshare.css", __FILE__), false,filemtime( plugin_dir_path( __FILE__ ) . "/css/floatingshare.css" ) );
	wp_enqueue_style('floatingshare');
	
	wp_register_script( 'waypoints_min', plugins_url("/js/waypoints.min.js", __FILE__), array('jquery', ),filemtime( plugin_dir_path( __FILE__ ) . "/js/waypoints.min.js" ) );
	wp_enqueue_script( 'waypoints_min' );
	?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">
	   var $j=jQuery.noConflict();
    var length = $j('article').height() - $j('.smlfsdbr').height() + $j('article').offset().top;
    $j(window).scroll(function () {
        var scroll = $j(this).scrollTop();
        var height = $j('.smlfsdbr').height() + 'px';

        if (scroll < $j('article').offset().top) {

            $j('.smlfsdbr').css({
                'position': 'absolute',
                'top': '<?php echo ($options['position_top']) ? $options['position_top'] : ''; ?>px',
				'left': '<?php echo ($options['position_left']) ? $options['position_left'] : ''; ?>px',               		
				'height': height
            });

        } else if (scroll > length) {

            $j('.smlfsdbr').css({
                'position': 'absolute',
                'bottom': '0',
                'top': '0'				
				
            });

        } else {

            $j('.smlfsdbr').css({
                'position': 'fixed',
                'top': '100px',				
                'height': height
            });
        }
    });

	</script>
    <?php
		
	}
	
	add_action('wp_footer','floating_social_buttons_admin_enqueue_scripts');
	add_filter("the_content", "floatsharingpost");
	
	$options = get_option( 'plugin_settings' );	
	if($options['mstatus'] == '1') {  
	add_filter("the_content", "floatsharingpostmobile");
	}
	
	function floatsharingpostmobile($content)
	{
	
	$options = get_option( 'plugin_settings' );	
	if(is_single()){
	if($options['mstatus'] == '1') {
	
	$mshare .= '<div id="shoutme_floaticons_mobile">
	  <div class="sharing group sharing_social_count_m">
		<ul class="shoutme-post-social_m Shoutme_social_share_count_m">';
	if($options['facebook'] == '1'){  
		  $mshare .= '<li class="share_shout_m_fb"> <a href="http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;t='.htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8').'" target="_blank"> <i class="shout-icon-m-fb shoutme-icon_m"></i> <span>';
		   
	$obj=new shoutme_floatingshare(get_permalink( $post->ID ));  
	$mshare .= $obj->get_shout_fb();
		   $mshare .= ' </span> </a> </li>';
		  } 
	if($options['gplus'] == '1'){  
		  $mshare .= '<li class="share_shout_m_plus"> <a href="https://plus.google.com/share?url='.get_the_permalink().'" target="_blank" title="Click to share"> <i class="shout-icon-m-plus shoutme-icon_m"></i> <span>';
	$obj=new shoutme_floatingshare(get_permalink( $post->ID ));  
	$mshare .= $obj->get_shout_plusones();
	$mshare .= '</span> </a> </li>';
	} 
	if($options['stumbleupon'] == '1'){  
	$mshare .= '<li class="share_shout_m_stumble"> <a target="_blank" href="http://www.stumbleupon.com/submit?url='.get_the_permalink().'"> <i class="icon shout-icon-m-stumble fa fa-stumbleupon"></i> <span>';
	   $obj = new shoutme_floatingshare(get_permalink( $post->ID ));  
	$mshare .= $obj->get_shout_stumble();
	$mshare .= '</span> </a> </li>';
	} 
	if($options['reddit'] == '1'){  
	$mshare .= '<li class="share_shout_m_reddit"> <a target="_blank" href="http://www.reddit.com/submit?url='.get_the_permalink().'&amp;title='.htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8').'"> <i class="shout-icon-m-reddit shoutme-icon_m"></i> <span>';
	@$obj=new shoutme_floatingshare(get_permalink( @$post->ID ));  
	$mshare .= @$obj->get_shout_reddit();
	$mshare .= '</span> </a> </li>';
		  }
	if($options['tweet'] == '1'){  
	$mshare .= '<li class="share_shout_m_tweet"> <a target="_blank" href="http://twitter.com/share?text='.htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8').'&amp;url='.get_the_permalink().'&amp;via='.$options['twitter_name'].'"> <i class="shout-icon-m-tweet shoutme-icon_m"></i> <span>';
	$obj = new shoutme_floatingshare(get_permalink( $post->ID ));  
	$mshare .= 'tweet'; //$obj->get_shout_tweets();
	$mshare .= '</span> </a> </li>';
	 }
	if($options['buffer'] == '1'){  
	$mshare .= '<li class="share_shout_m_buffer"> <a target="_blank" href="http://bufferapp.com/add?url='.get_the_permalink().'&amp;text='.htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8').'&amp;utm_source='.get_the_permalink().'&amp;utm_medium='.get_the_permalink().'&amp;utm_campaign=buffer&amp;source=button"><span>';
	$obj = new shoutme_floatingshare(get_permalink( $post->ID ));  
	$mshare .= $obj->get_shout_buffer();
	$mshare .= '</span> </a> </li>';
	}
	if($options['pocket'] == '1'){ 
	$mshare .= '<li class="share_shout_m_pocket"> <a target="_blank" href="https://getpocket.com/save?title='.get_the_title().'&amp;url='.get_the_permalink().'"><span>';
	$obj = new shoutme_floatingshare(get_permalink( $post->ID ));  
	$mshare .= $obj->get_shout_pocket();
	$mshare .= '</span> </a> </li>';
		  }
	if($options['whatsapp'] == '1'){ 	  
	$mshare .= '<li class="whatsup"><a href="whatsapp://send?text='.get_the_title().urlencode(get_permalink()).'" data-action="share/whatsapp/share"><i class="icon fa fa-whatsapp"></i><span class="shr_txt">Whatsapp</span></a></li>'; }
	
		  
	if($options['pinterest'] == '1'){  
	$mshare .= '<li class="share_shout_m_pintrest">';
	if ( '' != get_the_post_thumbnail( $post->ID ) ) {
			$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			$pinImage = $pinterestimage[0];
	} else {
			$pinImage = plugins_url( '/default/default.png' , __FILE__ );
	}$mshare .= '<a target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?url='.urlencode(get_permalink( $post->ID )).'&amp;media='. $pinImage .'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8').'"> <i class="shout-icon-m-pintrest shoutme-icon_m"></i> <span>';
			$obj=new shoutme_floatingshare(get_permalink( $post->ID )); 
			$mshare .= $obj->get_shout_pinterest(); 
	$mshare .= '</span> </a> </li>';
		  } 
	$mshare .= '</ul>
	  </div>
	</div>';
	return $content.$mshare;  
	}
	}
	}
	
	
	
	function floatsharingpost($content)
	{
		$options = get_option( 'plugin_settings' );	
		$textdata = $options['mentrycontent'];
		$strip_tags =  strip_tags($content,'<p>');
		echo substr($strip_tags,0,$textdata);
		
	if(is_single() && !is_home()){
	?>
<style type="text/css">
	#shoutme_floaticons
	{
	top: <?php echo ($options['position_top']) ? $options['position_top'] : ''; ?>px;
	left: <?php echo ($options['position_left']) ? $options['position_left'] : ''; ?>px;	
	
	}
	</style>
    
    
<div id="shoutme_floaticons" class="smlfsdbr">
  <div class="sharing group sharing_social_count">
    <ul class="shoutme-post-social Shoutme_social_share_count">
      <?php if($options['facebook'] == '1'){  ?>
      <li class="share_shout_fb"> <a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank"> <i class="shout-icon-fb shoutme-icon"></i> <span>
        <?php 
	$obj=new shoutme_floatingshare(get_permalink( $post->ID ));  
	echo $obj->get_shout_fb();
	?>
        </span> </a> </li>
      <?php } 
	if($options['gplus'] == '1'){  ?>
      <li class="share_shout_plus"> <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="Click to share"> <i class="shout-icon-plus shoutme-icon"></i> <span>
        <?php 
	$obj=new shoutme_floatingshare(get_permalink( $post->ID ));  
	echo $obj->get_shout_plusones();
	?>
        </span> </a> </li>
      <?php } 
	if($options['stumbleupon'] == '1'){  ?>
      <li class="share_shout_stumble"> <a target="_blank" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>"> <i class="icon shout-icon-stumble"></i> <span>
        <?php 
	$obj = new shoutme_floatingshare(get_permalink( $post->ID ));  
	echo $obj->get_shout_stumble();
	?>
        </span> </a> </li>
      <?php } 
	if($options['reddit'] == '1'){  ?>
      <li class="share_shout_reddit"> <a target="_blank" href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>"> <i class="shout-icon-reddit shoutme-icon"></i> <span>
        <?php 
	@$obj=new shoutme_floatingshare(get_permalink( @$post->ID ));  
	echo @$obj->get_shout_reddit();
	?>
        </span> </a> </li>
      <?php }
	if($options['tweet'] == '1'){  ?>
      <li class="share_shout_tweet"> <a target="_blank" href="http://twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;url=<?php the_permalink(); ?>&amp;via=<?php echo ($options['twitter_name']) ? $options['twitter_name'] : ""; ?>"> <i class="shout-icon-tweet shoutme-icon"></i> <span>
        <?php 
	$obj = new shoutme_floatingshare(get_permalink( $post->ID ));  
	//echo $obj->get_shout_tweets();
	echo 'tweet';
	?>
        </span> </a> </li>
      <?php }
		if($options['buffer'] == '1'){  ?>
      <li class="share_shout_buffer"> <a target="_blank" href="http://bufferapp.com/add?url=<?php the_permalink(); ?>&amp;text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;utm_source=<?php the_permalink(); ?>&amp;utm_medium=<?php the_permalink(); ?>&amp;utm_campaign=buffer&amp;source=button"> 
        <!--<a href="http://bufferapp.com/add" target="_blank" class="buffer-add-button" data-count="horizontal" >--> 
        <span>
        <?php 
		$obj = new shoutme_floatingshare(get_permalink( $post->ID ));  
		echo $obj->get_shout_buffer();
		?>
        </span> </a> </li>
      <?php }
		if($options['pocket'] == '1'){  ?>
      <li class="share_shout_pocket"> <a target="_blank" href="https://getpocket.com/save?title=<?php echo get_the_title(); ?>&amp;url=<?php the_permalink(); ?>"> 
        <!--<a href="http://bufferapp.com/add" target="_blank" class="buffer-add-button" data-count="horizontal" >--> 
        <span>
        <?php 
		$obj = new shoutme_floatingshare(get_permalink( $post->ID ));  
		echo $obj->get_shout_pocket();
		?>
        </span> </a> </li>
      <?php }
		  
		  
		  
	
	if($options['pinterest'] == '1'){  ?>
      <li class="share_shout_pintrest">
        <?php 
		if ( '' != get_the_post_thumbnail( $post->ID ) ) {
				$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$pinImage = $pinterestimage[0];
		} else {
				$pinImage = plugins_url( '/default/default.png' , __FILE__ );
		}?>
        <a target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?url=<?php echo urlencode(get_permalink( $post->ID )).'&amp;media='. $pinImage .'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');?>"> <i class="shout-icon-pintrest shoutme-icon"></i> <span>
        <?php 
			$obj=new shoutme_floatingshare(get_permalink( $post->ID )); 
			echo $obj->get_shout_pinterest(); ?>
        </span> </a> </li>
      <?php } ?>
    </ul>
  </div>
</div>
<?php
	return $content;  
	}
	}
	
	function shoutme_floatingshare_dashboard_widget() {
		$options = get_option( 'plugin_settings' );	
		 $rss = fetch_feed( 'http://www.shoutmeloud.com/feed' );
	  
		 if ( is_wp_error($rss) ) {
			  if ( is_admin() || current_user_can('manage_options') ) {
				   echo '<p>';
				   printf(__('<strong>RSS Error</strong>: %s'), $rss->get_error_message());
				   echo '</p>';
			  }
		 return;
	}
	  
	if ( !$rss->get_item_quantity() ) {
		 echo '<p>Apparently, there are no updates to show!</p>';
		 $rss->__destruct();
		 unset($rss);
		 return;
	}
	  
	echo "<ul>\n";
	  
	if ( !isset($items) )
		 $items = 5;
	  
		 foreach ( $rss->get_items(0, $items) as $item ) {
			  $publisher = '';
			  $site_link = '';
			  $link = '';
			  $content = '';
			  $date = '';
			  $link = esc_url( strip_tags( $item->get_link() ) );
			  $title = esc_html( $item->get_title() );
			  $content = $item->get_content();
			  $content = wp_html_excerpt($content, 100) . ' ...';
	  
			 echo "<li><a class='rsswidget' href='$link'>$title</a>\n<div class='rssSummary'>$content</div>\n";
	}
	  
	echo "</ul>\n";
	$rss->__destruct();
	unset($rss);
	}
	 
	function shoutme_floatingshare_add_dashboard_widget() {
		 wp_add_dashboard_widget('shoutmeloud_dashboard_widget', 'Recent Posts from shoutmeloud.com', 'shoutme_floatingshare_dashboard_widget');
	}
	 
	add_action('wp_dashboard_setup', 'shoutme_floatingshare_add_dashboard_widget');
	
	
	
	class shoutme_floatingshare
	{
		
	private $url,$timeout;
	function __construct($url,$timeout=10) {
	$this->url=rawurlencode($url);
	$this->timeout=$timeout;
	}
	
	function get_shout_reddit() {    
	@$json_string = @file_get_contents('http://buttons.reddit.com/button_info.json?url='.$this->url);
	$json = json_decode(@$json_string, true);
	return isset($json['data']['children']['0']['data']['ups'])?intval( @$json['data']['children']['0']['data']['ups'] ):0;
	}
	
	function get_shout_fb() {
	
	$like_results = file_get_contents('http://graph.facebook.com/'. get_the_permalink());
		$like_array = json_decode($like_results, true);
		$like_count =  $like_array['shares'];
		return ($like_count ) ? $like_count : "0";
	
	}
	
	
	
	function get_shout_pocket() {
		$query = 'http://widgets.getpocket.com/v1/button?v=1&count=horizontal&url=' . $this->url;
		$html = file_get_contents($query);
		$dom = new DOMDocument('1.0', 'UTF-8');
		$dom->preserveWhiteSpace = false;
		$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);
		$result = $xpath->query('//em[@id = "cnt"]')->item(0);
		return isset($result->nodeValue) ? intval($result->nodeValue) : 0;
	}
	
	function get_shout_plusones()  {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.rawurldecode($this->url).'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
	$curl_results = curl_exec ($curl);
	curl_close ($curl);
	$json = json_decode($curl_results, true);
	return isset($json[0]['result']['metadata']['globalCounts']['count'])?intval( $json[0]['result']['metadata']['globalCounts']['count'] ):0;
	}
	
	function get_shout_stumble() {
	$json_string = $this->file_get_contents_curl('http://www.stumbleupon.com/services/1.01/badge.getinfo?url='.$this->url);
	$json = json_decode($json_string, true);
	return isset($json['result']['views'])?intval($json['result']['views']):0;
	}
	
	function get_shout_buffer()
	{
	$count = 0; // Initial Value
	$request_url = sprintf( 'https://api.bufferapp.com/1/links/shares.json?url=%s', $this->url );
	$response = wp_remote_get( $request_url );
	if ( 200 == wp_remote_retrieve_response_code( $response ) ) {
	$response = json_decode( wp_remote_retrieve_body( $response ), true );
	if ( isset( $response['shares'] ) )
	$count = $response['shares'];
	} else {
	$count = false;
	}
	return absint( $count );
	 
	}
	
	
	function get_shout_pinterest() {
	$return_data = $this->file_get_contents_curl('http://api.pinterest.com/v1/urls/count.json?url='.$this->url);
	$json_string = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $return_data);
	$json = json_decode($json_string, true);
	return isset($json['count'])?intval($json['count']):0;
	}
	
	
	private function file_get_contents_curl($url){
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
	$cont = curl_exec($ch);
	if(curl_error($ch))
	{
	die(curl_error($ch));
	}
	return $cont;
	}
	} 
	
	?>