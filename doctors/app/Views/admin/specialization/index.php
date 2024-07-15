<div class="container py-5">
    <h2 class="mb-2">Specializations</h2>

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

	<a href="/admin/specialization/create" class="btn btn-primary my-3">Add New Specialization</a>
	
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specializations as $specialization): ?>
                <tr>
                    <td><?= $specialization['specializationId'] ?></td>
                    <td><?= $specialization['title'] ?></td>
                    <td><?= $specialization['description'] ?></td>
                    <td>
                        <a href="<?= base_url('/admin/specialization/edit/' . $specialization['specializationId']) ?>" class="my-2 btn btn-warning">Edit</a>
                        <a href="<?= base_url('/admin/specialization/delete/' . $specialization['specializationId']) ?>" class="my-2 btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
