<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>داشبورد مدیریتی | حسابداری مدرن</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- فونت انجمن مکس -->
    <link rel="stylesheet" href="assets/fonts/anjoman/font-face.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <script src="assets/js/sidebar.js"></script>
    <main class="dashboard-main">
        <h1 class="dashboard-title">داشبورد مدیریتی</h1>
        <div class="charts-grid">
            <div class="chart-card"><canvas id="chart1"></canvas></div>
            <div class="chart-card"><canvas id="chart2"></canvas></div>
            <div class="chart-card"><canvas id="chart3"></canvas></div>
            <div class="chart-card"><canvas id="chart4"></canvas></div>
            <div class="chart-card"><canvas id="chart5"></canvas></div>
            <div class="chart-card"><canvas id="chart6"></canvas></div>
            <div class="chart-card"><canvas id="chart7"></canvas></div>
            <div class="chart-card"><canvas id="chart8"></canvas></div>
            <div class="chart-card"><canvas id="chart9"></canvas></div>
            <div class="chart-card"><canvas id="chart10"></canvas></div>
        </div>
    </main>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/sidebar.js"></script>
</body>
</html>