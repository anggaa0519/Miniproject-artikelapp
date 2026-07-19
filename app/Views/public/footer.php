</div>
<footer class="text-center text-muted small py-4 border-top">
    &copy; <?= date('Y') ?> Blog Artikel &mdash; dibangun dengan CodeIgniter 4
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: <?= json_encode(session()->getFlashdata('success')) ?>,
        timer: 2500,
        showConfirmButton: false
    });
<?php endif; ?>
</script>
</body>
</html>
