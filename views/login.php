<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: /hesabi/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ورود کاربر | حسابداری مدرن</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- فونت انجمن مکس -->
    <link rel="stylesheet" href="assets/fonts/anjoman/font-face.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="login-glass-bg"></div>
    <main>
        <section class="login-section-modern">
            <div class="login-card-glass">
                <div class="brand-logo">
                    <i class="fa-solid fa-calculator"></i>
                </div>
                <h1 class="login-title-modern">ورود به حساب کاربری</h1>
                <form id="login-form" autocomplete="off" novalidate>
                    <div class="form-group-modern">
                        <label for="username"><i class="fa fa-user"></i> نام کاربری یا ایمیل</label>
                        <input type="text" id="username" name="username" placeholder="نام کاربری یا ایمیل" required maxlength="70" autocomplete="username">
                        <span class="error" id="err-username"></span>
                    </div>
                    <div class="form-group-modern pass-group-modern">
                        <label for="password"><i class="fa fa-key"></i> رمز عبور</label>
                        <div class="input-password-modern">
                            <input type="password" id="password" name="password" placeholder="رمز عبور" required minlength="6" maxlength="64" autocomplete="current-password">
                            <i class="fa fa-eye-slash toggle-pass" id="toggle-pass" title="نمایش/مخفی رمز"></i>
                        </div>
                        <span class="error" id="err-password"></span>
                    </div>
                    <button type="submit" class="btn-login-modern"><i class="fa fa-sign-in-alt"></i> ورود</button>
                    <div class="form-footer-modern">
                        <span>حساب ندارید؟ <a href="register">ثبت‌نام کنید</a></span>
                        <br>
                        <a href="#" class="forgot-link">رمز عبور را فراموش کرده‌اید؟</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <!-- اسکریپت‌ها -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>