<?php
 require_once('computer_parts_sc_fns.php');
 session_start();
 do_html_header("Change administrator password");
 check_admin_user();

 display_password_form();

 do_html_url("admin.php", "Back to administration menu");
 do_html_footer();
?>
