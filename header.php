<?php
session_start();
if (!isset($_SESSION["isLogIn"])) {
  $_SESSION["isLogIn"]="t";
}
include('include.inc');
?>
<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Do&Events</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/tools.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript" scr="script/script.js">
    </script>
</head>

<body>
  <header class="header-content">
  <?php if( $_SESSION["isLogIn"]===TRUE):
  include 'nav.php';
  endif;?>
  </header>
  <main class="main-content">
  <?php
  if($_SESSION["isLogIn"] !== TRUE):
    include 'login.php';
  endif;
  ?>
