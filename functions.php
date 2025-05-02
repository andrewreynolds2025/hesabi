<?php

// تابع بررسی لاگین بودن کاربر
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// انتقال به صفحه خاص
function redirect($url) {
    header("Location: $url");
    exit;
}