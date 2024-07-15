<div class="container py-5">
    <h2>Manage Institutions</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success mt-3">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger mt-3">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <a href="/admin/institution/create" class="btn btn-primary mt-3">Add New Institution</a>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
        <?php foreach ($institutions as $institution): ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $institution['name'] ?></h5>
                        <p class="card-text"><?= $institution['description'] ?></p>
                        <p class="card-text">Location: <?= $institution['location'] ?></p>
                        <p class="card-text">Region: <?= $institution['region_name'] ?></p>
                        <a href="/admin/institution/edit/<?= $institution['institutionId'] ?>" class="btn btn-primary">Edit</a>
                        <a href="/admin/institution/delete/<?= $institution['institutionId'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this institution?')">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
