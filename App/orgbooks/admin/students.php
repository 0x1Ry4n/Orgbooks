<?php include_once('includes/header.php') ?>

<body>

	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

	<?php include_once('../controllers/scripts/alertDialog.php') ?>

	<?php require_once('../controllers/alunos/controllerExcluirAluno.php') ?>

	<?php
		if (isset($_GET['delete'])) {
			new \App\Controller\Excluir\ExcluirController($_GET['delete']);
		}
	?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<di1v class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Gerenciar Alunos</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><i class="fa-solid fa-users"></i> Alunos</li>
								<li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-list-ul"></i> Listar Alunos</li>
							</ol>
						</nav>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
					<h2 class="text-blue h4"><i class="ti-list"></i> Lista de Alunos</h2><br>
					<!-- <div class='filter-table' style='display: flex; flex-direction: row; gap: 5px; width: 40px;'>
						<p style='display: flex; flex-direction: row; margin-top: 10px;'><i class="fa fa-filter" aria-hidden="true"></i> Filtros:</p>
					</div> -->
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th><i class="fi-torso"></i> NOME DO ALUNO</th>
								<th><i class="fa fa-vcard" aria-hidden="true"></i> REGISTRO DE MATRÍCULA</th>
								<th class="datatable-nosort"><i class="fa fa-superscript" aria-hidden="true"></i> CURSO</th>
								<th class="datatable-nosort"><i class="fa fa-envelope" aria-hidden="true"></i> E-MAIL</th>
								<th class="datatable-nosort"><i class="fi-male-symbol"></i> GÊNERO</th>
								<th><i class="fi-calendar"></i> DATA DE NASCIMENTO</th>
								<th class="datatable-nosort"></th>
							</tr>
						</thead>
						<tbody>
							<?php
								require_once("../controllers/alunos/controllerListarAluno.php");

								new App\Controller\Lista\ListaController;
							?>
						</tbody>
					</table>
				</div>
			</div>

			<?php include_once('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include_once('includes/scripts.php') ?>
</body>

</html>