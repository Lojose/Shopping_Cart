<?php

// include function files for this application
require_once('computer_parts_sc_fns.php');
session_start();

do_html_header("Edit computer part details");
if (check_admin_user()) {
  if ($computer_part = get_computer_part_details($_GET['computer_part_id'])) {
    display_computer_part_form($computer_part);
  } else {
    echo "<p>Could not retrieve computer part details.</p>";
  }
  do_html_url("admin.php", "Back to administration menu");
} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}
do_html_footer();

?>
