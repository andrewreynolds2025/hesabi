// مدیریت باز و بسته شدن سایدبار و زیرمنوها و ذخیره وضعیت
document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.querySelector('.sidebar-toggle');
    const menuParents = document.querySelectorAll('.sidebar-parent');
    const submenuEls = document.querySelectorAll('.sidebar-submenu');

    // Load state
    if (localStorage.getItem('sidebar-collapsed') === '1') {
        sidebar.classList.add('collapsed');
        document.body.classList.add('sidebar-collapsed');
    }

    // ذخیره وضعیت باز بودن هر منو
    let openMenuKey = localStorage.getItem('sidebar-open-menu');
    if (openMenuKey) {
        document.querySelectorAll(`[data-menu-key="${openMenuKey}"]`).forEach(el=>{
            el.classList.add('open');
            let submenu = el.nextElementSibling;
            if(submenu && submenu.classList.contains('sidebar-submenu')) submenu.classList.add('open');
        });
    }

    // Toggle sidebar
    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        document.body.classList.toggle('sidebar-collapsed');
        localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed') ? '1' : '0');
        // می‌تونی اگر خواستی انیمیشن یا رویداد دیگه‌ای هم اضافه کنی
    });

    // باز و بسته شدن منوها و ذخیره وضعیت
    menuParents.forEach(parent => {
        parent.addEventListener('click', function(e) {
            e.stopPropagation();
            // بستن همه منوها بجز این
            menuParents.forEach(p => {
                if (p !== parent) {
                    p.classList.remove('open');
                    let sub = p.nextElementSibling;
                    if (sub && sub.classList.contains('sidebar-submenu')) sub.classList.remove('open');
                }
            });
            // باز/بسته کردن منوی فعلی
            this.classList.toggle('open');
            let submenu = this.nextElementSibling;
            if (submenu && submenu.classList.contains('sidebar-submenu')) submenu.classList.toggle('open');
            // ذخیره کلید منوی باز
            if(this.classList.contains('open')) {
                localStorage.setItem('sidebar-open-menu', this.getAttribute('data-menu-key'));
            } else {
                localStorage.removeItem('sidebar-open-menu');
            }
        });
    });

    // اکتیو کردن آیتم فعلی با توجه به URL (و باز کردن زیرمنویش)
    function activateCurrentLink() {
        const currentPath = window.location.pathname.replace(/\/+$/, '');
        let found = false;
        document.querySelectorAll('.sidebar-link').forEach(link => {
            let href = link.getAttribute('href');
            if (!href) return;
            // اجازه بده صفحات php, asp, بدون پسوند و ... تطابق پیدا کنند
            if (currentPath.endsWith(href.replace(/^\//, '')) || currentPath.endsWith(href)) {
                link.classList.add('active');
                // اگر در ساب‌منو است، والدش را هم باز کن
                let submenu = link.closest('.sidebar-submenu');
                if (submenu) {
                    submenu.classList.add('open');
                    let parent = submenu.previousElementSibling;
                    if (parent && parent.classList.contains('sidebar-parent')) {
                        parent.classList.add('open');
                        localStorage.setItem('sidebar-open-menu', parent.getAttribute('data-menu-key'));
                    }
                }
                found = true;
            } else {
                link.classList.remove('active');
            }
        });
        return found;
    }
    activateCurrentLink();
});