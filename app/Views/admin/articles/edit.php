<?= $this->include('templates/head') ?>
<?= $this->include('templates/side_nav') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Edit Artikel</h3>
    <a href="<?= site_url('admin/artikel') ?>" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<?php $errors = session('errors') ?? []; ?>

<div class="card">
    <div class="card-body">
        <form action="<?= site_url('admin/artikel/edit/' . $article['id']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="title" class="form-label">Judul Artikel</label>
                <input type="text"
                       class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>"
                       id="title" name="title"
                       value="<?= old('title', $article['title']) ?>"
                       placeholder="Masukkan judul artikel">
                <?php if (isset($errors['title'])): ?>
                    <div class="invalid-feedback"><?= esc($errors['title']) ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control" id="content" name="content" rows="8"><?= old('content', $article['content']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <?php $currentStatus = old('status', $article['status']); ?>
                <select class="form-select <?= isset($errors['status']) ? 'is-invalid' : '' ?>" id="status" name="status">
                    <option value="">-- Pilih status --</option>
                    <option value="draft" <?= $currentStatus === 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="published" <?= $currentStatus === 'published' ? 'selected' : '' ?>>Published</option>
                </select>
                <?php if (isset($errors['status'])): ?>
                    <div class="invalid-feedback"><?= esc($errors['status']) ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Perbarui Artikel
            </button>
        </form>
    </div>
</div>

<?= $this->include('templates/footer') ?>
