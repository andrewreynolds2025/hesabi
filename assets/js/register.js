// نمایش/مخفی‌سازی رمزها
function togglePassword(id, iconId) {
    const input = document.getElementById(id);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}
document.getElementById('toggle-pass').onclick = function() {
    togglePassword('password', 'toggle-pass');
};
document.getElementById('toggle-confirm-pass').onclick = function() {
    togglePassword('confirm-password', 'toggle-confirm-pass');
};

// قدرت رمز عبور
function passwordStrength(pw) {
    let score = 0;
    if (pw.length >= 8) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;
    if (pw.length > 12) score++;
    return score;
}
function updateStrengthBar(pw) {
    const bar = document.getElementById('pass-strength-bar');
    const text = document.getElementById('pass-strength-text');
    let score = passwordStrength(pw);
    if (!pw) {
        bar.style.width = '60px';
        bar.style.background = '#e0e0e0';
        text.textContent = '';
        text.className = '';
        return;
    }
    let color, label, w;
    switch (score) {
        case 0:
        case 1: color = '#ff3d3d'; label = 'ضعیف'; w = '30px'; text.className = 'strength-weak'; break;
        case 2: color = '#ff9800'; label = 'متوسط'; w = '44px'; text.className = 'strength-medium'; break;
        case 3:
        case 4: color = '#20e3b2'; label = 'خوب'; w = '60px'; text.className = 'strength-good'; break;
        default: color = '#0d99ff'; label = 'عالی'; w = '80px'; text.className = 'strength-strong';
    }
    bar.style.width = w;
    bar.style.background = color;
    text.textContent = label;
}
document.getElementById('password').addEventListener('input', function() {
    updateStrengthBar(this.value);
});

// اعتبارسنجی فرم
function validateField(id, checkFn, msg) {
    const el = document.getElementById(id);
    const error = document.getElementById('err-' + id);
    if (!checkFn(el.value)) {
        el.classList.add('invalid'); el.classList.remove('valid');
        error.textContent = msg;
        return false;
    } else {
        el.classList.add('valid'); el.classList.remove('invalid');
        error.textContent = '';
        return true;
    }
}
function isPersianName(str) { return /^[\u0600-\u06FF\s\-]+$/.test(str) && str.length >=2; }
function isUsername(str) { return /^[a-zA-Z0-9\-_]{4,}$/.test(str); }
function isEmail(str) { return /^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,}$/.test(str); }
function isPassword(str) { return str.length >= 6; }
function isConfirmPassword(str) {
    return str === document.getElementById('password').value && str.length > 0;
}

// اعتبارسنجی لحظه‌ای
document.getElementById('firstname').addEventListener('input', function() {
    validateField('firstname', isPersianName, 'حداقل ۲ حرف فارسی');
});
document.getElementById('lastname').addEventListener('input', function() {
    validateField('lastname', isPersianName, 'حداقل ۲ حرف فارسی');
});
document.getElementById('username').addEventListener('input', function() {
    validateField('username', isUsername, 'حداقل ۴ کاراکتر لاتین یا عددی');
});
document.getElementById('email').addEventListener('input', function() {
    validateField('email', isEmail, 'ایمیل معتبر وارد کنید');
});
document.getElementById('confirm-password').addEventListener('input', function() {
    validateField('confirm-password', isConfirmPassword, 'تکرار رمز صحیح نیست');
});

// ارسال فرم
document.getElementById('register-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let ok = true;
    ok &= validateField('firstname', isPersianName, 'حداقل ۲ حرف فارسی');
    ok &= validateField('lastname', isPersianName, 'حداقل ۲ حرف فارسی');
    ok &= validateField('username', isUsername, 'حداقل ۴ کاراکتر لاتین یا عددی');
    ok &= validateField('email', isEmail, 'ایمیل معتبر وارد کنید');
    ok &= validateField('password', isPassword, 'رمز حداقل ۶ کاراکتر');
    ok &= validateField('confirm-password', isConfirmPassword, 'تکرار رمز صحیح نیست');
    if (!ok) {
        Swal.fire({icon: 'error', title: 'خطا', text: 'اطلاعات را به‌درستی وارد کنید!'});
        return;
    }
    // نمایش لودینگ
    Swal.fire({
        title: 'در حال ثبت‌نام...',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });
    // ارسال داده به سرور (دمو - ajax واقعی با php بعداً)
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

// جلوگیری از paste رمز برای افزایش امنیت
document.getElementById('confirm-password').onpaste = function(e){e.preventDefault();}

// انیمیشن ورود فیلدها
let form = document.getElementById('register-form');
[...form.elements].forEach((el, i) => {
    if(el.tagName === "INPUT") {
        el.style.opacity = 0;
        setTimeout(() => {
            el.style.transition = "opacity .7s";
            el.style.opacity = 1;
        }, i*90+400);
    }
});

/* ... کد کامل و افکت‌ها و توضیحات بیش از 500 خط ... */