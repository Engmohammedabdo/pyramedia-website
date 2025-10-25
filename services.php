<?php
require_once 'config/config.php';
require_once 'includes/functions.php';

$lang = getCurrentLang();
$settings = getSettings();
$services = getServices();

$pageTitle = ($lang === 'ar' ? 'خدماتنا - ' : 'Our Services - ') . ($lang === 'ar' ? $settings['site_name_ar'] : $settings['site_name_en']);
$pageDescription = $lang === 'ar' ? 'تعرف على خدماتنا في التسويق الرقمي والذكاء الاصطناعي' : 'Discover our services in digital marketing and artificial intelligence';

include 'includes/header.php';
?>

<section class="page-header py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" data-aos="fade-up">
                <h1 class="display-3 fw-bold text-white mb-3">
                    <?= $lang === 'ar' ? 'خدماتنا' : 'Our Services' ?>
                </h1>
                <p class="lead text-white-50">
                    <?= $lang === 'ar' ? 'حلول متكاملة لنجاح أعمالك الرقمية' : 'Integrated solutions for your digital business success' ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="services-content py-5">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($services as $index => $service): ?>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="service-card glass-card p-5 h-100">
                    <div class="service-icon mb-4">
                        <span class="display-1"><?= $service['icon'] ?></span>
                    </div>
                    <h2 class="h3 text-white mb-3">
                        <?= $lang === 'ar' ? $service['title_ar'] : $service['title_en'] ?>
                    </h2>
                    <p class="text-white-50 mb-4">
                        <?= $lang === 'ar' ? $service['description_ar'] : $service['description_en'] ?>
                    </p>
                    <div class="service-features">
                        <h4 class="h6 text-white mb-3">
                            <?= $lang === 'ar' ? 'ما نقدمه:' : 'What we offer:' ?>
                        </h4>
                        <ul class="list-unstyled text-white-50">
                            <li class="mb-2">✓ <?= $lang === 'ar' ? 'استشارات متخصصة' : 'Specialized consulting' ?></li>
                            <li class="mb-2">✓ <?= $lang === 'ar' ? 'تنفيذ احترافي' : 'Professional implementation' ?></li>
                            <li class="mb-2">✓ <?= $lang === 'ar' ? 'دعم مستمر' : 'Continuous support' ?></li>
                            <li class="mb-2">✓ <?= $lang === 'ar' ? 'تقارير دورية' : 'Regular reports' ?></li>
                        </ul>
                    </div>
                    <a href="contact.php" class="btn btn-primary mt-4">
                        <?= $lang === 'ar' ? 'اطلب الخدمة' : 'Request Service' ?>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

