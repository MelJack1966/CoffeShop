<?php
  require_once('database.php');
  require_once('query.php');

  $db = db_connect();
  $errors = array();
  $config = array();
  session_start();
