<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<main class="page-offset py-5 bg-soft min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="form-card">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-4">
                            <img class="success-photo" src="<?= site_url('registration/photo/' . $attendee['id']) ?>" alt="<?= esc($attendee['fullname'], 'attr') ?>">
                        </div>
                        <div class="col-md-8">
                            <span class="eyebrow text-success">Registration confirmed</span>
                            <h1 class="h2 fw-bold mt-2">Thank you, <?= esc($attendee['fullname'], 'html') ?>.</h1>
                            <p class="text-muted">Your uploaded profile picture and registration details were saved successfully.</p>
                            <div class="registration-summary">
                                <div><strong>Event</strong><span><?= esc($attendee['event_title'], 'html') ?></span></div>
                                <div><strong>Email</strong><span><?= esc($attendee['email'], 'html') ?></span></div>
                                <div><strong>Contact</strong><span><?= esc($attendee['contact'], 'html') ?></span></div>
                                <div><strong>Course</strong><span><?= esc($attendee['course'], 'html') ?></span></div>
                                <div><strong>Date</strong><span><?= esc(date('F d, Y', strtotime($attendee['event_date'])), 'html') ?></span></div>
                                <div><strong>Venue</strong><span><?= esc($attendee['event_venue'], 'html') ?></span></div>
                            </div>
                            <a class="btn btn-dark rounded-pill px-4 mt-4" href="<?= site_url('/') ?>">Back to Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
