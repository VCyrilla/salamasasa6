<div class="container mt-4" style="min-height: 50vh;">
	<h2>My Appointments</h2>
	<table id="appointments-table" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Date</th>
				<th>Start Time</th>
				<th>End Time</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($appointments as $appointment): ?>
			<tr>
				<td><?= date('Y-m-d', strtotime($appointment['appointmentDate'])) ?></td>
				<td><?= date('H:i', strtotime($appointment['startTime'])) ?></td>
				<td><?= date('H:i', strtotime($appointment['endTime'])) ?></td>
				<td><?= $appointment['status'] ?></td>
				<td>
					<?php if ($appointment['status'] == 'Pending'): ?>
						<a href="<?= site_url('/doctor/appointment/cancel/' . $appointment['appointmentId']) ?>" class="btn btn-sm btn-danger">Cancel</a>
					<?php endif; ?>
					<a href="<?= site_url('/doctor/appointment/view/' . $appointment['appointmentId']) ?>" class="btn btn-sm btn-primary">View</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script>
$(document).ready(function() {
	$('#appointments-table').DataTable();
});
</script>
