<?php

// include function files for this application
require_once('computer_parts_sc_fns.php');
session_start();

do_html_header("Deleting computer part");
if (check_admin_user()) {
  if (isset($_POST['computer_part_id'])) {
    $computer_part_id = $_POST['computer_part_id'];
    if(delete_computer_part($computer_part_id)) {
      echo "<p>Computer part ".$computer_part_id." was deleted.</p>";
    } else {
      echo "<p>Computer part ".$computer_part_id." could not be deleted.</p>";
    }
  } else {
    echo "<p>We need an computer_part_id to delete a computer part.  Please try again.</p>";
  }
  do_html_url("admin.php", "Back to administration menu");
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

do_html_footer();

?>
