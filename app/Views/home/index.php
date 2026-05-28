<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>
<header class="hero-gradient">
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-up">
                <span class="eyebrow">Campus events, simplified</span>
                <h1 class="display-3 fw-bold mt-3">Register, manage, and track events in one polished system.</h1>
                <p class="lead mt-4">EventHub helps students join upcoming programs while administrators manage attendees, uploads, emails, search, pagination, and reports from a secure dashboard.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a class="btn btn-light btn-lg rounded-pill px-4" href="#events">Browse Events</a>
                    <a class="btn btn-outline-light btn-lg rounded-pill px-4" href="<?= site_url('admin/login') ?>">Admin Login</a>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="hero-panel">
                    <div class="d-flex justify-content-between mb-4">
                        <span class="badge bg-success-subtle text-success">Live registrations</span>
                        <i class="bi bi-calendar-event fs-4"></i>
                    </div>
                    <h2 class="h4 fw-bold">Featured Event</h2>
                    <p class="text-muted">Modern event cards, secure forms, profile upload, and SMTP confirmation are built in.</p>
                    <div class="mini-stat-grid">
                        <div><strong>5</strong><span>per page</span></div>
                        <div><strong>CSRF</strong><span>secured</span></div>
                        <div><strong>SMTP</strong><span>ready</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5 bg-soft">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up"><div class="feature-card"><i class="bi bi-shield-check"></i><h3>Secure</h3><p>CSRF tokens, escaped output, validation, and protected admin routes.</p></div></div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100"><div class="feature-card"><i class="bi bi-envelope-check"></i><h3>Automated</h3><p>HTML confirmation emails with a plain-text fallback and logging.</p></div></div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200"><div class="feature-card"><i class="bi bi-graph-up"></i><h3>Manageable</h3><p>Search, pagination, dashboard stats, and image preview for admins.</p></div></div>
        </div>
    </div>
</section>

<section class="py-5" id="events">
    <div class="container">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
            <div>
                <span class="eyebrow text-primary">Upcoming events</span>
                <h2 class="display-6 fw-bold">Choose your next campus experience.</h2>
            </div>
            <p class="section-copy">Every displayed event is escaped with <code>esc()</code>, so a value like <code>&lt;script&gt;alert(1)&lt;/script&gt;</code> renders as text instead of running.</p>
        </div>
        <div class="row g-4">
            <?php foreach ($events as $event): ?>
                <div class="col-md-6 col-xl-4" data-aos="zoom-in">
                    <article class="event-card h-100">
                        <div class="event-date"><?= esc(date('M d, Y', strtotime($event['date'])), 'html') ?></div>
                        <h3><?= esc($event['title'], 'html') ?></h3>
                        <p><?= esc($event['description'], 'html') ?></p>
                        <div class="venue"><i class="bi bi-geo-alt"></i> <?= esc($event['venue'], 'html') ?></div>
                        <a class="btn btn-dark rounded-pill w-100 mt-4" href="<?= site_url('event/register/' . $event['id']) ?>">Register</a>
                    </article>
                </div>
            <?php endforeach; ?>
            <?php if ($events === []): ?>
                <div class="col-12"><div class="empty-state">No upcoming events yet. Seed the database to display event cards.</div></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-5 bg-soft" id="about">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="display-6 fw-bold">Built for final defense readiness.</h2>
                <p class="lead text-muted">The project covers security, upload validation, email, pagination, testing, debugging notes, and deployment documentation in one CI4 MVC application.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-list">
                    <div><i class="bi bi-check2-circle"></i> Session authentication with hashed passwords</div>
                    <div><i class="bi bi-check2-circle"></i> Validated multipart image uploads</div>
                    <div><i class="bi bi-check2-circle"></i> Clean admin dashboard and reusable layouts</div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
