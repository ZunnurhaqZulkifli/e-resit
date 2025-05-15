<?php

require __DIR__ . '/vendor/autoload.php';

use App\Service\Auth;
use App\Models\User;

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header('Location: login_page.php');
    exit();
} else {
    header('Location: main.php');
}

?>