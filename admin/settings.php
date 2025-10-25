<?php
require_once '../config/config.php';
requireLogin();

$db = Database::getInstance()->getConnection();
$success = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'site_name_ar' => sanitize($_POST['site_name_ar']),
        'site_name_en' => sanitize($_POST['site_name_en']),
        'site_description_ar' => sanitize($_POST['site_description_ar']),
        'site_description_en' => sanitize($_POST['site_description_en']),
        'email' => sanitize($_POST['email']),
        'phone' => sanitize($_POST['phone']),
        'address_ar' => sanitize($_POST['address_ar']),
        'address_en' => sanitize($_POST['address_en']),
    ];
    
    // Check if settings exist
    $stmt = $db->query("SELECT COUNT(*) FROM settings");
    $exists = $stmt->fetchColumn() > 0;
    
    if ($exists) {
        $stmt = $db->prepare("UPDATE settings SET 
            site_name_ar = ?, site_name_en = ?, 
            site_description_ar = ?, site_description_en = ?,
            email = ?, phone = ?, 
            address_ar = ?, address_en = ?
            WHERE id = 1");
    } else {
        $stmt = $db->prepare("INSERT INTO settings 
            (site_name_ar, site_name_en, site_description_ar, site_description_en, email, phone, address_ar, address_en) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    }
    
    if ($stmt->execute(array_values($data))) {
        $success = true;
    }
}

// Get current settings
$settings = getSettings();

$pageTitle = 'Settings';
include 'includes/header.php';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Settings</h1>
    
    <?php if ($success): ?>
    <div class="alert alert-success">Settings updated successfully!</div>
    <?php endif; ?>
    
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Name (Arabic)</label>
                        <input type="text" name="site_name_ar" class="form-control" value="<?= htmlspecialchars($settings['site_name_ar'] ?? 'Pyramedia') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Name (English)</label>
                        <input type="text" name="site_name_en" class="form-control" value="<?= htmlspecialchars($settings['site_name_en'] ?? 'Pyramedia') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Description (Arabic)</label>
                        <textarea name="site_description_ar" class="form-control" rows="3" required><?= htmlspecialchars($settings['site_description_ar'] ?? 'حلول تسويقية رقمية متطورة') ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Description (English)</label>
                        <textarea name="site_description_en" class="form-control" rows="3" required><?= htmlspecialchars($settings['site_description_en'] ?? 'Modern digital marketing solutions') ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($settings['email'] ?? 'info@pyramedia.com') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($settings['phone'] ?? '+971567249440') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Address (Arabic)</label>
                        <input type="text" name="address_ar" class="form-control" value="<?= htmlspecialchars($settings['address_ar'] ?? 'دبي، الإمارات العربية المتحدة') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Address (English)</label>
                        <input type="text" name="address_en" class="form-control" value="<?= htmlspecialchars($settings['address_en'] ?? 'Dubai, UAE') ?>" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

