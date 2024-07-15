<div class="container py-5">
    <h2>View Appointments</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <table id="appointmentsTable" class="table table-striped">
        <thead>
            <tr>
                <th>Doctor</th>
                <th>Patient</th>
                <th>Appointment Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= esc($appointment['doctor_name']) ?></td>
                    <td><?= esc($appointment['patient_name']) ?></td>
                    <td><?= esc($appointment['appointmentDate']) ?></td>
                    <td><?= esc($appointment['startTime']) ?></td>
                    <td><?= esc($appointment['endTime']) ?></td>
                    <td><?= esc($appointment['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#appointmentsTable').DataTable();
});
</script>
