<?php

/*
 * Add my new menu to the Admin Control Panel
 */

 // Hook the 'admin_menu' action hook, run the function named 'nk_admin_link()'
add_action( 'admin_menu', 'nksb_admin_link' );

// Add a new top level menu link to the ACP
function nksb_admin_link()
{
      add_menu_page(
        'NK Sidebar Settings', // Title of the page
        'NK Sidebar', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        plugin_dir_path(__FILE__) . 'settings.php',
        null,
    );
}

function nksidebar_settings_init() {
 // register a new setting for "nk_sidebar" page
 register_setting('nksb_sidebar', 'phone_number');
 register_setting('nksb_sidebar', 'email_address');

 // register a new section in the "nk_sidebar" page
 add_settings_section(
 'nksidebar_section_developers',
 __( 'Setting for NK Sidebar.', 'nksb_sidebar' ),
 'nksidebar_section_developers_cb',
 'nksb_sidebar'
 );

 // register a new field in the "nk_sidebar_section_developers" section, inside the "nk_sidebar" page
 add_settings_field(
   'custom_data',
   'Custom Value',
   'nksidebar_custom_field',
   'nksb_sidebar',
   'nksidebar_section_developers'
 );

}

/**
 * register our wporg_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'nksidebar_settings_init' );

/**
 * custom option and settings:
 * callback functions
 */

// developers section cb
// the values are defined at the add_settings_section() function.

function nksidebar_section_developers_cb( $args ) {
 ?>
 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Put your phone and email.', 'nksb_sidebar' ); ?></p>
 <?php
}

  function nksidebar_custom_field(){
    $phone_number = get_option('phone_number');
    $email_address = get_option('email_address');
    ?>
    <p>Phone: <input type="tel" name="phone_number" value="<?php echo $phone_number; ?>"></p>
    <p>Email: <input type="email" name="email_address" value="<?php echo $email_address; ?>"></p>

    <?php
  }
