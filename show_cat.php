<?php
  //including computer_parts_sc_fns.php which includes other files whose functions are called in this document
  include ('computer_parts_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();

  $catid = $_GET['catid'];
  $name = get_category_name($catid);

  //calling function to add the category of the computer part being sold as the header
  do_html_header($name);

  // get the computer part  informatin out from the database; its description 
  $computer_parts_array = get_computer_parts($catid);

  //calling function to display computer parts in a given category 
  display_computer_parts($computer_parts_array);


  // if logged in as admin, show add, delete computer part links
  if(isset($_SESSION['admin_user'])) {
    display_button("index.php", "continue", "Continue Shopping");
    display_button("admin.php", "admin-menu", "Admin Menu");
    display_button("edit_category_form.php?catid=".$catid,
                   "edit-category", "Edit Category");
  } else {
    display_button("index.php", "btn_continue_shopping", "Continue Shopping");
  }

  do_html_footer();
?>
