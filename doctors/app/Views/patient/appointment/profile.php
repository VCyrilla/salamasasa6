<div class="container py-5" style="min-height: 50vh;">
    <h2 class="pb-2">Appointment Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title py-2">Dr. <?= $doctor['name'] ?></h5>
			
			<hr>
			
			<p class="card-text"><strong>Date:</strong> <?= $appointment['appointmentDate'] ?></p>
            <p class="card-text"><strong>Start Time:</strong> <?= $appointment['startTime'] ?></p>
            <p class="card-text"><strong>End Time:</strong> <?= $appointment['endTime'] ?></p>
            <p class="card-text"><strong>Status:</strong> <?= $appointment['status'] ?></p>
            <p class="card-text"><strong>Ratings:</strong> <?= $appointment['ratings'] ?></p>
            <p class="card-text"><strong>Review:</strong> <?= $appointment['review'] ?></p>
            <p class="card-text"><strong>Doctor Comments:</strong> <?= $appointment['doctorComments'] ?></p>


            <?php if ($appointment['status'] !== 'Cancelled'): ?>
			<hr>
                <a href="<?= site_url('/patient/appointment/cancel/' . $appointment['appointmentId']) ?>" class="my-2 btn btn-danger">Cancel Appointment</a>
            <?php endif; ?>

            <?php if ($appointment['status'] !== 'Cancelled'): ?>
                <form action="<?= site_url('/patient/appointment/rate/' . $appointment['appointmentId']) ?>" method="post" class="mt-3">
                    <div class="form-group pb-2">
                        <label for="rating">Rate the Appointment</label>
                        <input type="number" name="rating" id="rating" class="form-control" max="5" min="1" required>
                    </div>
                    <button type="submit" class="my-2 btn btn-success">Submit Rating</button>
                </form>

                <form action="<?= site_url('/patient/appointment/addReview/' . $appointment['appointmentId']) ?>" method="post" class="mt-3">
                    <div class="form-group">
                        <label for="review">Write a Review</label>
                        <textarea name="review" id="review" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="my-2 btn btn-success">Submit Review</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <a href="/patient/" class="btn btn-primary mt-3">Back to Appointments</a>
</div>

