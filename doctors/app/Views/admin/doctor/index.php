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
                        <?php if ($doctor['isApproved']): ?>
                            <a href="/admin/doctor/disapprove/<?= $doctor['doctorId'] ?>" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to disapprove this doctor?')">Disapprove</a>
                        <?php else: ?>
                            <a href="/admin/doctor/approve/<?= $doctor['doctorId'] ?>" class="btn btn-sm btn-success">Approve</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

