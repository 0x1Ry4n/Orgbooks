<?php include_once('includes/header.php') ?>

<link rel="stylesheet" href="assets/css/book_loan.css">

<body>
	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

	<?php include_once('../controllers/scripts/alertDialog.php') ?>

	<?php require_once('../controllers/livros/controllerEditarLivro.php') ?>

	<div class="mobile-menu-overlay"></div>

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
									<li class="breadcrumb-item"><a href="books.php"><i class="fa-solid fa-book"></i> Livros</a></li>
									<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-edit" aria-hidden="true"></i> Editar Livro</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<br>
							<h2 class="mb-30 h4"><i class="fa fa-edit" aria-hidden="true"></i> Editar Livro</h2>
							<form name="save" action="../controllers/livros/controllerEditarLivro.php" method="POST">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="dw dw-coding-1"></i> Código do livro</label>
											<input type="text" class="form-control" name="code" readonly="" id="code" value="<?php echo htmlentities($editar->getLivro(), ENT_QUOTES | ENT_HTML401, 'UTF-8') ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="micon ti-write"></i> Edição</label>
											<select name="edicao" type="text" class="form-control selectpicker" data-live-search="true" data-header="<i class='fa-solid fa-magnifying-glass'></i> Procure uma edição" data-dropup-auto="false" data-none-selected-text="Nenhum registro encontrado..." data-none-results-text="<i class='fa-solid fa-question'></i> Nenhum resultado correspondente..." required>
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
														echo "<option value='$id'" ?><?php if($editar->getEdicao() == $id) echo "selected='selected'" ?>><?php echo $nome. " - ". $materia. "</option>";
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
												<option value="" >Selecione um estado...</option>
												<option value="Novo" <?php if ($editar->getDescricao() == "Novo") echo 'selected="selected"' ?> data-content="<i class='fa fa-battery-full'></i> Novo"></option>
												<option value="Usado" <?php if ($editar->getDescricao() == "Usado") echo 'selected="selected"' ?> data-content="<i class='fa fa-battery-three-quarters'></i> Usado"></option>
												<option value="Danificado" <?php if ($editar->getDescricao() == "Danificado") echo 'selected="selected"' ?> data-content="<i class='fa fa-battery-quarter'></i> Danificado"></option>
											</select>
										</div>
									</div>
								</div>
								<div style="display: flex; justify-content: center" class="row">
									<div class="form-group">
										<div class="modal-footer justify-content-center">
											<button type="submit" class="btn btn-primary" name="submit" id="add"><i class="fa-solid fa-pen"></i> Atualizar</button>
											<button id="reset" type="button" name="reset" class="btn btn-primary"><i class="fa-solid fa-repeat"></i> Limpar</button>
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
											<th><i class="dw dw-coding-1"></i> CÓDIGO</th>
											<th class="datatable-nosort"><i class='micon ti-write'></i> EDIÇÃO</th>
											<th><i class="ion-social-buffer"></i> MATÉRIA</th>
											<th class="datatable-nosort"><i class="ion-person"></i> AUTOR(ES)</th>
											<th><i class="fa-solid fa-file-waveform"></i> DESCRIÇÃO</th>
											<th><i class="fa-solid fa-circle-info"></i> STATUS</th>
											<th class="datatable-nosort"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											require_once('../controllers/livros/controllerListarLivro.php');

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

	<?php include_once('includes/scripts.php') ?>
</body>

</html>