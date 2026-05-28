<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="row g-4">
    <div class="col-md-4">
        <div class="stat-card"><i class="bi bi-people"></i><span>Total Attendees</span><strong><?= esc((string) $totalAttendees, 'html') ?></strong></div>
    </div>
    <div class="col-md-4">
        <div class="stat-card"><i class="bi bi-calendar2-event"></i><span>Total Events</span><strong><?= esc((string) $totalEvents, 'html') ?></strong></div>
    </div>
    <div class="col-md-4">
        <div class="stat-card"><i class="bi bi-lightning-charge"></i><span>Registrations Today</span><strong><?= esc((string) $registrationsToday, 'html') ?></strong></div>
    </div>
</div>

<section class="dashboard-panel mt-4">
    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 align-items-lg-center">
        <div>
            <h2 class="h4 fw-bold">Attendee operations</h2>
            <p class="text-muted mb-0">Search, paginate, view uploads, and remove invalid registrations.</p>
        </div>
        <a class="btn btn-dark rounded-pill px-4" href="<?= site_url('admin/attendees') ?>">Manage Attendees</a>
    </div>
</section>
<?= $this->endSection() ?>
