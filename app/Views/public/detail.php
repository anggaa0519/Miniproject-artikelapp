<?= $this->include('public/header') ?>

<a href="<?= site_url('/') ?>" class="btn btn-sm btn-outline-secondary mb-3">&larr; Kembali</a>

<article>
    <h2><?= esc($article['title']) ?></h2>
    <p class="text-muted small">Dipublikasikan pada <?= esc($article['created_at']) ?></p>
    <div class="mt-4" style="white-space: pre-line;"><?= esc($article['content']) ?></div>
</article>

<?= $this->include('public/footer') ?>
