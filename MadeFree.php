<?php
/*
Plugin Name: MadeFree
Plugin URI: http://MadeFree.com/plugin
Description:This is a plugin which will help you to build a contact form and many more. Get started now!
Author: Meron Mesay
Author URI: http://meronmesay.wordpress.com
Version: 1.0.0
Requires at least: 5.2
Requires PHP: 7.2
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: my-basics-plugin
*/

/*
  The licenses for most software and other practical works are designed
to take away your freedom to share and change the works.  By contrast,
the GNU General Public License is intended to guarantee your freedom to
share and change all versions of a program--to make sure it remains free
software for all its users.  We, the Free Software Foundation, use the
GNU General Public License for most of our software; it applies also to
any other work released this way by its authors.  You can apply it to
your programs, too.

  When we speak of free software, we are referring to freedom, not
price.  Our General Public Licenses are designed to make sure that you
have the freedom to distribute copies of free software (and charge for
them if you wish), that you receive source code or can get it if you
want it, that you can change the software or use pieces of it in new
free programs, and that you know you can do these things.
*/

defined('ABSPATH') or die("The plugin is not working.");

function made_free()
{




    include_once plugin_dir_path(__FILE__) .'./includes/contact.php';




}

// add shortcut 
add_shortcode('M_cont_fo', 'made_free');

function add_menu()
{

    add_menu_page(
        'Simple Form',
        'Simple Form',
        'manage_options',
        'contact-form',
        'displayCode',
        'dashicons-feedback'
    );

}
add_action('admin_menu', 'add_menu');

// Enqueue style 
function enqueue() {

    wp_enqueue_style( 'myCSS', plugin_dir_url(__FILE__) .'assets/css/style1.css');
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js' );

}

add_action( 'wp_enqueue_scripts', 'enqueue' );


function example_form_capture(){

  if(isset($_POST['example_form_submit']))
  {
    $Fname= sanitize_text_field($_POST['your_Fname']);
    $Lname= sanitize_text_field($_POST['your_Lname']);
    $email= sanitize_text_field($_POST['your_email']);
    $comments= sanitize_textarea_field($_POST['your_comments']);

    $to='it.kevin.shitaye@gmail.com';
    $subject='Test form submission';
    $message='' .$Fname.' - ' .$Lname.' -  '.$email.' - '.$comments;
    wp_mail($to,$subject,$message);
  }
}
add_action('wp_head','example_form_capture');



















?>