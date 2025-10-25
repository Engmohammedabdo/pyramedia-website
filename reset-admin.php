<?php
/**
 * Reset Admin Password
 * Run this file to reset admin password to: admin123
 */

require_once 'config/config.php';

$db = Database::getInstance()->getConnection();

try {
    // Update admin password
    $newPassword = password_hash('admin123', PASSWORD_DEFAULT);
    
    $stmt = $db->prepare("UPDATE admin_users SET password = ? WHERE username = 'admin'");
    $stmt->execute([$newPassword]);
    
    if ($stmt->rowCount() > 0) {
        echo "<h2>✅ Admin password reset successfully!</h2>";
        echo "<p><strong>Username:</strong> admin</p>";
        echo "<p><strong>Password:</strong> admin123</p>";
        echo "<p><a href='/admin'>Go to Admin Login</a></p>";
        echo "<p style='color: red;'><strong>⚠️ Important: Delete this file (reset-admin.php) for security!</strong></p>";
    } else {
        echo "<h2>❌ Admin user not found!</h2>";
        echo "<p>Creating new admin user...</p>";
        
        // Create admin user if not exists
        $stmt = $db->prepare("INSERT INTO admin_users (username, password, email, full_name, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(['admin', $newPassword, 'admin@pyramedia.com', 'Administrator', 'admin']);
        
        echo "<h2>✅ Admin user created successfully!</h2>";
        echo "<p><strong>Username:</strong> admin</p>";
        echo "<p><strong>Password:</strong> admin123</p>";
        echo "<p><a href='/admin'>Go to Admin Login</a></p>";
    }
    
} catch (PDOException $e) {
    echo "<h2>❌ Error:</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
}

