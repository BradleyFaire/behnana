<?php

require_once '../libraries/login.lib.php';

Login::log_out();

header('location: index.php');
exit;