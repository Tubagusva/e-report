<?php
include("../database/connect.php");
include("../controllers/userController.php");

// HARUS DITAMBAG KETIKA MENGGUNAKAN SESSION
session_start();

// REDIRECT USER YANG BELUM LOGIN KE LOGIN.php
if (!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

// Penjelasan:
// JOIN akan menggabungkan data dari kedua tabel berdasarkan kondisi yang Anda tentukan, dalam hal ini users.id = reports.user_id.


if (isset($_GET['id'])) {
    $reportId = $_GET['id'];

    // Ambil detail laporan berdasarkan $reportId
    // Misalnya menggunakan query SQL:
    $query = "SELECT users.*, reports.* FROM users JOIN reports ON users.id = reports.user_id WHERE reports.id = " . intval($reportId);
    $result = mysqli_query($conn, $query);
    $report = mysqli_fetch_assoc($result);

    $title = $report['title'];
    $description = $report['description'];
    $name = $report['name'];
    $id = $report['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details - E-Report Website</title>
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
                <div class="container mt-5" style="width: 9000px;">
                    <div class="card">
                        <div class="card-body">
                            <?php echo "<h1 class='text-center fw-bold'>$title</h1>" ?>
                            <?php echo "<h6 class='text-center '>Reported by: $name</h6>" ?>
                            <?php echo "<p class='text-justify mt-4'>$description</p>" ?>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm btn-action w-100 mb-2"
                                onclick="document.location.href='update.php?id=<?php echo $id ?>'">Edit</button>
                            <form action="../controllers/delete.php" method="POST">
                                <input readonly type="hidden" name="id" value="<?= $id ?>">
                                <button class="btn btn-danger btn-sm btn-action w-100" type="submit"
                                    name="delete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>  
    </header>
</body>

</html>