<?php

function filled_out($form_vars) {
  //This functions test that each variable has a value
  foreach ($form_vars as $key => $value) {
     if ((!isset($key)) || ($value == '')) {
        return false;
     }
  }
  return true;
}

function valid_email($address) {
  //This function checks an email address is possibly valid; by checking if there is an @ in the email
  if (ereg("^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $address)) {
    return true;
  } else {
    return false;
  }
}

?>
