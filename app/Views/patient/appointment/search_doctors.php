<div class="container py-3 my-3" style="min-height: 50vh;">
    <h2>Search Doctors</h2>
    <table id="doctorTable" class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Specialization</th>
                <th>Institution</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctors as $doctor) : ?>
                <tr>
                    <td><?= $doctor['name']; ?></td>
                    <td><?= $doctor['emailAddress']; ?></td>
                    <td><?= $doctor['phoneNumber']; ?></td>
                    <td><?= $doctor['specializationTitle']; ?></td>
                    <td><?= $doctor['institutionName']; ?></td>
                    <td>
                        <a href="<?= site_url('patient/appointment/create/' . $doctor['doctorId']); ?>" class="btn btn-primary">Create Appointment</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
