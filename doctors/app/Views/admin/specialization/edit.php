<div class="container py-5">
    <div class="form-container">
        <h2>Edit Specialization</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="/admin/specialization/update/<?= esc($specialization['specializationId']) ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= esc($specialization['title']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required><?= esc($specialization['description']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Specialization</button>
        </form>
    </div>
</div>
