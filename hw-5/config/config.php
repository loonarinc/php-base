<?php
define("TEMPLATES_DIR", "../view/");
define("IMAGES_BIG_DIR", "/gallery_img/big/");
define("IMAGES_SMALL_DIR", "/gallery_img/small/");

/* DB config */
define('HOST', 'localhost');
define('USER', 'shop');
define('PASS', '123456');
define('DB', 'shop');

require_once "../engine/db.php";
require_once "../engine/functions.php";
require_once "../engine/log.php";