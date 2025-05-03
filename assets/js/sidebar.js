/**
 * سایدبار پیشرفته با امکانات:
 * - آکاردئون چندسطحی
 * - ذخیره آخرین منوی باز و آخرین اسکرول
 * - جستجو در منو
 * - علاقه‌مندی (ستاره‌دار کردن منو)
 * - دسته‌بندی رنگی (برچسب رنگ)
 * - drag & drop منوها
 * - شمارنده محبوبیت هر منو
 * - ریسپانسیو و دسترسی‌پذیر
 */

document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.getElementById('mainSidebar');
  if (!sidebar) return;
  const toggleBtn = sidebar.querySelector('.sidebar-toggle');
  const menuParents = sidebar.querySelectorAll('.sidebar-parent');
  const sidebarNav = sidebar.querySelector('.sidebar-nav');
  const sidebarLinks = sidebar.querySelectorAll('.sidebar-link');
  const searchBox = createSearchBox();
  const favKey = 'sidebar-favorites';
  const popKey = 'sidebar-popular';
  const colorKey = 'sidebar-colors';
  const scKey = 'sidebar-scrollTop';
  const dragKey = 'sidebar-customOrder';

  // جستجو را به ابتدای منو اضافه کن
  sidebarNav.prepend(searchBox);

  // --- 1. باز/بستن کل سایدبار
  if (toggleBtn) {
    toggleBtn.addEventListener('click', function () {
      sidebar.classList.toggle('collapsed');
      document.body.classList.toggle('sidebar-collapsed');
      localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed') ? '1' : '0');
    });
    // بازگردانی وضعیت قبلی
    if (localStorage.getItem('sidebar-collapsed') === '1') {
      sidebar.classList.add('collapsed');
      document.body.classList.add('sidebar-collapsed');
    }
  }

  // --- 2. آکاردئون (باز/بستن منوها، چندسطحی و ذخیره آخرین باز)
  menuParents.forEach(function (parent) {
    parent.addEventListener('click', function (e) {
      e.stopPropagation();
      // بستن سایر منوهای هم‌سطح
      let ul = parent.parentElement.parentElement;
      if (ul && (ul.classList.contains('sidebar-menu') || ul.classList.contains('sidebar-submenu'))) {
        ul.querySelectorAll(':scope > li > .sidebar-parent.open').forEach(function (otherParent) {
          if (otherParent !== parent) {
            otherParent.classList.remove('open');
            let sub = otherParent.nextElementSibling;
            if (sub && sub.classList.contains('sidebar-submenu')) sub.classList.remove('open');
          }
        });
      }
      // باز/بستن فعلی
      parent.classList.toggle('open');
      let submenu = parent.nextElementSibling;
      if (submenu && submenu.classList.contains('sidebar-submenu')) {
        submenu.classList.toggle('open');
      }
      // ذخیره آخرین منوی باز
      if (parent.classList.contains('open')) {
        localStorage.setItem('sidebar-open-menu', parent.getAttribute('data-menu-key'));
      } else {
        localStorage.removeItem('sidebar-open-menu');
      }
    });
    parent.addEventListener('keydown', function (e) {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        parent.click();
      }
    });
  });
  // بازگردانی آخرین منوی باز
  let openMenuKey = localStorage.getItem('sidebar-open-menu');
  if (openMenuKey) {
    let openParent = sidebar.querySelector(`[data-menu-key="${openMenuKey}"]`);
    if (openParent) {
      openParent.classList.add('open');
      let submenu = openParent.nextElementSibling;
      if (submenu && submenu.classList.contains('sidebar-submenu')) submenu.classList.add('open');
    }
  }

  // --- 3. فعال‌سازی آیتم فعلی و والدها
  function activateCurrentLink() {
    const currentPath = window.location.pathname.replace(/\/+$/, '');
    sidebarLinks.forEach(function (link) {
      let href = link.getAttribute('href');
      if (!href) return link.classList.remove('active');
      if (currentPath.endsWith(href.replace(/^\//, '')) || currentPath.endsWith(href)) {
        link.classList.add('active');
        // اگر در زیرمنو بود، والدها را باز کن
        let submenu = link.closest('.sidebar-submenu');
        if (submenu) {
          submenu.classList.add('open');
          let parent = submenu.previousElementSibling;
          if (parent && parent.classList.contains('sidebar-parent')) {
            parent.classList.add('open');
            localStorage.setItem('sidebar-open-menu', parent.getAttribute('data-menu-key'));
          }
        }
      } else {
        link.classList.remove('active');
      }
    });
  }
  activateCurrentLink();

  // --- 4. جستجوی زنده در منو
  searchBox.addEventListener('input', function () {
    let term = this.value.trim().toLowerCase();
    sidebarLinks.forEach(function (link) {
      if (link.textContent.toLowerCase().includes(term)) {
        link.parentElement.style.display = '';
        openParents(link);
      } else {
        link.parentElement.style.display = 'none';
      }
    });
    menuParents.forEach(function (parent) {
      if ([...parent.parentElement.children].some(li => li.style.display !== 'none')) {
        parent.style.display = '';
      } else {
        parent.style.display = 'none';
      }
    });
  });
  function openParents(link) {
    let submenu = link.closest('.sidebar-submenu');
    if (submenu) {
      submenu.classList.add('open');
      let parent = submenu.previousElementSibling;
      if (parent && parent.classList.contains('sidebar-parent')) parent.classList.add('open');
    }
  }

  // --- 5. علاقه‌مندی (ستاره)
  sidebarLinks.forEach(function (link) {
    let star = document.createElement('span');
    star.className = 'sidebar-fav-star';
    star.innerHTML = '★';
    link.appendChild(star);
    star.addEventListener('click', function (e) {
      e.stopPropagation();
      let favs = getFavs();
      let href = link.getAttribute('href');
      if (favs.includes(href)) {
        favs = favs.filter(f => f !== href);
        star.classList.remove('fav');
      } else {
        favs.push(href);
        star.classList.add('fav');
      }
      setFavs(favs);
      sortFavs();
    });
    // برگرداندن علاقه‌مندی‌ها
    if (getFavs().includes(link.getAttribute('href'))) star.classList.add('fav');
  });
  function getFavs() {
    try { return JSON.parse(localStorage.getItem(favKey) || '[]'); } catch { return []; }
  }
  function setFavs(favs) { localStorage.setItem(favKey, JSON.stringify(favs)); }
  function sortFavs() {
    let favs = getFavs();
    let ul = sidebar.querySelector('.sidebar-menu');
    let items = [...ul.querySelectorAll('li')];
    items.sort((a, b) => {
      let ah = a.querySelector('.sidebar-link') && favs.includes(a.querySelector('.sidebar-link').getAttribute('href'));
      let bh = b.querySelector('.sidebar-link') && favs.includes(b.querySelector('.sidebar-link').getAttribute('href'));
      if (ah && !bh) return -1;
      if (!ah && bh) return 1;
      return 0;
    });
    items.forEach(item => ul.appendChild(item));
  }
  sortFavs();

  // --- 6. برچسب رنگی روی هر منو (دسته‌بندی رنگی)
  sidebarLinks.forEach(function (link) {
    let colorDot = document.createElement('span');
    colorDot.className = 'color-dot';
    colorDot.title = 'انتخاب رنگ';
    colorDot.style.background = getColor(link.getAttribute('href'));
    link.appendChild(colorDot);
    colorDot.addEventListener('click', function (e) {
      e.stopPropagation();
      let color = prompt('کد رنگ HEX (مثال: #fa0 یا #20e3b2):', colorDot.style.background);
      if (color) {
        colorDot.style.background = color;
        setColor(link.getAttribute('href'), color);
      }
    });
  });
  function getColor(href) {
    let colors = {};
    try { colors = JSON.parse(localStorage.getItem(colorKey) || '{}'); } catch { }
    return colors[href] || '#eee';
  }
  function setColor(href, color) {
    let colors = {};
    try { colors = JSON.parse(localStorage.getItem(colorKey) || '{}'); } catch { }
    colors[href] = color;
    localStorage.setItem(colorKey, JSON.stringify(colors));
  }

  // --- 7. Drag & Drop منوهای اصلی
  let dragging = null;
  let ulMenu = sidebar.querySelector('.sidebar-menu');
  ulMenu.querySelectorAll('li').forEach(function (li) {
    li.setAttribute('draggable', 'true');
    li.addEventListener('dragstart', function (e) {
      dragging = li;
      setTimeout(() => li.classList.add('dragging'), 0);
    });
    li.addEventListener('dragend', function (e) {
      dragging = null;
      li.classList.remove('dragging');
      saveOrder();
    });
    li.addEventListener('dragover', function (e) {
      e.preventDefault();
      if (dragging && dragging !== li) {
        ulMenu.insertBefore(dragging, li);
      }
    });
  });
  // بازگردانی ترتیب منو
  let order = JSON.parse(localStorage.getItem(dragKey) || '[]');
  if (order.length > 0) {
    let liMap = {};
    ulMenu.querySelectorAll('li').forEach(li => {
      let link = li.querySelector('.sidebar-link');
      if (link) liMap[link.getAttribute('href')] = li;
    });
    order.forEach(href => {
      if (liMap[href]) ulMenu.appendChild(liMap[href]);
    });
  }
  function saveOrder() {
    let arr = [];
    ulMenu.querySelectorAll('li .sidebar-link').forEach(link => arr.push(link.getAttribute('href')));
    localStorage.setItem(dragKey, JSON.stringify(arr));
  }

  // --- 8. شمارنده محبوبیت (کلیک هر منو)
  sidebarLinks.forEach(function (link) {
    let href = link.getAttribute('href');
    let pop = getPopular();
    let badge = document.createElement('span');
    badge.className = 'sidebar-pop-badge';
    badge.innerText = pop[href] || '0';
    link.appendChild(badge);
    link.addEventListener('click', function () {
      let pop = getPopular();
      pop[href] = (pop[href] || 0) + 1;
      localStorage.setItem(popKey, JSON.stringify(pop));
      badge.innerText = pop[href];
    });
  });
  function getPopular() {
    try { return JSON.parse(localStorage.getItem(popKey) || '{}'); } catch { return {}; }
  }

  // --- 9. ثبت و بازگردانی اسکرول سایدبار
  if (sidebarNav) {
    sidebarNav.scrollTop = parseInt(localStorage.getItem(scKey) || '0');
    sidebarNav.addEventListener('scroll', function () {
      localStorage.setItem(scKey, sidebarNav.scrollTop);
    });
  }

  // --- 10. دسترسی‌پذیری: Tab و کنترل فوکوس
  sidebar.addEventListener('keydown', function (e) {
    if (e.key === "Tab") {
      let focusable = sidebar.querySelectorAll('a,button,.sidebar-parent');
      let focusedIndex = Array.from(focusable).indexOf(document.activeElement);
      if (e.shiftKey) {
        if (focusedIndex <= 0) {
          focusable[focusable.length - 1].focus();
          e.preventDefault();
        }
      } else {
        if (focusedIndex === focusable.length - 1) {
          focusable[0].focus();
          e.preventDefault();
        }
      }
    }
  });

  // --- 11. Tooltip برای منوی جمع‌شده
  sidebar.querySelectorAll('.sidebar-link,.sidebar-parent').forEach(function (item) {
    item.addEventListener('mouseenter', function () {
      if (sidebar.classList.contains('collapsed')) {
        let title = this.textContent.trim();
        this.setAttribute('data-tooltip', title);
      }
    });
    item.addEventListener('mouseleave', function () {
      this.removeAttribute('data-tooltip');
    });
  });

  // --- 12. ریسپانسیو: بستن سایدبار موبایل پس از کلیک منو
  function isMobile() { return window.innerWidth < 700; }
  sidebarLinks.forEach(function (link) {
    link.addEventListener('click', function () {
      if (isMobile() && !sidebar.classList.contains('collapsed')) {
        sidebar.classList.add('collapsed');
        document.body.classList.add('sidebar-collapsed');
        localStorage.setItem('sidebar-collapsed', '1');
      }
    });
  });

  // --- ابزار جستجو ساز
  function createSearchBox() {
    let box = document.createElement('input');
    box.type = 'text';
    box.placeholder = 'جستجو در منو...';
    box.className = 'sidebar-searchbox';
    box.style.margin = '12px 10px 8px 10px';
    box.style.borderRadius = '8px';
    box.style.padding = '7px 12px';
    box.style.width = 'calc(100% - 24px)';
    box.style.fontSize = '1em';
    return box;
  }

});