<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'EventHub Admin', 'html') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/eventhub.css') ?>" rel="stylesheet">
</head>
<body class="admin-body">
<div class="admin-shell">
    <aside class="admin-sidebar">
        <a class="brand-mark" href="<?= site_url('admin/dashboard') ?>">EventHub</a>
        <nav class="nav flex-column gap-2 mt-4">
            <a class="nav-link" href="<?= site_url('admin/dashboard') ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a class="nav-link" href="<?= site_url('admin/attendees') ?>"><i class="bi bi-people"></i> Attendees</a>
            <a class="nav-link text-danger" href="<?= site_url('admin/logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </nav>
    </aside>
    <main class="admin-main">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="text-muted mb-1">Administrator</p>
                <h1 class="h3 fw-bold mb-0"><?= esc($title ?? 'Dashboard', 'html') ?></h1>
            </div>
            <span class="badge rounded-pill bg-dark-subtle text-dark px-3 py-2"><?= esc(session()->get('admin_name') ?? 'Admin', 'html') ?></span>
        </div>
        <?= $this->renderSection('content') ?>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (session()->getFlashdata('success')): ?>
<script>Swal.fire({ icon: 'success', title: 'Done', text: <?= json_encode(session()->getFlashdata('success')) ?>, confirmButtonColor: '#111827' });</script>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<script>Swal.fire({ icon: 'error', title: 'Action needed', text: <?= json_encode(session()->getFlashdata('error')) ?>, confirmButtonColor: '#111827' });</script>
<?php endif; ?>
<script>
document.querySelectorAll('[data-confirm-delete]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Delete attendee?',
            text: 'This removes the registration and uploaded image.',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#dc3545'
        }).then((result) => {
            if (result.isConfirmed) form.submit();
        });
    });
});
</script>
</body>
</html>
