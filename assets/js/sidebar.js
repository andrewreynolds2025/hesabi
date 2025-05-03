// سایدبار حرفه‌ای با امکانات: باز/بستن، آکاردئون، تم تاریک، دسترسی‌پذیری، اسکرول خودکار، ثبت آخرین منوی باز، اعلان و ...
(function() {
  const sidebar = document.getElementById('mainSidebar');
  const toggleBtn = sidebar.querySelector('.sidebar-toggle');
  const menuParents = sidebar.querySelectorAll('.sidebar-parent');
  const themeBtn = sidebar.querySelector('.sidebar-theme-toggle');
  const sidebarNav = sidebar.querySelector('.sidebar-nav');
  let isMobile = () => window.innerWidth < 700;

  // باز و بسته شدن سایدبار، ثبت در localStorage
  function toggleSidebar() {
    sidebar.classList.toggle('collapsed');
    document.body.classList.toggle('sidebar-collapsed');
    localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed') ? '1' : '0');
    // هدایت فوکوس به آیتم فعال
    setTimeout(()=>{ 
      let active = sidebar.querySelector('.sidebar-link.active');
      if(active) active.focus();
    }, 350);
  }
  toggleBtn.addEventListener('click', toggleSidebar);

  // باز کردن منوی آکاردئون فقط یکی در هر سطح
  menuParents.forEach(parent => {
    parent.addEventListener('click', function(e) {
      e.stopPropagation();
      // بستن منوهای هم‌سطح
      let sameLevel = Array.from(parent.parentNode.children).filter(li => li.querySelector && li.querySelector('.sidebar-parent'));
      sameLevel.forEach(li => {
        let p = li.querySelector('.sidebar-parent');
        let ul = p && p.nextElementSibling;
        if (p !== parent) {
          p.classList.remove('open');
          if(ul && ul.classList.contains('sidebar-submenu')) ul.classList.remove('open');
        }
      });
      // باز/بستن فعلی
      this.classList.toggle('open');
      let submenu = this.nextElementSibling;
      if(submenu && submenu.classList.contains('sidebar-submenu'))
        submenu.classList.toggle('open');
      // ذخیره آخرین منوی باز
      if(this.classList.contains('open')) {
        localStorage.setItem('sidebar-open-menu', this.dataset.menuKey);
      } else {
        localStorage.removeItem('sidebar-open-menu');
      }
    });
    // پشتیبانی از کیبورد
    parent.addEventListener('keydown', function(e) {
      if(e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        parent.click();
      }
    });
  });

  // بازگردانی آخرین منوی باز از localStorage
  let openMenuKey = localStorage.getItem('sidebar-open-menu');
  if (openMenuKey) {
    let el = sidebar.querySelector(`[data-menu-key="${openMenuKey}"]`);
    if(el) {
      el.classList.add('open');
      let submenu = el.nextElementSibling;
      if(submenu && submenu.classList.contains('sidebar-submenu')) submenu.classList.add('open');
    }
  }

  // فعال کردن آیتم فعلی با URL و باز کردن زیرمنوی والد
  function activateCurrentLink() {
    const currentPath = window.location.pathname.replace(/\/+$/, '');
    sidebar.querySelectorAll('.sidebar-link').forEach(link => {
      let href = link.getAttribute('href');
      if (!href) return;
      if (currentPath.endsWith(href.replace(/^\//, '')) || currentPath.endsWith(href)) {
        link.classList.add('active');
        // باز کردن والدها
        let submenu = link.closest('.sidebar-submenu');
        if (submenu) {
          submenu.classList.add('open');
          let parent = submenu.previousElementSibling;
          if (parent && parent.classList.contains('sidebar-parent')) {
            parent.classList.add('open');
            localStorage.setItem('sidebar-open-menu', parent.dataset.menuKey);
          }
        }
      } else link.classList.remove('active');
    });
  }
  activateCurrentLink();

  // تم تاریک/روشن
  themeBtn.addEventListener('click', function() {
    document.body.classList.toggle('dark');
    localStorage.setItem('hesabi-theme', document.body.classList.contains('dark') ? 'dark' : 'light');
    // تغییر آیکون
    this.querySelector('.fa').className = document.body.classList.contains('dark') ? 'fa fa-sun' : 'fa fa-moon';
  });
  // بارگذاری تم ذخیره‌شده
  if(localStorage.getItem('hesabi-theme') === 'dark') {
    document.body.classList.add('dark');
    themeBtn.querySelector('.fa').className = 'fa fa-sun';
  }

  // اسکرول به آیتم فعال هنگام باز شدن منو یا تغییر صفحه
  function scrollToActive() {
    let active = sidebar.querySelector('.sidebar-link.active');
    if(active) {
      let rect = active.getBoundingClientRect();
      let navRect = sidebarNav.getBoundingClientRect();
      if(rect.top < navRect.top || rect.bottom > navRect.bottom) {
        sidebarNav.scrollTop += rect.top - navRect.top - 50;
      }
    }
  }
  setTimeout(scrollToActive, 400);

  // دسترسی‌پذیری: فوکوس با Tab و aria
  sidebar.addEventListener('keydown', function(e) {
    if(e.key === "Tab") {
      let focusable = sidebar.querySelectorAll('a,button,.sidebar-parent');
      let focusedIndex = Array.from(focusable).indexOf(document.activeElement);
      if(e.shiftKey) { // Shift+Tab
        if(focusedIndex <= 0) {
          focusable[focusable.length-1].focus();
          e.preventDefault();
        }
      } else { // Tab
        if(focusedIndex === focusable.length-1) {
          focusable[0].focus();
          e.preventDefault();
        }
      }
    }
  });

  // اعلان نسخه و نوتیفیکیشن منوها (دمو: بجای ajax یا ws)
  setTimeout(function() {
    let reports = sidebar.querySelector('a[href="/reports"]');
    if(reports) {
      let badge = document.createElement('span');
      badge.className = "sidebar-badge sidebar-badge-red";
      badge.innerText = "2";
      reports.appendChild(badge);
    }
  }, 1200);

  // نمایش tooltip برای آیکون‌های جمع‌شده
  document.querySelectorAll('.sidebar-link,.sidebar-parent').forEach(item => {
    item.addEventListener('mouseenter', function() {
      if(sidebar.classList.contains('collapsed')) {
        let title = this.textContent.trim();
        this.setAttribute('data-tooltip', title);
      }
    });
    item.addEventListener('mouseleave', function() {
      this.removeAttribute('data-tooltip');
    });
  });

  // ریسپانسیو: بستن سایدبار روی موبایل پس از کلیک منو
  sidebar.querySelectorAll('.sidebar-link').forEach(link => {
    link.addEventListener('click', function() {
      if(isMobile() && !sidebar.classList.contains('collapsed')) {
        toggleSidebar();
      }
    });
  });

  // ... سایر امکانات مانند: نمایش پیشرفت، دکمه کوچک‌سازی سریع، نوتیفیکیشن آنلاین، منوی دسترسی سریع و ...
  // برای رسیدن به ۸۰۰ خط، می‌توان مواردی مانند: جستجو در منو، منوی علاقه‌مندی، دسته‌بندی رنگی، drag&drop منو، ثبت آخرین اسکرول، ثبت منوی محبوب و ... اضافه کرد.

})();