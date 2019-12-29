<?php

function do_html_header($title = '') {
  //This function  print an HTML header
  // declare the session variables we want access to inside the function
  if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}

  if (!$_SESSION['items']) {
    $_SESSION['items'] = '0';
  }
  if (!$_SESSION['total_price']) {
    $_SESSION['total_price'] = '0.00';
  }
?>
  <html>
  <head>
    <title><?php echo $title; ?></title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- font awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <style>
      .nav-wrapper{
        min-height: 5rem;
        padding-left: 1%;
      }
      .brand-logo{
        font-family: 'Righteous', cursive;
        font-size: 4rem;
      }
      .tabs{
        display:flex;
        justify-content: center;
        font-weight: bold;
      }
      .tab{
        font-size: 14px;
      }
      .collection{
  		max-width: 460px;
  		margin: 20px auto;
  	  }
      h2 { font-family: Arial, Helvetica, sans-serif; font-size: 22px; color: red; margin: 6px }
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #FF0000; width: 70%; text-align: center}
      a { color: #000000 }
    </style>
  </head>

        <!--Begin Header-->

  <body class="grey lighten-4">
  <header>
  <nav class="nav-extended">
    <div class="nav-wrapper blue lighten-1">
        <a href="index.php" class="brand-logo"><h4>BootOrder</h4></a>
        <a href="" class="sidenav-trigger"data-target="mobile-menu">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">

        <!--login logout button display choice-->

        <?php
     if(isset($_SESSION['admin_user'])) {
       echo '<li>';
       echo '<a href="logout.php" class="btn blue waves-effect waves-light">';
       echo '<span>Log Out</span>';
       echo '<i class="large material-icons right">computer</i></a></li>';
       echo '<li>';
       echo '<a href="show_cart.php" class="btn blue waves-effect waves-light">';
       echo '<span>View Cart</span>';
       echo '<i class="large material-icons right">shopping_cart</i></a></li>';
     } else {
       echo '<li>';
       echo '<a href="login.php" class="btn blue waves-effect waves-light">';
       echo '<span>Log In</span>';
       echo '<i class="large material-icons right">computer</i></a></li>';
       echo '<li>';
       echo '<a href="show_cart.php" class="btn blue waves-effect waves-light">';
       echo '<span>View Cart</span>';
       echo '<i class="large material-icons right">shopping_cart</i></a></li>';
     }
  ?>
        <!--login logout button display choice end-->

        </ul>
        <ul class="sidenav grey lighten-4" id="mobile-menu">
          <li><a href="show_cat.php?catid=3">CPU's</a></li>
          <li><a href="show_cat.php?catid=5">Motherboards</a></li>
          <li><a href="show_cat.php?catid=8">RAM</a></li>
          <li><a href="show_cat.php?catid=9">Storage</a></li>
          <li><a href="show_cat.php?catid=4">Graphic Cards</a></li>
          <li><a href="show_cat.php?catid=7">Power Supplies</a></li>
          <li><a href="show_cat.php?catid=2">Cooling</a></li>
          <li><a href="show_cat.php?catid=6">Peripherals</a></li>
          <li><a href="show_cat.php?catid=1">Cases</a></li>
          <li class="divider" tabindex="-1"></li>
          <li><a href="login.php">Log In</a></li>
          <li><a href="logout.php">Log Out</a></li>
          <li><a href="show_cart.php">View Cart</a></li>
        </ul>
    </div>

    <!--Tabs Start-->

    <div class="nav-content blue lighten-1">
      <ul class="tabs tabs-transparent hide-on-med-and-down">
        <li class = "tab"> <a href = "show_cat.php?catid=3 "> CPU's </a> <li>
        <li class = "tab"> <a href = "show_cat.php?catid=5 "> Motherboards</a> <li>
        <li class = "tab"> <a href = "show_cat.php?catid=8 "> RAM</a> <li>
        <li class = "tab"> <a href = "show_cat.php?catid=9 "> Storage</a> <li>
        <li class = "tab"> <a href = "show_cat.php?catid=4 "> Graphic Cards</a> <li>
        <li class = "tab"> <a href = "show_cat.php?catid=7 "> Power Supplies</a> <li>
        <li class = "tab"> <a href = "show_cat.php?catid=2 "> Cooling</a> <li>
        <li class = "tab"> <a href = "show_cat.php?catid=6 "> Peripherals</a> <li>
        <li class = "tab"> <a href = "show_cat.php?catid=1 "> Cases</a> <li>
      </ul>
    </div>
  </nav>

  <!--Tabs End-->

  </header>

  <!--this section echos the price and item count on thepage will redo at some point-->
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Items = ".(isset($_SESSION['items']));
     }
  ?>


  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Price = $".number_format($_SESSION['total_price'],2);
     }
  ?>

  <!--this section echos the price and item count on thepage will redo at some point-->

  <!--End Header-->

<?php
  
if($title) {
    do_html_heading($title);
  }
}

function do_html_footer() {
  // print an HTML footer
?>
    <!--Footer Start-->

<footer class="page-footer blue lighten-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About Us</h5>
          <p class="white-text">BootOrder.com is your place for great items at great prices. We cater to the do
          it yourself market and are always looking for new innovative products and people.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Affiliate Links</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <p>Copyright 2019 BootOrder.com</p>
      </div>
    </div>
  </footer>

    <!--Footer End-->

  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('select').formSelect();
    });
  </script>
  </body>
  </html>
<?php
}

function do_html_heading($heading) {
  // This function prints the heading in h2 html tags
?>
  <h2><?php echo $heading; ?></h2>
<?php
}

function do_html_URL($url, $name) {
  //This functions output URL as an html link
?>
  <a href="<?php echo $url; ?>"><?php echo $name; ?></a><br />
<?php
}

function display_categories($cat_array) {
// This function displays the categories passed to it into an html list 
  if (!is_array($cat_array)) {
     echo "<p>No categories currently available</p>";
     return;
  }
  echo "<ul>";
  foreach ($cat_array as $row)  {
    $url = "show_cat.php?catid=".$row['catid'];
    $title = $row['catname'];
    echo "<li>";
    do_html_url($url, $title);
    echo "</li>";
  }
  echo "</ul>";
  echo "<hr />";
}

function display_computer_parts($computer_part_array) {
  //This function display all the computer parts  in the array passed in
  if (!is_array($computer_part_array)) {
    echo "<p>No computer parts currently available in this category</p>";
  } else {
    //create table
    echo "<table width=\"100%\" border=\"0\">";

    //create a table row for each computer part 
    foreach ($computer_part_array as $row) {
      $url = "show_computer_part.php?computer_part_id=".$row['computer_part_id'];
      echo "<tr><td>";
      if (@file_exists("images/".$row['computer_part_id'].".jpg")) {
        $title = "<img src=\"images/".$row['computer_part_id'].".jpg\"
                  style=\"border: 1px solid black\"/>";
        do_html_url($url, $title);
      } else {
        echo "&nbsp;";
      }
      echo "</td><td>";
      $title = $row['name'];
      do_html_url($url, $title);
      echo "</td></tr>";
    }

    echo "</table>";
  }

  echo "<hr />";
}

function display_computer_part_details($computer_part) {
  //This function  display all details about this specific computer part
  if (is_array($computer_part)) {
    echo "<table><tr>";
    //display the picture if there is one
    if (@file_exists("images/".$computer_part['computer_part_id'].".jpg"))  {
      $size = GetImageSize("images/".$computer_part['computer_part_id'].".jpg");
      if(($size[0] > 0) && ($size[1] > 0)) {
        echo "<td><img src=\"images/".$computer_part['computer_part_id'].".jpg\"
              style=\"border: 1px solid black\"/></td>";
      }
    }
    echo "<td><ul>";
    echo "<li><strong>Item Name:</strong> ";
    echo $computer_part['name'];
    echo "</li><li><strong>Details:</strong> ";
    echo $computer_part['details'];
    echo "</li><li><strong>Our price :</strong> ";
    echo number_format($computer_part['price'], 2);
    echo "</li></ul></td></tr></table>";
  } else {
    echo "<p>The details of this computer part cannot be displayed at this time.</p>";
  }
  echo "<hr />";
}

function display_checkout_form() {

  //display the customer info form that asks for name and address multiple labels and text input for these
?>
<br />
<section class="container black-text">
  <h5>Your Details</h5>
  <br />
  <form action="purchase.php" method="post">
      <label>Name</label>
      <input type="text" name="name" value="">
      <label>Address</label>
      <input type="text" name="address" value="">
      <label>City/Suburb</label>
      <input type="text" name="city" value="">
      <label>State/Province</label>
      <input type="text" name="state" value="">
      <label>Postal Code or Zip Code</label>
      <input type="text" name="zip" value="">
      <label>Country</label>
      <input type="text" name="country" value="">
      <br />
      <h5>Shipping Address (leave blank if as above)</h5>
      <br />
      <label>Name</label>
      <input type="text" name="ship_name" value="">
      <label>Address</label>
      <input type="text" name="ship_address" value="">
      <label>City/Suburb</label>
      <input type="text" name="ship_city" value="">
      <label>State/Province</label>
      <input type="text" name="ship_state" value="">
      <label>Postal Code or Zip Code</label>
      <input type="text" name="ship_zip" value="">
      <label>Country</label>
      <input type="text" name="ship_country" value="">
      <h6><strong>Please press Purchase to confirm
      your purchase, or Continue Shopping to add or remove items.</strong></h6>
      <br />
     <?php display_form_button("purchase", "Purchase These Items"); ?>
  </form>
</section>

  <!--Customer info form ends-->

<?php
}

function display_shipping($shipping) {
  // This function displays  table row with shipping cost and total price including shipping
?>
  <table border="0" width="100%" cellspacing="0">
  <tr><td align="left">Shipping</td>
      <td align="right"> <?php echo number_format($shipping, 2); ?></td></tr>
  <tr><th bgcolor="#cccccc" align="left">TOTAL INCLUDING SHIPPING</th>
      <th bgcolor="#cccccc" align="right">$ <?php echo number_format($shipping+$_SESSION['total_price'], 2); ?></th>
  </tr>
  </table><br />
<?php
}

function display_card_form($name) {

  //display form asking for credit card details
  ?>
  <section class="container">
    <h4 class="center">Credit Card Details</h4>
    <form class="grey-text" action="process.php" method="post">
    <div class="input-field col s12 m6">
      <select name="card_type">
          <option style="color: black;" value="" disabled selected>Card Type</option>
          <option value="VISA">VISA</option>
          <option value="MasterCard">MasterCard</option>
          <option value="American Express">American Express</option>
      </select>
    </div>
          <label>Card Number</label>
          <input type="text" name="card_number">
          <label>Amex Code (if required)</label>
          <input type="text" name="amex_code">
          <label>Expiry Date</label>
    <div class="input-field col s12 m6">
      <select name="card_month">
          <option value="" disabled selected>Month</option>
          <option value="Jan">Jan</option>
          <option value="Feb">Feb</option>
          <option value="Mar">Mar</option>
          <option value="Apr">Apr</option>
          <option value="May">May</option>
          <option value="Jun">Jun</option>
          <option value="Jul">Jul</option>
          <option value="Aug">Aug</option>
          <option value="Sep">Sep</option>
          <option value="Oct">Oct</option>
          <option value="Nov">Nov</option>
          <option value="Dec">Dec</option>
      </select>
    </div>
    <div class="input-field col s12 m6">
      <select name="card_year">
          <option value="" disabled selected>Year</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
          <option value="2026">2026</option>
          <option value="2027">2027</option>
          <option value="2028">2028</option>
          <option value="2029">2029</option>
          <option value="2030">2030</option>
      </select>
    </div>
          <label>Name on Card</label>
          <input type="text" name="card_name" value = "<?php echo $name; ?>" maxlength="40" size="40">
          <label><strong>Please press purchase to confirm your purchase, or continue shopping to add or remove items</strong></label>
          <?php display_form_button('purchase', 'Purchase These Items'); ?>
    </section>
  <?php
  }

function display_cart($cart, $change = true, $images = 1) {
  //This function display items in shopping cart
  // optionally allow changes (true or false)
  // optionally include images (1 - yes, 0 - no)

   echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\">
         <form action=\"show_cart.php\" method=\"post\">
         <tr><th colspan=\"".(1 + $images)."\" bgcolor=\"#cccccc\">Item</th>
         <th bgcolor=\"#cccccc\">Price</th>
         <th bgcolor=\"#cccccc\">Quantity</th>
         <th bgcolor=\"#cccccc\">Total</th>
         </tr>";

  //display each item as a table row
  foreach ($cart as $computer_part_id => $qty)  {
    $computer_part = get_computer_part_details($computer_part_id);
    echo "<tr>";
    if($images == true) {
      echo "<td align=\"left\">";
      if (file_exists("images/".$computer_part_id.".jpg")) {
         $size = GetImageSize("images/".$computer_part_id.".jpg");
         if(($size[0] > 0) && ($size[1] > 0)) {
           echo "<img src=\"images/".$computer_part_id.".jpg\"
                  style=\"border: 1px solid black\"
                  width=\"".($size[0]/3)."\"
                  height=\"".($size[1]/3)."\"/>";
         }
      } else {
         echo "&nbsp;";
      }
      echo "</td>";
    }
    echo "<td align=\"left\">
          <a href=\"show_computer_part.php?computer_part_id=".$computer_part_id."\">".$computer_part['name']."</a>
          by ".$computer_part['name']."</td>
          <td align=\"center\">\$".number_format($computer_part['price'], 2)."</td>
          <td align=\"center\">";

    // if we allow changes, quantities are in text boxes
    if ($change == true) {
      echo "<input type=\"text\" name=\"".$computer_part_id."\" value=\"".$qty."\" size=\"3\">";
    } else {
      echo $qty;
    }
    echo "</td><td align=\"center\">\$".number_format($computer_part['price']*$qty,2)."</td></tr>\n";
  }
  // display total row
  echo "<tr>
        <th colspan=\"".(2+$images)."\" bgcolor=\"#cccccc\">&nbsp;</td>
        <th align=\"center\" bgcolor=\"#cccccc\">".$_SESSION['items']."</th>
        <th align=\"center\" bgcolor=\"#cccccc\">
            \$".number_format($_SESSION['total_price'], 2)."
        </th>
        </tr>";

  // display save change button
  if($change == true) {
    echo "<tr>
          <td colspan=\"".(2+$images)."\">&nbsp;</td>
          <td align=\"center\">
             <input type=\"hidden\" name=\"save\" value=\"true\"/>
             <input type=\"image\" src=\"images/save-changes.gif\"
                    border=\"0\" alt=\"Save Changes\"/>
          </td>
          <td>&nbsp;</td>
          </tr>";
  }
  echo "</form></table>";
}

function display_login_form() {
  //This function dispalys form asking for name and password

  ?>
  <section class="container">
    <br/>
    <br/>
    <form method="post" action="admin.php">
        <label>Username:</label>
        <input type="text" name="username">
        <label>Password:</label>
        <input type="text" name="passwd">
        </br>
        </br>
        <div align="center">
        <button class="btn waves-effect waves-white grey" type="submit" value="Log in">Log in
          <i class="material-icons right">keyboard_return</i>
        </button>
        </div>
    </form>
  </section>
<?php
}

function display_admin_menu() {
// This function displays the admin menu
?>
<br />
  <div class="collection">
        <a href="index.php" class="collection-item black-text">Go to main site</a>
        <a href="insert_category_form.php" class="collection-item black-text">Add a new category</a>
        <a href="insert_computer_part_form.php" class="collection-item black-text">Add a new computer part</a>
        <a href="change_password_form.php" class="collection-item black-text">Change admin password</a>
  </div>
<?php
}

function display_button($target, $image, $alt) {
  echo "<div align=\"center\" style=\"padding:10px; margin-bottom:15px;\">
          <a href=\"".$target."\">
            <img style=\"width:auto; height:auto;
            box-shadow: 3px 3px 3px 0 rgba(0,0,0,0.2);
            \" src=\"images/".$image.".png\"
            alt=\"".$alt."\" border=\"0\" height=\"50\"
            width=\"135\"/>
          </a>
        </div>";
}

function display_form_button($image, $alt) {
  echo "<div align=\"center\">
          <input type=\"image\" src=\"images/".$image.".png\"
          style=\"box-shadow: 3px 3px 3px 0 rgba(0,0,0,0.2);\"
           alt=\"".$alt."\" border=\"0\" height=\"auto\" width=\"auto\"/>
        </div>";
}

?>
