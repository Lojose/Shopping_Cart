<?php 
// This file contains functions used by the admin interface
// for the boot order shopping cart.
include ('computer_parts_sc_fns.php');

function display_category_form($category = '') {
// This function displays the category form.
// This form can be used for inserting or editing categories.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_category.php.
// To update, pass an array containing a category.  The
// form will contain the old data and point to update_category.php.
// It will also add a "Delete category" button.


  // if passed an existing category, proceed in "edit mode"
  $edit = is_array($category);
  //most of the form is in plain HTML with some
  // optional PHP bits throughout

?>
  <form method="post"
      action="<?php echo $edit ? 'edit_category.php' : 'insert_category.php'; ?>">
  <table border="0">
  <tr>
    <td>Category Name:</td>
    <td><input type="text" name="catname" size="40" maxlength="40"
          value="<?php echo $edit ? $category['catname'] : ''; ?>" /></td>
   </tr>
  <tr>
    <td <?php if (!$edit) { echo "colspan=2";} ?> align="center">
      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"catid\" value=\"".$category['catid']."\" />";
         }
      ?>
      <input type="submit"
       value="<?php echo $edit ? 'Update' : 'Add'; ?> Category" /></form>
     </td>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "<td>
                <form method=\"post\" action=\"delete_category.php\">
                <input type=\"hidden\" name=\"catid\" value=\"".$category['catid']."\" />
                <input type=\"submit\" value=\"Delete category\" />
                </form></td>";
       }
     ?>
  </tr>
  </table>
<?php
}

function display_computer_part_form($computer_part = '') {
  
// This function displays the computer part form.
// It is very similar to the category form.
// This form can be used for inserting or editing computer parts.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_computer_part.php.
// To update, pass an array containing a computer part.  The
// form will be displayed with the old data and point to update_computer_part.php.
// It will also add a "Delete computer part" button.


  // if passed an existing computer part, proceed in "edit mode"

  $edit = is_array($computer_part);
  ?> 
  <!--most of the form is in plain HTML with some
  optional PHP bits throughout-->

  <section class='container'>
  <h4 class='center'>Add/Edit form:</h4>
  <form class="grey-text" action="<?php echo $edit ? 'edit_computer_part.php' : 'insert_computer_part.php';?>" method="post">

        <label>Computer Part Id:</label>
        <input type="text" name="computer_part_id" value="<?php echo $edit ? $computer_part['computer_part_id'] : ''; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $edit ? $computer_part['name'] : ''; ?>">
        <label>Category:</label>
  <div class="input-field col s12 m6">
    <select name="catid">
    <?php
          // list of possible categories comes from database
          $cat_array=get_categories();
          foreach ($cat_array as $thiscat) {
               echo "<option value=\"".$thiscat['catid']."\"";
               // if existing computer part, put in current catgory
               if (($edit) && ($thiscat['catid'] == $computer_part['catid'])) {
                   echo " selected";
               }
               echo ">".$thiscat['catname']."</option>";
          }

          ?>
    </select>
  </div>
        <label>Price:</label>
        <input type="text" name="price" value="<?php echo $edit ? $computer_part['price'] : ''; ?>" />
        <label>Details</label>
        <div class="input-field col s12">
          <textarea name="details" class="materialize-textarea"><?php echo $edit ? $computer_part['details'] : ''; ?></textarea>
        </div>

        <label><?php if (!$edit) { echo ""; }?>
         <?php
            if ($edit)
             // we need the old computer_part_id  to find the computer part in database
             // if the computer_part_id is being updated
             echo "<input type=\"hidden\" name=\"old_computer_part_id\"
                    value=\"".$computer_part['computer_part_id']."\" />";
         ?></label>

        <input type="submit"
               value="<?php echo $edit ? 'Update' : 'Add'; ?> Computer Part" />
        </form>
        <?php
           if ($edit) {
             echo "<label>
                   <form method=\"post\" action=\"delete_computer_part.php\">
                   <input type=\"hidden\" name=\"computer_part_id\"
                    value=\"".$computer_part['computer_part_id']."\" />
                   <input type=\"submit\" value=\"Delete computer part\"/>
                   </form></label>";
            }
          ?>
    </form>
  </section>
<?php
}

function display_password_form() {
//This function displays html change password form
?>
   <br />
   <form action="change_password.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Old password:</td>
       <td><input type="password" name="old_passwd" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>New password:</td>
       <td><input type="password" name="new_passwd" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>Repeat new password:</td>
       <td><input type="password" name="new_passwd2" size="16" maxlength="16" /></td>
   </tr>
   <tr><td colspan=2 align="center"><input type="submit" value="Change password">
   </td></tr>
   </table>
   <br />
<?php
}

function insert_category($catname) {
//This function inserts a new category into the database

   $conn = db_connect();

   // check category does not already exist
   $query = "select *
             from categories
             where catname='".$catname."'";
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new category
   $query = "insert into categories values
            (Null, '".$catname."')";
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_computer_part($computer_part_id, $cat_id, $price, $name, $details) {
// This function insert a new computer part  into the database

   $conn = db_connect();

   //check that the computer part does not already exist
   $query = "select *
             from computer_parts
             where computer_part_id='".$computer_part_id."'";

   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new computer part 
   $query = "insert into computer_parts values
            ('".$computer_part_id."', '".$cat_id."', '".$price."',
             '".$name."', '".$details."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_category($catid, $catname) {
//This function changes the name of category with catid in the database

   $conn = db_connect();

   $query = "update categories
             set catname='".$catname."'
             where catid='".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_computer_part($old_computer_part_id,$computer_part_id, $name, $price, $details) {
// change details of computer part stored under $old_computer_part_id  in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update computer_parts
             set computer_part_id= '".$computer_part_id."',
             name = '".$name."',
             price = '".$price."',
             details = '".$details."'
             where computer_part_id = '".$old_computer_part_id."'";

   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_category($catid) {
// Remove the category identified by catid from the db
// If there are computer parts in the category, it will not
// be removed and the function will return false.

   $conn = db_connect();

   // check if there are any computer parts in category
   // to avoid deletion anomalies
   $query = "select *
             from computer_parts
             where catid='".$catid."'";

   $result = @$conn->query($query);
   if ((!$result) || (@$result->num_rows > 0)) {
     return false;
   }

   $query = "delete from categories
             where catid='".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


function delete_computer_part($computer_part_id) {
// Deletes the computer part identified by $computer_part_id from the database.

   $conn = db_connect();

   $query = "delete from computer_parts
             where computer_part_id='".$computer_part_id."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

?>
