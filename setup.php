<?php
/**
 * Database Setup Script
 * Run this file ONCE to create tables and populate initial data
 */

require_once 'config/config.php';

$db = Database::getInstance()->getConnection();

try {
    echo "<h2>🚀 Setting up Pyramedia Database...</h2>";
    
    // Read and execute SQL file
    $sql = file_get_contents('database.sql');
    
    // Split by semicolon and execute each statement
    $statements = array_filter(array_map('trim', explode(';', $sql)));
    
    foreach ($statements as $statement) {
        if (!empty($statement)) {
            $db->exec($statement);
        }
    }
    
    echo "<p>✅ Tables created successfully!</p>";
    
    // Insert admin user (password: admin123)
    $stmt = $db->prepare("INSERT INTO admin_users (username, password, email, role) VALUES (?, ?, ?, ?)");
    $stmt->execute(['admin', password_hash('admin123', PASSWORD_DEFAULT), 'admin@pyramedia.com', 'admin']);
    echo "<p>✅ Admin user created (username: admin, password: admin123)</p>";
    
    // Insert settings
    $stmt = $db->prepare("INSERT INTO settings (site_name_ar, site_name_en, site_description_ar, site_description_en, email, phone, address_ar, address_en) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        'Pyramedia',
        'Pyramedia',
        'حلول تسويقية رقمية متطورة مع تقنيات الذكاء الاصطناعي المتقدمة',
        'Modern digital marketing solutions with advanced AI technology',
        'info@pyramedia.com',
        '+971567249440',
        'دبي، الإمارات العربية المتحدة',
        'Dubai, UAE'
    ]);
    echo "<p>✅ Settings created!</p>";
    
    // Insert services
    $services = [
        ['🤖', 'AI Marketing', 'التسويق بالذكاء الاصطناعي', 'حلول تسويقية ذكية مدعومة بالذكاء الاصطناعي لتحسين الأداء وزيادة المبيعات', 'Smart marketing solutions powered by AI to improve performance and increase sales', 'ai-marketing', 1],
        ['⚡', 'Automation', 'الأتمتة', 'أتمتة العمليات التسويقية لتوفير الوقت والجهد وزيادة الكفاءة', 'Automate marketing processes to save time and effort and increase efficiency', 'automation', 2],
        ['📱', 'Digital Marketing', 'التسويق الرقمي', 'استراتيجيات تسويق رقمي شاملة عبر جميع المنصات', 'Comprehensive digital marketing strategies across all platforms', 'digital-marketing', 3],
        ['🎨', 'Creative Design', 'التصميم الإبداعي', 'تصميمات إبداعية احترافية تعكس هوية علامتك التجارية', 'Professional creative designs that reflect your brand identity', 'creative-design', 4],
    ];
    
    $stmt = $db->prepare("INSERT INTO services (icon, title_en, title_ar, description_ar, description_en, slug, display_order) VALUES (?, ?, ?, ?, ?, ?, ?)");
    foreach ($services as $service) {
        $stmt->execute($service);
    }
    echo "<p>✅ Services created!</p>";
    
    // Insert sample projects
    $projects = [
        ['E-commerce Platform', 'منصة تجارة إلكترونية', 'منصة تجارة إلكترونية متكاملة مع نظام إدارة متقدم', 'Complete e-commerce platform with advanced management system', 'ecommerce', 'https://via.placeholder.com/400x300', 1],
        ['Mobile App', 'تطبيق موبايل', 'تطبيق موبايل احترافي لنظامي iOS و Android', 'Professional mobile app for iOS and Android', 'mobile', 'https://via.placeholder.com/400x300', 2],
        ['Corporate Website', 'موقع شركة', 'موقع إلكتروني احترافي لشركة رائدة', 'Professional website for a leading company', 'website', 'https://via.placeholder.com/400x300', 3],
    ];
    
    $stmt = $db->prepare("INSERT INTO projects (title_en, title_ar, description_ar, description_en, category, image_url, display_order) VALUES (?, ?, ?, ?, ?, ?, ?)");
    foreach ($projects as $project) {
        $stmt->execute($project);
    }
    echo "<p>✅ Sample projects created!</p>";
    
    // Insert sample blog posts
    $posts = [
        ['The Future of AI in Marketing', 'مستقبل الذكاء الاصطناعي في التسويق', 'الذكاء الاصطناعي يغير مستقبل التسويق الرقمي بطرق مبتكرة...', 'AI is changing the future of digital marketing in innovative ways...', 'ai-marketing-future', 'https://via.placeholder.com/800x400', 1],
        ['10 Tips for Better SEO', '10 نصائح لتحسين محركات البحث', 'تحسين محركات البحث أمر ضروري لنجاح موقعك...', 'SEO optimization is essential for your website success...', '10-seo-tips', 'https://via.placeholder.com/800x400', 1],
    ];
    
    $stmt = $db->prepare("INSERT INTO posts (title_en, title_ar, content_ar, content_en, slug, image_url, is_published) VALUES (?, ?, ?, ?, ?, ?, ?)");
    foreach ($posts as $post) {
        $stmt->execute($post);
    }
    echo "<p>✅ Sample blog posts created!</p>";
    
    echo "<hr>";
    echo "<h3>🎉 Setup Complete!</h3>";
    echo "<p><strong>Admin Login:</strong></p>";
    echo "<ul>";
    echo "<li>URL: <a href='/admin'>Go to Admin Panel</a></li>";
    echo "<li>Username: <strong>admin</strong></li>";
    echo "<li>Password: <strong>admin123</strong></li>";
    echo "</ul>";
    echo "<p><a href='/'>Go to Homepage</a></p>";
    echo "<p style='color: red;'><strong>⚠️ Important: Delete this file (setup.php) for security!</strong></p>";
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
}

