<?= $this->include('templates/head') ?>
<?= $this->include('templates/side_nav') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Dashboard</h3>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="text-muted small">Total Artikel</div>
                <div class="display-6"><?= $totalArticles ?></div>
                <div class="text-muted small">
                    <?= $publishedArticles ?> published &middot; <?= $draftArticles ?> draft
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="text-muted small">Total Feedback</div>
                <div class="display-6"><?= $totalFeedback ?></div>
                <div class="text-muted small">dari pengguna</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="text-muted small">Aksi Cepat</div>
                <a href="<?= site_url('admin/artikel/tambah') ?>" class="btn btn-primary btn-sm mt-2">
                    <i class="bi bi-plus-lg"></i> Tambah Artikel
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white fw-semibold">Artikel Terbaru</div>
            <ul class="list-group list-group-flush">
                <?php if (empty($latestArticles)): ?>
                    <li class="list-group-item text-muted">Belum ada artikel.</li>
                <?php else: ?>
                    <?php foreach ($latestArticles as $a): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><?= esc($a['title']) ?></span>
                            <span class="badge bg-<?= $a['status'] === 'published' ? 'success' : 'secondary' ?>">
                                <?= esc($a['status']) ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white fw-semibold">Feedback Terbaru</div>
            <ul class="list-group list-group-flush">
                <?php if (empty($latestFeedback)): ?>
                    <li class="list-group-item text-muted">Belum ada feedback.</li>
                <?php else: ?>
                    <?php foreach ($latestFeedback as $f): ?>
                        <li class="list-group-item">
                            <div class="fw-semibold"><?= esc($f['name']) ?> <span class="text-muted small">(<?= esc($f['email']) ?>)</span></div>
                            <div class="small text-truncate"><?= esc($f['message']) ?></div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>
