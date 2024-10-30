<?php
/*
Plugin Name: Show Login Form Anywhere
Plugin URI: https://www.bcswebsitesolutions.com/downloads/login-form-anywhere/
Description: Allow user to show login from anywhere in Wordpress. [loginform redirect="https://www.bcswebsiteservices.com"]. If redirect param is not passed, it will use the current page permalink as a redirect.
Version: 1.5
Tested up to: 4.4
License: GPLv2 or later.
Author: BCS Website Services
Author URI: https://www.bcswebsitesolutions.com/
*/
 
function bcs_lf_login_form( $atts, $content = null ) {
 
 
 	/*$defaults = array(
		'label_username' => 'Username',
		'label_password' => 'Password'
	);

 	$attr = shortcode_atts( $defaults, $attr );*/

 
 
	extract( shortcode_atts( array(
      'redirect' => ''
      ), $atts ) );
  
	if (!is_user_logged_in()) {
		if($atts['redirect']) {
			$redirect_url = $atts['redirect'];
		} else {
			$redirect_url = get_permalink();
		}
		$form = wp_login_form(array('echo' => false, 'redirect' => $redirect_url ));
		
		
		$form .="<p>";
		
if ( get_option( 'users_can_register' ) ) {
$form .="<a class='button-primary' href='".wp_registration_url()."'>Register</a> | ";
}
$form .="<a class='button-primary' href='".wp_lostpassword_url()."'>Lost your password?</a>";
	 
$form .="</p>";	
		
		/*$form .="<p><a class='button-primary' href='".wp_registration_url()."'>Register</a> | <a class='button-primary' href='".wp_lostpassword_url()."'>Lost your password?</a></p>";*/
	} 
 else{
	$form="<p><a class='button-primary' href='".wp_logout_url( home_url() )."'>Logout</a></p>"; 
 }
	return $form;
	
}
add_shortcode('loginform', 'bcs_lf_login_form');


function bcs_lf_custom_authenticate( $user, $username, $password ) {
 
    if ( is_wp_error( $user ) && isset( $_SERVER[ 'HTTP_REFERER' ] ) && !strpos( $_SERVER[ 'HTTP_REFERER' ], 'wp-admin' ) && !strpos( $_SERVER[ 'HTTP_REFERER' ], 'wp-login.php' ) ) {
      $referrer = $_SERVER[ 'HTTP_REFERER' ];
      foreach ( $user->errors as $key => $error ) {
         if ( in_array( $key, array( 'empty_password', 'empty_username') ) ) {
            unset( $user->errors[ $key ] );
            $user->errors[ 'custom_'.$key ] = $error;
         }
      }
    }
 
    return $user;
}
add_filter('authenticate','bcs_lf_custom_authenticate', 31, 3);
 function bcs_lf_wp_admin_area_notice() {
 	  global $current_user ;
 
        $user_id = $current_user->ID;
	if ( is_super_admin() ) {
	 /* Check that the user hasn't already clicked to ignore the message */
	 if ( ! get_user_meta($user_id, 'login_form_notice') ) {
		 
   echo '<div class="updated  is-dismissible"><p>';
 
        printf(__('Thank You For Installing "Show Login Form Anywhere"  developed by <a href="https://www.bcswebsitesolutions.com" target="_blank">BCS Website Solutions</a>| <a href="%1$s">Hide Notice</a>'), '?login_form_notice_ignore=0');
 
        echo "</p></div>";

	 }}
}
add_action( 'admin_notices', 'bcs_lf_wp_admin_area_notice' );

add_action('admin_init', 'bcs_lf_login_form_notice_ignore');

function bcs_lf_login_form_notice_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['login_form_notice_ignore']) && '0' == $_GET['login_form_notice_ignore'] ) {
             add_user_meta($user_id, 'login_form_notice', 'true', true);
	}
}
add_action('admin_init', 'bcs_lf_login_email_ignore_ad');

function bcs_lf_login_email_ignore_ad() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['login_form_ignore_ad']) && '0' == $_GET['login_form_ignore_ad'] ) {
             add_user_meta($user_id, 'bcs_login_form_ad', 'true', true);
	}
}

function bcs_lf_my_admin_notice() {  
   global $current_user ;
 
        $user_id = $current_user->ID;
	if ( is_super_admin() ) {
	 /* Check that the user hasn't already clicked to ignore the message */
	 if ( ! get_user_meta($user_id, 'bcs_login_form_ad') ) {
		 ?>
    <div class="updated">
        <?php
		printf(__('<p><img src="https://www.bcswebsiteservices.com/images/Logo-only-50x50.png" style="margin:10px;display:block;" width="40" height="40" align="left" />Looking for a website like no other? You\'re at the right place. BCS Website Services can help your business to develop a web presence that matches your corporate identity, and use the internet to gain new customers and better serve your existing clients.</p><p><a href="https://www.bcswebsiteservices.com" target="_blank">Read More...</a> | <a href="%1$s">Hide Notice</a></p>'), '?login_form_ignore_ad=0');
 
   ?> 
    </div>
     
	
    <?php  }
}}

add_action( 'admin_notices', 'bcs_lf_my_admin_notice' );



add_filter( 'plugin_action_links', 'bcs_lf_ad', 10, 2);										// add  link to the plugin admin page
// CALLED ON 'plugin_action_links' ACTION
function bcs_lf_ad($links, $file)
{	if ($file == plugin_basename(__FILE__))
		array_push($links, '<a href="https://www.bcswebsitesolutions.com/?page_id=825" target="_blank">Hire us/Contact us</a>');
	return $links;
}
