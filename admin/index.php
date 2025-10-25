<?php
require_once '../config/config.php';
requireLogin();

$db = Database::getInstance()->getConnection();

// Get statistics
$stats = [
    'services' => $db->query("SELECT COUNT(*) FROM services")->fetchColumn(),
    'projects' => $db->query("SELECT COUNT(*) FROM projects")->fetchColumn(),
    'posts' => $db->query("SELECT COUNT(*) FROM posts")->fetchColumn(),
    'messages' => $db->query("SELECT COUNT(*) FROM messages WHERE is_read = 0")->fetchColumn(),
];

// Get recent messages
$stmt = $db->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 5");
$recent_messages = $stmt->fetchAll();

include 'includes/header.php';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Dashboard</h1>
    
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Services</h6>
                            <h2 class="mb-0"><?= $stats['services'] ?></h2>
                        </div>
                        <div class="fs-1">⚙️</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Projects</h6>
                            <h2 class="mb-0"><?= $stats['projects'] ?></h2>
                        </div>
                        <div class="fs-1">💼</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Blog Posts</h6>
                            <h2 class="mb-0"><?= $stats['posts'] ?></h2>
                        </div>
                        <div class="fs-1">📝</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">New Messages</h6>
                            <h2 class="mb-0"><?= $stats['messages'] ?></h2>
                        </div>
                        <div class="fs-1">📧</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Messages -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Messages</h5>
                    <a href="messages.php" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    <?php if (empty($recent_messages)): ?>
                    <p class="text-muted text-center py-4">No messages yet</p>
                    <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_messages as $msg): ?>
                                <tr>
                                    <td><?= htmlspecialchars($msg['name']) ?></td>
                                    <td><?= htmlspecialchars($msg['email']) ?></td>
                                    <td><?= htmlspecialchars($msg['subject'] ?: 'No subject') ?></td>
                                    <td><?= date('M d, Y', strtotime($msg['created_at'])) ?></td>
                                    <td>
                                        <?php if ($msg['is_read']): ?>
                                        <span class="badge bg-secondary">Read</span>
                                        <?php else: ?>
                                        <span class="badge bg-warning">New</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

