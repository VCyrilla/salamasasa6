<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #004080;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Specializations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Regions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="form-container">
        <h2>Approve Doctor</h2>

        <div class="alert alert-info" role="alert">
            Are you sure you want to approve the following doctor?
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

        <form action="/admin/doctor/approve/<?= esc($doctor['doctorId']) ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-success">Approve</button>
            <a href="/admin/dashboard" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2rXlK13XfNEEF2GnxZ8uH3/9tww5sc5B1" crossorigin="anonymous"></script>
</body>
</html>

