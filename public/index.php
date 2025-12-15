<?php
if( !session_id() ) session_start();

require_once '../app/config/Config.php';
require_once '../app/config/Database.php';
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';

$app = new App;
