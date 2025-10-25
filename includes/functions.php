<?php
/**
 * Helper Functions
 * Pyramedia Website
 */

function getSettings() {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->query("SELECT * FROM settings LIMIT 1");
    return $stmt->fetch() ?: [];
}

function getServices($limit = null) {
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT * FROM services WHERE is_active = 1 ORDER BY display_order ASC";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }
    $stmt = $db->query($sql);
    return $stmt->fetchAll();
}

function getProjects($limit = null, $featured = false) {
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT * FROM projects WHERE is_active = 1";
    if ($featured) {
        $sql .= " AND is_featured = 1";
    }
    $sql .= " ORDER BY display_order ASC";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }
    $stmt = $db->query($sql);
    return $stmt->fetchAll();
}

function getPosts($limit = null, $featured = false) {
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT * FROM posts WHERE is_active = 1";
    if ($featured) {
        $sql .= " AND is_featured = 1";
    }
    $sql .= " ORDER BY published_at DESC";
    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }
    $stmt = $db->query($sql);
    return $stmt->fetchAll();
}

function sendMessage($data) {
    $db = Database::getInstance()->getConnection();
    
    $stmt = $db->prepare("
        INSERT INTO messages (name, email, phone, subject, message, ip_address, user_agent) 
        VALUES (:name, :email, :phone, :subject, :message, :ip, :ua)
    ");
    
    return $stmt->execute([
        ':name' => sanitize($data['name']),
        ':email' => sanitize($data['email']),
        ':phone' => sanitize($data['phone'] ?? ''),
        ':subject' => sanitize($data['subject'] ?? ''),
        ':message' => sanitize($data['message']),
        ':ip' => $_SERVER['REMOTE_ADDR'] ?? '',
        ':ua' => $_SERVER['HTTP_USER_AGENT'] ?? ''
    ]);
}

