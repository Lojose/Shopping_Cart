<?php
function calculate_shipping_cost() {
  // This function is designed to return the amount of money 
 // that will be charged for shipping, however since we are not on bussiness yet it returns a constant
  return 20.00;
}

function get_categories() {
   //This function queries the  database for a list of categories
   $conn = db_connect();
   //SQl query statements
   $query = "select catid, catname from categories";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_category_name($catid) {
   // This function queries the  database for the name of  a category id
   $conn = db_connect();
  //SQL query statements
   $query = "select catname from categories
             where catid = '".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $row = $result->fetch_object();
   return $row->catname;
}


function get_computer_parts($catid) {
   //This function queries the database for computer parts in a category
   if ((!$catid) || ($catid == '')) {
     return false;
   }

   $conn = db_connect();
   $query = "select * from computer_parts where catid = '".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_computer_parts = @$result->num_rows;
   if ($num_computer_parts == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_computer_part_details($computer_part_id) {
  //This function queries the  database for all details for a particular computer part
  if ((!$computer_part_id) || ($computer_part_id=='')) {
     return false;
  }
  $conn = db_connect();
  $query = "select * from computer_parts where computer_part_id='".$computer_part_id."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function calculate_price($cart) {
  // This function sums the total price for all items in shopping cart
  $price = 0.0;
  if(is_array($cart)) {
    $conn = db_connect();
    foreach($cart as $computer_part_id => $qty) {
      $query = "select price from computer_parts where computer_part_id='".$computer_part_id."'";
      $result = $conn->query($query);
      if ($result) {
        $item = $result->fetch_object();
        $item_price = $item->price;
        $price +=$item_price*$qty;
      }
    }
  }
  return $price;
}

function calculate_items($cart) {
  //This function sums the  total items in shopping cart
  $items = 0;
  if(is_array($cart))   {
    foreach($cart as $computer_part_id => $qty) {
      $items += $qty;
    }
  }
  return $items;
}
?>
