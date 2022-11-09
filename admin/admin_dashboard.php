<?php include_once('includes/header.php') ?>

<link rel="stylesheet" href="assets/css/dashboard.css" />
<link rel="stylesheet" href="../src/plugins/fullcalendar/lib/main.min.css" />
<link rel="stylesheet" href="../src/plugins/apexcharts.css" />

<style> 
	.notify {
		background-color: whitesmoke; 
		border-radius: 6px; 
		color: #192931;
		padding: 2px;
	}
</style>

<body>
	<?php include_once('includes/preloader.php'); ?>

	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

	<?php include_once('includes/scripts.php') ?>

	<div class="mobile-menu-overlay"></div>

	<script src="../src/plugins/fullcalendar/lib/main.min.js"> </script>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center mx-auto">
					<div class="col-md-4 user-icon">
						<img draggable="false" src="assets/images/image_dashboard.jpg" alt="">
					</div>
					<div class="row">
						<div class="message p-3">
							<h1 class="font-24 weight-600 text-capitalize" data-color="#192931">Seja bem-vindo</h1>
							<h1 class="font-26 weight-800" data-color="gray">
								<?php echo htmlentities(ucfirst($row['nome']), ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>,
							</h1>
							<h1 class="font-24 weight-600" style="text-indent: 5px">
								Hoje é
								<?php
									setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
									date_default_timezone_set('America/Sao_Paulo');

									$data_extenso = utf8_encode(ucwords(strftime('%A, %d de %B de %Y', strtotime('today'))));

									echo $data_extenso;
								?>
							</h1>
						</div>
					</div>
				</div>
				<br><br>
				<div class="row">
					<div class="col-lg-4 col-md-6 mb-20">
						<div class="card-box height-100-p pd-20 min-height-200px">
							<div class="d-flex justify-content-between pb-10">
								<p class="h5 mb-0 mx-auto"><i style='color: #192931' class="bell fa-solid fa-bell"></i> Notificações</p>
							</div>
							<div class="scroll">
								<ul>
									<?php
										$query = mysqli_query($conn, "SELECT * FROM tb_emprestimo WHERE DATE(data_devolucao) = CURDATE() OR DATE(data_devolucao) < CURDATE()") or die("Erro!");

										if (mysqli_num_rows($query) < 1) {
											echo "<p style='color: white; text-align: center;font-size: 10.9pt;'><i class='fa fa-bell-slash'></i> Sem Notificações! </p>";
										}

										while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
											$id = $row['id_emprestimo'];
											$cod_unidade = $row['cod_unidade'];
											$cod_aluno = $row['cod_aluno'];
											$data_devolucao = $row['data_devolucao'];
											$data_retirada = $row['data_retirada'];
										?>

										<li style="border: solid 2px whitesmoke; padding: 8px; border-radius: 10px;" class="d-flex align-items-center justify-content-between mt-10">
											<div class="txt">
											<p class="weight-600 font-italic" data-color="white">Notificação de entrega</p>
												<span class="font-16 weight-600" data-color="whitesmoke"><?php echo "<i class='fa-solid fa-book'></i> Livro: " . "<span class='notify'>". $cod_unidade ."</span>" . " de " . "<span class='notify'>". $cod_aluno. "</span>"; ?></span><br>
												<span class="font-14 weight-500" data-color="gainsboro"> <?php echo "<i class='fa-solid fa-gavel'></i> ". implode('/', array_reverse(explode('-', $data_retirada))); ?> <i class="fa-solid fa-arrow-right" data-color="gainsboro"></i></span>
												<span class="font-14 weight-500" data-color="orange"><?php echo " <i class='fa-solid fa-clock'></i> " . implode('/', array_reverse(explode('-', $data_devolucao))); ?></span>
											</div>
										</li>
										<br>
								</ul>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-6 mb-20">
						<div class="card-box height-100-p pd-20 min-height-200px">
							<div class="d-flex justify-content-between">
								<div class="h5 mb-0 mx-auto"><i class="fa-solid fa-calendar-days"></i> Calendário(Empréstimos.)</div>
							</div>
							<br>

							<i class="fa-solid fa-graduation-cap"></i> <b>Matéria:</b> <select id="selector-materia" class="selectpicker"  data-live-search="true" data-none-selected-text="Nenhum registro encontrado..." data-none-results-text="<i class='fa-solid fa-question'></i> Nenhum resultado correspondente...">
								<option value="all">Tudo</option>
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

							<div id="calendar"></div>

							<script src="assets/js/calendar.js"></script>
						</div>
					</div>

					<div class="col-lg-4 col-md-6 mb-20">
						<div class="card-box height-100-p pd-20 min-height-200px">
							<div class="d-flex justify-content-between">
								<div class="h5 mb-0 mx-auto"><i class="fa-solid fa-chart-simple"></i> Estatísticas(Livros.)</div>
								<div class="table-actions">
								</div>
							</div>

							<div class="user-list">
								<ul>
									<?php
										$materias = array(
											"fisica" => array(),
											"matematica" => array(),
											"quimica" => array(),
											"biologia" => array(),
											"historia" => array(),
											"sociologia" => array(),
											"ed.fisica" => array(),
											"portugues" => array(),
											"espanhol" => array(),
											"ingles" => array(),
											"geografia" => array(),
											"filosofia" => array()
										);

										$query = mysqli_query($conn,
											"SELECT liv.id_livro, edi.validade, edi.nome, 
												edi.materia, edi.autor, liv.descricao, liv.status_livro
												FROM tb_livro liv
												JOIN tb_edicao edi
												ON liv.cod_edicao = edi.id_edicao"
											);


										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
												if ($row['materia'] == "Física") {
													array_push($materias['fisica'], $row['id_livro']);
												} else if ($row['materia'] == "Matemática") {
													array_push($materias['matematica'], $row['id_livro']);
												} else if ($row['materia'] == "Português") {
													array_push($materias['portugues'], $row['id_livro']);
												} else if ($row['materia'] == "História") {
													array_push($materias['historia'], $row['id_livro']);
												} else if ($row['materia'] == "Geografia") {
													array_push($materias['geografia'], $row['id_livro']);
												} else if ($row['materia'] == "Biologia") {
													array_push($materias['biologia'], $row['id_livro']);
												} else if ($row['materia'] == "Química") {
													array_push($materias['quimica'], $row['id_livro']);
												} else if ($row['materia'] == "Inglês") {
													array_push($materias['ingles'], $row['id_livro']);
												} else if ($row['materia'] == "Filosofia") {
													array_push($materias['filosofia'], $row['id_livro']);
												} else if ($row['materia'] == "Espanhol") {
													array_push($materias['espanhol'], $row['id_livro']);
												} else if ($row['materia'] == "Ed.Física") {
													array_push($materias['ed.fisica'], $row['id_livro']);
												} else {
													array_push($materias['sociologia'], $row['id_livro']);
												}
											}
										}
									?>

									
									<div id="chart" style="margin-top: 75px; cursor: pointer;"></div>
								
									<?php include_once("../vendors/scripts/apexcharts-setting.php"); ?>
								</ul>
							</div>
						</div>	
					</div>
				</div>
				<br>
				<?php include_once('includes/footer.php'); ?>
			</div>
		</div>

		<!-- Calendar Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div id="modal-body" class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i> Fechar</button>
					</div>
				</div>
			</div>
		</div>
</body>

</html>