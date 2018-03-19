<?php
	ob_start();
  session_start();
  include_once "../conn.php";
  include_once "class.admin.php";
  $Admin = new admin();
  include_once '../functions.php';
  $admin_name = $Admin->data['name'];
?>