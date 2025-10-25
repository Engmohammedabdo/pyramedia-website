<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Admin Dashboard' ?> - Pyramedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
        }
        body {
            background: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            overflow-y: auto;
            z-index: 1000;
        }
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar-menu {
            padding: 1rem 0;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .sidebar-menu a i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
        }
        .top-bar {
            background: #fff;
            padding: 1rem 2rem;
            margin: -2rem -2rem 2rem -2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4 class="mb-0">🎯 Pyramedia</h4>
            <small class="text-white-50">Admin Dashboard</small>
        </div>
        <div class="sidebar-menu">
            <a href="<?= '/admin' ?>/index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="<?= '/admin' ?>/services.php" class="<?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : '' ?>">
                <i class="bi bi-gear"></i> Services
            </a>
            <a href="<?= '/admin' ?>/projects.php" class="<?= basename($_SERVER['PHP_SELF']) == 'projects.php' ? 'active' : '' ?>">
                <i class="bi bi-briefcase"></i> Projects
            </a>
            <a href="<?= '/admin' ?>/posts.php" class="<?= basename($_SERVER['PHP_SELF']) == 'posts.php' ? 'active' : '' ?>">
                <i class="bi bi-file-text"></i> Blog Posts
            </a>
            <a href="<?= '/admin' ?>/messages.php" class="<?= basename($_SERVER['PHP_SELF']) == 'messages.php' ? 'active' : '' ?>">
                <i class="bi bi-envelope"></i> Messages
            </a>
            <a href="<?= '/admin' ?>/settings.php" class="<?= basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : '' ?>">
                <i class="bi bi-sliders"></i> Settings
            </a>
            <hr style="border-color: rgba(255,255,255,0.1);">
            <a href="<?= url() ?>" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> View Website
            </a>
            <a href="<?= '/admin' ?>/logout.php">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <div>
                <h5 class="mb-0"><?= $pageTitle ?? 'Dashboard' ?></h5>
            </div>
            <div>
                <span class="text-muted">Welcome, <?= $_SESSION['admin_username'] ?? 'Admin' ?></span>
            </div>
        </div>

