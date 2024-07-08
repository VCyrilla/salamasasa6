<div class="container mt-4" style="min-height: 50vh;">
	<h2>My Appointments</h2>
	<table id="appointments-table" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Doctor</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($appointments as $appointment): ?>
			<tr>
				<td><?= $appointment['doctor_name'] ?></td>
				<td><?= $appointment['start_time'] ?></td>
				<td><?= $appointment['end_time'] ?></td>
				<td><?= $appointment['status'] ?></td>
				<td>
					<?php if ($appointment['status'] == 'Pending'): ?>
						<a href="<?= site_url('/patient/appointment/cancel/' . $appointment['id']) ?>" class="btn btn-sm btn-danger">Cancel</a>
					<?php endif; ?>
					<a href="<?= site_url('/patient/appointment/view/' . $appointment['id']) ?>" class="btn btn-sm btn-primary">View</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<a href="/patient/doctors/search" class="btn btn-primary mt-3">Explore available doctors</a>
</div>

<script>
$(document).ready(function() {
	$('#appointments-table').DataTable();
});
</script>
