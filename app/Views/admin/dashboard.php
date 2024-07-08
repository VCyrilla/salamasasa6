	<style>
		.dashboard-container {
			margin-top: 30px;
		}
		.card {
			margin-bottom: 20px;
			border-radius: 10px;
			transition: transform 0.2s;
		}
		.card:hover {
			transform: scale(1.05);
		}
		.card i {
			font-size: 2rem;
			margin-bottom: 10px;
			color: #007bff;
		}
		.card-title {
			font-size: 1.25rem;
			font-weight: bold;
		}
	</style>

<div class="container dashboard-container">
	<div class="row">
		<div class="col-md-4">
			<div class="card py-3 text-center shadow-sm">
				<div class="card-body">
					<i class="fas fa-3x fa-user-md"></i>
					<h5 class="card-title py-2">Registered Doctors</h5>
					<p class="card-text py-2">Manage all registered doctors.</p>
					<a href="/admin/doctor" class="btn btn-primary">View Doctors</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card py-3 text-center shadow-sm">
				<div class="card-body">
					<i class="fas fa-3x fa-calendar-alt"></i>
					<h5 class="card-title py-2">Scheduled Appointments</h5>
					<p class="card-text py-2">View and manage all appointments.</p>
					<a href="/admin/appointments" class="btn btn-primary">View Appointments</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card py-3 text-center shadow-sm">
				<div class="card-body">
					<i class="fas fa-3x fa-hospital"></i>
					<h5 class="card-title py-2">Registered Institutions</h5>
					<p class="card-text py-2">Manage all registered institutions.</p>
					<a href="/admin/institution" class="btn btn-primary">View Institutions</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card py-3 text-center shadow-sm">
				<div class="card-body">
					<i class="fas fa-3x fa-map-marker-alt"></i>
					<h5 class="card-title py-2">Created Regions</h5>
					<p class="card-text py-2">Manage all created regions.</p>
					<a href="/admin/region" class="btn btn-primary">View Regions</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card py-3 text-center shadow-sm">
				<div class="card-body">
					<i class="fas fa-3x fa-stethoscope"></i>
					<h5 class="card-title py-2">Created Specializations</h5>
					<p class="card-text py-2">Manage all created specializations.</p>
					<a href="/admin/specialization" class="btn btn-primary">View Specializations</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card py-3 text-center shadow-sm">
				<div class="card-body">
					<i class="fas fa-3x fa-user-shield"></i>
					<h5 class="card-title py-2">Admin Profile</h5>
					<p class="card-text py-2">View and edit your profile.</p>
					<a href="/admin/profile" class="btn btn-primary">View Profile</a>
				</div>
			</div>
		</div>
	</div>
</div>
