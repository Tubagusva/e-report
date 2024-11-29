<?php
include("../database/connect.php");
include("../controllers/userController.php");


session_start(); // HARUS DITAMBAH KETIKA MENGGUNAKAN SESSION

// REDIRECT USER YANG BELOM LOGIN KE KE LOGIN/REGISTER
if (!isset($_SESSION['login'])) {
    header('location: ../auth/login.php');
    exit;
}

if(isset($_GET['createReport'])) {
    createReport($_GET);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Report - E-Report Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <header>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white vh-100" style="width: 250px;">
            <div class="p-3">
                <h4 class="text-center">My Dashboard</h4>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../index.php">
                            <i class="bi bi-house"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../views/create.php">
                            <i class="bi bi-person"></i> Create Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../auth/logout.php">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container my-auto mt-5">
            <h1 class="mb-3 fw-semibold">Report your complaint</h1>
            <p class="mb-5">Make sure you report a real fact/news or problems that you have!</p>
            <form action="" method="GET">
                <div class="mb-3">
                    <label for="title" class="form-label">Report Name</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter your report name here!" required>
                </div>
                <div class="mb-5">
                    <label for="description" class="form-label">Report Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter your explanations here!"></textarea>
                </div>
                <button type="submit" class="btn btn-primary bg-danger border-danger" name="createReport">
                    Submit
                </button>
        </div>
    </div>

    </header>
    <main>

    </main>
</body>

</html>