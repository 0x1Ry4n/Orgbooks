<?php include_once('includes/header.php') ?>

<link rel="stylesheet" href="assets/css/book_loan.css">

<body>
	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

	<?php include_once('../controllers/scripts/alertDialog.php') ?>

	<?php require_once('../controllers/livros/controllerExcluirLivro.php') ?>

	<?php
		if (isset($_GET['delete'])) {
			new \App\Controller\Excluir\ExcluirController(filter_input(INPUT_GET, 'delete', FILTER_VALIDATE_INT));
		}
	?>

	<div class="mobile-menu-overlay"></div>

	<script src="../src/plugins/html5-qrcode/html5-qrcode.min.js"></script>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Gerenciar Livros</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><i class="fa-solid fa-book"></i> Livros</li>
									<li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-box-open"></i> Módulo de Livros</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<br>
							<h2 class="mb-30 h4"><i class="ion-plus-circled"></i> Novo Livro</h2>
							<form method="POST" action="../controllers/livros/controllerCadastroLivro.php">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label data-trigger="hover" data-toggle="popover" data-content="Habilite a câmera nas configurações, clique em Start Scanning e escaneie um QRCode para iniciar o cadastro do livro."><i class="dw dw-coding-1"></i> Código do livro: </label>
											<div id="reader" title="Escaneie um QRCode"></div>
											<input type="text" class="form-control" name="code" placeholder="Escaneie um QRCode..." id="code" readonly required />
											<script type="module" src="assets/js/scanner.js" type="text/javascript"></script>
										</div>
									</div>
								</div>	
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="micon ti-write"></i> Edição: </label>
											<select id="edicao" name="edicao_livro" type="text" class="form-control selectpicker" data-live-search="true" data-header="<i class='fa-solid fa-magnifying-glass'></i> Procure uma edição" data-dropup-auto="false" data-none-selected-text="Nenhum registro encontrado..." data-none-results-text="<i class='fa-solid fa-question'></i> Nenhum resultado correspondente..." required>
												<option value="">Selecione uma edição...</option>
												<?php
													$sql = "SELECT id_edicao, nome, materia FROM tb_edicao";
													$query = $PDO->prepare($sql);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);
													foreach ($results as $result) {
														$id = $result->id_edicao;
														$nome = ucfirst($result->nome);
														$materia = ucfirst($result->materia);
														echo "<option value=$id> $nome -  $materia</option>";
													}
													echo "</select>"
												?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="fa-solid fa-file-waveform"></i> Estado: </label>
											<select name="descricao" id="" class="form-control selectpicker" required>
												<option value="">Selecione um estado...</option>
												<option value="Novo" data-content="<i class='fa fa-battery-full'></i> Novo"></option>
												<option value="Usado" data-content="<i class='fa fa-battery-three-quarters'></i> Usado"></option>
												<option value="Danificado" data-content="<i class='fa fa-battery-quarter'></i> Danificado"></option>
											</select>
										</div>
									</div>
								</div>
								<div style="display: flex; justify-content: center" class="row">
									<div class="form-group">
										<div class="modal-footer justify-content-center">
											<button type="submit" class="btn btn-primary" name="add_book" id="add"><i class="fa-solid fa-circle-plus"></i> Registrar</button>
											<button id="reset" type="reset" class="btn btn-primary"><i class="fa-solid fa-repeat"></i> Limpar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<br>
							<h2 class="mb-30 h4"><i class="ti-list"></i> Lista de Livros</h2>
							<div class="pb-20" style="margin-top: 70px;">
								<table class="data-table table stripe hover nowrap">
									<thead>
										<tr>	
											<th><i class="fa-solid fa-code"></i> CÓDIGO</th>
											<th class="datatable-nosort"><i class='micon ti-write'></i> EDIÇÃO</th>
											<th><i class="fa-solid fa-graduation-cap"></i> MATÉRIA</th>
											<th><i class="fa-solid fa-user"></i> AUTOR(ES)</th>
											<th><i class="fa-solid fa-file-waveform"></i> DESCRIÇÃO</th>
											<th><i class="fa-solid fa-circle-info"></i> STATUS</th>
											<th class="datatable-nosort"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											require_once("../controllers/livros/controllerListarLivro.php");

											new App\Controller\Lista\ListaController;
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
			
			<?php include_once('includes/footer.php'); ?>
		</div>
	</div>

	<?php include_once('includes/scripts.php'); ?>
</body>

</html>