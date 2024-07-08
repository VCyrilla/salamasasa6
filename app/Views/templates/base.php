<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
    <link rel="shortcut icon" type="/image/png" href="/images/favicon.png">
    <style>
        .hero-section {
            background-image: url('/images/home.png');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 150px 0;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }
        .hero-section .btn {
            background-color: #ff6600;
            border: none;
        }
        .navbar, .footer {
            background-color: #004080;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
		.form-page {
			font-family: 'Arial', sans-serif;
			background-color: #f8f9fa;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 80vh;
		}

		.login-container {
			background-color: #ffffff;
			width: 80%;
			max-width: 500px;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}
		.alert {
			margin-bottom: 20px;
		}
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?= view('templates/navbar'); ?>

    <!-- Content Section -->
    <div class="">
        <?= $content ?>
	</div>

    <!-- Footer Section -->
    <?= view('templates/footer'); ?>

    <!-- Bootstrap JS and any additional scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</body>
</html>

