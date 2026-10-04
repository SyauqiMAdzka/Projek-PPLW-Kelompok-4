<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventora - Admin Dashboard</title>

    @vite([
        'resources/css/dashboard.css',
        'resources/js/dashboard.js'
    ])
</head>

<body>

<div class="dashboard-wrapper">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">◆</div>

            <div>
                <h2>Inventora</h2>
                <span>Admin Office</span>
            </div>
        </div>


        <nav class="sidebar-menu">

            <a href="#" class="menu-item active">
                <span>⌂</span>
                Dashboard
            </a>

            <a href="#" class="menu-item">
                <span>▣</span>
                Data Barang
            </a>

            <a href="#" class="menu-item">
                <span>▤</span>
                Pengadaan
            </a>

            <a href="#" class="menu-item">
                <span>▥</span>
                Laporan
            </a>

            <a href="#" class="menu-item">
                <span>♙</span>
                User
            </a>

        </nav>


        <div class="sidebar-bottom">

            <div class="control-card">

                <div class="control-icon">
                    ◈
                </div>

                <h4>Kontrol stok lebih rapi</h4>

                <p>
                    CRUD barang, monitoring
                    pengadaan, dan approval
                    menjadi lebih cepat.
                </p>

            </div>

        </div>

    </aside>


    <!-- ================= MAIN ================= -->

    <main class="main-content">

        <!-- HEADER -->

        <header class="topbar">

            <div class="page-heading">

                <span>Dashboard / Role Admin</span>

                <h1>Manajemen Inventory & Pengadaan</h1>

                <p>
                    Kelola data barang, cek stok kritis,
                    dan pantau seluruh pengajuan pengadaan.
                </p>

            </div>


            <div class="topbar-actions">

                <div class="search-box">

                    <span>⌕</span>

                    <input
                        type="text"
                        id="searchBarang"
                        placeholder="Cari barang / pengajuan"
                    >

                </div>


                <button
                    class="primary-button"
                    id="addBarangButton"
                >
                    + Tambah Barang
                </button>

            </div>

        </header>


        <!-- ================= STATISTICS ================= -->

        <section class="stats-grid">

            <div class="stat-card">

                <div class="stat-top">
                    <span class="stat-icon">◉</span>
                    <small>+10%</small>
                </div>

                <h2>428</h2>

                <p>Total barang aktif</p>

            </div>


            <div class="stat-card">

                <div class="stat-top">
                    <span class="stat-icon">＋</span>
                    <small>CRUD</small>
                </div>

                <h2>36</h2>

                <p>Barang masuk minggu ini</p>

            </div>


            <div class="stat-card">

                <div class="stat-top">
                    <span class="stat-icon">△</span>
                    <small>Cek</small>
                </div>

                <h2>14</h2>

                <p>Stok perlu restock</p>

            </div>


            <div class="stat-card">

                <div class="stat-top">
                    <span class="stat-icon">▣</span>
                    <small>Hari ini</small>
                </div>

                <h2>27</h2>

                <p>Total pengajuan aktif</p>

            </div>

        </section>


        <!-- ================= CONTENT GRID ================= -->

        <section class="content-grid">


            <!-- PENGAJUAN -->

            <div class="panel pengajuan-panel">

                <div class="panel-header">

                    <div>
                        <h3>Daftar Seluruh Pengajuan</h3>
                    </div>

                    <a href="#">
                        Lihat semua
                    </a>

                </div>


                <div class="table-wrapper">

                    <table id="pengajuanTable">

                        <thead>

                            <tr>
                                <th>Barang</th>
                                <th>Staff</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>Kertas A4</td>
                                <td>Rina</td>
                                <td>20 rim</td>
                                <td>
                                    <span class="status review">
                                        Review
                                    </span>
                                </td>
                            </tr>


                            <tr>
                                <td>Tinta Printer</td>
                                <td>Bagus</td>
                                <td>12 pcs</td>
                                <td>
                                    <span class="status approved">
                                        Disetujui
                                    </span>
                                </td>
                            </tr>


                            <tr>
                                <td>Kursi Meeting</td>
                                <td>Santi</td>
                                <td>8 unit</td>
                                <td>
                                    <span class="status urgent">
                                        Urgent
                                    </span>
                                </td>
                            </tr>


                            <tr>
                                <td>Stapler Heavy</td>
                                <td>Dimas</td>
                                <td>15 pcs</td>
                                <td>
                                    <span class="status pending">
                                        Menunggu
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- ALUR ADMIN -->

            <div class="panel">

                <div class="panel-header">

                    <h3>Alur Admin</h3>

                    <span>4 tahap</span>

                </div>


                <div class="workflow">

                    <div class="workflow-item">

                        <strong>01</strong>

                        <h4>Tambah / edit barang</h4>

                        <p>CRUD data inventory</p>

                    </div>


                    <div class="workflow-item">

                        <strong>02</strong>

                        <h4>Cek stok kantor</h4>

                        <p>Monitor kondisi stok</p>

                    </div>


                    <div class="workflow-item">

                        <strong>03</strong>

                        <h4>Review pengajuan</h4>

                        <p>Validasi kebutuhan</p>

                    </div>


                    <div class="workflow-item">

                        <strong>04</strong>

                        <h4>Approve procurement</h4>

                        <p>Teruskan pembelian</p>

                    </div>

                </div>

            </div>


            <!-- AKTIVITAS STOK -->

            <div class="panel chart-panel">

                <div class="panel-header">

                    <h3>Aktivitas Stok</h3>

                    <span>Bulanan</span>

                </div>


                <div class="chart">

                    <div class="bar" style="height: 45%;"></div>
                    <div class="bar" style="height: 70%;"></div>
                    <div class="bar" style="height: 38%;"></div>
                    <div class="bar" style="height: 85%;"></div>
                    <div class="bar" style="height: 58%;"></div>
                    <div class="bar" style="height: 95%;"></div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>
