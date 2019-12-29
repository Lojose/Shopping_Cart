<?php
//including computer_parts_sc_fns.php which includes other files whose functions are called in this document
  include ('computer_parts_sc_fns.php');
  // The shopping cart needs sessions, so start one
  session_start();

  @$new = $_GET['new'];

  if($new) {
    //new item selected
    if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
      $_SESSION['items'] = 0;
      $_SESSION['total_price'] ='0.00';
    }

    if(isset($_SESSION['cart'][$new])) {
      $_SESSION['cart'][$new]++;
    } else {
      $_SESSION['cart'][$new] = 1;
    }

    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }

  if(isset($_POST['save'])) {
    foreach ($_SESSION['cart'] as $computer_part_id => $qty) {
      if($_POST[$computer_part_id] == '0') {
        unset($_SESSION['cart'][$computer_part_id]);
      } else {
        $_SESSION['cart'][$computer_part_id] = $_POST[$computer_part_id];
      }
    }

    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }

  do_html_header("Your shopping cart");

  if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
    display_cart($_SESSION['cart']);
  } else {
    echo "<p>There are no items in your cart</p><hr/>";
  }

  $target = "index.php";

  // if we have just added an item to the cart, continue shopping in that category
  if($new)   {
    $details =  get_computer_part_details($new);
    if($details['catid']) {
      $target = "show_cat.php?catid=".$details['catid'];
    }
  }
  display_button($target, "btn_continue_shopping", "Continue Shopping");
  display_button("checkout.php", "btn_go_to_checkout", "Go To Checkout");

  do_html_footer();
?>
