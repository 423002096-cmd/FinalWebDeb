<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<main class="page-offset login-screen">
    <div class="login-card">
        <span class="eyebrow text-primary">Secure access</span>
        <h1 class="h2 fw-bold mt-2">Admin Login</h1>
        <p class="text-muted">Use the seeded admin account from the SQL schema.</p>
        <?php $errors = session()->getFlashdata('errors') ?? []; ?>
        <?php if ($errors): ?>
            <div class="alert alert-danger rounded-4"><?php foreach ($errors as $error): ?><div><?= esc($error, 'html') ?></div><?php endforeach; ?></div>
        <?php endif; ?>
        <form action="<?= site_url('admin/login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control form-control-lg" type="email" name="email" value="<?= esc(old('email'), 'html') ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input class="form-control form-control-lg" type="password" name="password" required>
            </div>
            <button class="btn btn-dark btn-lg rounded-pill w-100" type="submit">Login</button>
        </form>
    </div>
</main>
<?= $this->endSection() ?>
