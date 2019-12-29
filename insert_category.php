<?php
//including computer_parts_sc_fns.php which includes other files whose functions are called in this document
require_once('computer_parts_sc_fns.php');
session_start();

do_html_header("Adding a category");
if (check_admin_user()) {

  if (filled_out($_POST))   {
    $catname = $_POST['catname'];
    if(insert_category($catname)) {
      echo "<p>Category \"".$catname."\" was added to the database.</p>";
    } else {
      echo "<p>Category \"".$catname."\" could not be added to the database.</p>";
    }
  } else {
    echo "<p>You have not filled out the form.  Please try again.</p>";
  }
  do_html_url('admin.php', 'Back to administration menu');
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

do_html_footer();

?>
