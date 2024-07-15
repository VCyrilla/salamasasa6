<div class="container py-5">
    <div class="form-container">
        <h2>Edit Region</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="/admin/region/update/<?= $region['regionId'] ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $region['name']) ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"><?= old('description', $region['description']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Region</button>
        </form>
    </div>
</div>
