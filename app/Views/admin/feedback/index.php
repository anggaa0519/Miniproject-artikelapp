<?= $this->include('templates/head') ?>
<?= $this->include('templates/side_nav') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Feedback Pengguna</h3>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th style="width: 170px;">Dikirim</th>
                    <th style="width: 90px;" class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($feedbackList)): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada feedback dari pengguna.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($feedbackList as $i => $fb): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($fb['name']) ?></td>
                            <td><?= esc($fb['email']) ?></td>
                            <td style="max-width: 320px;"><?= esc($fb['message']) ?></td>
                            <td><?= esc($fb['created_at']) ?></td>
                            <td class="text-end">
                                <button type="button"
                                        class="btn btn-sm btn-outline-danger"
                                        data-confirm-delete
                                        data-form="#delete-fb-<?= $fb['id'] ?>"
                                        data-name="feedback dari &quot;<?= esc($fb['name'], 'attr') ?>&quot;"
                                        title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-fb-<?= $fb['id'] ?>"
                                      action="<?= site_url('admin/feedback/hapus/' . $fb['id']) ?>"
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
