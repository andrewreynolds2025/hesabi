// نمایش/مخفی کردن رمز عبور
document.querySelectorAll('.toggle-pass').forEach(icon => {
    icon.addEventListener('click', function() {
        const input = this.parentNode.querySelector('input');
        if (input.type === 'password') {
            input.type = 'text';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        } else {
            input.type = 'password';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        }
    });
});

// اعتبارسنجی ساده فرم ورود
function isFilled(str) {
    return str && str.trim().length > 2;
}
function isPassword(str) {
    return str.length >= 6;
}

// اعتبارسنجی لحظه‌ای و تنظیم استایل
function validateField(id, validator, errorMsg) {
    const input = document.getElementById(id);
    const error = document.getElementById('err-' + id.replace('-', ''));
    let value = input.value.trim();
    let valid = validator(value);
    if (!valid) {
        input.classList.add('invalid');
        input.classList.remove('valid');
        error.textContent = errorMsg;
    } else {
        input.classList.remove('invalid');
        input.classList.add('valid');
        error.textContent = '';
    }
    return valid;
}

// رویدادها برای اعتبارسنجی بلادرنگ
document.getElementById('username').addEventListener('input', function() {
    validateField('username', isFilled, 'نام کاربری یا ایمیل را وارد کنید');
});
document.getElementById('password').addEventListener('input', function() {
    validateField('password', isPassword, 'رمز عبور حداقل ۶ کاراکتر');
});

// ثبت فرم
document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let ok = true;
    ok &= validateField('username', isFilled, 'نام کاربری یا ایمیل را وارد کنید');
    ok &= validateField('password', isPassword, 'رمز عبور حداقل ۶ کاراکتر');
    if (!ok) {
        Swal.fire({icon: 'error', title: 'خطا', text: 'اطلاعات را به‌درستی وارد کنید!'});
        return;
    }
    Swal.fire({
        title: 'در حال ورود...',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });
    // ارسال داده به سرور (این بخش باید با ajax به بک‌اند واقعی متصل شود)
    setTimeout(() => {
        Swal.close();
        Swal.fire({
            icon: 'success',
            title: 'ورود موفق!',
            text: 'خوش آمدید.',
            confirmButtonText: 'باشه'
        }).then(() => {
            // تغییر مسیر به داشبورد یا صفحه اصلی
            window.location.href = '/hesabi/dashboard.php';
        });
    }, 1400);
});