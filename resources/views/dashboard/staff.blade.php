<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Inventora - Staff Dashboard</title>

    @vite([
        'resources/css/dashboard.css',
        'resources/js/dashboard.js'
    ])

</head>

<body>

<div class="dashboard-wrapper">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                ◆
            </div>

            <div>

                <h2>Inventora</h2>

                <span>Staff Office</span>

            </div>

        </div>


        <nav class="sidebar-menu">

            <a href="#" class="menu-item active">
                <span>⌂</span>
                Dashboard
            </a>

            <a href="#" class="menu-item">
                <span>▣</span>
                Ketersediaan
            </a>

            <a href="#" class="menu-item">
                <span>＋</span>
                Ajukan Barang
            </a>

            <a href="#" class="menu-item">
                <span>▤</span>
                Riwayat
            </a>

        </nav>


        <div class="sidebar-bottom">

            <div class="control-card">

                <div class="control-icon">
                    RS
                </div>

                <h4>Rina Staff</h4>

                <p>
                    Office Operations
                </p>

            </div>

        </div>

    </aside>


    <!-- MAIN -->

    <main class="main-content">


        <!-- HEADER -->

        <header class="topbar">

            <div class="page-heading">

                <span>
                    Dashboard / Role Staff
                </span>

                <h1>
                    Ketersediaan & Pengajuan Barang
                </h1>

                <p>
                    Lihat stok barang kantor,
                    ajukan pengadaan baru,
                    dan pantau status request kamu.
                </p>

            </div>


            <div class="topbar-actions">

                <div class="search-box">

                    <span>⌕</span>

                    <input
                        type="text"
                        id="searchBarang"
                        placeholder="Cari barang tersedia"
                    >

                </div>


                <button
                    class="primary-button"
                    id="addBarangButton"
                >
                    + Ajukan Baru
                </button>

            </div>

        </header>


        <!-- STATISTICS -->

        <section class="stats-grid">

            <div class="stat-card">

                <div class="stat-top">

                    <span class="stat-icon">
                        ◉
                    </span>

                    <small>
                        Tersedia
                    </small>

                </div>

                <h2>126</h2>

                <p>
                    Barang siap digunakan
                </p>

            </div>


            <div class="stat-card">

                <div class="stat-top">

                    <span class="stat-icon">
                        ▣
                    </span>

                    <small>
                        Saya
                    </small>

                </div>

                <h2>8</h2>

                <p>
                    Pengajuan bulan ini
                </p>

            </div>


            <div class="stat-card">

                <div class="stat-top">

                    <span class="stat-icon">
                        ✓
                    </span>

                    <small>
                        Diproses
                    </small>

                </div>

                <h2>5</h2>

                <p>
                    Pengajuan sedang diproses
                </p>

            </div>


            <div class="stat-card">

                <div class="stat-top">

                    <span class="stat-icon">
                        ✓
                    </span>

                    <small>
                        Approved
                    </small>

                </div>

                <h2>5</h2>

                <p>
                    Pengajuan disetujui
                </p>

            </div>

        </section>


        <!-- CONTENT -->

        <section class="content-grid">


            <!-- FORM -->

            <div class="panel">

                <div class="panel-header">

                    <h3>
                        Form Pengadaan Baru
                    </h3>

                    <span>
                        Draft cepat
                    </span>

                </div>


                <form id="pengadaanForm">

                    <div class="form-grid">

                        <div class="form-group">

                            <label>
                                Nama Barang
                            </label>

                            <input
                                type="text"
                                placeholder="Contoh: Tinta Printer"
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Kategori
                            </label>

                            <input
                                type="text"
                                placeholder="ATK / Elektronik"
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Jumlah
                            </label>

                            <input
                                type="number"
                                placeholder="12 pcs"
                            >

                        </div>


                        <div class="form-group">

                            <label>
                                Prioritas
                            </label>

                            <select>

                                <option>
                                    Normal
                                </option>

                                <option>
                                    Urgent
                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="form-group">

                        <label>
                            Alasan Pengajuan
                        </label>

                        <textarea
                            placeholder="Stok tim operasional akan habis dalam 1 minggu."
                        ></textarea>

                    </div>


                    <button
                        class="primary-button form-button"
                        type="submit"
                    >
                        Kirim Pengajuan
                    </button>

                </form>

            </div>


            <!-- STOCK -->

            <div class="panel">

                <div class="panel-header">

                    <h3>
                        Ketersediaan Barang
                    </h3>

                    <a href="#">
                        Lihat katalog
                    </a>

                </div>


                <div class="stock-grid">

                    <div class="stock-item">

                        <strong>
                            Kertas A4
                        </strong>

                        <span>
                            42 rim tersedia
                        </span>

                    </div>


                    <div class="stock-item">

                        <strong>
                            Tinta Printer
                        </strong>

                        <span>
                            14 pcs tersedia
                        </span>

                    </div>


                    <div class="stock-item">

                        <strong>
                            Kursi Meeting
                        </strong>

                        <span>
                            4 unit tersedia
                        </span>

                    </div>


                    <div class="stock-item">

                        <strong>
                            Mouse Aspire
                        </strong>

                        <span>
                            42 pcs tersedia
                        </span>

                    </div>

                </div>

            </div>


            <!-- RIWAYAT -->

            <div class="panel">

                <div class="panel-header">

                    <h3>
                        Riwayat Pengajuan Saya
                    </h3>

                    <a href="#">
                        Semua riwayat
                    </a>

                </div>


                <table>

                    <thead>

                        <tr>

                            <th>
                                Barang
                            </th>

                            <th>
                                Jumlah
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <tr>

                            <td>
                                Tinta Printer
                            </td>

                            <td>
                                12 pcs
                            </td>

                            <td>
                                <span class="status approved">
                                    Disetujui
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Kabel HDMI
                            </td>

                            <td>
                                4 pcs
                            </td>

                            <td>
                                <span class="status review">
                                    Review
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Standing Desk
                            </td>

                            <td>
                                2 unit
                            </td>

                            <td>
                                <span class="status pending">
                                    Ditolak
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- PROGRESS -->

            <div class="panel">

                <div class="panel-header">

                    <h3>
                        Progress Bulan Ini
                    </h3>

                    <span>
                        Target 1 bln
                    </span>

                </div>


                <div class="progress-item">

                    <div>

                        <span>
                            Pengajuan diproses
                        </span>

                        <strong>
                            72%
                        </strong>

                    </div>

                    <div class="progress-bar">

                        <span style="width:72%;"></span>

                    </div>

                </div>


                <div class="progress-item">

                    <div>

                        <span>
                            Barang diterima
                        </span>

                        <strong>
                            48%
                        </strong>

                    </div>

                    <div class="progress-bar">

                        <span style="width:48%;"></span>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>

</html>
