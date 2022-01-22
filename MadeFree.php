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
  </div
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
  'M_cont_fo',
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
// btn color
add_settings_field(
  'madefree_settings_btn_color_field',
  __( 'Submit button Color', 'madefree' ),
  'madefree_settings_btn_color_callback',
  'madefree-settings-page',
  'madefree_settings_section'
);

// Registe btn color input
register_setting(
    'madefree-settings-page',
    'madefree_settings_btn_color_field',
    array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '#2271b1'
    )
);
 // backgroung color
 add_settings_field(
  'madefree_settings_redirect_field',
  __( 'Redirect URL', 'madefree' ),
  'madefree_settings_redirect_callback',
  'madefree-settings-page',
  'madefree_settings_section'
);


}
add_action( 'admin_init', 'madefree_settings_init' );

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
  <?php 
}












?>