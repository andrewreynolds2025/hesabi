<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>برنامه حسابداری حرفه‌ای | صفحه لندینگ</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/landing.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <!-- SweetAlert2 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">
    <!-- FontAwesome CDN (برای آیکون‌ها در صورت نیاز) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" href="/assets/logo.svg" type="image/svg+xml">
</head>
<body>
    <!-- سایدبار (در صفحات داخلی فعال است) -->
    <!-- هدر -->
    <header class="landing-header">
        <div class="container">
            <div class="logo-3d">
                <img src="/assets/logo.svg" alt="لوگو حسابداری">
                <span>حسابداری نوین</span>
            </div>
            <nav class="landing-nav">
                <ul>
                    <li><a href="#features">ویژگی‌ها</a></li>
                    <li><a href="#faq">سوالات متداول</a></li>
                    <li><a href="#contact">تماس</a></li>
                </ul>
            </nav>
            <div class="landing-actions">
                <a href="/login" class="btn btn-login">ورود</a>
                <a href="/register" class="btn btn-register">ثبت‌نام</a>
            </div>
        </div>
    </header>
    <!-- بنر اصلی -->
    <section class="landing-hero">
        <div class="hero-bg-3d"></div>
        <div class="container hero-content">
            <h1 class="hero-title">برنامه حسابداری <span class="gradient-text">هوشمند</span> و مدرن</h1>
            <p class="hero-desc">ساده، سریع، سه‌بعدی و کاملاً ایرانی با امکانات مدیریت مالی و گزارش‌گیری حرفه‌ای</p>
            <a href="/register" class="btn btn-cta">همین حالا شروع کنید</a>
        </div>
        <div class="parallax-shapes">
            <div class="shape shape1"></div>
            <div class="shape shape2"></div>
            <div class="shape shape3"></div>
        </div>
    </section>
    <!-- بخش ویژگی‌ها -->
    <section id="features" class="features-section">
        <div class="container">
            <h2>ویژگی‌های بی‌نظیر</h2>
            <div class="features-list">
                <div class="feature-card card-3d">
                    <img src="/assets/img/feature1.svg" alt="سادگی">
                    <h3>سادگی رابط کاربری</h3>
                    <p>طراحی کاملاً ساده، قابل فهم و مناسب کاربران فارسی‌زبان</p>
                </div>
                <div class="feature-card card-3d">
                    <img src="/assets/img/feature2.svg" alt="امنیت">
                    <h3>امنیت بالا</h3>
                    <p>استفاده از استانداردهای روز امنیتی در نگهداری اطلاعات مالی</p>
                </div>
                <div class="feature-card card-3d">
                    <img src="/assets/img/feature3.svg" alt="چارت‌ها">
                    <h3>گزارش‌گیری تصویری</h3>
                    <p>نمایش نمودار و چارت‌های مالی به صورت حرفه‌ای و سه‌بعدی</p>
                </div>
                <div class="feature-card card-3d">
                    <img src="/assets/img/feature4.svg" alt="ریسپانسیو">
                    <h3>کاملاً ریسپانسیو</h3>
                    <p>نمایش عالی در موبایل، تبلت و دسکتاپ</p>
                </div>
            </div>
        </div>
    </section>
    <!-- اسلایدر مشتریان -->
    <section class="clients-section">
        <div class="container">
            <h2>نظرات مشتریان</h2>
            <div class="clients-slider" id="clients-slider">
                <div class="client-card">
                    <div class="client-avatar"><img src="/assets/img/client1.jpg" alt="کاربر ۱"></div>
                    <div class="client-comment">واقعا ساده و سریع و شیکه، عالیه!</div>
                    <span class="client-name">زهرا موسوی</span>
                </div>
                <div class="client-card">
                    <div class="client-avatar"><img src="/assets/img/client2.jpg" alt="کاربر ۲"></div>
                    <div class="client-comment">امکانات گزارش‌گیری خیلی عالی داره.</div>
                    <span class="client-name">علی محمدی</span>
                </div>
                <div class="client-card">
                    <div class="client-avatar"><img src="/assets/img/client3.jpg" alt="کاربر ۳"></div>
                    <div class="client-comment">سریع‌ترین برنامه حسابداری که دیدم.</div>
                    <span class="client-name">رضا احمدی</span>
                </div>
            </div>
            <div class="slider-controls">
                <button id="prev-client" aria-label="قبلی">‹</button>
                <button id="next-client" aria-label="بعدی">›</button>
            </div>
        </div>
    </section>
    <!-- سوالات متداول -->
    <section id="faq" class="faq-section">
        <div class="container">
            <h2>سوالات متداول</h2>
            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question">آیا اطلاعات من امن است؟</button>
                    <div class="faq-answer">بله، اطلاعات شما با جدیدترین روش‌های امنیتی محافظت می‌شود.</div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">آیا نسخه موبایل هم دارد؟</button>
                    <div class="faq-answer">بله، برنامه کاملاً ریسپانسیو بوده و در موبایل به‌خوبی کار می‌کند.</div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">آیا استفاده از برنامه رایگان است؟</button>
                    <div class="faq-answer">بله، نسخه پایه کاملاً رایگان است.</div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">چگونه ثبت‌نام کنم؟</button>
                    <div class="faq-answer">روی دکمه ثبت‌نام بالا کلیک کنید و فرم را پر کنید.</div>
                </div>
            </div>
        </div>
    </section>
    <!-- فرم تماس -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2>تماس سریع با ما</h2>
            <form id="contact-form">
                <div class="form-group">
                    <label for="contact-name">نام</label>
                    <input type="text" id="contact-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="contact-email">ایمیل</label>
                    <input type="email" id="contact-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="contact-message">پیام</label>
                    <textarea id="contact-message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-contact">ارسال پیام</button>
            </form>
        </div>
    </section>
    <!-- فوتر -->
    <footer class="landing-footer">
        <div class="container">
            <span>تمام حقوق محفوظ است © <?php echo date('Y'); ?> حسابداری نوین</span>
        </div>
    </footer>
    <!-- اسکریپت‌ها -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    <!-- فایل JS اختصاصی پروژه -->
    <script src="assets/js/landing.js"></script>
</body>
</html>