<div class="container py-5">
    <div class="form-container">
        <h2>Add New Institution</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/admin/institution/store" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"><?= old('description') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?= old('location') ?>" placeholder="Enter location">
            </div>
            <div class="mb-3">
                <label for="regionId" class="form-label">Region</label>
                <select class="form-select" id="regionId" name="regionId">
                    <option value="">Select region...</option>
                    <?php foreach ($regions as $region): ?>
                        <option value="<?= $region['regionId'] ?>"><?= $region['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="domain" class="form-label">Domain</label>
                <input type="text" class="form-control" id="domain" name="domain" value="<?= old('domain') ?>" placeholder="Enter domain">
            </div>
            <button type="submit" class="btn btn-primary">Add Institution</button>
        </form>
    </div>
</div>
