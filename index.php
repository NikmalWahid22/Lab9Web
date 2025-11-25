<?php
session_start();

// load config & template
require 'config/database.php';
require 'views/header.php';

// ambil parameter page
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// halaman yang butuh login
$protected_pages = [
    'dashboard',
    'user/list',
    'user/add',
    'user/edit',
    'user/delete'
];

if (in_array($page, $protected_pages) && !isset($_SESSION['login'])) {
    echo "<script>alert('Login dulu bro!'); window.location='index.php?page=auth/login';</script>";
    exit;
}

// ROUTING
switch ($page) {

    case 'user/list':
        require 'modules/user/list.php';
        break;

    case 'user/add':
        require 'modules/user/add.php';
        break;

    case 'user/edit':
        require 'modules/user/edit.php';
        break;

    case 'user/delete':
        require 'modules/user/delete.php';
        break;

    case 'auth/login':
        require 'modules/auth/login.php';
        break;

    case 'auth/logout':
        require 'modules/auth/logout.php';
        break;

    default:
        require 'views/dashboard.php';
        break;
}

require 'views/footer.php';
?>
