<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Institution</title>
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
        <h2>Edit Institution</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/admin/institution/update/<?= $institution['institutionId'] ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $institution['name']) ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"><?= old('description', $institution['description']) ?></textarea>
            </div>
            <div class="mb-3 d-none">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?= old('location') ?>" placeholder="Enter location">
            </div>
            <div class="mb-3">
                <label for="regionId" class="form-label">Region</label>
                <select class="form-select" id="regionId" name="regionId">
                    <option value="">Select region...</option>
                    <?php foreach ($regions as $region): ?>
                        <option value="<?= $region['regionId'] ?>" <?= ($institution['regionId'] == $region['regionId']) ? 'selected' : '' ?>><?= $region['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="domain" class="form-label">Domain</label>
                <input type="text" class="form-control" id="domain" name="domain" value="<?= old('domain', $institution['domain']) ?>" placeholder="Enter domain">
            </div>
            <button type="submit" class="btn btn-primary">Update Institution</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2rXlK13XfNEEF2GnxZ8uH3/9tww5sc5B1" crossorigin="anonymous"></script>
</body>
</html>

