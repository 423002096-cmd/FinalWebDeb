<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<main class="page-offset py-5 bg-soft min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card">
                    <span class="eyebrow text-primary">Registration</span>
                    <h1 class="h2 fw-bold mt-2"><?= esc($event['title'], 'html') ?></h1>
                    <p class="text-muted mb-4"><?= esc($event['description'], 'html') ?> at <?= esc($event['venue'], 'html') ?> on <?= esc(date('F d, Y', strtotime($event['date'])), 'html') ?>.</p>

                    <?php $errors = session()->getFlashdata('errors') ?? []; ?>
                    <?php if ($errors): ?>
                        <div class="alert alert-danger rounded-4">
                            <?php foreach ($errors as $error): ?><div><?= esc($error, 'html') ?></div><?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= site_url('event/register/' . $event['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <!-- csrf_field() adds a signed token. Missing or expired tokens receive 403 Forbidden from CI4's CSRF filter. -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input class="form-control form-control-lg" name="fullname" value="<?= esc(old('fullname'), 'html') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input class="form-control form-control-lg" type="email" name="email" value="<?= esc(old('email'), 'html') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Number</label>
                                <input class="form-control form-control-lg" name="contact" value="<?= esc(old('contact'), 'html') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Course/Department</label>
                                <input class="form-control form-control-lg" name="course" value="<?= esc(old('course'), 'html') ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Profile Picture</label>
                                <input class="form-control form-control-lg" type="file" name="profile_picture" accept="image/png,image/jpeg,image/webp" required>
                                <div class="form-text">Accepted: JPG, PNG, WEBP. Maximum size: 2 MB.</div>
                            </div>
                        </div>
                        <button class="btn btn-dark btn-lg rounded-pill mt-4 px-5" type="submit">Submit Registration</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
