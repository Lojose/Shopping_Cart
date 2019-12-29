<?php
//including computer_parts_sc_fns.php which includes other files whose functions are called in this document
// include function files for this application
require_once('computer_parts_sc_fns.php');
session_start();

do_html_header("Add a category");
if (check_admin_user()) {
  display_category_form();
  do_html_url("admin.php", "Back to administration menu");
} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}
do_html_footer();

?>
