<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

// گرفتن نام صفحه از پارامتر
$page = $_GET['page'] ?? 'dashboard';

$allowedPages = [
    'dashboard', 'persons', 'person_new', 'receipts_list', 'payments_list',
    'shareholders', 'suppliers', 'products', 'new_product', 'new_service', 'products_services',
    'price_list_update', 'barcode_print', 'barcode_print_batch', 'price_list',
    'banking', 'banks', 'funds', 'petty_cash', 'transfer', 'transfers_list', 'received_checks', 'paid_checks',
    'sales', 'new_sale', 'quick_invoice', 'sale_return', 'sale_invoices', 'sale_return_invoices', 'income', 'incomes_list',
    'installment_contract', 'installment_sales_list', 'discounted_items', 'purchase', 'new_purchase', 'purchase_return',
    'purchase_invoices', 'purchase_return_invoices', 'expenses', 'expenses_list', 'wastes', 'wastes_list',
    'warehouse', 'warehouses', 'new_dispatch', 'warehouse_docs', 'stock', 'all_stocks', 'inventory_count',
    'accounting', 'new_document', 'documents_list', 'opening_balance', 'close_year', 'accounts_table', 'documents_merge',
    'others', 'archive', 'sms_panel', 'inquiry', 'other_receipts', 'other_receipts_list', 'other_payments', 'other_payments_list',
    'currency_document', 'persons_balance', 'items_balance', 'salary_document',
    'reports', 'settings', 'login', 'register', 'logout'
];
$noSidebarPages = ['login', 'register', 'landing'];

if (!in_array($page, $allowedPages)) {
    $page = 'dashboard';
}

include "views/sidebar.php";
include "views/{$page}.php";
?>