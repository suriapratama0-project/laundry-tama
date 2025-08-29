<?php
include '../function/function.php';
include '../config/session2.php';
$pelangganList = getAllPelanggan();

// --- Pagination ---
$perPage = 10; // jumlah data per halaman
$totalData = count($pelangganList);
$totalPages = ceil($totalData / $perPage);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

$start = ($page - 1) * $perPage;

// Potong data sesuai halaman
$pelangganPage = array_slice($pelangganList, $start, $perPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laundry - Tama</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .table-bordered,
        .table-bordered th,
        .table-bordered td {
            border: 0.5px solid rgba(0, 0, 0, 0.2) !important;
            /* kasih border hitam */
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Laundry <sup>Tama</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Home -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Managemen
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Managemen Harga</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="managemen_jenis_layanan.php">Jenis Layanan</a>
                        <a class="collapse-item" href="managemen_jenis_laundry_satuan.php">Jenis Laundry (satuan)</a>
                        <a class="collapse-item" href="managemen_jenis_laundry_kiloan.php">Jenis Laundry (kiloan)</a>
                    </div>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="managemen_pelanggan.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Managemen Pelanggan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Utama
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="transaksi_baru.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transaksi Baru</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="form_hasil_transaksi.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Hasil Transaksi</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></span>
                                <img class="img-profile rounded-circle" src="../assets/images/people4.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item disabled" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Pelanggan Baru</h1>
                    <p class="mb-5">Silakan masukkan data pelanggan baru</p>
                </div>
                <!-- Begin Page Content -->
                <div class="container mt-4">
                    <!-- Card: List Pelanggan -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">List Pelanggan</div>
                        <div class="card-body">
                            <!-- Tombol Tambah Data -->
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                Tambah
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nomor</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($pelangganPage): ?>
                                            <?php $no = $start + 1; ?>
                                            <?php foreach ($pelangganPage as $pelanggan): ?>
                                                <tr class="align-middle">
                                                    <td class="text-center align-middle"><?= $no++ ?></td>
                                                    <td class="text-center align-middle"><?= htmlspecialchars($pelanggan['nama_pelanggan']) ?></td>
                                                    <td class="text-center align-middle"><?= $pelanggan['nomor_pelanggan'] ?></td>
                                                    <td class="text-center align-middle"><?= $pelanggan['alamat_pelanggan'] ?></td>
                                                    <td class="text-center align-middle">
                                                        <!-- Tombol Edit buka modal -->
                                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $pelanggan['id_pelanggan'] ?>">
                                                            Edit
                                                        </button>

                                                        <!-- Form Hapus -->
                                                        <form action="../proses/proses_pelanggan.php" method="post" onsubmit="return confirm('Yakin hapus?');" style="display:inline;">
                                                            <input type="hidden" name="hapus_id" value="<?= $pelanggan['id_pelanggan'] ?>">
                                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>

                                                        <!-- Modal Edit -->
                                                        <div class="modal fade" id="editModal<?= $pelanggan['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $pelanggan['id_pelanggan'] ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <form action="../proses/proses_pelanggan.php" method="post" class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel<?= $pelanggan['id_pelanggan'] ?>">Ubah Data Pelanggan</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: left;">
                                                                        <input type="hidden" name="edit_id" value="<?= $pelanggan['id_pelanggan'] ?>">
                                                                        <div class="mb-3">
                                                                            <label for="nama_pelanggan" class="form-label"> Nama</label>
                                                                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= htmlspecialchars($pelanggan['nama_pelanggan']) ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nomor_pelanggan" class="form-label">Nomor</label>
                                                                            <input type="number" class="form-control" id="nomor_pelanggan" name="nomor_pelanggan" value="<?= $pelanggan['nomor_pelanggan'] ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="alamat_pelanggan" class="form-label">Alamat</label>
                                                                            <textarea class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" required><?= $pelanggan['alamat_pelanggan'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr class="align-middle">
                                                <td>Tidak ada data</td>
                                                <td>Tidak ada data</td>
                                                <td>Tidak ada data</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                            <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                                        </li>
                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>
                                        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                                            <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <form action="../proses/proses_pelanggan.php" method="post" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data Pelanggan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="tambah_pelanggan" value="1">
                                    <div class="mb-3">
                                        <label for="nama_pelanggan_baru" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama_pelanggan_baru" name="nama_pelanggan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nomor_pelanggan_baru" class="form-label">Nomor</label>
                                        <input type="text" class="form-control" id="nomor_pelanggan_baru" name="nomor_pelanggan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat_pelanggan_baru" class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat_pelanggan" id="alamat_pelanggan_baru" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Siap untuk Pergi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="../js/demo/chart-bar-demo.js"></script>
    <script>
        const form = document.getElementById("formLaundry");
        const radioSatuan = document.getElementById("radioSatuan");
        const radioKiloan = document.getElementById("radioKiloan");

        const rowKiloan = document.getElementById("rowKiloan");
        const rowSatuan = document.getElementById("rowSatuan");

        const jumlahKiloan = document.getElementById("jumlahKiloan");
        const jumlahSatuan = document.getElementById("jumlahSatuan");
        const jenisPakaian = document.getElementById("jenisPakaian");

        function toggleJenis() {
            if (radioSatuan.checked) {
                rowSatuan.style.display = 'flex';
                rowKiloan.style.display = 'none';

                // set required hanya untuk satuan
                jumlahKiloan.removeAttribute("required");
                jumlahSatuan.setAttribute("required", "required");
                jenisPakaian.setAttribute("required", "required");
            } else if (radioKiloan.checked) {
                rowSatuan.style.display = 'none';
                rowKiloan.style.display = 'block';

                // set required hanya untuk kiloan
                jumlahKiloan.setAttribute("required", "required");
                jumlahSatuan.removeAttribute("required");
                jenisPakaian.removeAttribute("required");
            }
        }

        form.addEventListener("submit", function(e) {
            // form check otomatis browser
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                form.classList.add("was-validated"); // opsional, kalau mau gaya Bootstrap
            }
        });
    </script>
    <script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>