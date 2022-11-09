<?php include_once('includes/header.php') ?>

<link rel="stylesheet" href="assets/css/edition.css">

<body>
	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

	<?php include_once('../controllers/scripts/alertDialog.php'); ?>

	<?php require_once('../controllers/edicoes/controllerEditarEdicao.php') ?>

	<?php require_once("../controllers/edicoes/controllerExcluirEdicao.php") ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Gerenciar Edições</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="editions.php"><i class="fa-solid fa-bookmark"></i> Edições</a></li>
									<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-edit" aria-hidden="true"></i> Editar Edição</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<br>
							<h2 class="mb-30 h4"><i class="fa fa-edit" aria-hidden="true"></i> Editar Edição</h2>
							<form method="POST" action="../controllers/edicoes/controllerEditarEdicao.php">
								<div class="row">
									<input name="id" type="hidden" value="<?php echo htmlentities($editar->getID(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" />
									<div class="col-md-12">
										<div class="form-group">
											<label for="nome"><i class="ion-ios-list-outline"></i> Nome do Livro</label>
											<input name="nome" type="text" class="form-control" autocomplete="off" onkeydown="return /^[A-zÀ-ÖØ-öø-ÿ0-9-°\s]+$/.test(event.key)" value="<?php echo htmlentities($editar->getNome(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="fa-solid fa-graduation-cap"></i> Matéria:</label>
											<select name="materia" class="form-control selectpicker" data-live-search="true" data-none-selected-text="Nenhum registro encontrado..." data-none-results-text="<i class='fa-solid fa-question'></i> Nenhum resultado correspondente..." onpaste="return false" required>
												<option value="">Selecione uma matéria...</option>
												<option value="Matemática" <?php if ($editar->getMateria() == "Matemática") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-superscript'></i> Matemática"></option>
												<option value="Português" <?php if ($editar->getMateria() == "Português") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-language'></i> Português"></option>
												<option value="História" <?php if ($editar->getMateria() == "História") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-hourglass-3'></i> História"></option>
												<option value="Geografia" <?php if ($editar->getMateria() == "Geografia") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-globe'></i> Geografia"></option>
												<option value="Biologia" <?php if ($editar->getMateria() == "Biologia") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-dna'></i> Biologia"></option>
												<option value="Física" <?php if ($editar->getMateria() == "Física") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-atom'></i> Física"></i></option>
												<option value="Espanhol" <?php if ($editar->getMateria() == "Espanhol") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-language'></i> Espanhol"></option>
												<option value="Química" <?php if ($editar->getMateria() == "Química") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-vial'></i> Química"></option>
												<option value="Inglês" <?php if ($editar->getMateria() == "Inglês") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-language'></i> Inglês"></option>
												<option value="Sociologia" <?php if ($editar->getMateria() == "Sociologia") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-users'></i> Sociologia"></option>
												<option value="Filosofia" <?php if ($editar->getMateria() == "Filosofia") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-institution'></i> Filosofia"></option>
												<option value="Ed.Física" <?php if ($editar->getMateria() == "Ed.Física") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-futbol-o'></i> Ed. Física"></option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="autor"><i class="ion-person"></i> Autor(es)</label><br>
											<input id="autor" value="<?php
												$autor = json_decode($editar->getAutor());
												foreach ($autor as $a) {
													echo htmlentities($a->value . ",", ENT_QUOTES | ENT_HTML5, 'UTF-8');
												}
											?>" placeholder="Digite o(s) autor(es) do livro..." name="autor" type="text" onpaste="return false" required maxlength="200">
										</div>

									</div>
								</div </div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="data_validade"><i class="fi-calendar"></i> Validade</label>
											<input name="data_validade" type="date" class="form-control" autocomplete="off" value="<?php echo htmlentities($editar->getValidade(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" required>
										</div>
									</div>
								</div>

								<div style="display: flex; justify-content: center" class="row">
									<div class="form-group">
										<div class="modal-footer justify-content-center">
											<button id="edit" class="btn btn-primary" name="submit"><i class="fa-solid fa-pen"></i> Atualizar</button>
											<button type="reset" id="reset" class="btn btn-primary"><i class="fa-solid fa-repeat"></i> Limpar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<br>
							<h2 class="mb-30 h4"><i class="ti-list"></i> Lista de Edições</h2>
							<div class="pb-20" style="margin-top: 70px;">
								<table class="data-table table stripe hover nowrap">
									<thead>
										<tr>
											<th><i class="ion-ios-list-outline"></i> NOME DO LIVRO</th>
											<th><i class="ion-social-buffer"></i> MATÉRIA</th>
											<th><i class="ion-person"></i> AUTOR</th>
											<th><i class="fi-calendar"></i> VALIDADE</th>
											<th class="datatable-nosort"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											require_once("../controllers/edicoes/controllerListarEdicao.php");

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

	<script type="text/javascript" src="assets/js/tagify.js"></script>


	<script type="text/javascript">
		let input = document.getElementById('autor');

		setTagifyValues(input, 5);
	</script>
</body>

</html>