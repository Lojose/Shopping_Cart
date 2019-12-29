<?php

// include function files for this application
require_once('computer_parts_sc_fns.php');
session_start();

do_html_header("Adding a computer part");
if (check_admin_user()) {
  if (filled_out($_POST)) {
    $comp_part_id = $_POST['computer_part_id'];
    $name = $_POST['name'];
    $cat_id = $_POST['catid'];
    $price = $_POST['price'];
    $details = $_POST['details'];

    if(insert_computer_part($comp_part_id, $cat_id, $price, $name, $details)) {
      echo "<p>Computer part <em>".stripslashes($name)."</em> was added to the database.</p>";
    } else {
      echo "<p>Computer part <em>".stripslashes($name)."</em> could not be added to the database.</p>";
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
