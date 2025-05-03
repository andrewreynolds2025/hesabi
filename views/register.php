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
    <title>عضویت کاربر جدید | حسابداری مدرن</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- فونت انجمن مکس -->
    <link rel="stylesheet" href="assets/fonts/anjoman/font-face.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="register-glass-bg"></div>
    <main>
        <section class="register-section-modern">
            <div class="register-card-glass">
                <div class="brand-logo">
                    <i class="fa-solid fa-calculator"></i>
                </div>
                <h1 class="register-title-modern">ایجاد حساب کاربری</h1>
                <form id="register-form" autocomplete="off" novalidate>
                    <div class="form-row-modern">
                        <div class="form-group-modern">
                            <label for="firstname"><i class="fa fa-user"></i> نام</label>
                            <input type="text" id="firstname" name="firstname" placeholder="نام خود را وارد کنید" required maxlength="40">
                            <span class="error" id="err-firstname"></span>
                        </div>
                        <div class="form-group-modern">
                            <label for="lastname"><i class="fa fa-user-tag"></i> نام خانوادگی</label>
                            <input type="text" id="lastname" name="lastname" placeholder="نام خانوادگی را وارد کنید" required maxlength="50">
                            <span class="error" id="err-lastname"></span>
                        </div>
                    </div>
                    <div class="form-group-modern">
                        <label for="username"><i class="fa fa-at"></i> نام کاربری</label>
                        <input type="text" id="username" name="username" placeholder="مثلاً yourname123" required maxlength="30" autocomplete="username">
                        <span class="error" id="err-username"></span>
                    </div>
                    <div class="form-group-modern">
                        <label for="email"><i class="fa fa-envelope"></i> ایمیل</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" required maxlength="70" autocomplete="email">
                        <span class="error" id="err-email"></span>
                    </div>
                    <div class="form-row-modern">
                        <div class="form-group-modern pass-group-modern">
                            <label for="password"><i class="fa fa-key"></i> رمز عبور</label>
                            <div class="input-password-modern">
                                <input type="password" id="password" name="password" placeholder="رمز قوی انتخاب کنید" required minlength="6" maxlength="64" autocomplete="new-password">
                                <i class="fa fa-eye-slash toggle-pass" id="toggle-pass" title="نمایش/مخفی رمز"></i>
                            </div>
                            <div class="password-strength-modern">
                                <div id="pass-strength-bar"></div>
                                <span id="pass-strength-text"></span>
                            </div>
                            <span class="error" id="err-password"></span>
                        </div>
                        <div class="form-group-modern">
                            <label for="confirm-password"><i class="fa fa-check-double"></i> تکرار رمز عبور</label>
                            <div class="input-password-modern">
                                <input type="password" id="confirm-password" name="confirm_password" placeholder="تکرار رمز عبور" required autocomplete="new-password">
                                <i class="fa fa-eye-slash toggle-pass" id="toggle-confirm-pass" title="نمایش/مخفی رمز"></i>
                            </div>
                            <span class="error" id="err-confirm-password"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn-register-modern"><i class="fa fa-user-plus"></i> ثبت‌نام</button>
                    <div class="form-footer-modern">
                        <span>حساب دارید؟ <a href="login">وارد شوید</a></span>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <!-- اسکریپت‌ها -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    <script src="assets/js/register.js"></script>
</body>
</html>