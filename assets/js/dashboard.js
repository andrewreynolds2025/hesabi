// نمونه داده تصادفی برای چارت‌ها
function randomData(count, min=10, max=100) {
    return Array.from({length: count}, () => Math.floor(Math.random() * (max-min+1)) + min);
}

// تنظیمات پایه چارت
const chartConfigs = [
    { type: 'line',    label: 'روند فروش',         color: '#0d99ff' },
    { type: 'bar',     label: 'درآمد ماهانه',      color: '#20e3b2' },
    { type: 'pie',     label: 'سهم بازار',         color: ['#0d99ff','#20e3b2','#ff9800'] },
    { type: 'doughnut',label: 'تقسیم هزینه',       color: ['#0d99ff','#20e3b2','#ff9800','#ff3d3d'] },
    { type: 'radar',   label: 'عملکرد دپارتمان',   color: '#0d99ff' },
    { type: 'polarArea',label: 'پراکندگی منابع',   color: ['#0d99ff','#20e3b2','#ff9800','#ff3d3d','#999'] },
    { type: 'bar',     label: 'مشتریان جدید',      color: '#ff9800' },
    { type: 'line',    label: 'نرخ رشد',           color: '#ff3d3d' },
    { type: 'line',    label: 'بستانکاران و بدهکاران', color: '#999' },
    { type: 'bar',     label: 'تعداد تراکنش‌ها',   color: '#0d99ff' }
];

window.addEventListener('DOMContentLoaded', () => {
    chartConfigs.forEach((cfg, i) => {
        const ctx = document.getElementById(`chart${i+1}`).getContext('2d');
        let data, options = {};
        switch(cfg.type) {
            case 'line':
                data = {
                    labels: ['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی'],
                    datasets: [{
                        label: cfg.label,
                        data: randomData(10),
                        borderColor: cfg.color,
                        backgroundColor: cfg.color + '30',
                        fill: true,
                        tension: 0.4
                    }]
                };
                options = { plugins: { legend: { display: false } } };
                break;
            case 'bar':
                data = {
                    labels: ['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی'],
                    datasets: [{
                        label: cfg.label,
                        data: randomData(10, 20, 180),
                        backgroundColor: cfg.color
                    }]
                };
                options = { plugins: { legend: { display: false } } };
                break;
            case 'pie':
            case 'doughnut':
            case 'polarArea':
                let pieLabels = ['محصول A','محصول B','محصول C','محصول D','محصول E'];
                data = {
                    labels: pieLabels.slice(0, cfg.color.length),
                    datasets: [{
                        label: cfg.label,
                        data: randomData(cfg.color.length, 5, 40),
                        backgroundColor: cfg.color
                    }]
                };
                break;
            case 'radar':
                data = {
                    labels: ['مالی','فروش','منابع انسانی','آی‌تی','بازاریابی'],
                    datasets: [{
                        label: cfg.label,
                        data: randomData(5, 60, 100),
                        backgroundColor: '#0d99ff44',
                        borderColor: '#0d99ff',
                        pointBackgroundColor: '#20e3b2'
                    }]
                };
                break;
        }
        new Chart(ctx, {
            type: cfg.type,
            data: data,
            options: options
        });
    });
});