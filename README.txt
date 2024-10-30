=== Login Form Anywhere ===
Contributors: BCSWPplugins, rizwanchaudhry
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=WWRP82SUNDXEC&lc=US&item_name=BCS%20Website%20Solutions&item_number=WP%20Plugin%20Donation&no_note=0&cn=Add%20a%20message%20to%20the%20seller%3a&no_shipping=1&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: add login form to page, add login form to post, add login form to widget, embed login form, login form shortcode
Requires at least: 3.0.1
Tested up to: 4.4
Stable tag: 1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allow admin to show login from anywhere in Wordpress.

== Description ==
<p>Allow admin to show login from anywhere in Wordpress. There are 2 ways to do so:<br />
Use shortcode [loginform]. If redirect param is not passed, it will use the current page permalink as a redirect.<br /><br />
OR<br /><br />
Use shortcode [loginform redirect="http://www.YOURDOMAIN.com/PAGE"]. If a redirect param is set, it will redirect the user to that page. Do note that the page must be on the same URL, it will not redirect to external URLs.</p>
 
== Installation ==

There is no setting for this plugin, just install it and use the shortcode [loginform redirect="http://www.YOURDOMAIN.com/PAGE"] anywhere in the website. The param redirect should be set to the page where where you want to redirect after login, otherwise it will redirect to the current page. You can use it in the template files also by using following format:<br /> 
&lt;?php do_shortcode('[loginform redirect="http://www.YOURDOMAIN.com/PAGE"]'); ?&gt;

e.g.

1. Upload `/login-form-anywhere/` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `[loginform redirect="http://www.YOURDOMAIN.com/PAGE"]` in your pages, posts, or widgets. You can use it in the template files also by using following format:<br /> 
&lt;?php do_shortcode('[loginform redirect="http://www.YOURDOMAIN.com/PAGE"]'); ?&gt;


== Frequently Asked Questions ==

= Can this plugin shortcode can be used in Widgets =

YES

== Screenshots ==

1. This is the plugin in the dashboard
2. This screen shows how it looks on front end on default WP twentyfifteen theme
3. This screen shows how to place in shortcode in pages/posts

== Changelog ==

= 1.3 =
* If "Anyone can register" is disable in admin setting, the plugin will not show the Register link under login form 

= 1.2 =
* Administrative notice fixed

= 1.1 =
* WP version issue fixed

= 1.0 =
* Plugin developed and launched in the initial phase
 
 == Upgrade Notice ==

= 1.5 =
* If "Anyone can register" is disable in admin setting, the plugin will not show the Register link under login form 

= 1.4 =
* Administrative notice fixed

= 1.3 =
* Administrative notice fixed

= 1.2 =
* Updated to latest WP version

= 1.0 =
* WP version issue fixed
