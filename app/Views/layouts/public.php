<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'EventHub', 'html') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/eventhub.css') ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top glass-nav">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= site_url('/') ?>">EventHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item"><a class="nav-link" href="<?= site_url('/') ?>#events">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('/') ?>#about">About</a></li>
                <li class="nav-item"><a class="btn btn-dark rounded-pill px-4" href="<?= site_url('admin/login') ?>">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<?= $this->renderSection('content') ?>

<footer class="py-5 bg-dark text-white" id="contact">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-3">
        <div>
            <h5 class="fw-bold">EventHub</h5>
            <p class="text-white-50 mb-0">BSIT Advanced Web Development final project.</p>
        </div>
        <div class="text-md-end text-white-50">
            <div>eventmanagementsystem2026@gmail.com</div>
            <div>+63 900 000 0000</div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true });</script>
<?php if (session()->getFlashdata('success')): ?>
<script>
Swal.fire({ icon: 'success', title: 'Success', text: <?= json_encode(session()->getFlashdata('success')) ?>, confirmButtonColor: '#111827' });
</script>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<script>
Swal.fire({ icon: 'error', title: 'Action needed', text: <?= json_encode(session()->getFlashdata('error')) ?>, confirmButtonColor: '#111827' });
</script>
<?php endif; ?>
</body>
</html>
