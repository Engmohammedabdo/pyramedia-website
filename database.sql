-- Pyramedia Database Schema
-- Created: 2025-10-25

-- Using existing database from connection

-- Settings Table
CREATE TABLE IF NOT EXISTS settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    site_name_ar VARCHAR(255) NOT NULL DEFAULT 'Pyramedia',
    site_name_en VARCHAR(255) NOT NULL DEFAULT 'Pyramedia',
    site_description_ar TEXT,
    site_description_en TEXT,
    site_keywords_ar TEXT,
    site_keywords_en TEXT,
    email VARCHAR(255) NOT NULL DEFAULT 'info@pyramedia.com',
    phone VARCHAR(50) NOT NULL DEFAULT '+971567249440',
    address_ar VARCHAR(255) DEFAULT 'دبي، الإمارات العربية المتحدة',
    address_en VARCHAR(255) DEFAULT 'Dubai, UAE',
    facebook VARCHAR(255),
    twitter VARCHAR(255),
    instagram VARCHAR(255),
    linkedin VARCHAR(255),
    logo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Admin Users Table
CREATE TABLE IF NOT EXISTS admin_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    role ENUM('admin', 'editor') DEFAULT 'editor',
    is_active BOOLEAN DEFAULT TRUE,
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Pages Table
CREATE TABLE IF NOT EXISTS pages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title_ar VARCHAR(255) NOT NULL,
    title_en VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content_ar TEXT,
    content_en TEXT,
    meta_description_ar TEXT,
    meta_description_en TEXT,
    meta_keywords_ar TEXT,
    meta_keywords_en TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Services Table
CREATE TABLE IF NOT EXISTS services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title_ar VARCHAR(255) NOT NULL,
    title_en VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description_ar TEXT,
    description_en TEXT,
    content_ar TEXT,
    content_en TEXT,
    icon VARCHAR(100),
    image VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Projects Table (Portfolio)
CREATE TABLE IF NOT EXISTS projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title_ar VARCHAR(255) NOT NULL,
    title_en VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    description_ar TEXT,
    description_en TEXT,
    content_ar TEXT,
    content_en TEXT,
    client_name VARCHAR(255),
    category_ar VARCHAR(100),
    category_en VARCHAR(100),
    image VARCHAR(255),
    gallery TEXT,
    project_url VARCHAR(255),
    is_featured BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog Posts Table
CREATE TABLE IF NOT EXISTS posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title_ar VARCHAR(255) NOT NULL,
    title_en VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    excerpt_ar TEXT,
    excerpt_en TEXT,
    content_ar TEXT,
    content_en TEXT,
    image VARCHAR(255),
    author VARCHAR(255),
    category_ar VARCHAR(100),
    category_en VARCHAR(100),
    tags TEXT,
    views INT DEFAULT 0,
    is_featured BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    published_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Contact Messages Table
CREATE TABLE IF NOT EXISTS messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    subject VARCHAR(255),
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Default Admin User (username: admin, password: admin123)
INSERT INTO admin_users (username, email, password, full_name, role) VALUES
('admin', 'admin@pyramedia.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin');

-- Insert Default Settings
INSERT INTO settings (site_name_ar, site_name_en, site_description_ar, site_description_en, email, phone, address_ar, address_en) VALUES
('Pyramedia', 'Pyramedia', 'حلول تسويقية رقمية متطورة مع تقنيات الذكاء الاصطناعي المتقدمة', 'Modern AI-Powered Marketing & Media Solutions', 'info@pyramedia.com', '+971567249440', 'دبي، الإمارات العربية المتحدة', 'Dubai, UAE');

-- Insert Sample Services
INSERT INTO services (title_ar, title_en, slug, description_ar, description_en, icon, is_active, display_order) VALUES
('الذكاء الاصطناعي والأتمتة', 'AI & Automation', 'ai-automation', 'حلول ذكاء اصطناعي متقدمة لأتمتة العمليات وتحسين الأداء', 'Advanced AI solutions for process automation and performance optimization', '🤖', TRUE, 1),
('التسويق الرقمي', 'Digital Marketing', 'digital-marketing', 'استراتيجيات تسويق رقمي شاملة لتعزيز حضورك الإلكتروني', 'Comprehensive digital marketing strategies to boost your online presence', '📱', TRUE, 2),
('تصميم المواقع والتطبيقات', 'Web & App Design', 'web-app-design', 'تصميم وتطوير مواقع وتطبيقات عصرية ومتجاوبة', 'Modern and responsive website and application design and development', '💻', TRUE, 3),
('إنتاج المحتوى', 'Content Production', 'content-production', 'إنتاج محتوى إبداعي ومتميز يجذب جمهورك المستهدف', 'Creative and distinctive content production that attracts your target audience', '🎬', TRUE, 4);

