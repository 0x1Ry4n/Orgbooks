<?php include_once('includes/header.php') ?>

<body>
	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

	<?php include_once('../controllers/scripts/alertDialog.php'); ?>

	<?php require_once('../controllers/admin/controllerEditarPerfil.php') ?>

	<?php require_once('../controllers/admin/uploader/controllerAdminUploader.php') ?>

	<?php
		if (isset($_POST["update_image"])) {
			new \App\Controller\ImageUploader\AdminUploaderController($session_id);
		}
	?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Perfil Administrativo</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php"><i class="fa-solid fa-chart-simple"></i> Overview</a></li>
									<li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-user"></i> Perfil Administrativo</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				
				<?php
					$stmt = mysqli_prepare($conn, "SELECT * FROM tb_admin WHERE id_admin = ?") or die(mysqli_error());
					mysqli_stmt_bind_param($stmt, "i", $session_id);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_array($result);
				?>


				<section style="background-color: #eee;">
					<div class="container py-5">
						<div class="row">
							<div class="col-lg-4">
								<div class="card mb-4">
									<div class="card-body text-center">
										<div></div>
										<a href="modal" data-toggle="modal" data-target="#modal" class=""><i style="transform: scaleX(-1); background-color: whitesmoke; padding: 10px; border-radius: 50%; filter: drop-shadow(0 4px 5px rgba(0,0,0,.2));" class="fa fa-pencil"></i></a>
										<img class="rounded-circle img-fluid" style="width: 150px; height: 150px; margin-right: 30px; filter: drop-shadow(0 3px 5px rgba(0,0,0,.2)); object-fit: cover;" src="<?php echo (!empty($row['location'])) ? $row['location'] : '../public/images/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="">										<h5 class="my-3"><?php echo htmlentities(ucfirst($row['nome']), ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h5>
										<?php include_once('includes/image_uploader.php'); ?>
										<p class="text-muted mb-4"><?php echo htmlentities($row['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
									</div>
								</div>
								<div class="card mb-4 mb-lg-0">
									<div class="card-body p-0">
										<ul class="list-group list-group-flush rounded-3">
											<li class="list-group-item d-flex justify-content-between align-items-center p-3">
												<i class="fas fa-globe fa-lg text-warning"></i>
												<p class="mb-0"><?php echo htmlentities($row['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
											</li>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center p-3">
												<i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
													<p class="mb-0">Nenhum</p>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center p-3">
												<i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
												<p class="mb-0">Nenhum</p>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center p-3">
												<i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
												<p class="mb-0">Nenhum</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card mb-4">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0">Nome Completo</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0"><?php echo htmlentities($row['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0">Email</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0"><?php echo htmlentities($row['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0">Telefone</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0"><?php echo htmlentities($row['telefone'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0">Nascimento</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0"><?php echo htmlentities(implode('/', array_reverse(explode('-', $row['data_nascimento']))), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-3">
												<p class="mb-0">Endereço</p>
											</div>
											<div class="col-sm-9">
												<p class="text-muted mb-0"><?php echo htmlentities($row['endereco'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<?php include_once('includes/footer.php'); ?>
	</div>
	</div>

	<?php include_once('includes/scripts.php') ?>
</body>

</html>