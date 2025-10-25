    </main>
    
    <!-- Footer -->
    <footer class="footer py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="text-white mb-3">Pyramedia</h5>
                    <p class="text-white-50">
                        <?= getCurrentLang() === 'ar' ? 'حلول تسويقية رقمية متطورة مع تقنيات الذكاء الاصطناعي المتقدمة' : 'Modern digital marketing solutions with advanced AI technology' ?>
                    </p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="text-white mb-3">
                        <?= getCurrentLang() === 'ar' ? 'روابط سريعة' : 'Quick Links' ?>
                    </h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= url() ?>" class="text-white-50 text-decoration-none"><?= getCurrentLang() === 'ar' ? 'الرئيسية' : 'Home' ?></a></li>
                        <li><a href="<?= url('about.php') ?>" class="text-white-50 text-decoration-none"><?= getCurrentLang() === 'ar' ? 'من نحن' : 'About' ?></a></li>
                        <li><a href="<?= url('services.php') ?>" class="text-white-50 text-decoration-none"><?= getCurrentLang() === 'ar' ? 'الخدمات' : 'Services' ?></a></li>
                        <li><a href="<?= url('contact.php') ?>" class="text-white-50 text-decoration-none"><?= getCurrentLang() === 'ar' ? 'اتصل بنا' : 'Contact' ?></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white mb-3">
                        <?= getCurrentLang() === 'ar' ? 'تواصل معنا' : 'Contact Info' ?>
                    </h5>
                    <p class="text-white-50 mb-2">
                        <strong><?= getCurrentLang() === 'ar' ? 'الهاتف:' : 'Phone:' ?></strong> <?= $settings['phone'] ?? '+971567249440' ?>
                    </p>
                    <p class="text-white-50 mb-2">
                        <strong><?= getCurrentLang() === 'ar' ? 'البريد:' : 'Email:' ?></strong> <?= $settings['email'] ?? 'info@pyramedia.com' ?>
                    </p>
                </div>
            </div>
            <hr class="bg-white-50 my-4">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-white-50 mb-0">
                        © <?= date('Y') ?> Pyramedia. <?= getCurrentLang() === 'ar' ? 'جميع الحقوق محفوظة' : 'All rights reserved' ?>.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JS -->
    <script src="<?= asset('js/main.js') ?>"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
        
        // Handle language switch
        document.querySelectorAll('.lang-switcher').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = new URL(this.href);
                const lang = url.searchParams.get('lang');
                
                // Set cookie
                document.cookie = `lang=${lang}; path=/; max-age=31536000`;
                
                // Reload page
                window.location.reload();
            });
        });
    </script>
</body>
</html>

