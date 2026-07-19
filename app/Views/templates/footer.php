</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
<?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: <?= json_encode(session()->getFlashdata('success')) ?>,
        timer: 2200,
        showConfirmButton: false
    });
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: <?= json_encode(session()->getFlashdata('error')) ?>
    });
<?php endif; ?>

/**
 * Generic delete confirmation. Attach to any button with:
 * data-confirm-delete, data-form="#formId", data-name="label"
 */
document.querySelectorAll('[data-confirm-delete]').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const formSelector = btn.getAttribute('data-form');
        const itemName = btn.getAttribute('data-name') || 'data ini';
        const form = document.querySelector(formSelector);

        Swal.fire({
            title: 'Hapus data?',
            text: 'Anda yakin ingin menghapus ' + itemName + '? Tindakan ini tidak dapat dibatalkan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then(function (result) {
            if (result.isConfirmed && form) {
                form.submit();
            }
        });
    });
});
</script>
</body>
</html>
