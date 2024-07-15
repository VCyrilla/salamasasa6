<div class="container py-5">
    <div class="form-container">
        <h2 class="pb-2">Create Appointment with Dr. <?= $doctor['name'] ?></h2>
        <p><strong>Specialization:</strong> <?= $doctor['specializationTitle'] ?></p>
        <p><strong>Institution:</strong> <?= $doctor['institutionName'] ?></p>
        <p><strong>Region:</strong> <?= $doctor['regionName'] ?></p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/patient/appointment/store" method="post">
            <input type="hidden" name="doctorId" value="<?= $doctor['doctorId'] ?>">
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Date</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="start_time" name="start_time" required>
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="time" class="form-control" id="end_time" name="end_time" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Appointment</button>
        </form>
    </div>
</div>
