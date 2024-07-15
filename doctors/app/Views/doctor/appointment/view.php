<div class="container my-4">
    <h2 class="py-3">Appointment Details</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Patient Email:</strong> <?= $patient['emailAddress'] ?></p>
                    <p><strong>Date:</strong> <?= date('Y-m-d', strtotime($appointment['appointmentDate'])) ?></p>
                    <p><strong>Start Time:</strong> <?= date('H:i', strtotime($appointment['startTime'])) ?></p>
                    <p><strong>End Time:</strong> <?= date('H:i', strtotime($appointment['endTime'])) ?></p>
                    <p><strong>Status:</strong> <?= $appointment['status'] ?></p>
            <p class="card-text"><strong>Ratings:</strong> <?= $appointment['ratings'] ?></p>
            <p class="card-text"><strong>Review:</strong> <?= $appointment['review'] ?></p>
            <p class="card-text"><strong>Doctor Comments:</strong> <?= $appointment['doctorComments'] ?></p>
				</div>

				<div class="col-md-6 pt-3">
    <?php if ($appointment['status'] === 'Approved'): ?>
                    <form action="<?= site_url('/doctor/appointment/add-comments/' . $appointment['appointmentId']) ?>" method="post">
                        <div class="form-group">
                            <label for="doctor_comments">Add Doctor Comments</label>
                            <textarea class="form-control" id="doctor_comments" name="doctor_comments" rows="3"><?= $appointment['doctorComments'] ?></textarea>
                        </div>
                        <button type="submit" class="my-3 btn btn-primary">Save Comments</button>
                    </form>
    <?php endif; ?>
        <div class="mt-3">
	
	<?php if ($appointment['status'] === 'Pending'): ?>
            <a href="<?= site_url('/doctor/appointment/approve/' . $appointment['appointmentId']) ?>" class="btn btn-success">Approve</a>
    <?php endif; ?>
	
	<?php if ($appointment['status'] !== 'Cancelled'): ?>
            <a href="<?= site_url('/doctor/appointment/cancel/' . $appointment['appointmentId']) ?>" class="btn btn-danger">Cancel</a>
        </div>
    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>
