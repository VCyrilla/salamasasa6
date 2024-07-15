	<div class="form-page py-3" style="height: auto;">
<div class="login-container">
	<h2>Administrator Registration</h2>

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

	<form action="<?= base_url('auth/admin/store') ?>" method="post">
		<?= csrf_field() ?>
		<div class="mb-3">
			<label for="name" class="form-label">Full Name</label>
			<input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" required>
		</div>
		<div class="mb-3">
			<label for="emailAddress" class="form-label">Email address</label>
			<input type="email" class="form-control" id="emailAddress" name="emailAddress" value="<?= set_value('emailAddress') ?>" required>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>
		<div class="mb-3">
			<label for="phoneNumber" class="form-label">Phone Number</label>
			<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?= set_value('phoneNumber') ?>" required>
		</div>
		<button type="submit" class="btn btn-primary">Register</button>
	</form>
	<p class="mt-3">Don't have an account? <a href="/auth/admin/login">Click here to login</a></p>
</div>
</div>

