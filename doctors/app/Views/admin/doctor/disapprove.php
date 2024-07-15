<div class="container">
    <div class="form-container">
        <h2>Disapprove Doctor</h2>

        <div class="alert alert-warning" role="alert">
            Are you sure you want to disapprove the following doctor?
        </div>
        
        <dl class="row">
            <dt class="col-sm-3">Name:</dt>
            <dd class="col-sm-9"><?= esc($doctor['name']) ?></dd>

            <dt class="col-sm-3">Email:</dt>
            <dd class="col-sm-9"><?= esc($doctor['emailAddress']) ?></dd>

            <dt class="col-sm-3">Specialization:</dt>
            <dd class="col-sm-9"><?= esc($doctor['specialization']) ?></dd>

            <dt class="col-sm-3">Institution:</dt>
            <dd class="col-sm-9"><?= esc($doctor['institution']) ?></dd>
        </dl>

        <form action="/admin/doctor/disapprove/<?= esc($doctor['doctorId']) ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-danger">Disapprove</button>
            <a href="/admin/dashboard" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
