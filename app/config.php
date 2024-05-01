<?php
session_start();

// MAMP
define("DSN", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "blog");

// Functions
require_once("connection.php");
require_once("category-function.php");
require_once("post-function.php");
require_once("user-function.php");

// Classes
require_once("Database.php");


