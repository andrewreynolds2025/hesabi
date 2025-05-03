<aside class="sidebar" id="mainSidebar" aria-label="منوی اصلی">
  <div class="sidebar-header">
    <span class="sidebar-logo">
      <i class="fa-solid fa-calculator"></i>
      <span class="sidebar-title">حسابداری نوین</span>
    </span>
    <button class="sidebar-toggle" aria-label="باز/بستن منو" tabindex="0">
      <i class="fa fa-bars"></i>
    </button>
  </div>
  <div class="sidebar-user">
    <img src="/assets/img/avatar.svg" alt="آواتار کاربر" class="sidebar-avatar" />
    <span><?php echo $_SESSION['user_name'] ?? 'کاربر'; ?> 👋</span>
    <span class="sidebar-role">مدیر سیستم</span>
  </div>
  <nav class="sidebar-nav" aria-label="ناوبری">
    <ul class="sidebar-menu" id="sidebarMenu" role="menu">
      <li><a href="/dashboard" class="sidebar-link" role="menuitem" tabindex="0"><i class="fa fa-home"></i> <span>داشبورد</span></a></li>
      <li>
        <span class="sidebar-parent" data-menu-key="persons" tabindex="0" aria-expanded="false"><i class="fa fa-users"></i> <span>اشخاص</span> <i class="fa fa-angle-down"></i></span>
        <ul class="sidebar-submenu" role="group">
          <li><a href="/person_new" class="sidebar-link"><i class="fa fa-user-plus"></i> <span>شخص جدید</span></a></li>
          <li><a href="/persons" class="sidebar-link"><i class="fa fa-address-book"></i> <span>اشخاص</span></a></li>
          <li>
            <span class="sidebar-parent" data-menu-key="receipts" tabindex="0"><i class="fa fa-arrow-down"></i> <span>دریافت</span> <i class="fa fa-angle-down"></i></span>
            <ul class="sidebar-submenu">
              <li><a href="/receipts_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست دریافت ها</span></a></li>
            </ul>
          </li>
          <li>
            <span class="sidebar-parent" data-menu-key="payments" tabindex="0"><i class="fa fa-arrow-up"></i> <span>پرداخت</span> <i class="fa fa-angle-down"></i></span>
            <ul class="sidebar-submenu">
              <li><a href="/payments_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست پرداخت ها</span></a></li>
            </ul>
          </li>
          <li><a href="/shareholders" class="sidebar-link"><i class="fa fa-user-tie"></i> <span>سهامداران</span></a></li>
          <li><a href="/suppliers" class="sidebar-link"><i class="fa fa-user-tag"></i> <span>فروشندگان</span></a></li>
        </ul>
      </li>
      <li>
        <span class="sidebar-parent" data-menu-key="products" tabindex="0"><i class="fa fa-boxes-stacked"></i> <span>کالاها و خدمات</span> <i class="fa fa-angle-down"></i></span>
        <ul class="sidebar-submenu">
          <li><a href="/new_product" class="sidebar-link"><i class="fa fa-cube"></i> <span>کالای جدید</span></a></li>
          <li><a href="/new_service" class="sidebar-link"><i class="fa fa-screwdriver-wrench"></i> <span>خدمات جدید</span></a></li>
          <li><a href="/products_services" class="sidebar-link"><i class="fa fa-list-ul"></i> <span>کالاها و خدمات</span></a></li>
          <li><a href="/price_list_update" class="sidebar-link"><i class="fa fa-pen-to-square"></i> <span>به روز رسانی لیست قیمت</span></a></li>
          <li><a href="/barcode_print" class="sidebar-link"><i class="fa fa-barcode"></i> <span>چاپ بارکد</span></a></li>
          <li><a href="/barcode_print_batch" class="sidebar-link"><i class="fa fa-barcode"></i> <span>چاپ بارکد تعدادی</span></a></li>
          <li><a href="/price_list" class="sidebar-link"><i class="fa fa-tags"></i> <span>صفحه لیست قیمت کالا</span></a></li>
        </ul>
      </li>
      <li>
        <span class="sidebar-parent" data-menu-key="banking" tabindex="0"><i class="fa fa-university"></i> <span>بانکداری</span> <i class="fa fa-angle-down"></i></span>
        <ul class="sidebar-submenu">
          <li><a href="/banks" class="sidebar-link"><i class="fa fa-building-columns"></i> <span>بانک ها</span></a></li>
          <li><a href="/funds" class="sidebar-link"><i class="fa fa-cash-register"></i> <span>صندوق ها</span></a></li>
          <li><a href="/petty_cash" class="sidebar-link"><i class="fa fa-wallet"></i> <span>تنخواه گردان ها</span></a></li>
          <li><a href="/transfer" class="sidebar-link"><i class="fa fa-arrow-right-arrow-left"></i> <span>انتقال</span></a></li>
          <li><a href="/transfers_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست انتقال ها</span></a></li>
          <li><a href="/received_checks" class="sidebar-link"><i class="fa fa-money-check-dollar"></i> <span>لیست چک های دریافتی</span></a></li>
          <li><a href="/paid_checks" class="sidebar-link"><i class="fa fa-money-check"></i> <span>لیست چک های پرداختی</span></a></li>
        </ul>
      </li>
      <li>
        <span class="sidebar-parent" data-menu-key="sales" tabindex="0"><i class="fa fa-cart-shopping"></i> <span>فروش و درآمد</span> <i class="fa fa-angle-down"></i></span>
        <ul class="sidebar-submenu">
          <li><a href="/new_sale" class="sidebar-link"><i class="fa fa-plus"></i> <span>فروش جدید</span></a></li>
          <li><a href="/quick_invoice" class="sidebar-link"><i class="fa fa-bolt"></i> <span>فاکتور سریع</span></a></li>
          <li><a href="/sale_return" class="sidebar-link"><i class="fa fa-undo"></i> <span>برگشت از فروش</span></a></li>
          <li><a href="/sale_invoices" class="sidebar-link"><i class="fa fa-file-invoice-dollar"></i> <span>فاکتورهای فروش</span></a></li>
          <li><a href="/sale_return_invoices" class="sidebar-link"><i class="fa fa-file-invoice"></i> <span>فاکتورهای برگشت از فروش</span></a></li>
          <li><a href="/income" class="sidebar-link"><i class="fa fa-coins"></i> <span>درآمد</span></a></li>
          <li><a href="/incomes_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست درآمدها</span></a></li>
          <li><a href="/installment_contract" class="sidebar-link"><i class="fa fa-file-contract"></i> <span>قرارداد فروش اقساطی</span></a></li>
          <li><a href="/installment_sales_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست فروش اقساطی</span></a></li>
          <li><a href="/discounted_items" class="sidebar-link"><i class="fa fa-tags"></i> <span>اقلام تخفیف دار</span></a></li>
        </ul>
      </li>
      <li>
        <span class="sidebar-parent" data-menu-key="purchase" tabindex="0"><i class="fa fa-cart-plus"></i> <span>خرید و هزینه</span> <i class="fa fa-angle-down"></i></span>
        <ul class="sidebar-submenu">
          <li><a href="/new_purchase" class="sidebar-link"><i class="fa fa-plus"></i> <span>خرید جدید</span></a></li>
          <li><a href="/purchase_return" class="sidebar-link"><i class="fa fa-undo"></i> <span>برگشت از خرید</span></a></li>
          <li><a href="/purchase_invoices" class="sidebar-link"><i class="fa fa-file-invoice-dollar"></i> <span>فاکتورهای خرید</span></a></li>
          <li><a href="/purchase_return_invoices" class="sidebar-link"><i class="fa fa-file-invoice"></i> <span>فاکتورهای برگشت از خرید</span></a></li>
          <li>
            <span class="sidebar-parent" data-menu-key="expenses" tabindex="0"><i class="fa fa-money-bill-wave"></i> <span>هزینه</span> <i class="fa fa-angle-down"></i></span>
            <ul class="sidebar-submenu">
              <li><a href="/expenses_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست هزینه ها</span></a></li>
            </ul>
          </li>
          <li>
            <span class="sidebar-parent" data-menu-key="wastes" tabindex="0"><i class="fa fa-trash"></i> <span>ضایعات</span> <i class="fa fa-angle-down"></i></span>
            <ul class="sidebar-submenu">
              <li><a href="/wastes_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست ضایعات</span></a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li>
        <span class="sidebar-parent" data-menu-key="warehouse" tabindex="0"><i class="fa fa-warehouse"></i> <span>انبارداری</span> <i class="fa fa-angle-down"></i></span>
        <ul class="sidebar-submenu">
          <li><a href="/warehouses" class="sidebar-link"><i class="fa fa-building"></i> <span>انبارها</span></a></li>
          <li><a href="/new_dispatch" class="sidebar-link"><i class="fa fa-truck"></i> <span>حواله جدید</span></a></li>
          <li><a href="/warehouse_docs" class="sidebar-link"><i class="fa fa-receipt"></i> <span>رسید و حواله های انبار</span></a></li>
          <li><a href="/stock" class="sidebar-link"><i class="fa fa-box"></i> <span>موجودی کالا</span></a></li>
          <li><a href="/all_stocks" class="sidebar-link"><i class="fa fa-boxes"></i> <span>موجودی تمامی انبارها</span></a></li>
          <li><a href="/inventory_count" class="sidebar-link"><i class="fa fa-list-ol"></i> <span>انبار گردانی</span></a></li>
        </ul>
      </li>
      <li>
        <span class="sidebar-parent" data-menu-key="accounting" tabindex="0"><i class="fa fa-scale-balanced"></i> <span>حسابداری</span> <i class="fa fa-angle-down"></i></span>
        <ul class="sidebar-submenu">
          <li><a href="/new_document" class="sidebar-link"><i class="fa fa-file-medical"></i> <span>سند جدید</span></a></li>
          <li><a href="/documents_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست اسناد</span></a></li>
          <li><a href="/opening_balance" class="sidebar-link"><i class="fa fa-balance-scale-left"></i> <span>تراز افتتاحیه</span></a></li>
          <li><a href="/close_year" class="sidebar-link"><i class="fa fa-calendar-xmark"></i> <span>بستن سال مالی</span></a></li>
          <li><a href="/accounts_table" class="sidebar-link"><i class="fa fa-table"></i> <span>جدول حساب ها</span></a></li>
          <li><a href="/documents_merge" class="sidebar-link"><i class="fa fa-layer-group"></i> <span>تجمیع اسناد</span></a></li>
        </ul>
      </li>
      <li>
        <span class="sidebar-parent" data-menu-key="others" tabindex="0"><i class="fa fa-ellipsis-h"></i> <span>سایر</span> <i class="fa fa-angle-down"></i></span>
        <ul class="sidebar-submenu">
          <li><a href="/archive" class="sidebar-link"><i class="fa fa-archive"></i> <span>آرشیو</span></a></li>
          <li><a href="/sms_panel" class="sidebar-link"><i class="fa fa-comment-dots"></i> <span>پنل پیامک</span></a></li>
          <li><a href="/inquiry" class="sidebar-link"><i class="fa fa-circle-question"></i> <span>استعلام</span></a></li>
          <li>
            <span class="sidebar-parent" data-menu-key="other_receipts" tabindex="0"><i class="fa fa-arrow-down"></i> <span>دریافت سایر</span> <i class="fa fa-angle-down"></i></span>
            <ul class="sidebar-submenu">
              <li><a href="/other_receipts_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست دریافت ها</span></a></li>
            </ul>
          </li>
          <li>
            <span class="sidebar-parent" data-menu-key="other_payments" tabindex="0"><i class="fa fa-arrow-up"></i> <span>پرداخت سایر</span> <i class="fa fa-angle-down"></i></span>
            <ul class="sidebar-submenu">
              <li><a href="/other_payments_list" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست پرداخت ها</span></a></li>
            </ul>
          </li>
          <li><a href="/currency_document" class="sidebar-link"><i class="fa fa-coins"></i> <span>سند تسعیر ارز</span></a></li>
          <li><a href="/persons_balance" class="sidebar-link"><i class="fa fa-balance-scale"></i> <span>سند توازن اشخاص</span></a></li>
          <li><a href="/items_balance" class="sidebar-link"><i class="fa fa-balance-scale"></i> <span>سند توازن کالاها</span></a></li>
          <li><a href="/salary_document" class="sidebar-link"><i class="fa fa-money-bill"></i> <span>سند حقوق</span></a></li>
        </ul>
      </li>
      <li><a href="/reports" class="sidebar-link"><i class="fa fa-chart-pie"></i> <span>گزارش ها</span></a></li>
      <li><a href="/settings" class="sidebar-link"><i class="fa fa-cog"></i> <span>تنظیمات</span></a></li>
    </ul>
    <a href="/logout" class="sidebar-link logout-link"><i class="fa fa-sign-out-alt"></i> <span>خروج</span></a>
  </nav>
  <div class="sidebar-footer">
    <button class="sidebar-theme-toggle" aria-label="تغییر تم"><i class="fa fa-moon"></i></button>
    <span class="sidebar-app-version">v2.3.1</span>
    <a href="https://support.hesabi.ir" target="_blank" class="sidebar-support-link" title="پشتیبانی"><i class="fa fa-life-ring"></i></a>
  </div>
</aside>