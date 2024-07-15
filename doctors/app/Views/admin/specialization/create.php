<div class="container py-5">
    <div class="form-container">
        <h2>Create Specialization</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/admin/specialization/store') ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Specialization Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Create Specialization</button>
        </form>
    </div>
</div>
