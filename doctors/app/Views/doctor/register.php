						
	<div class="form-page py-5" style="height: auto;">
<div class="login-container">
	<h2>Doctor Registration</h2>

	<?php if (session()->getFlashdata('error')): ?>
		<div class="alert alert-danger">
			<?= session()->getFlashdata('error') ?>
		</div>
	<?php endif; ?>

	<?php if (session()->getFlashdata('message')): ?>
		<div class="alert alert-success">
			<?= session()->getFlashdata('message') ?>
		</div>
	<?php endif; ?>

    <form action="<?= base_url('auth/doctor/store') ?>" method="post">
        <?= csrf_field() ?>
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="mb-3">
							<label for="emailAddress" class="form-label">Email address</label>
							<input type="email" class="form-control" id="emailAddress" name="emailAddress" required>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" id="password" name="password" required>
						</div>
						<div class="mb-3">
							<label for="phoneNumber" class="form-label">Phone Number</label>
							<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
						</div>
						<div class="mb-3">
							<label for="licenseNumber" class="form-label">License Number</label>
							<input type="text" class="form-control" id="licenseNumber" name="licenseNumber" required>
						</div>
						<div class="mb-3">
							<label for="specializationId" class="form-label">Specialization</label>
							<select class="form-select" id="specializationId" name="specializationId" required>
        <option value="">Select specialization...</option>
        <?php foreach ($specializations as $specialization): ?>
            <option value="<?= $specialization['specializationId'] ?>"><?= $specialization['title'] ?></option>
        <?php endforeach; ?>
    </select>
						</div>
						<div class="mb-3">
							<label for="institutionId" class="form-label">Institution</label>
							<select class="form-select" id="institutionId" name="institutionId" required>
                    <option value="">Select institution...</option>
                    <?php foreach ($institutions as $institution): ?>
                        <option value="<?= $institution['institutionId'] ?>"><?= $institution['name'] ?></option>
                    <?php endforeach; ?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Register</button>
					</form>
	<p class="mt-3">Already have an account? <a href="/auth/doctor/login">Click to go to login page</a></p>
</div>
</div>
