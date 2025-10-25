<?php
require_once 'config/config.php';
require_once 'includes/functions.php';

$lang = getCurrentLang();
$db = Database::getInstance()->getConnection();

// Get services
$stmt = $db->prepare("SELECT * FROM services WHERE is_active = 1 ORDER BY display_order ASC");
$stmt->execute();
$services = $stmt->fetchAll();

// Get featured projects
$stmt = $db->prepare("SELECT * FROM projects WHERE is_active = 1 AND is_featured = 1 ORDER BY display_order ASC LIMIT 6");
$stmt->execute();
$projects = $stmt->fetchAll();

// Get recent posts
$stmt = $db->prepare("SELECT * FROM posts WHERE is_active = 1 ORDER BY published_at DESC LIMIT 3");
$stmt->execute();
$posts = $stmt->fetchAll();

// Get settings
$settings = getSettings();

$pageTitle = $lang === 'ar' ? $settings['site_name_ar'] : $settings['site_name_en'];
$pageDescription = $lang === 'ar' ? $settings['site_description_ar'] : $settings['site_description_en'];

include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="particles-bg" id="particles"></div>
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-12 text-center">
                <div class="hero-content" data-aos="fade-up">
                    <h1 class="display-1 fw-bold text-white mb-4">
                        <?= $lang === 'ar' ? 'Pyramedia' : 'Pyramedia' ?>
                    </h1>
                    <p class="lead text-white-50 mb-4">
                        <?= $lang === 'ar' ? 'Marketing & Media Solutions' : 'Marketing & Media Solutions' ?>
                    </p>
                    <div class="glass-card p-5">
                        <h2 class="h3 text-white mb-3">
                            <?= $lang === 'ar' ? 'مدعوم بالذكاء الاصطناعي والأتمتة' : 'Powered by AI & Automation' ?>
                        </h2>
                        <p class="text-white-50 mb-4">
                            <?= $lang === 'ar' ? 'حلول تسويقية رقمية متطورة مع تقنيات الذكاء الاصطناعي المتقدمة' : 'Modern digital marketing solutions with advanced AI technology' ?>
                        </p>
                        <a href="#contact" class="btn btn-primary btn-lg px-5 smooth-scroll">
                            <?= $lang === 'ar' ? 'ابدأ الآن' : 'Get Started' ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5 bg-dark">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <h3 class="display-4 fw-bold text-primary counter" data-target="500">0</h3>
                    <p class="text-white-50"><?= $lang === 'ar' ? 'مشروع منجز' : 'Projects Completed' ?></p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <h3 class="display-4 fw-bold text-primary counter" data-target="98">0</h3>
                    <p class="text-white-50"><?= $lang === 'ar' ? 'نسبة الرضا %' : 'Satisfaction %' ?></p>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <h3 class="display-4 fw-bold text-primary counter" data-target="50">0</h3>
                    <p class="text-white-50"><?= $lang === 'ar' ? 'عميل سعيد' : 'Happy Clients' ?></p>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-item">
                    <h3 class="display-4 fw-bold text-primary counter" data-target="10">0</h3>
                    <p class="text-white-50"><?= $lang === 'ar' ? 'سنوات خبرة' : 'Years Experience' ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section py-5">
    <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2 class="display-4 fw-bold text-white mb-3">
                <?= $lang === 'ar' ? 'خدماتنا' : 'Our Services' ?>
            </h2>
            <p class="lead text-white-50">
                <?= $lang === 'ar' ? 'نقدم مجموعة شاملة من الخدمات الرقمية المتطورة' : 'We offer a comprehensive range of advanced digital services' ?>
            </p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($services as $index => $service): ?>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="service-card glass-card p-4 h-100">
                    <div class="service-icon mb-3">
                        <span class="display-3"><?= $service['icon'] ?></span>
                    </div>
                    <h3 class="h4 text-white mb-3">
                        <?= $lang === 'ar' ? $service['title_ar'] : $service['title_en'] ?>
                    </h3>
                    <p class="text-white-50">
                        <?= $lang === 'ar' ? $service['description_ar'] : $service['description_en'] ?>
                    </p>
                    <a href="service.php?slug=<?= $service['slug'] ?>" class="btn btn-outline-primary mt-3">
                        <?= $lang === 'ar' ? 'اعرف المزيد' : 'Learn More' ?>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section py-5">
    <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2 class="display-4 fw-bold text-white mb-3">
                <?= $lang === 'ar' ? 'اتصل بنا' : 'Contact Us' ?>
            </h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-item glass-card p-4">
                    <div class="contact-icon mb-3">
                        <span class="display-4">📍</span>
                    </div>
                    <h4 class="text-white mb-2"><?= $lang === 'ar' ? 'الموقع' : 'Location' ?></h4>
                    <p class="text-white-50"><?= $lang === 'ar' ? $settings['address_ar'] : $settings['address_en'] ?></p>
                </div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-item glass-card p-4">
                    <div class="contact-icon mb-3">
                        <span class="display-4">📱</span>
                    </div>
                    <h4 class="text-white mb-2"><?= $lang === 'ar' ? 'الهاتف' : 'Phone' ?></h4>
                    <p class="text-white-50"><?= $settings['phone'] ?></p>
                </div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-item glass-card p-4">
                    <div class="contact-icon mb-3">
                        <span class="display-4">📧</span>
                    </div>
                    <h4 class="text-white mb-2"><?= $lang === 'ar' ? 'البريد' : 'Email' ?></h4>
                    <p class="text-white-50"><?= $settings['email'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

