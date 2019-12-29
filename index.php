<?php
session_start();
//including computer_parts_sc_fns.php which includes other files whose functions are called in this document
  include ('computer_parts_sc_fns.php');
  // The shopping cart needs sessions, so start one
  
  do_html_header();

  echo "<p>Please choose a category:</p>";

  // get categories out of database
  $cat_array = get_categories();

  // display as links to cat pages
  display_categories($cat_array);

  // if logged in as admin, show add, delete, edit cat links

  do_html_footer();
?>
