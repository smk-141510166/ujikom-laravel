<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<?php if(isset($page)): ?>
    <title><?php echo e($page); ?> - <?php echo e(config('app.name', 'Laravel')); ?></title>
    <?php else: ?>
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <?php endif; ?>
	<!-- CSS -->
	<link href="<?php echo e(url('clean/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" media="screen">
	<link href="<?php echo e(url('clean/css/font-awesome.min.css')); ?>" rel="stylesheet" media="screen">
	<link href="<?php echo e(url('clean/css/simple-line-icons.css')); ?>" rel="stylesheet" media="screen">
	<link href="<?php echo e(url('clean/css/animate.css')); ?>" rel="stylesheet">
    
	<!-- Custom styles CSS -->
	<link href="<?php echo e(url('clean/css/style.css')); ?>" rel="stylesheet" media="screen">
    
    <script src="<?php echo e(url('clean/js/modernizr.custom.js')); ?>"></script>
       
</head>
<body>

	<!-- Preloader -->

	<div id="preloader">
		<div id="status"></div>
	</div>

	<!-- Home start -->

	<section id="home" class="pfblock-image screen-height">
        <div class="home-overlay"></div>
		<div class="intro">
			<h1><?php echo e(config('app.name')); ?></h1>
			<div class="start">+ + +</div>
            <?php if(isset($page)): ?>
            <div class="start"><?php echo e($page); ?></div>
            <?php else: ?>
            <?php endif; ?>
		</div>

        <a href="#custom-collapse">
		<div class="scroll-down">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
		</div>
        </a>

	</section>

	<!-- Home end -->

	<!-- Navigation start -->

	<header class="header">

		<nav class="navbar navbar-custom" role="navigation">

			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e(config('app.name')); ?></a>
				</div>

				<div class="collapse navbar-collapse" id="custom-collapse">
					<ul class="nav navbar-nav ">
						<?php if(Auth::guest()): ?>
						<?php else: ?>
                        <?php if(Auth::user()->type_user == 'admin'): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengguna<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('pegawai')); ?>">Pegawai</a></li>
                                <li><a href="<?php echo e(url('jabatan')); ?>">Jabatan</a></li>
                                <li><a href="<?php echo e(url('golongan')); ?>">Golongan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gaji<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">                            
                                <li><a href="<?php echo e(url('kategori_lembur')); ?>">Kategori Lembur</a></li>
                                <li><a href="<?php echo e(url('lembur_pegawai')); ?>">Lembur Pegawai</a></li>
                                <li><a href="<?php echo e(url('tunjangan')); ?>">Kategori Tunjangan</a></li>
                                <li><a href="<?php echo e(url('tunjangan_pegawai')); ?>">Tunjangan Pegawai</a></li>
                                <li><a href="<?php echo e(url('penggajian')); ?>">Penggajian</a></li>
                            </ul>
                        </li>
                        <?php elseif(Auth::user()->type_user == 'bendahara'): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('jabatan')); ?>">Jabatan</a></li>
                                <li><a href="<?php echo e(url('golongan')); ?>">Golongan</a></li>
                                <li><a href="<?php echo e(url('kategori_lembur')); ?>">Kategori Lembur</a></li>
                                <li><a href="<?php echo e(url('lembur_pegawai')); ?>">Lembur Pegawai</a></li>
                                <li><a href="<?php echo e(url('tunjangan')); ?>">Kategori Tunjangan</a></li>
                                <li><a href="<?php echo e(url('tunjangan_pegawai')); ?>">Tunjangan Pegawai</a></li>
                                <li><a href="<?php echo e(url('penggajian')); ?>">Penggajian</a></li>
							</ul>
                        </li>
                        <?php elseif(Auth::user()->type_user == 'hrd'): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('jabatan')); ?>">Jabatan</a></li>
                                <li><a href="<?php echo e(url('golongan')); ?>">Golongan</a></li>
                                <li><a href="<?php echo e(url('pegawai')); ?>">Pegawai</a></li>
                                <li><a href="<?php echo e(url('tunjangan')); ?>">Kategori Tunjangan</a></li>
                                <li><a href="<?php echo e(url('tunjangan_pegawai')); ?>">Tunjangan Pegawai</a></li>
							</ul>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>">Masuk</a></li>
                            <!-- <li><a href="<?php echo e(url('/register')); ?>">Register</a></li> -->
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                    <div class="row" align="center">
                                        <?php $data = App\Pegawai::where('user_id',Auth::user()->id)->first(); ?>
                                        <?php if(isset($data->id)): ?>
                                        <img src="<?php echo e(url('account/'.$data->foto)); ?>" class="foto-profile-mini">
                                        <?php else: ?>
                                        <img src="<?php echo e(url('account/default.png')); ?>" class="foto-profile-mini">
                                        <?php endif; ?>
                                        </div>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
				</div>

			</div><!-- .container -->

		</nav>

	</header>
    <br><br>
	<?php echo $__env->yieldContent('content'); ?>
	<br><br><br><br><br><br><br><br><br>

	<!-- Footer start -->

	<footer id="footer">
		<div class="container">
			<div class="row">

				<div class="col-sm-12">


					<p class="heart">
                        Uji Kompetensi RPL <span class="fa fa-heart fa-2x animated pulse"></span> SMK Assalaam
                    </p>
                    <p class="copyright">
                        2017 &copy; <a href="<?php echo e(url('aboutus')); ?>">Fathurrahman Hardi Ar-Rasyid</a>
					</p>

				</div>

			</div><!-- .row -->
		</div><!-- .container -->
	</footer>

	<!-- Footer end -->

	<!-- Scroll to top -->

	<div class="scroll-up">
		<a href="#home"><i class="fa fa-angle-up"></i></a>
	</div>
    
    <!-- Scroll to top end-->

	<!-- Javascript files -->

	<script src="<?php echo e(url('clean/js/jquery-1.11.1.min.js')); ?>"></script>
	<script src="<?php echo e(url('clean/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(url('clean/js/jquery.parallax-1.1.3.js')); ?>"></script>
	<script src="<?php echo e(url('clean/js/imagesloaded.pkgd.js')); ?>"></script>
	<script src="<?php echo e(url('clean/js/jquery.sticky.js')); ?>"></script>
	<script src="<?php echo e(url('clean/js/smoothscroll.js')); ?>"></script>
	<script src="<?php echo e(url('clean/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(url('clean/js/jquery.easypiechart.js')); ?>"></script>
    <script src="<?php echo e(url('clean/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(url('clean/js/jquery.cbpQTRotator.js')); ?>"></script>
	<script src="<?php echo e(url('clean/js/custom.js')); ?>"></script>

</body>
</html>