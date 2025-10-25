<?php
require_once 'config/config.php';
require_once 'includes/functions.php';

$lang = getCurrentLang();
$settings = getSettings();
$success = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (sendMessage($_POST)) {
        $success = true;
    } else {
        $error = true;
    }
}

$pageTitle = ($lang === 'ar' ? 'اتصل بنا - ' : 'Contact Us - ') . ($lang === 'ar' ? $settings['site_name_ar'] : $settings['site_name_en']);
$pageDescription = $lang === 'ar' ? 'تواصل معنا للحصول على استشارة مجانية' : 'Contact us for a free consultation';

include 'includes/header.php';
?>

<section class="page-header py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center" data-aos="fade-up">
                <h1 class="display-3 fw-bold text-white mb-3">
                    <?= $lang === 'ar' ? 'اتصل بنا' : 'Contact Us' ?>
                </h1>
                <p class="lead text-white-50">
                    <?= $lang === 'ar' ? 'نحن هنا لمساعدتك' : 'We are here to help you' ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="contact-content py-5">
    <div class="container">
        <?php if ($success): ?>
        <div class="alert alert-success text-center" role="alert" data-aos="fade-down">
            <?= $lang === 'ar' ? '✓ تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.' : '✓ Your message has been sent successfully! We will contact you soon.' ?>
        </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
        <div class="alert alert-danger text-center" role="alert" data-aos="fade-down">
            <?= $lang === 'ar' ? '✗ حدث خطأ. يرجى المحاولة مرة أخرى.' : '✗ An error occurred. Please try again.' ?>
        </div>
        <?php endif; ?>
        
        <div class="row g-4 mb-5">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="glass-card p-4 text-center h-100">
                    <div class="contact-icon mb-3">
                        <span class="display-4">📍</span>
                    </div>
                    <h3 class="h5 text-white mb-2"><?= $lang === 'ar' ? 'الموقع' : 'Location' ?></h3>
                    <p class="text-white-50"><?= $lang === 'ar' ? $settings['address_ar'] : $settings['address_en'] ?></p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="glass-card p-4 text-center h-100">
                    <div class="contact-icon mb-3">
                        <span class="display-4">📱</span>
                    </div>
                    <h3 class="h5 text-white mb-2"><?= $lang === 'ar' ? 'الهاتف' : 'Phone' ?></h3>
                    <p class="text-white-50"><a href="tel:<?= $settings['phone'] ?>" class="text-white-50 text-decoration-none"><?= $settings['phone'] ?></a></p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="glass-card p-4 text-center h-100">
                    <div class="contact-icon mb-3">
                        <span class="display-4">📧</span>
                    </div>
                    <h3 class="h5 text-white mb-2"><?= $lang === 'ar' ? 'البريد' : 'Email' ?></h3>
                    <p class="text-white-50"><a href="mailto:<?= $settings['email'] ?>" class="text-white-50 text-decoration-none"><?= $settings['email'] ?></a></p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto" data-aos="fade-up">
                <div class="glass-card p-5">
                    <h2 class="h3 text-white mb-4 text-center">
                        <?= $lang === 'ar' ? 'أرسل لنا رسالة' : 'Send us a message' ?>
                    </h2>
                    <form method="POST" id="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white"><?= $lang === 'ar' ? 'الاسم *' : 'Name *' ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white"><?= $lang === 'ar' ? 'البريد الإلكتروني *' : 'Email *' ?></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white"><?= $lang === 'ar' ? 'الهاتف' : 'Phone' ?></label>
                                <input type="tel" name="phone" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white"><?= $lang === 'ar' ? 'الموضوع' : 'Subject' ?></label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white"><?= $lang === 'ar' ? 'الرسالة *' : 'Message *' ?></label>
                                <textarea name="message" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <?= $lang === 'ar' ? 'إرسال' : 'Send' ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.form-control {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    padding: 0.75rem 1rem;
    border-radius: 10px;
}

.form-control:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: var(--primary);
    color: #fff;
    box-shadow: 0 0 0 0.2rem rgba(168, 85, 247, 0.25);
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.5);
}
</style>

<?php include 'includes/footer.php'; ?>

