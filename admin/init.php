<?php
/**
 * Initialize Database with Sample Data
 * Run this file once to populate the database
 */

require_once '../config/config.php';

$db = Database::getInstance()->getConnection();

try {
    // Insert admin user (password: admin123)
    $stmt = $db->prepare("INSERT IGNORE INTO admin_users (id, username, password, email, role) VALUES (1, 'admin', ?, 'admin@pyramedia.com', 'admin')");
    $stmt->execute([password_hash('admin123', PASSWORD_DEFAULT)]);
    
    // Insert settings
    $stmt = $db->prepare("INSERT IGNORE INTO settings (id, site_name_ar, site_name_en, site_description_ar, site_description_en, email, phone, address_ar, address_en) VALUES (1, 'Pyramedia', 'Pyramedia', 'حلول تسويقية رقمية متطورة مع تقنيات الذكاء الاصطناعي المتقدمة', 'Modern digital marketing solutions with advanced AI technology', 'info@pyramedia.com', '+971567249440', 'دبي، الإمارات العربية المتحدة', 'Dubai, UAE')");
    $stmt->execute();
    
    // Insert services
    $services = [
        ['🤖', 'AI Marketing', 'AI Marketing', 'حلول تسويقية ذكية مدعومة بالذكاء الاصطناعي', 'Smart marketing solutions powered by AI', 'ai-marketing', 1],
        ['⚡', 'Automation', 'Automation', 'أتمتة العمليات التسويقية لتوفير الوقت والجهد', 'Automate marketing processes to save time and effort', 'automation', 2],
        ['📱', 'Digital Marketing', 'Digital Marketing', 'استراتيجيات تسويق رقمي شاملة', 'Comprehensive digital marketing strategies', 'digital-marketing', 3],
        ['🎨', 'Creative Design', 'Creative Design', 'تصميمات إبداعية احترافية', 'Professional creative designs', 'creative-design', 4],
    ];
    
    $stmt = $db->prepare("INSERT IGNORE INTO services (icon, title_ar, title_en, description_ar, description_en, slug, display_order) VALUES (?, ?, ?, ?, ?, ?, ?)");
    foreach ($services as $service) {
        $stmt->execute($service);
    }
    
    echo "✅ Database initialized successfully!<br>";
    echo "Admin credentials: username = admin, password = admin123<br>";
    echo "<a href='login.php'>Go to Login</a>";
    
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}

