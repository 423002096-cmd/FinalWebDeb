<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<section class="dashboard-panel">
    <form class="row g-3 align-items-end mb-4" method="get" action="<?= site_url('admin/attendees') ?>">
        <div class="col-lg-8">
            <label class="form-label">Search by name, email, or course</label>
            <input class="form-control form-control-lg" name="q" value="<?= esc($search, 'html') ?>" placeholder="Try BSIT or juan@example.com">
        </div>
        <div class="col-lg-4 d-flex gap-2">
            <button class="btn btn-dark btn-lg rounded-pill flex-fill" type="submit"><i class="bi bi-search"></i> Search</button>
            <a class="btn btn-outline-secondary btn-lg rounded-pill" href="<?= site_url('admin/attendees') ?>">Reset</a>
        </div>
    </form>

    <div class="d-flex justify-content-between flex-wrap gap-2 mb-3">
        <span class="text-muted">Total records: <?= esc((string) $total, 'html') ?></span>
        <span class="text-muted">Current page: <?= esc((string) $currentPage, 'html') ?></span>
    </div>

    <div class="table-responsive">
        <table class="table align-middle clean-table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Course</th>
                    <th>Event</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attendees as $attendee): ?>
                    <tr>
                        <td><img class="avatar" src="<?= site_url('admin/uploads/' . esc($attendee['image'], 'url')) ?>" alt="<?= esc($attendee['fullname'], 'attr') ?>"></td>
                        <td><?= esc($attendee['fullname'], 'html') ?></td>
                        <td><?= esc($attendee['email'], 'html') ?></td>
                        <td><?= esc($attendee['contact'], 'html') ?></td>
                        <td><?= esc($attendee['course'], 'html') ?></td>
                        <td><?= esc($attendee['event_title'] ?? 'No event', 'html') ?></td>
                        <td class="text-end">
                            <form action="<?= site_url('admin/attendees/delete/' . $attendee['id']) ?>" method="post" data-confirm-delete>
                                <?= csrf_field() ?>
                                <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if ($attendees === []): ?>
                    <tr><td colspan="7" class="text-center py-5 text-muted">No attendees found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-wrap mt-4">
        <?= $pager->only(['q'])->links('attendees', 'eventhub_full') ?>
    </div>
</section>
<?= $this->endSection() ?>
