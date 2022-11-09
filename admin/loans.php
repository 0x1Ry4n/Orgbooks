<?php include_once('includes/header.php') ?>

<link rel="stylesheet" href="assets/css/book_loan.css">

<?php include_once('../controllers/scripts/alertDialog.php') ?>

<body>
	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

	<?php require_once('../controllers/emprestimos/controllerExcluirEmprestimo.php') ?>


	<?php
		if (isset($_GET['delete'])) {
			new \App\Controller\Excluir\ExcluirController($_GET['delete']);
		}
	?>

	<script src="../src/plugins/html5-qrcode/html5-qrcode.min.js"></script>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Gerenciar Empréstimos</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><i class="fa-solid fa-money-bill"></i> Empréstimos</li>
									<li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-box-open"></i> Módulo de Emp.</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<br>
							<h2 class="mb-30 h4"><i class="ion-plus-circled"></i> Novo Empréstimo</h2>
							<form method="POST" action="../controllers/emprestimos/controllerCadastroEmprestimo.php">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label  data-trigger="hover" data-toggle="popover"  data-content="Habilite a câmera nas configurações, clique em Start Scanning e escaneie um QRCode para realizar o empréstimo."><i class="fa fa-search" aria-hidden="true"></i> Procurar Livro</label>
											<div id="reader" title="Escaneie um QRCode"></div>
											<input type="text" class="form-control" name="code" placeholder="Escaneie um QRCode..." id="code" readonly />
											<script type="module" src="assets/js/scanner.js" type="text/javascript"></script>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="fi-calendar"></i> Data de Retirada</label>
											<input id="data_retirada" name="data_retirada" type="date" class="form-control" required>
											
											<script type="text/javascript">
												let data_retirada = document.getElementById("data_retirada");

												Date.prototype.toDateInputValue = (function() {
													var local = new Date(this);
													local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
													return local.toJSON().slice(0, 10);
												});

												data_retirada.value = new Date().toDateInputValue();
											</script>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="fi-calendar"></i> Data de Entrega</label>
											<input name="data_devolucao" type="date" class="form-control" autocomplete="on" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="ion-android-contact"></i> Aluno</label>
											<select name="aluno" type="text" class="form-control selectpicker" data-live-search="true" data-header="Procure um aluno" data-dropup-auto="false" data-none-selected-text="Nenhum registro encontrado" data-none-results-text="Nenhum aluno correspondente..." required>
												<option value=''>Selecione um aluno...</option>
												<?php
													$sql = 'SELECT id_aluno, nome from tb_aluno';
													$query = $PDO->prepare($sql);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);

													foreach ($results as $result) {
														$nome = ucfirst($result->nome);
														$rm = $result->id_aluno;
														echo "<option value=$rm> $nome - $rm </option>";
													}

													echo "</select>";
												?>
										</div>
									</div>
								</div>
								<div style="display: flex; justify-content: center" class="row">
									<div class="form-group">
										<div class="modal-footer justify-content-center">
											<button type="submit" class="btn btn-primary" name="add_loan" id="add"><i class="fa-solid fa-check-double"></i> Realizar</button>
											<button type="reset" class="btn btn-primary"><i class="fa-solid fa-repeat"></i> Limpar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<br>
							<h2 class="mb-30 h4"><i class="ti-list"></i> Lista de Empréstimos</h2>
							<div class="filter-table">
								<p><i class="fa fa-calendar-days"></i> Retirada/Entrega: </p>
								<form method="POST">
									<label style="margin-top: 10px;text-indent: 5px" for="from-date">De</label>
									<input type="date" class="form-control" name="from-date" id="">
									<label style="margin-top: 10px;" for="to-date">Até</label>
									<input type="date" class="form-control" name="to-date" id="">
									<button type="submit" class="btn btn-secondary btn-sm" name="filter" style="display: flex; flex-direction: row;align-items:center;gap:5px"><i class="fa fa-filter"></i> Filtrar</button>
								</form>
							</div>
							<div class="pb-20" style="margin-top: 40px;">
								<table class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th class="table-plus"><i class="ion-android-contact"></i> ALUNO(A)</th>
											<th><i class="fa fa-book" aria-hidden="true"></i> EDIÇÃO</th>
											<th><i class="fi-calendar"></i> DATA DE RETIRADA/ENTREGA</th>
											<th class="datatable-nosort"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											require_once("../controllers/emprestimos/controllerListarEmprestimo.php");

											require_once("../model/database.php");

											$filtragem = new \Model\Database();

											if (isset($_POST['filter'])) {
												if (isset($_POST['from-date']) && isset($_POST['to-date'])) {
													$from_date = $_POST['from-date'];
													$to_date = $_POST['to-date'];
													$dataFiltro = $filtragem->filtrarEmprestimoPorData($from_date, $to_date);

													if(!is_null($dataFiltro)) {
														foreach ($dataFiltro as $value) {
															echo "<tr>";
										
															echo "<td>";
										
																echo "<div>". htmlentities(ucfirst($value['nome_aluno']). " - " .$value['id_aluno'], ENT_QUOTES | ENT_HTML5, 'UTF-8')."</div>";
															
															echo "</td>";
																
																echo "<td>". htmlentities($value['nome_edicao'] . " - ". $value['cod_unidade'], ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</td>";
																
																echo "<td>". htmlentities(implode('/', array_reverse(explode('-', $value['data_retirada']))). " - ". implode('/', array_reverse(explode('-', $value['data_devolucao']))), ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</td>";
										
																echo "<td>
																		<div class='table-actions'>
																			<a style='font-size: 10.5pt; color:white' title='Devolver' class='btn btn-primary' href='loans.php?delete=". urlencode(filter_var($value['id_emprestimo'], FILTER_VALIDATE_INT)). "'><i class='fa fa-check-square-o' aria-hidden='true'></i> Devolver</a>
																		</div>
																	</td>";
															echo "</tr>";
														}

														echo "<script>toastr.success('Filtragem realizada com sucesso!');</script>";
													} else {
														new App\Controller\Lista\ListaController;		
														echo "<script>toastr.error('Nenhum empréstimo encontrado!');</script>";
													}
												}
											} else {
												new App\Controller\Lista\ListaController;	
											}
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

	<?php include_once('includes/scripts.php') ?>
</body>

</html>