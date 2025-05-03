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

// اعتبارسنجی ساده فرم
function isPersian(str) {
    return /^[\u0600-\u06FF\s]{2,}$/.test(str);
}
function isUsername(str) {
    return /^[a-zA-Z0-9_]{4,}$/.test(str);
}
function isEmail(str) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(str);
}
function isPassword(str) {
    return str.length >= 6;
}
function isConfirmPassword(pass, conf) {
    return pass === conf && conf.length >= 6;
}

// نمایش درجه سختی رمز عبور
function passwordStrength(pass) {
    let score = 0;
    if (pass.length >= 8) score++;
    if (/[A-Z]/.test(pass)) score++;
    if (/[a-z]/.test(pass)) score++;
    if (/[0-9]/.test(pass)) score++;
    if (/[^A-Za-z0-9]/.test(pass)) score++;
    return score;
}
function updateStrengthView(pass) {
    const bar = document.getElementById('pass-strength-bar');
    const text = document.getElementById('pass-strength-text');
    const score = passwordStrength(pass);
    let width = "0%", msg = "", cls = "";
    switch(score) {
        case 0: case 1: width="20%"; msg="ضعیف"; cls="strength-weak"; break;
        case 2: width="40%"; msg="متوسط"; cls="strength-medium"; break;
        case 3: width="60%"; msg="خوب"; cls="strength-good"; break;
        case 4: width="80%"; msg="قوی"; cls="strength-strong"; break;
        case 5: width="100%"; msg="خیلی قوی"; cls="strength-strong"; break;
    }
    bar.style.width = width;
    bar.className = cls;
    text.textContent = msg;
    text.className = cls;
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
document.getElementById('firstname').addEventListener('input', function() {
    validateField('firstname', isPersian, 'حداقل ۲ حرف فارسی');
});
document.getElementById('lastname').addEventListener('input', function() {
    validateField('lastname', isPersian, 'حداقل ۲ حرف فارسی');
});
document.getElementById('username').addEventListener('input', function() {
    validateField('username', isUsername, 'حداقل ۴ کاراکتر لاتین یا عددی');
});
document.getElementById('email').addEventListener('input', function() {
    validateField('email', isEmail, 'ایمیل معتبر وارد کنید');
});
document.getElementById('password').addEventListener('input', function() {
    updateStrengthView(this.value);
    validateField('password', isPassword, 'رمز حداقل ۶ کاراکتر');
});
document.getElementById('confirm-password').addEventListener('input', function() {
    validateField('confirm-password', 
        v => isConfirmPassword(document.getElementById('password').value, v),
        'تکرار رمز صحیح نیست');
});

// جلوگیری از paste رمز
document.getElementById('confirm-password').onpaste = function(e){e.preventDefault();}

// ثبت فرم
document.getElementById('register-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let ok = true;
    ok &= validateField('firstname', isPersian, 'حداقل ۲ حرف فارسی');
    ok &= validateField('lastname', isPersian, 'حداقل ۲ حرف فارسی');
    ok &= validateField('username', isUsername, 'حداقل ۴ کاراکتر لاتین یا عددی');
    ok &= validateField('email', isEmail, 'ایمیل معتبر وارد کنید');
    ok &= validateField('password', isPassword, 'رمز حداقل ۶ کاراکتر');
    ok &= validateField('confirm-password', 
        v => isConfirmPassword(document.getElementById('password').value, v),
        'تکرار رمز صحیح نیست');
    if (!ok) {
        Swal.fire({icon: 'error', title: 'خطا', text: 'اطلاعات را به‌درستی وارد کنید!'});
        return;
    }
    Swal.fire({
        title: 'در حال ثبت‌نام...',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });
    // ارسال داده به سرور (این بخش باید با ajax به بک‌اند واقعی متصل شود)
    setTimeout(() => {
        Swal.close();
        Swal.fire({
            icon: 'success',
            title: 'ثبت‌نام موفق!',
            text: 'اکنون می‌توانید وارد حساب خود شوید.',
            confirmButtonText: 'ورود'
        }).then(() => {
            window.location.href = 'login';
        });
    }, 1800);
});