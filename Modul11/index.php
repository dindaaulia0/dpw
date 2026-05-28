<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// mengambil jumlah data dari masing-masing tabel menggunakan mysqli_query
$res_dosen      = mysqli_query($link, "SELECT COUNT(*) AS total FROM t_dosen");
$res_mahasiswa  = mysqli_query($link, "SELECT COUNT(*) AS total FROM t_mahasiswa");
$res_matakuliah = mysqli_query($link, "SELECT COUNT(*) AS total FROM t_matakuliah");

$jml_dosen      = mysqli_fetch_assoc($res_dosen)['total'];
$jml_mahasiswa  = mysqli_fetch_assoc($res_mahasiswa)['total'];
$jml_matakuliah = mysqli_fetch_assoc($res_matakuliah)['total'];
$total_semua    = $jml_dosen + $jml_mahasiswa + $jml_matakuliah;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Akademik – Beranda</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /*  HERO BANNER  */
        .hero-banner {
            background: linear-gradient(135deg, #7B1E3A 0%, #A61E4D 50%, #1e3a6b 100%);
            color: #fff;
            text-align: center;
            padding: 56px 20px 48px;
            margin-bottom: 0;
            position: relative;
            overflow: hidden;
        }
        .hero-banner::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 260px; height: 260px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .hero-banner::after {
            content: '';
            position: absolute;
            bottom: -80px; left: -40px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }
        .hero-banner h2 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }
        .hero-banner p {
            font-size: 0.95rem;
            opacity: 0.8;
            margin-bottom: 0;
        }

        /*  STAT STRIP (summary bar)  */
        .stat-strip {
            background: #fff;
            box-shadow: 0 6px 24px rgba(0,0,0,0.10);
            border-radius: 16px;
            display: flex;
            justify-content: center;
            align-items: stretch;
            gap: 0;
            max-width: 860px;
            margin: -36px auto 40px;
            position: relative;
            z-index: 10;
            overflow: hidden;
        }
        .strip-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 28px 16px;
            text-decoration: none;
            color: inherit;
            border-right: 1px solid #f0e0e6;
            transition: background 0.2s;
            position: relative;
        }
        .strip-item:last-child { border-right: none; }
        .strip-item:hover { background: #fff8fa; }
        .strip-item .s-num {
            font-size: 2.5rem;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 4px;
        }
        .strip-item .s-label {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
            font-weight: 600;
        }
        .strip-item .s-link {
            font-size: 0.75rem;
            margin-top: 8px;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            opacity: 0;
            transition: opacity 0.2s;
        }
        .strip-item:hover .s-link { opacity: 1; }

        .strip-item.dosen      .s-num  { color: #7B1E3A; }
        .strip-item.dosen      .s-link { background: #fde8ef; color: #7B1E3A; }
        .strip-item.mahasiswa  .s-num  { color: #1e6b3a; }
        .strip-item.mahasiswa  .s-link { background: #dcfce7; color: #1e6b3a; }
        .strip-item.matakuliah .s-num  { color: #1e3a6b; }
        .strip-item.matakuliah .s-link { background: #dbeafe; color: #1e3a6b; }
        .strip-item.total      .s-num  { color: #A61E4D; }

        /*  SECTION LABEL  */
        .section-label {
            text-align: center;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #bbb;
            margin-bottom: 18px;
            font-weight: 700;
        }

        /*  STAT DETAIL CARDS  */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 22px;
            max-width: 860px;
            margin: 0 auto 48px;
        }
        .stat-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            padding: 0;
            text-decoration: none;
            color: inherit;
            display: block;
            overflow: hidden;
            transition: transform 0.22s, box-shadow 0.22s;
        }
        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 36px rgba(0,0,0,0.13);
        }
        .stat-card-header {
            padding: 22px 24px 18px;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .stat-card.dosen
        .stat-card.mahasiswa
        .stat-card.matakuliah

        .stat-card-meta { flex: 1; }
        .stat-card-meta .sc-num {
            font-size: 2.4rem;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 2px;
        }
        .stat-card.dosen      .sc-num { color: #7B1E3A; }
        .stat-card.mahasiswa  .sc-num { color: #1e6b3a; }
        .stat-card.matakuliah .sc-num { color: #1e3a6b; }

        .stat-card-meta .sc-title { font-size: 0.88rem; font-weight: 700; color: #333; }
        .stat-card-meta .sc-sub   { font-size: 0.76rem; color: #999; }

        .stat-card-footer {
            padding: 10px 24px;
            font-size: 0.78rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #f5f5f5;
        }
        .stat-card.dosen      .stat-card-footer { color: #7B1E3A; background: #fffafc; }
        .stat-card.mahasiswa  .stat-card-footer { color: #1e6b3a; background: #fafffe; }
        .stat-card.matakuliah .stat-card-footer { color: #1e3a6b; background: #fafcff; }

        .stat-card-footer .arrow { font-size: 1rem; }

        /* progress bar */
        .stat-progress { height: 4px; background: #f0f0f0; }
        .stat-progress-bar { height: 4px; border-radius: 0; transition: width 1s ease; }
        .stat-card.dosen      .stat-progress-bar { background: linear-gradient(90deg, #7B1E3A, #A61E4D); }
        .stat-card.mahasiswa  .stat-progress-bar { background: linear-gradient(90deg, #1e6b3a, #22c55e); }
        .stat-card.matakuliah .stat-progress-bar { background: linear-gradient(90deg, #1e3a6b, #3b82f6); }

        .wrapper-full { max-width: 960px; margin: 0 auto; padding: 0 20px 60px; }

        /* animasi count-up */
        .s-num, .sc-num { opacity: 0; transform: translateY(8px); transition: opacity 0.5s, transform 0.5s; }
        .animated { opacity: 1 !important; transform: translateY(0) !important; }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<!-- Hero Banner -->
<div class="hero-banner">
    <h2> Sistem Informasi Akademik</h2>
    <p>Praktikum 11 – PHP Database CRUD</p>
</div>

<div class="wrapper-full">

    <!-- Strip Ringkasan Cepat -->
    <div class="stat-strip">
        <a class="strip-item dosen" href="viewdosen.php">
                        <div class="s-num" data-target="<?php echo $jml_dosen; ?>"><?php echo $jml_dosen; ?></div>
            <div class="s-label">Dosen</div>
            <div class="s-link">Lihat Data -></div>
        </a>
        <a class="strip-item mahasiswa" href="viewmahasiswa.php">
                        <div class="s-num" data-target="<?php echo $jml_mahasiswa; ?>"><?php echo $jml_mahasiswa; ?></div>
            <div class="s-label">Mahasiswa</div>
            <div class="s-link">Lihat Data -></div>
        </a>
        <a class="strip-item matakuliah" href="viewmatakuliah.php">
                        <div class="s-num" data-target="<?php echo $jml_matakuliah; ?>"><?php echo $jml_matakuliah; ?></div>
            <div class="s-label">Mata Kuliah</div>
            <div class="s-link">Lihat Data -></div>
        </a>
        <a class="strip-item total" href="#">
                        <div class="s-num" data-target="<?php echo $total_semua; ?>"><?php echo $total_semua; ?></div>
            <div class="s-label">Total Data</div>
            <div class="s-link" style="background:#fde8ef;color:#A61E4D;">Semua</div>
        </a>
    </div>

    <!-- Detail Statistik -->
    <p class="section-label">Ringkasan Detail</p>
    <div class="stat-grid">

        <!-- Dosen -->
        <a class="stat-card dosen" href="viewdosen.php">
            <div class="stat-card-header">
                <div class="stat-card-meta">
                    <div class="sc-num" data-target="<?php echo $jml_dosen; ?>"><?php echo $jml_dosen; ?></div>
                    <div class="sc-title">Total Dosen</div>
                    <div class="sc-sub">Terdaftar di sistem</div>
                </div>
            </div>
            <div class="stat-progress">
                <?php $pct_dosen = $total_semua > 0 ? round($jml_dosen / $total_semua * 100) : 0; ?>
                <div class="stat-progress-bar" style="width:<?php echo $pct_dosen; ?>%"></div>
            </div>
            <div class="stat-card-footer">
                <span> <?php echo $pct_dosen; ?>% dari total data</span>
                <span class="arrow">-></span>
            </div>
        </a>

        <!-- Mahasiswa -->
        <a class="stat-card mahasiswa" href="viewmahasiswa.php">
            <div class="stat-card-header">
                <div class="stat-card-meta">
                    <div class="sc-num" data-target="<?php echo $jml_mahasiswa; ?>"><?php echo $jml_mahasiswa; ?></div>
                    <div class="sc-title">Total Mahasiswa</div>
                    <div class="sc-sub">Terdaftar di sistem</div>
                </div>
            </div>
            <div class="stat-progress">
                <?php $pct_mhs = $total_semua > 0 ? round($jml_mahasiswa / $total_semua * 100) : 0; ?>
                <div class="stat-progress-bar" style="width:<?php echo $pct_mhs; ?>%"></div>
            </div>
            <div class="stat-card-footer">
                <span> <?php echo $pct_mhs; ?>% dari total data</span>
                <span class="arrow">-></span>
            </div>
        </a>

        <!-- Mata Kuliah -->
        <a class="stat-card matakuliah" href="viewmatakuliah.php">
            <div class="stat-card-header">
                <div class="stat-card-meta">
                    <div class="sc-num" data-target="<?php echo $jml_matakuliah; ?>"><?php echo $jml_matakuliah; ?></div>
                    <div class="sc-title">Total Mata Kuliah</div>
                    <div class="sc-sub">Terdaftar di sistem</div>
                </div>
            </div>
            <div class="stat-progress">
                <?php $pct_mk = $total_semua > 0 ? round($jml_matakuliah / $total_semua * 100) : 0; ?>
                <div class="stat-progress-bar" style="width:<?php echo $pct_mk; ?>%"></div>
            </div>
            <div class="stat-card-footer">
                <span> <?php echo $pct_mk; ?>% dari total data</span>
                <span class="arrow">-></span>
            </div>
        </a>

    </div>

</div>

<script>
    // animasi count-up saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var nums = document.querySelectorAll('[data-target]');
        nums.forEach(function(el) {
            el.classList.add('animated');
            var target = parseInt(el.getAttribute('data-target'), 10);
            if (target === 0) return;
            var current = 0;
            var step = Math.max(1, Math.ceil(target / 40));
            var timer = setInterval(function() {
                current = Math.min(current + step, target);
                el.textContent = current;
                if (current >= target) clearInterval(timer);
            }, 30);
        });
    });
</script>
</body>
</html>