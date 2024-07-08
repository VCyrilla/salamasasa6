<div class="container py-5">
    <h2>Registered Doctors</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <table id="doctorsTable" class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Specialization</th>
                <th>Institution</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($doctors as $doctor): ?>
                    <tr>
                        <td><?= esc($doctor['name']) ?></td>
                        <td><?= esc($doctor['emailAddress']) ?></td>
                        <td><?= esc($doctor['phoneNumber']) ?></td>
                        <td><?= esc($doctor['specializationTitle']) ?></td>
                        <td><?= esc($doctor['institutionName']) ?></td>
                        <td>
                            <a href="/admin/doctor/delete/<?= $doctor['doctorId'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>
