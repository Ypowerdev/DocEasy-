<?php
session_start();

use Form\ConsumerProtectionClaim\Controller;

spl_autoload_register(function ($className) {
  $newClassName = str_replace("\\", "/", $className) .".php";
  require 'class/' . $newClassName;
});

include ('inc/module_header.php');

if ($_GET['doc']) {
  $docPath = 'doc/' . $_GET['doc'] . '.php';
  include($docPath);
} else {
  new Controller();
}

include ('inc/module_footer.php');