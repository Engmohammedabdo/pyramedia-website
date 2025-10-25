<?php
require_once 'config/config.php';
require_once 'includes/functions.php';

$lang = getCurrentLang();
$settings = getSettings();

$pageTitle = ($lang === 'ar' ? 'من نحن - ' : 'About Us - ') . ($lang === 'ar' ? $settings['site_name_ar'] : $settings['site_name_en']);
$pageDescription = $lang === 'ar' ? 'تعرف على Pyramedia وفريق العمل والرؤية والرسالة' : 'Learn about Pyramedia, our team, vision and mission';

include 'includes/header.php';
?>

<section class="page-header py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" data-aos="fade-up">
                <h1 class="display-3 fw-bold text-white mb-3">
                    <?= $lang === 'ar' ? 'من نحن' : 'About Us' ?>
                </h1>
                <p class="lead text-white-50">
                    <?= $lang === 'ar' ? 'تعرف على قصتنا ورؤيتنا' : 'Learn about our story and vision' ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="about-content py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <div class="glass-card p-5 h-100">
                    <h2 class="h3 text-white mb-4">
                        <?= $lang === 'ar' ? '🎯 رؤيتنا' : '🎯 Our Vision' ?>
                    </h2>
                    <p class="text-white-50">
                        <?= $lang === 'ar' ? 
                            'أن نكون الشريك الأول في التحول الرقمي والذكاء الاصطناعي في منطقة الشرق الأوسط، ونساعد الشركات على تحقيق أهدافها من خلال حلول تسويقية مبتكرة ومتطورة.' :
                            'To be the leading partner in digital transformation and artificial intelligence in the Middle East, helping companies achieve their goals through innovative and advanced marketing solutions.'
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 mb-4" data-aos="fade-left">
                <div class="glass-card p-5 h-100">
                    <h2 class="h3 text-white mb-4">
                        <?= $lang === 'ar' ? '🚀 رسالتنا' : '🚀 Our Mission' ?>
                    </h2>
                    <p class="text-white-50">
                        <?= $lang === 'ar' ? 
                            'تقديم حلول تسويقية رقمية متكاملة تعتمد على أحدث تقنيات الذكاء الاصطناعي والأتمتة، لمساعدة عملائنا على النمو والتميز في السوق الرقمي.' :
                            'Providing integrated digital marketing solutions based on the latest AI and automation technologies, to help our clients grow and excel in the digital market.'
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12" data-aos="fade-up">
                <div class="glass-card p-5">
                    <h2 class="h3 text-white mb-4 text-center">
                        <?= $lang === 'ar' ? '💎 قيمنا الأساسية' : '💎 Our Core Values' ?>
                    </h2>
                    <div class="row g-4 mt-4">
                        <div class="col-md-3 col-6 text-center">
                            <div class="value-item">
                                <span class="display-4 mb-3 d-block">🎯</span>
                                <h4 class="h6 text-white"><?= $lang === 'ar' ? 'الابتكار' : 'Innovation' ?></h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="value-item">
                                <span class="display-4 mb-3 d-block">⭐</span>
                                <h4 class="h6 text-white"><?= $lang === 'ar' ? 'الجودة' : 'Quality' ?></h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="value-item">
                                <span class="display-4 mb-3 d-block">🤝</span>
                                <h4 class="h6 text-white"><?= $lang === 'ar' ? 'الشراكة' : 'Partnership' ?></h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <div class="value-item">
                                <span class="display-4 mb-3 d-block">🚀</span>
                                <h4 class="h6 text-white"><?= $lang === 'ar' ? 'التميز' : 'Excellence' ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center" data-aos="fade-up">
                <h2 class="h3 text-white mb-5">
                    <?= $lang === 'ar' ? '👥 فريق العمل' : '👥 Our Team' ?>
                </h2>
                <p class="text-white-50 mb-4">
                    <?= $lang === 'ar' ? 
                        'فريق من الخبراء المتخصصين في التسويق الرقمي والذكاء الاصطناعي، ملتزمون بتقديم أفضل الحلول لعملائنا.' :
                        'A team of experts specialized in digital marketing and artificial intelligence, committed to providing the best solutions for our clients.'
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

