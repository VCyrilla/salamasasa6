	<div class="form-page">
<div class="login-container">
	<h2>Doctor Login</h2>

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

    <form action="<?= base_url('auth/doctor/login/action') ?>" method="post">
        <?= csrf_field() ?>
		<div class="mb-3">
			<label for="emailAddress" class="form-label">Email Address</label>
			<input type="email" class="form-control" id="emailAddress" name="emailAddress" value="<?= old('emailAddress') ?>" required>
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>
		<button type="submit" class="btn btn-primary">Login</button>
	</form>

	<p class="mt-3">Don't have an account? <a href="/auth/doctor/register">Register here</a></p>
</div>
</div>
