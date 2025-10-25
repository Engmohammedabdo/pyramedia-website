<!DOCTYPE html>
<html lang="<?= getCurrentLang() ?>" dir="<?= isRTL() ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $pageDescription ?? '' ?>">
    <meta name="keywords" content="<?= $pageKeywords ?? '' ?>">
    <title><?= $pageTitle ?? 'Pyramedia' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="<?= asset('css/style.css') ?>" rel="stylesheet">
    
    <?php if (isRTL()): ?>
    <link href="<?= asset('css/rtl.css') ?>" rel="stylesheet">
    <?php endif; ?>
</head>
<body>
    <!-- Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= url() ?>">
                <span class="gradient-text">Pyramedia</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url() ?>">
                            <?= getCurrentLang() === 'ar' ? 'الرئيسية' : 'Home' ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('about.php') ?>">
                            <?= getCurrentLang() === 'ar' ? 'من نحن' : 'About' ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('services.php') ?>">
                            <?= getCurrentLang() === 'ar' ? 'الخدمات' : 'Services' ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('portfolio.php') ?>">
                            <?= getCurrentLang() === 'ar' ? 'أعمالنا' : 'Portfolio' ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('blog.php') ?>">
                            <?= getCurrentLang() === 'ar' ? 'المدونة' : 'Blog' ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('contact.php') ?>">
                            <?= getCurrentLang() === 'ar' ? 'اتصل بنا' : 'Contact' ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link lang-switcher" href="?lang=<?= getCurrentLang() === 'ar' ? 'en' : 'ar' ?>">
                            <?= getCurrentLang() === 'ar' ? 'EN' : 'AR' ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main>

