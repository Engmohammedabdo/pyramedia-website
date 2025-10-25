<?php
/**
 * General Configuration
 * Pyramedia Website
 */

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Site URL
define('SITE_URL', getenv('SITE_URL') ?: 'http://localhost');
define('ADMIN_URL', SITE_URL . '/admin');

// Paths
define('ROOT_PATH', dirname(__DIR__));
define('UPLOAD_PATH', ROOT_PATH . '/uploads');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Default language
define('DEFAULT_LANG', 'ar');

// Timezone
date_default_timezone_set('Asia/Dubai');

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database config
require_once __DIR__ . '/database.php';

// Helper functions
function getCurrentLang() {
    return $_SESSION['lang'] ?? $_COOKIE['lang'] ?? DEFAULT_LANG;
}

function setLang($lang) {
    $_SESSION['lang'] = $lang;
    setcookie('lang', $lang, time() + (86400 * 365), '/');
}

function isRTL() {
    return getCurrentLang() === 'ar';
}

function asset($path) {
    return SITE_URL . '/public/' . ltrim($path, '/');
}

function url($path = '') {
    return SITE_URL . '/' . ltrim($path, '/');
}

function redirect($url) {
    header('Location: ' . $url);
    exit;
}

function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function isLoggedIn() {
    return isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        redirect(ADMIN_URL . '/login.php');
    }
}

