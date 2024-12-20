<?php
include("../database/connect.php");
include("../controllers/userController.php");

session_start(); // HARUS DITAMBAH KETIKA MENGGUNAKAN SESSION

// REDIRECT USER YANG BELOM LOGIN KE KE LOGIN/REGISTER
if (!isset($_SESSION['login'])) {
    header('location: ../auth/login.php');
    exit;
}

// MENGSET PARAMETER FUNCTION DENGAN $_POST
if (isset($_POST['updateReport'])) {
    updateReport($_POST);
}

// KUMPULAN VARIABLE

$reportId = $_GET['id']; // Ambil ID laporan dari URL
$query = "SELECT * FROM reports WHERE id = $reportId";
$result = mysqli_query($conn, $query);

// Ambil data spesifik
$data = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Report - E-Report Website</title>
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
                            <a class="nav-link text-white" href="#">
                                <i class="bi bi-house"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="views/create.php">
                                <i class="bi bi-person"></i> Create Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="auth/logout.php">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main>
                <div class="container my-auto mt-5" style="width: 5000px;">
                    <h1 class="mb-3 fw-semibold">Edit your report complaint</h1>
                    <p class="mb-5">Edit your report about <?php echo $data['title'] ?></p>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <div class="mb-3">
                            <label for="title" class="form-label">Report Name</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $data['title'] ?>" required>
                        </div>
                        <div class="mb-5">
                            <label for="description" class="form-label">Report Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"><?= $data['description'] ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="updateReport">
                            Save
                        </button>
                </div>
            </main>
        </div>
    </header>
</body>

</html>