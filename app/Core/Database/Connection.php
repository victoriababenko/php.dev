<?php

class Connection {

  protected static $instance;
  protected static $config = [];


  public static function connect() {
    self::$config = require_once dirname(__DIR__, 3)."/config/db.php";
  
    if(!self::$instance) {
      $dsn = self::makeDsn(self::$config['db']);
      self::$instance = new PDO($dsn, self::$config['user'], self::$config['password'], self::$config['options']);
    }
      return self::$instance;
  }

  private static function makeDsn($config) {
    $dsn = $config['driver'].':';
    unset($config['driver']);
    foreach ($config as $key => $value) {
      $dsn .= $key.'='.$value.';';
    }
    return substr($dsn, 0, -1);
  }
}