<?php
require_once '../config/config.php';
requireLogin();

$db = Database::getInstance()->getConnection();

// Handle actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    if ($_GET['action'] === 'read') {
        $stmt = $db->prepare("UPDATE messages SET is_read = 1 WHERE id = ?");
        $stmt->execute([$id]);
    } elseif ($_GET['action'] === 'delete') {
        $stmt = $db->prepare("DELETE FROM messages WHERE id = ?");
        $stmt->execute([$id]);
    }
    
    redirect(ADMIN_URL . '/messages.php');
}

// Get all messages
$stmt = $db->query("SELECT * FROM messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll();

$pageTitle = 'Messages';
include 'includes/header.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Messages</h1>
    </div>
    
    <div class="card">
        <div class="card-body">
            <?php if (empty($messages)): ?>
            <p class="text-muted text-center py-5">No messages yet</p>
            <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $msg): ?>
                        <tr class="<?= !$msg['is_read'] ? 'table-warning' : '' ?>">
                            <td><?= $msg['id'] ?></td>
                            <td><?= htmlspecialchars($msg['name']) ?></td>
                            <td><?= htmlspecialchars($msg['email']) ?></td>
                            <td><?= htmlspecialchars($msg['phone'] ?: '-') ?></td>
                            <td><?= htmlspecialchars($msg['subject'] ?: '-') ?></td>
                            <td><?= substr(htmlspecialchars($msg['message']), 0, 50) ?>...</td>
                            <td><?= date('M d, Y H:i', strtotime($msg['created_at'])) ?></td>
                            <td>
                                <?php if ($msg['is_read']): ?>
                                <span class="badge bg-secondary">Read</span>
                                <?php else: ?>
                                <span class="badge bg-warning">New</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!$msg['is_read']): ?>
                                <a href="?action=read&id=<?= $msg['id'] ?>" class="btn btn-sm btn-success" title="Mark as read">
                                    <i class="bi bi-check"></i>
                                </a>
                                <?php endif; ?>
                                <a href="?action=delete&id=<?= $msg['id'] ?>" class="btn btn-sm btn-danger btn-delete" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </a>
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

<?php include 'includes/footer.php'; ?>

