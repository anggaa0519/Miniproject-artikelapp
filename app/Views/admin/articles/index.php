<?= $this->include('templates/head') ?>
<?= $this->include('templates/side_nav') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Daftar Artikel</h3>
    <a href="<?= site_url('admin/artikel/tambah') ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Artikel
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Judul</th>
                    <th style="width: 130px;">Status</th>
                    <th style="width: 170px;">Dibuat</th>
                    <th style="width: 150px;" class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($articles)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada artikel.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($articles as $i => $article): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($article['title']) ?></td>
                            <td>
                                <span class="badge bg-<?= $article['status'] === 'published' ? 'success' : 'secondary' ?>">
                                    <?= esc($article['status']) ?>
                                </span>
                            </td>
                            <td><?= esc($article['created_at']) ?></td>
                            <td class="text-end">
                                <a href="<?= site_url('admin/artikel/edit/' . $article['id']) ?>"
                                   class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button type="button"
                                        class="btn btn-sm btn-outline-danger"
                                        data-confirm-delete
                                        data-form="#delete-form-<?= $article['id'] ?>"
                                        data-name="&quot;<?= esc($article['title'], 'attr') ?>&quot;"
                                        title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-form-<?= $article['id'] ?>"
                                      action="<?= site_url('admin/artikel/hapus/' . $article['id']) ?>"
                                      method="post" class="d-none">
                                    <?= csrf_field() ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('templates/footer') ?>
