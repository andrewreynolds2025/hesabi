<aside class="sidebar">
    <div class="sidebar-header">
        <span class="logo">
            <i class="fa-solid fa-calculator"></i>
            <span class="sidebar-title">حسابداری نوین</span>
        </span>
        <button class="sidebar-toggle" title="باز/بستن سایدبار"><i class="fa fa-bars"></i></button>
    </div>
    <div class="sidebar-user">
        <?php echo $_SESSION['user_name'] ?? 'کاربر'; ?> 👋
    </div>
    <nav class="sidebar-nav">
        <ul class="sidebar-menu">
            <li>
                <a href="/hesabi/dashboard.php" class="sidebar-link"><i class="fa fa-chart-line"></i> <span>داشبورد</span></a>
            </li>
            <li>
                <span class="sidebar-parent" data-menu-key="persons"><i class="fa fa-users"></i> <span>اشخاص</span> <i class="fa fa-angle-down"></i></span>
                <ul class="sidebar-submenu">
                    <li><a href="/hesabi/person_new.php" class="sidebar-link"><i class="fa fa-user-plus"></i> <span>شخص جدید</span></a></li>
                    <li><a href="/hesabi/persons.php" class="sidebar-link"><i class="fa fa-address-book"></i> <span>اشخاص</span></a></li>
                    <li>
                        <span class="sidebar-parent" data-menu-key="receipts"><i class="fa fa-arrow-down"></i> <span>دریافت</span> <i class="fa fa-angle-down"></i></span>
                        <ul class="sidebar-submenu">
                            <li><a href="/hesabi/receipts_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست دریافت ها</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="sidebar-parent" data-menu-key="payments"><i class="fa fa-arrow-up"></i> <span>پرداخت</span> <i class="fa fa-angle-down"></i></span>
                        <ul class="sidebar-submenu">
                            <li><a href="/hesabi/payments_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست پرداخت ها</span></a></li>
                        </ul>
                    </li>
                    <li><a href="/hesabi/shareholders.php" class="sidebar-link"><i class="fa fa-user-tie"></i> <span>سهامداران</span></a></li>
                    <li><a href="/hesabi/suppliers.php" class="sidebar-link"><i class="fa fa-user-tag"></i> <span>فروشندگان</span></a></li>
                </ul>
            </li>
            <li>
                <span class="sidebar-parent" data-menu-key="products"><i class="fa fa-boxes-stacked"></i> <span>کالاها و خدمات</span> <i class="fa fa-angle-down"></i></span>
                <ul class="sidebar-submenu">
                    <li><a href="/hesabi/new_product.php" class="sidebar-link"><i class="fa fa-cube"></i> <span>کالای جدید</span></a></li>
                    <li><a href="/hesabi/new_service.php" class="sidebar-link"><i class="fa fa-screwdriver-wrench"></i> <span>خدمات جدید</span></a></li>
                    <li><a href="/hesabi/products_services.php" class="sidebar-link"><i class="fa fa-list-ul"></i> <span>کالاها و خدمات</span></a></li>
                    <li><a href="/hesabi/price_list_update.php" class="sidebar-link"><i class="fa fa-pen-to-square"></i> <span>به روز رسانی لیست قیمت</span></a></li>
                    <li><a href="/hesabi/barcode_print.php" class="sidebar-link"><i class="fa fa-barcode"></i> <span>چاپ بارکد</span></a></li>
                    <li><a href="/hesabi/barcode_print_batch.php" class="sidebar-link"><i class="fa fa-barcode"></i> <span>چاپ بارکد تعدادی</span></a></li>
                    <li><a href="/hesabi/price_list.php" class="sidebar-link"><i class="fa fa-tags"></i> <span>صفحه لیست قیمت کالا</span></a></li>
                </ul>
            </li>
            <li>
                <span class="sidebar-parent" data-menu-key="banking"><i class="fa fa-university"></i> <span>بانکداری</span> <i class="fa fa-angle-down"></i></span>
                <ul class="sidebar-submenu">
                    <li><a href="/hesabi/banks.php" class="sidebar-link"><i class="fa fa-building-columns"></i> <span>بانک ها</span></a></li>
                    <li><a href="/hesabi/funds.php" class="sidebar-link"><i class="fa fa-cash-register"></i> <span>صندوق ها</span></a></li>
                    <li><a href="/hesabi/petty_cash.php" class="sidebar-link"><i class="fa fa-wallet"></i> <span>تنخواه گردان ها</span></a></li>
                    <li><a href="/hesabi/transfer.php" class="sidebar-link"><i class="fa fa-arrow-right-arrow-left"></i> <span>انتقال</span></a></li>
                    <li><a href="/hesabi/transfers_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست انتقال ها</span></a></li>
                    <li><a href="/hesabi/received_checks.php" class="sidebar-link"><i class="fa fa-money-check-dollar"></i> <span>لیست چک های دریافتی</span></a></li>
                    <li><a href="/hesabi/paid_checks.php" class="sidebar-link"><i class="fa fa-money-check"></i> <span>لیست چک های پرداختی</span></a></li>
                </ul>
            </li>
            <li>
                <span class="sidebar-parent" data-menu-key="sales"><i class="fa fa-cart-shopping"></i> <span>فروش و درآمد</span> <i class="fa fa-angle-down"></i></span>
                <ul class="sidebar-submenu">
                    <li><a href="/hesabi/new_sale.php" class="sidebar-link"><i class="fa fa-plus"></i> <span>فروش جدید</span></a></li>
                    <li><a href="/hesabi/quick_invoice.php" class="sidebar-link"><i class="fa fa-bolt"></i> <span>فاکتور سریع</span></a></li>
                    <li><a href="/hesabi/sale_return.php" class="sidebar-link"><i class="fa fa-undo"></i> <span>برگشت از فروش</span></a></li>
                    <li><a href="/hesabi/sale_invoices.php" class="sidebar-link"><i class="fa fa-file-invoice-dollar"></i> <span>فاکتورهای فروش</span></a></li>
                    <li><a href="/hesabi/sale_return_invoices.php" class="sidebar-link"><i class="fa fa-file-invoice"></i> <span>فاکتورهای برگشت از فروش</span></a></li>
                    <li><a href="/hesabi/income.php" class="sidebar-link"><i class="fa fa-coins"></i> <span>درآمد</span></a></li>
                    <li><a href="/hesabi/incomes_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست درآمدها</span></a></li>
                    <li><a href="/hesabi/installment_contract.php" class="sidebar-link"><i class="fa fa-file-contract"></i> <span>قرارداد فروش اقساطی</span></a></li>
                    <li><a href="/hesabi/installment_sales_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست فروش اقساطی</span></a></li>
                    <li><a href="/hesabi/discounted_items.php" class="sidebar-link"><i class="fa fa-tags"></i> <span>اقلام تخفیف دار</span></a></li>
                </ul>
            </li>
            <li>
                <span class="sidebar-parent" data-menu-key="purchase"><i class="fa fa-cart-plus"></i> <span>خرید و هزینه</span> <i class="fa fa-angle-down"></i></span>
                <ul class="sidebar-submenu">
                    <li><a href="/hesabi/new_purchase.php" class="sidebar-link"><i class="fa fa-plus"></i> <span>خرید جدید</span></a></li>
                    <li><a href="/hesabi/purchase_return.php" class="sidebar-link"><i class="fa fa-undo"></i> <span>برگشت از خرید</span></a></li>
                    <li><a href="/hesabi/purchase_invoices.php" class="sidebar-link"><i class="fa fa-file-invoice-dollar"></i> <span>فاکتورهای خرید</span></a></li>
                    <li><a href="/hesabi/purchase_return_invoices.php" class="sidebar-link"><i class="fa fa-file-invoice"></i> <span>فاکتورهای برگشت از خرید</span></a></li>
                    <li>
                        <span class="sidebar-parent" data-menu-key="expenses"><i class="fa fa-money-bill-wave"></i> <span>هزینه</span> <i class="fa fa-angle-down"></i></span>
                        <ul class="sidebar-submenu">
                            <li><a href="/hesabi/expenses_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست هزینه ها</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="sidebar-parent" data-menu-key="wastes"><i class="fa fa-trash"></i> <span>ضایعات</span> <i class="fa fa-angle-down"></i></span>
                        <ul class="sidebar-submenu">
                            <li><a href="/hesabi/wastes_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست ضایعات</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <span class="sidebar-parent" data-menu-key="warehouse"><i class="fa fa-warehouse"></i> <span>انبارداری</span> <i class="fa fa-angle-down"></i></span>
                <ul class="sidebar-submenu">
                    <li><a href="/hesabi/warehouses.php" class="sidebar-link"><i class="fa fa-building"></i> <span>انبارها</span></a></li>
                    <li><a href="/hesabi/new_dispatch.php" class="sidebar-link"><i class="fa fa-truck"></i> <span>حواله جدید</span></a></li>
                    <li><a href="/hesabi/warehouse_docs.php" class="sidebar-link"><i class="fa fa-receipt"></i> <span>رسید و حواله های انبار</span></a></li>
                    <li><a href="/hesabi/stock.php" class="sidebar-link"><i class="fa fa-box"></i> <span>موجودی کالا</span></a></li>
                    <li><a href="/hesabi/all_stocks.php" class="sidebar-link"><i class="fa fa-boxes"></i> <span>موجودی تمامی انبارها</span></a></li>
                    <li><a href="/hesabi/inventory_count.php" class="sidebar-link"><i class="fa fa-list-ol"></i> <span>انبار گردانی</span></a></li>
                </ul>
            </li>
            <li>
                <span class="sidebar-parent" data-menu-key="accounting"><i class="fa fa-scale-balanced"></i> <span>حسابداری</span> <i class="fa fa-angle-down"></i></span>
                <ul class="sidebar-submenu">
                    <li><a href="/hesabi/new_document.php" class="sidebar-link"><i class="fa fa-file-medical"></i> <span>سند جدید</span></a></li>
                    <li><a href="/hesabi/documents_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست اسناد</span></a></li>
                    <li><a href="/hesabi/opening_balance.php" class="sidebar-link"><i class="fa fa-balance-scale-left"></i> <span>تراز افتتاحیه</span></a></li>
                    <li><a href="/hesabi/close_year.php" class="sidebar-link"><i class="fa fa-calendar-xmark"></i> <span>بستن سال مالی</span></a></li>
                    <li><a href="/hesabi/accounts_table.php" class="sidebar-link"><i class="fa fa-table"></i> <span>جدول حساب ها</span></a></li>
                    <li><a href="/hesabi/documents_merge.php" class="sidebar-link"><i class="fa fa-layer-group"></i> <span>تجمیع اسناد</span></a></li>
                </ul>
            </li>
            <li>
                <span class="sidebar-parent" data-menu-key="others"><i class="fa fa-ellipsis-h"></i> <span>سایر</span> <i class="fa fa-angle-down"></i></span>
                <ul class="sidebar-submenu">
                    <li><a href="/hesabi/archive.php" class="sidebar-link"><i class="fa fa-archive"></i> <span>آرشیو</span></a></li>
                    <li><a href="/hesabi/sms_panel.php" class="sidebar-link"><i class="fa fa-comment-dots"></i> <span>پنل پیامک</span></a></li>
                    <li><a href="/hesabi/inquiry.php" class="sidebar-link"><i class="fa fa-circle-question"></i> <span>استعلام</span></a></li>
                    <li>
                        <span class="sidebar-parent" data-menu-key="other_receipts"><i class="fa fa-arrow-down"></i> <span>دریافت سایر</span> <i class="fa fa-angle-down"></i></span>
                        <ul class="sidebar-submenu">
                            <li><a href="/hesabi/other_receipts_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست دریافت ها</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="sidebar-parent" data-menu-key="other_payments"><i class="fa fa-arrow-up"></i> <span>پرداخت سایر</span> <i class="fa fa-angle-down"></i></span>
                        <ul class="sidebar-submenu">
                            <li><a href="/hesabi/other_payments_list.php" class="sidebar-link"><i class="fa fa-list"></i> <span>لیست پرداخت ها</span></a></li>
                        </ul>
                    </li>
                    <li><a href="/hesabi/currency_document.php" class="sidebar-link"><i class="fa fa-coins"></i> <span>سند تسعیر ارز</span></a></li>
                    <li><a href="/hesabi/persons_balance.php" class="sidebar-link"><i class="fa fa-balance-scale"></i> <span>سند توازن اشخاص</span></a></li>
                    <li><a href="/hesabi/items_balance.php" class="sidebar-link"><i class="fa fa-balance-scale"></i> <span>سند توازن کالاها</span></a></li>
                    <li><a href="/hesabi/salary_document.php" class="sidebar-link"><i class="fa fa-money-bill"></i> <span>سند حقوق</span></a></li>
                </ul>
            </li>
            <li>
                <a href="/hesabi/reports.php" class="sidebar-link"><i class="fa fa-chart-pie"></i> <span>گزارش ها</span></a>
            </li>
            <li>
                <a href="/hesabi/settings.php" class="sidebar-link"><i class="fa fa-cog"></i> <span>تنظیمات</span></a>
            </li>
        </ul>
        <a href="/hesabi/logout.php" class="sidebar-link logout-link"><i class="fa fa-sign-out-alt"></i> <span>خروج</span></a>
    </nav>
</aside>