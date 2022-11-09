<?php include_once('includes/header.php') ?>

<link rel="stylesheet" href="assets/css/edition.css">

<body>

	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

	<?php include_once('../controllers/scripts/alertDialog.php'); ?>

	<?php require_once("../controllers/edicoes/controllerExcluirEdicao.php") ?>

	<?php
		if (isset($_GET['delete'])) {
			new \App\Controller\Excluir\ExcluirController(filter_input(INPUT_GET, 'delete', FILTER_VALIDATE_INT));
		}
	?>

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
									<li class="breadcrumb-item"><i class="fa-solid fa-bookmark"></i> Edições</li>
									<li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-box-open"></i> Módulo de Edições</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
						<div class="card-box pd-30 pt-10 height-100-p">
							<br>
							<h2 class="mb-30 h4"><i class="ion-plus-circled"></i> Nova Edição</h2>

							<form method="POST" action="../controllers/edicoes/controllerCadastroEdicao.php">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="ion-ios-list-outline"></i> Nome do livro</label>
											<input placeholder="Digite o nome do livro..." name="nome" type="text" class="form-control" onkeydown="return /^[A-zÀ-ÖØ-öø-ÿ0-9-°\s]+$/.test(event.key)" autocomplete="off" onpaste="return false" maxlength="75" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="fa-solid fa-graduation-cap"></i> Matéria:</label>
											<select name="materia" class="form-control selectpicker" data-live-search="true" data-none-selected-text="Nenhum registro encontrado..." data-none-results-text="<i class='fa-solid fa-question'></i> Nenhum resultado correspondente..." onpaste="return false" required>
												<option value="">Selecione uma matéria...</option>
												<option value="Matemática" data-content="<i class='fa-solid fa-superscript'></i> Matemática"></option>
												<option value="Português" data-content="<i class='fa-solid fa-language'></i> Português"></option>
												<option value="História" data-content="<i class='fa-solid fa-hourglass-3'></i> História"></option>
												<option value="Geografia" data-content="<i class='fa-solid fa-globe'></i> Geografia"></option>
												<option value="Biologia" data-content="<i class='fa-solid fa-dna'></i> Biologia"></option>
												<option value="Física" data-content="<i class='fa-solid fa-atom'></i> Física"></i></option>
												<option value="Espanhol" data-content="<i class='fa-solid fa-language'></i> Espanhol"></option>
												<option value="Química" data-content="<i class='fa-solid fa-vial'></i> Química"></option>
												<option value="Inglês" data-content="<i class='fa-solid fa-language'></i> Inglês"></option>
												<option value="Sociologia" data-content="<i class='fa-solid fa-users'></i> Sociologia"></option>
												<option value="Filosofia" data-content="<i class='fa-solid fa-institution'></i> Filosofia"></option>
												<option value="Ed.Física" data-content="<i class='fa-solid fa-futbol-o'></i> Ed. Física"></option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label><i class="fi-calendar"></i> Validade</label>
											<input type="date" name="data_validade" id="datepicker" class="form-control" required />
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="autor"><i class="ion-person"></i> Autor(es)</label><br>
											<textarea id="autor" placeholder="Digite o(s) autor(es) do livro..." name="autor" type="text" onkeydown="return /^[A-z-a-z\s]+$/.test(event.key)" onpaste="return false" maxlength="200" required></textarea>
										</div>
									</div>
								</div>
					
								<div style="display: flex; justify-content: center" class="row">
									<div class="form-group">
										<div class="modal-footer justify-content-center">
											<button type="submit" class="btn btn-primary" name="add_editions" id="add"><i class="fa-solid fa-circle-plus"></i> Criar</button>
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
							<h2 class="mb-30 h4"><i class="ti-list"></i> Lista de Edições</h2>
							<div class="filter-table">
								<p><i class="fa-solid fa-calendar-days"></i> Validade: </p>
								<form method="POST">
									<label style="margin-top: 10px;text-indent: 5px" for="from-date">De</label>
									<input type="date" class="form-control" name="from-date" id="">
									<label style="margin-top: 10px;" for="to-date">Até</label>
									<input type="date" class="form-control" name="to-date" id="">
									<button type="submit" class="btn btn-secondary btn-sm" name="filter" style="display: flex; flex-direction: row;align-items:center;gap:5px"><i class="fa-solid fa-filter"></i> Filtrar</button>
								</form>
							</div>

							<div class="pb-20" style="margin-top: 40px;">
								<table class="data-table table stripe hover" id="edition-table">
									<thead>
										<tr>
											<th><i class="ion-ios-list-outline"></i> NOME DO LIVRO</th>
											<th><i class="fa-solid fa-graduation-cap"></i> MATÉRIA</th>
											<th class="datatable-nosort"><i class="ion-person"></i> AUTOR(ES)</th>
											<th><i class="fi-calendar"></i> VALIDADE</th>
											<th class="datatable-nosort"></th>
										</tr>
									</thead>
									<tbody>
										<?php
											require_once("../controllers/edicoes/controllerListarEdicao.php");
											require_once("../model/database.php");

											const DEFAULT_DATE = 'Y-m-d';

											$filtragem = new \Model\Database();

											if (isset($_POST['filter'])) {
												if (isset($_POST['from-date']) && isset($_POST['to-date'])) {
													$from_date = $_POST['from-date'];
													$to_date = $_POST['to-date'];
													$dataFiltro = $filtragem->filtrarEdicaoPorData($from_date, $to_date);

													if(!is_null($dataFiltro)) {
														foreach($dataFiltro as $value) {
															echo "<tr>";
																echo "<td title='Nome do livro'>
																		<div class='weight-600'>". htmlentities($value['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8')."</div>
																	</td>";
																
																echo "<td title='Matéria' title='Matéria'>
																		"?><?php 
																			switch($value['materia']) {
																				case "Matemática":
																					echo "<i class='fa-solid fa-superscript'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Português":
																					echo "<i class='fa-solid fa-language'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');    
																					break;
																				case "História":
																					echo "<i class='fa-solid fa-hourglass-3'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Geografia":
																					echo "<i class='fa-solid fa-globe'></i> ".htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Biologia": 
																					echo "<i class='fa-solid fa-dna'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Física":
																					echo "<i class='fa-brands fa-grav'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Espanhol":
																					echo "<i class='fa-solid fa-language'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Química": 
																					echo "<i class='fa-solid fa-vial'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Sociologia":
																					echo "<i class='fa-solid fa-users'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Filosofia":
																					echo "<i class='fa-solid fa-institution'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Ed.Física": 
																					echo "<i class='fa-solid fa-futbol-o'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				case "Inglês": 
																					echo "<i class='fa-solid fa-language'></i> ". htmlentities($value['materia'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
																					break;
																				default:
																					break;
																			}
																		?><?php "</td>";    
																			
																echo "<td title='Autor'>"?><?php
																			$autor = json_decode($value['autor']);

																			foreach ($autor as $a) {
																				echo htmlentities($a->value.", ");
																			} 
																?><?php "</td>";
																echo "<td title='Validade'>"?><?php if(htmlentities($value['validade'], ENT_QUOTES | ENT_HTML5, 'UTF-8') < date(DEFAULT_DATE, time())) { echo "<p title='Livro Vencido' style='margin-top: 15px; color: red'>". htmlentities(implode('/', array_reverse(explode('-', $value['validade'])))). "</p>"; } else { echo "<p style='margin-top: 15px;'>". htmlentities(implode('/', array_reverse(explode('-', $value['validade']))), ENT_QUOTES | ENT_HTML5, 'UTF-8'). "</p>"; }?><?php "</td>";
																	
																echo "<td>
																		<div style='margin-top: 0.3em' class='table-actions'>
																				<a title='Editar' href='edit_editions.php?edit=". urlencode(filter_var($value['id_edicao'], FILTER_VALIDATE_INT)). "'><i style='color: #233a77' class='dw dw-edit2'></i></a>
																				<a title='Excluir' href='editions.php?delete=". urlencode(filter_var($value['id_edicao'], FILTER_VALIDATE_INT)). "'><i style='color: #ff7f7f' class='dw dw-delete-3'></i></a>
																			</div>
																		</div>
																	</td>";
															echo "</tr>";

															echo "<script>toastr.success('Filtragem realizada com sucesso!');</script>";
														}
													} else {
														new App\Controller\Lista\ListaController;		
														echo "<script>toastr.error('Nenhuma edição encontrada!');</script>";
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

	<script src="assets/js/tagify.js" type="text/javascript"> </script>

	<script type="text/javascript">
		let input = document.getElementById('autor'); // tagify 
		setTagifyValues(input, 5);
	</script>

	<?php include_once('includes/scripts.php') ?>
</body>

</html>	