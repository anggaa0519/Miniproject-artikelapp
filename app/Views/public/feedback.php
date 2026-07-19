<?= $this->include('public/header') ?>

<?php $errors = session('errors') ?? []; ?>

<div class="row justify-content-center">
    <div class="col-md-7">
        <h2 class="mb-4">Kirim Feedback</h2>

        <div class="card">
            <div class="card-body">
                <form action="<?= site_url('feedback') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text"
                               class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                               id="name" name="name" value="<?= old('name') ?>"
                               placeholder="Nama Anda">
                        <?php if (isset($errors['name'])): ?>
                            <div class="invalid-feedback"><?= esc($errors['name']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                               id="email" name="email" value="<?= old('email') ?>"
                               placeholder="nama@email.com">
                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback"><?= esc($errors['email']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"
                                  id="message" name="message" rows="5"
                                  placeholder="Tulis masukan Anda..."><?= old('message') ?></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <div class="invalid-feedback"><?= esc($errors['message']) ?></div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send"></i> Kirim Feedback
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('public/footer') ?>
