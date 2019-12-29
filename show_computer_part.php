<?php
// Including computer_parts_sc_fns.php which includes other files whose functions are used in this file
  include ('computer_parts_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();

  $computer_part_id = $_GET['computer_part_id'];

  //Getting computer part out of the database
  $computer_part = get_computer_part_details($computer_part_id);
  do_html_header("Product Details");
  display_computer_part_details($computer_part);

  // set url for "continue button"
  $target = "index.php";
  if($computer_part['catid']) {
    $target = "show_cat.php?catid=".$computer_part['catid'];
  }

  // if logged in as admin, show edit computer part links
  if(check_admin_user()) {
    display_button("edit_computer_part_form.php?computer_part_id=".$computer_part_id, "edit-item", "Edit Item");
    display_button("admin.php", "admin-menu", "Admin Menu");
    display_button($target, "continue", "Continue");
  } else {
    display_button("show_cart.php?new=".$computer_part_id, "btn_add_to_cart",
                   "Add".$computer_part['name']." To My Shopping Cart");
    display_button($target, "btn_continue_shopping", "Continue Shopping");
  }

  do_html_footer();
?>
