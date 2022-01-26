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

function madefree_setting_menu()
{

    add_menu_page(
      __( 'MadeFree Settings', 'madefree-plugin' ),
      __( 'MadeFree Settings', 'madefree-plugin' ),
      'manage_options',
      'madefree-settings-page',
      'madefree_settings_template_callback',
      '',
      null

    );

    
}

add_action('admin_menu', 'madefree_setting_menu');


function madefree_settings_template_callback()
{
  ?>
  <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

      <form action="options.php" method="post">
          <?php 
              // security field
              settings_fields( 'madefree-settings-page' );

              // output settings section here
              do_settings_sections('madefree-settings-page');

              // save settings button
              submit_button( 'Save Settings' );
          ?>
      </form>
  </div>
  <?php 

}

// Setting template

function madefree_settings_init(){
        // Setup settings section
        add_settings_section(
          'madefree_settings_section',
          'MadeFree Settings Page',
          '',
          'madefree-settings-page'
      );

      add_settings_section(
        'madefree_settings_section',
        'Take this short code to diplay it in your content: M_cont_fo',
        '',
        'madefree-settings-page'
    );
      
        // Register bg color
        register_setting(
          'madefree-settings-page',
          'madefree_settings_bg_color_field',
          array(
              'type' => 'string',
              'sanitize_callback' => 'sanitize_text_field',
              'default' => '#FFFFFF'
          )
      );

      // backgroung color
      add_settings_field(
        'madefree_settings_bg_color_field',
        __( 'Backgroung Color', 'madefree' ),
        'madefree_settings_bg_color_callback',
        'madefree-settings-page',
        'madefree_settings_section'
      );

      // Register btn size input
      register_setting(
          'madefree-settings-page',
          'madefree_settings_btn_size_field',
          array(
              'type' => 'string',
              'sanitize_callback' => 'sanitize_text_field',
              'default' => 'btn-small'
          )
      );

      // Register text font type input
      register_setting(
        'madefree-settings-page',
        'madefree_settings_txt_font_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'garamond,serif'
        )
    );
        // Add text font type
          add_settings_field(
            'madefree_settings_txt_font_field',
            __( 'Choose Font type', 'madefree' ),
            'madefree_settings_txt_font_callback',
            'madefree-settings-page',
            'madefree_settings_section'
          );

      // btn color
      add_settings_field(
        'madefree_settings_btn_color_field',
        __( 'Submit button Color', 'madefree' ),
        'madefree_settings_btn_color_callback',
        'madefree-settings-page',
        'madefree_settings_section'
      );

      // Register btn color input
      register_setting(
          'madefree-settings-page',
          'madefree_settings_btn_color_field',
          array(
              'type' => 'string',
              'sanitize_callback' => 'sanitize_text_field',
              'default' => '#2271b1'
          )
      );
      // btn text color
      add_settings_field(
        'madefree_settings_btn_txt_color_field',
        __( 'Button text color', 'madefree' ),
        'madefree_settings_btn_txt_color_callback',
        'madefree-settings-page',
        'madefree_settings_section'
      );

      // Register btn text color
      register_setting(
          'madefree-settings-page',
          'madefree_settings_btn_txt_color_field',
          array(
              'type' => 'string',
              'sanitize_callback' => 'sanitize_text_field',
              'default' => 'black'
          )
      );
      // Add btn size input
      add_settings_field(
        'madefree_settings_btn_size_field',
        __( 'Submit button size', 'madefree' ),
        'madefree_settings_btn_size_callback',
        'madefree-settings-page',
        'madefree_settings_section'
      );

      // redirect url
    register_setting(
        'madefree-settings-page',
        'madefree_settings_redirect_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '#'
        )
    );

    // redirect url
    add_settings_field(
      'madefree_settings_redirect_field',
      __( 'Redirect URL', 'madefree' ),
      'madefree_settings_redirect_callback',
      'madefree-settings-page',
      'madefree_settings_section'
    );
     // image link
     register_setting(
      'madefree-settings-page',
      'madefree_settings_image_field',
      array(
          'type' => 'string',
          'sanitize_callback' => 'sanitize_text_field',
          'default' => 'https://images.unsplash.com/photo-1507608869274-d3177c8bb4c7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8YmFja2dyb3VuZCUyMGltYWdlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60'
      )
  );

  // image link
  add_settings_field(
    'madefree_settings_image_field',
    __( 'Change Image', 'madefree' ),
    'madefree_settings_image_callback',
    'madefree-settings-page',
    'madefree_settings_section'
  );

}

add_action( 'admin_init', 'madefree_settings_init' );

/**
 * Sanitize Image Uploader
 */
function sanitize_image_uploader( $value ) {
  if(isset($value)) {
      return intval($value);
  }else {
      return false;
  }
}

function madefree_settings_btn_color_callback(){
  $madefree_btn_color = get_option('madefree_settings_btn_color_field');
  ?>
  <input type="color" name="madefree_settings_btn_color_field"  value="<?php echo isset($madefree_btn_color) ? esc_attr( $madefree_btn_color ) : ''; ?>" />
  <?php 
}

function madefree_settings_btn_size_callback() {
  $madefree_btn_size = get_option('madefree_settings_btn_size_field');
  ?>
  <select name="madefree_settings_btn_size_field" class="regular-text">
        <option value="btn-small" <?php selected( 'btn-small', $madefree_btn_size ); ?> >Small</option>
        <option value="btn-mid" <?php selected( 'btn-mid', $madefree_btn_size ); ?> >Medium</option>
        <option value="btn-larg" <?php selected( 'btn-larg', $madefree_btn_size ); ?>>Large</option>
  </select>
  <hr>
  <br><br>
  <?php 
}
function madefree_settings_txt_font_callback() {
  $madefree_txt_font = get_option('madefree_settings_txt_font_field');
  ?>
  <select name="madefree_settings_txt_font_field" class="regular-text">
        <option value="Brush Script MT, Brush Script Std, cursive" <?php selected( 'Brush Script MT, Brush Script Std, cursive', $madefree_txt_font ); ?> >Cursive</option>
        <option value="garamond,serif" <?php selected( 'garamond,serif', $madefree_txt_font ); ?> >Garamond,Serif</option>
        <option value="Roboto" <?php selected( 'Roboto', $madefree_txt_font ); ?>>Roboto</option>
        <option value="Trattatello, fantasy" <?php selected( 'Trattatello, fantasy', $madefree_txt_font ); ?>>Trattatello</option>
        <option value="Didot, serif" <?php selected( 'Didot, serif', $madefree_txt_font ); ?>>Didot</option>
        <option value="Times, serif" <?php selected( 'Times, serif', $madefree_txt_font ); ?>>Times</option>
        <option value="Andale Mono, monospace" <?php selected( 'Andale Mono, monospace', $madefree_txt_font ); ?>>Andale Mono</option>
  </select>
  <hr>
  <br><br>
  <?php 
  
}


function madefree_settings_bg_color_callback(){
  $madefree_bg_color = get_option('madefree_settings_bg_color_field');
  ?>
  <input type="color" name="madefree_settings_bg_color_field"  value="<?php echo isset($madefree_bg_color) ? esc_attr( $madefree_bg_color ) : ''; ?>" />
  <?php 
}
function madefree_settings_btn_txt_color_callback(){
  $madefree_btn_txt_color = get_option('madefree_settings_btn_txt_color_field');
  ?>
  <input type="color" name="madefree_settings_btn_txt_color_field"  value="<?php echo isset($madefree_btn_txt_color) ? esc_attr( $madefree_btn_txt_color ) : ''; ?>" />
  
  <?php 
}

function madefree_settings_redirect_callback(){
  $madefree_redirect = get_option('madefree_settings_redirect_field');
  ?>
  <input type="text" name="madefree_settings_redirect_field"  value="<?php echo isset($madefree_redirect) ? esc_attr( $madefree_redirect ) : ''; ?>" />

  <?php 
}
function madefree_settings_image_callback(){
  $madefree_image = get_option('madefree_settings_image_field');
  ?>
  <input type="text" name="madefree_settings_image_field"  value="<?php echo isset($madefree_image) ? esc_attr( $madefree_image ) : ''; ?>" />

  <?php 
}


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