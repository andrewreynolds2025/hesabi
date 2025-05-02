// اسلایدر مشتریان
let slider = document.getElementById('clients-slider');
let clientCards = slider.querySelectorAll('.client-card');
let idx = 0;

function showClient(index) {
    clientCards.forEach((el, i) => {
        el.style.display = (i === index) ? 'flex' : 'none';
    });
}
if (window.innerWidth < 700) {
    showClient(idx);
    document.getElementById('prev-client').onclick = () => {
        idx = (idx - 1 + clientCards.length) % clientCards.length;
        showClient(idx);
    };
    document.getElementById('next-client').onclick = () => {
        idx = (idx + 1) % clientCards.length;
        showClient(idx);
    };
} else {
    clientCards.forEach(el => el.style.display = 'flex');
}

// FAQ باز/بسته
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', function () {
        let item = this.parentNode;
        item.classList.toggle('open');
        document.querySelectorAll('.faq-item').forEach(faq => {
            if (faq !== item) faq.classList.remove('open');
        });
    });
});

// فرم تماس با SweetAlert2
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let name = document.getElementById('contact-name').value.trim();
    let email = document.getElementById('contact-email').value.trim();
    let msg = document.getElementById('contact-message').value.trim();
    if (name && email && msg) {
        Swal.fire({
            icon: 'success',
            title: 'پیام شما ارسال شد!',
            text: 'از تماس شما متشکریم. به زودی پاسخ خواهیم داد.',
            confirmButtonText: 'باشه'
        });
        this.reset();
    } else {
        Swal.fire({
            icon: 'error',
            title: 'خطا!',
            text: 'تمام فیلدها را پر کنید.',
            confirmButtonText: 'متوجه شدم'
        });
    }
});