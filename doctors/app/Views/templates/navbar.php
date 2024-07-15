<nav class="navbar navbar-expand-lg navbar-dark">
	<div class="container">
		<a class="navbar-brand" href="/">Salama Sasa</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('/'); ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('/operations'); ?>">Operations</a>
				</li>
				<?php if (session()->has('user_type')): ?>
				<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php if (session()->get('imageUrl')): ?>
								<img src="<?= base_url(session()->get('imageUrl')); ?>" alt="Profile Image" style="width: 30px; height: 30px; border-radius: 50%;">
							<?php endif; ?>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li><span class="dropdown-item"><?= session()->get('email_address') ?></span></li>
						<li><span class="dropdown-item"><?= session()->get('user_type') ?></span></li>
							<li><a class="dropdown-item" href="<?= site_url(session()->get('user_type') . '/dashboard'); ?>">Dashboard</a></li>
							<li><a class="dropdown-item" href="<?= site_url('auth/' . session()->get('user_type') . '/logout'); ?>">Logout</a></li>
						</ul>
					</li>
				<?php else: ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('auth/doctor/register'); ?>">Register as Doctor</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('auth/patient/register'); ?>">Register as Patient</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('auth/patient/login'); ?>">Login</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
