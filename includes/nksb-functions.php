<?php
// hook to wp_head
add_filter('wp_head', 'add_nksidebar_to_content', 20);

function add_nksidebar_to_content() {

  $phone_number = get_option('phone_number');
  $email_address = get_option('email_address');

  echo'<div id="from_my_function"></div>';
  echo '<nav id="nksb-sidebar" class="nksb-sidebar">
    <ul>
        <li>
        <a href="tel:'. $phone_number. '"><span>' .$phone_number. '</span><i class="fa fa-phone"></i></a>
        </li>
        <li>
          <a href="mailto:' .$email_address. '"><span>' .$email_address. '</span><i class="fa fa-envelope"></i></a>
        </li>
    </ul>
  </nav>';
}
