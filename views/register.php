<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ثبت‌نام کاربر جدید | برنامه حسابداری</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- فونت و استایل اصلی -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <!-- SweetAlert2 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">
</head>
<body>
    <div class="register-bg"></div>
    <main>
        <section class="register-section">
            <div class="register-card card-3d">
                <h1 class="register-title">فرم ثبت‌نام حسابداری</h1>
                <form id="register-form" autocomplete="off" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstname">نام</label>
                            <input type="text" id="firstname" name="firstname" placeholder="نام خود را وارد کنید" required maxlength="40">
                            <span class="error" id="err-firstname"></span>
                        </div>
                        <div class="form-group">
                            <label for="lastname">نام خانوادگی</label>
                            <input type="text" id="lastname" name="lastname" placeholder="نام خانوادگی را وارد کنید" required maxlength="50">
                            <span class="error" id="err-lastname"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">نام کاربری</label>
                        <input type="text" id="username" name="username" placeholder="شناسه یکتا برای ورود" required maxlength="30" autocomplete="username">
                        <span class="error" id="err-username"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" required maxlength="70" autocomplete="email">
                        <span class="error" id="err-email"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group pass-group">
                            <label for="password">رمز عبور</label>
                            <div class="input-password">
                                <input type="password" id="password" name="password" placeholder="رمز قوی انتخاب کنید" required minlength="6" maxlength="64" autocomplete="new-password">
                                <i class="fa fa-eye-slash toggle-pass" id="toggle-pass" title="نمایش/مخفی رمز"></i>
                            </div>
                            <div class="password-strength">
                                <div id="pass-strength-bar"></div>
                                <span id="pass-strength-text"></span>
                            </div>
                            <span class="error" id="err-password"></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">تایید رمز عبور</label>
                            <div class="input-password">
                                <input type="password" id="confirm-password" name="confirm_password" placeholder="تکرار رمز عبور" required autocomplete="new-password">
                                <i class="fa fa-eye-slash toggle-pass" id="toggle-confirm-pass" title="نمایش/مخفی رمز"></i>
                            </div>
                            <span class="error" id="err-confirm-password"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-register">ثبت‌نام</button>
                    <div class="form-footer">
                        <span>حساب دارید؟</span> <a href="login">وارد شوید</a>
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