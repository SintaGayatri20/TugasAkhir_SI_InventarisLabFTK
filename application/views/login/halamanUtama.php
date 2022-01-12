<!--==========================
    Hero Section
  ============================-->
<section id="hero">
    <div class="hero-container">
        <h1>sistem inventaris lab fakultas teknik & kejuruan</h1>
        <h2>UNIVERSITAS PENDIDIKAN GANESHA</h2>
    </div>
</section><!-- #hero -->

<div class="show-login-btn">
    <i class="fas fa-sign-in-alt"></i> Klik Untuk Halaman Login
</div>
<div class="login-box">
    <div class="hide-login-btn">
        <i class="fas fa-times"></i>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('login'); ?>" method="post" class="login-form">

        <img src="<?= base_url('assets/img/vaficon.png'); ?>" alt="" width="100" height="100">
        <img src="<?= base_url('assets/img/trans_2.png'); ?>" alt="" width="100" height="100">

        <h1>SELAMAT DATANG</h1>
        <input type="text" class="txtb" id="username" name="username" placeholder="Username">
        <small class="text-danger"><?= form_error('email'); ?></small>
        <input class="txtb" type="password" placeholder="Password" id="password" name="password">
        <small class="text-danger"><?= form_error('password') ?></small>

        <center>
            <div class="g-recaptcha" data-sitekey="6Lf2HP8aAAAAANRYmaqMGbMxeQjJhyi3-b6SqVJx"></div>
        </center><br>
        <button class="login-btn" type="submit">Login</button>
    </form>
</div>
<script type="text/javascript">
    $(".show-login-btn").on("click", function() {
        $(".login-box").toggleClass("showed");
    });

    $(".hide-login-btn").on("click", function() {
        $(".login-box").toggleClass("showed");
    });
</script>

<main id="main">

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; <?= date('Y') ?> Fakultas Teknik & Kejuruan
            </div>
            <div class="credits">
                <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
        -->
                <a href="https://bootstrapmade.com/">UNIVERSITAS PENDIDIKAN GANESHA</a>
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="<?= base_url('assets2/'); ?>lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets2/'); ?>lib/jquery/jquery-migrate.min.js"></script>
    <script src="<?= base_url('assets2/'); ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets2/'); ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('assets2/'); ?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url('assets2/'); ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('assets2/'); ?>lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url('assets2/'); ?>lib/superfish/hoverIntent.js"></script>
    <script src="<?= base_url('assets2/'); ?>lib/superfish/superfish.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="<?= base_url('assets2/'); ?>contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="<?= base_url('assets2/'); ?>js/main.js"></script>

    </body>

    </html>