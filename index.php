<?php
session_start();

// بارگذاری فایل‌های کمکی
require_once 'config.php';
require_once 'functions.php';

// تعیین صفحه
$page = isset($_GET['page']) ? $_GET['page'] : 'landing';

// صفحات مجاز
$allowedPages = ['landing', 'login', 'register', 'dashboard', 'chart'];

$page = $_GET['page'] ?? '';
$page = strtolower($page);
if ($page === '' || !in_array($page, $allowedPages)) {
    $page = 'landing';
}


// نمایش صفحه
include "views/{$page}.php";

