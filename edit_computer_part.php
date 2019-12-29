<?php

// include function files for this application
require_once('computer_parts_sc_fns.php');
session_start();

do_html_header("Updating computer part");
if (check_admin_user()) {
  if (filled_out($_POST)) {
    $oldcomputer_part_id = $_POST['old_computer_part_id'];
    $computer_part_id = $_POST['computer_part_id'];
    $name = $_POST['name'];
    $catid = $_POST['catid'];
    $price = $_POST['price'];
    $details = $_POST['details'];

    if(update_computer_part($oldcomputer_part_id, $computer_part_id, $name, $price, $details)) {
      echo "<p>Computer part was updated.</p>";
    } else {
      echo "<p>Computer part could not be updated.</p>";
    }
  } else {
    echo "<p>You have not filled out the form.  Please try again.</p>";
  }
  do_html_url("admin.php", "Back to administration menu");
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

do_html_footer();

?>
