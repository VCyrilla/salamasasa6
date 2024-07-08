<div class="container" style="min-height: 50vh;">
    <div class="table-container">
        <h2>Regions List</h2>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <table id="regionsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($regions as $region): ?>
                    <tr>
                        <td><?= esc($region['name']) ?></td>
                        <td><?= esc($region['description']) ?></td>
                        <td>
                            <a href="/admin/region/edit/<?= $region['regionId'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="/admin/region/delete/<?= $region['regionId'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this region?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
