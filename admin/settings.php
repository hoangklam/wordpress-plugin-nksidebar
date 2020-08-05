<?php
 // check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 return;
 }

 // add error/update messages

 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
 if ( isset( $_GET['settings-updated'] ) ) {
 // add settings saved message with the class of "updated"
 add_settings_error( 'nksb_sidebar_messages', 'nksb_sidebar_message', __( 'Settings Saved', 'nksb_sidebar' ), 'updated' );
 }

 // show error/update messages
 settings_errors( 'nksb_sidebar_messages' );
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 <form action="options.php" method="post">
 <?php
 // output security fields for the registered setting "nk_sidebar"
 settings_fields( 'nksb_sidebar' );
 // output setting sections and their fields
 // (sections are registered for "nk_sidebar", each field is registered to a specific section)
 do_settings_sections( 'nksb_sidebar' );
 // output save settings button
 submit_button( 'Save Settings' );
 ?>
 </form>
 </div>
 <?php
