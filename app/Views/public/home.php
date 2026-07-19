<?= $this->include('public/header') ?>

<h2 class="mb-4">Artikel Terbaru</h2>

<?php if (empty($articles)): ?>
    <p class="text-muted">Belum ada artikel yang dipublikasikan.</p>
<?php else: ?>
    <div class="row g-3">
        <?php foreach ($articles as $article): ?>
            <div class="col-md-6">
                <div class="card article-card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($article['title']) ?></h5>
                        <p class="card-text text-muted small">
                            <?= esc(character_limiter(strip_tags((string) $article['content']), 140)) ?>
                        </p>
                        <a href="<?= site_url('artikel/' . $article['id']) ?>" class="btn btn-sm btn-primary">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?= $this->include('public/footer') ?>
