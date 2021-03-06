<?php

include '../koneksi.php';

session_start();

$status = $_SESSION['status'];
$username = $_SESSION['penulis'];
$idpenulis = $_SESSION['idpenulis'];

if ($status != "login") {
    header("location: login.html");
}

$today = date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Selamat datang untuk para jagoan lomba">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="ico/favicon-16x16.png" sizes="16x16" />
    <!-- chat -->
    <!-- <script src="https://web.freshchat.com/js/widget.js"></script> -->
    <!-- chat end -->

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <title>Landing Page</title>
</head>

<body>
    <div class="container-all">
        <!-- <div class="section1"> -->

        <div class="whatsapp">
            <script src="https://apps.elfsight.com/p/platform.js" defer></script>
            <div class="elfsight-app-ec15fd56-42ea-44ef-8639-3c509bdb529e"></div>
        </div>
        <header>
            <img class="logo" id="logo" src="images/logo.png" alt="logo">
            <nav>
                <ul class="nav_links">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#section1">Tutorial</a>
                    </li>
                    <li>
                        <a href="#section2">About</a>
                    </li>
                    <li>
                        <a href="#section2">Contact</a>
                    </li>
                </ul>
            </nav>
            <a class="cta" href="login.html"><button>Login</button></a>
        </header>
        <!-- </div> -->
        <section id="banner" class="banner">
            <div class="container">
                <div class="pesan">
                    <h1>Selamat datang para peserta lomba</h1>
                    <p>Terima kasih sudah mengakses web ini. untuk keterangan lebih jelas,
                        ikuti panduan persyaratan dibawah.</p>
                </div>
            </div>
        </section>

        <section class="akses">
            <div class="container-akses">
                <div class="jalur">
                    <h1>Ikuti Alur dibawah ini</h1>
                </div>
                <div class="aliran">
                    <img src="images/alur.png" alt="alur">
                </div>
                <div class="syarat" id="section1">
                    <div class="persyaratan">
                        <h1>PERSYARATAN UMUM</h1>
                    </div>
                    <div class="daftar">
                        <li>
                            <p>1. Peserta adalah siswa SMP/MTs sederajat di wilayah Tapal Kuda
                                ( Jember, Banyuwangi, Situbondo, Lumajang, Bondowoso, Probolinggo,
                                Pasuruan Timur ).</p>
                        </li>
                        <br>
                        <li>
                            <p>2. Surat rekomendasi dari sekolah/madrasah dengan mencantumkan nama, NISN, dan kelas.</p>
                        </li>
                        <br>
                        <li>
                            <p>3. Bukti / slip pembayaran pendaftaran.</p>
                        </li>
                        <br>
                        <li>
                            <p>4. Peserta wajib memakai seragam sekolah dan bersepatu pada saat pelaksanaan lomba.</p>
                        </li>
                        <br>
                        <li>
                            <p>5. Peserta melakukan pembayaran ke rekening BRI atas nama UMI NUR CHOIRUN NISA untuk
                                Rayon
                                Banyuwangi, ataupun nomor rekening sesuai masing-masing rayon. Gelombang I paling lambat
                                tanggal 12 Januari 2019.</p>
                        </li>
                        <br>
                        <li>
                            <p>6. Peserta lolos registrasi.</p>
                        </li>
                        <br>
                    </div>
                    <img src="images/image.png" alt="syarat-gambar">
                </div>
                <div class="jenis" id="jenis">
                    <div class="list">
                        <h1>JENIS LOMBA</h1>
                    </div>
                    <div class="jn-1">
                        <img src="images/olimpiade.png" alt="olimpiade">
                    </div>
                    <div class="jn-2">
                        <img src="images/science.png" alt="science">
                    </div>
                </div>
                <div class="bg">
                    <img src="images/bg.png" alt="bg">
                </div>
            </div>
        </section>

        </section>
        <section class="tampilan">
            <div class="container-content">
                <div class="hadiah">
                    <img src="images/hadiah.png" alt="hadiah">
                </div>
                <div class="awan">
                    <img src="images/awan.png" alt="awan">
                </div>
                <div class="juara">
                    <div class="juara-1">
                        <h3>JUARA SATU</h3>
                        <p>Trhopy + Sertifikat
                            and
                            1.500.000
                            (Uang Pembinaan)</p>
                    </div>
                    <div class="juara-2">
                        <h3>JUARA DUA</h3>
                        <p>Trhopy + Sertifikat
                            and
                            1.000.000
                            (Uang Pembinaan)</p>
                    </div>
                    <div class="juara-3">
                        <h3>JUARA TIGA</h3>
                        <p>Trhopy + Sertifikat
                            and
                            500.000
                            (Uang Pembinaan)</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="pulau" id="pulau">
            <div class="daerah">
                <div class="judul">
                    <h1>UJIAN TERBAGI DI TIGA KABUPATEN</h1>
                </div>
                <div class="lokasi">
                    <img src="images/pulau.png" alt="pulau">
                </div>
            </div>
        </section>
        <section class="about">
            <div class="container-tentang">
                <div class="tentang">
                    <h1>ABOUT</h1>
                </div>
                <div class="isi">
                    <p>Himpunan Mahasiswa Program Studi Tadris Ilmu Pengetahuan Alam atau
                        yang disingkat dengan HMPS Tadris IPA adalah organisasi mahasiswa
                        intra kampus yang berada di bawah naungan Program Studi (Prodi)
                        Tadris Ilmu Pengetahuan Alam (IPA) Fakultas Tarbiyah dan Ilmu
                        Keguruan Insitut Agama Islam Negeri (IAIN) Jember.</p>
                </div>
            </div>
        </section>
        <section class="contact" id="section2">
            <div class="container-contact">
                <div class="contact">
                    <div class="tempat">
                        <p>Lokasi:
                            Jalan Mataram
                            No.1, Karang Mulwo,
                            Mangli, Kec. Kaliwates,
                            Kabupaten Jember.
                        </p>
                    </div>
                    <div class="input">
                        <form action="" method="post">
                            <h3>SUBSCRIBE OUR</h3>
                            <input type="email" placeholder="Masukkan Email anda" required>
                            <button class="tombol" id="tombol">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            &copy; 2019 SIMBA_ID. All rights reserved.
        </footer>
    </div>

    <!-- <script type="text/javascript">
        $(window).on("scroll", function () {
            if ($(window).scrollTop()) {
                $('nav')
            } else {
                $('nav').removeClass('black');
            }
        })
    </script> -->

    <!-- Whatsapp web -->

    <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+6283852109582", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol,
                host = "getbutton.io",
                url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /WhatsHelp.io widget -->



    <!-- <script>
        function initFreshChat() {
            window.fcWidget.init({
                token: "5b204b76-f267-4697-9d19-f036fe435658",
                host: "https://wchat.freshchat.com"
            });
        }

        function initialize(i, t) {
            var e;
            i.getElementById(t) ? initFreshChat() : ((e = i.createElement("script")).id = t, e.async = !0, e.src =
                "https://wchat.freshchat.com/js/widget.js", e.onload = initFreshChat, i.head.appendChild(e))
        }

        function initiateCall() {
            initialize(document, "freshchat-js-sdk")
        }
        window.addEventListener ? window.addEventListener("load", initiateCall, !1) : window.attachEvent("load",
            initiateCall, !1);


        // // Copy the below lines under window.fcWidget.init inside initFreshChat function in the above snippet

        // // To set unique user id in your system when it is available
        // window.fcWidget.setExternalId("john.doe1987");

        // // To set user name
        // window.fcWidget.user.setFirstName("John");

        // // To set user email
        // window.fcWidget.user.setEmail("john.doe@gmail.com");

        // // To set user properties
        // window.fcWidget.user.setProperties({
        //     plan: "Estate", // meta property 1
        //     status: "Active" // meta property 2
        // });
    </script> -->

</body>

</html>

