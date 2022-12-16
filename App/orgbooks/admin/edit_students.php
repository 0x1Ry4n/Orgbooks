<?php include_once('includes/header.php'); ?>

<body>
	<?php include_once('includes/navbar.php'); ?>

	<?php include_once('includes/right_sidebar.php'); ?>

	<?php include_once('includes/left_sidebar.php'); ?>

	<?php include_once('../controllers/scripts/alertDialog.php'); ?>

	<?php require_once('../controllers/alunos/controllerEditarAluno.php'); ?>

	<?php require_once('../controllers/alunos/uploader/controllerAlunoUploader.php'); ?>

	<?php
		if (isset($_GET['edit'])) {
			$get_id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_SPECIAL_CHARS);
		}
	?>

	<?php
		if (isset($_POST['update_image'])) {
			new \App\Controller\ImageUploader\AlunoUploaderController($get_id);
		}
	?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-100px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Gerenciar Alunos</h4>
							</div>

							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="students.php"><i class="fa-solid fa-users"></i> Alunos</a></li>
									<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-edit" aria-hidden="true"></i> Editar Aluno(a)</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="pd-30 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<br>
						<h4 class="text-blue h4"><i class="fa-solid fa-user-pen"></i> Editar Informações</h4>
					</div>
				</div>
				<div class="wizard-content">
					<div class="row">
						<div class="profile-photo">
							<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil" style="margin-top: 8px"></i></a>
							<img src="<?php echo (!empty($editar->getLocation())) ? $editar->getLocation() : '../public/images/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="" class="avatar-photo" style="width: 150px; height: 150px; margin-left: 10px; margin-top: 5px; filter: drop-shadow(0 3px 5px rgba(0,0,0,.3));object-fit: cover;">
							<?php include_once("includes/image_uploader.php"); ?>
						</div>
					</div>

					<form id="form" method="POST" action="../controllers/alunos/controllerEditarAluno.php">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="matricula"><i class="fa fa-vcard" aria-hidden="true"></i> Registro de Matrícula :</label>
									<input name="matricula" placeholder="Digite o registro de matrícula..." value="<?php echo htmlentities($editar->getRM(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control wizard-required" onpaste="return false" required maxlength="5" readonly>
								</div>
							</div>

							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="nome"><i class="fi-torso"></i> Nome: </label>
									<input name="nome" placeholder="Digite o nome do aluno..." value="<?php echo htmlentities($editar->getNome(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" type="text" onkeydown="return /^[A-zÀ-ÖØ-öø-ÿ ]+$/.test(event.key)" class="form-control wizard-required" onpaste="return false" required maxlength="50">
								</div>
							</div>

							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="curso"><i class="fa-solid fa-school"></i> Curso :</label>
									<select name="curso" class="form-control selectpicker" data-live-search="true" data-none-selected-text="Nenhum registro encontrado..." data-none-results-text="<i class='fa-solid fa-question'></i> Nenhum resultado correspondente..." data-dropup-auto="false" required>
										<option value="">Selecione o curso...</option>
										<option value="Desenvolvimento de Sistemas" <?php if ($editar->getCurso() == "Desenvolvimento de Sistemas") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-code'></i> Desenvolvimento de Sistemas"></option>
										<option value="Administração" <?php if ($editar->getCurso() == "Administração") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-money'></i> Administração"></option>
										<option value="Mecatrônica" <?php if ($editar->getCurso() == "Mecatrônica") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-robot'></i> Mecatrônica"></option>
										<option value="Exatas" <?php if ($editar->getCurso() == "Exatas") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-calculator'></i> Exatas"></option>
										<option value="Edificações" <?php if ($editar->getCurso() == "Edificações") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-person-digging'></i> Edificações"></option>
										<option value="Prótese Dentária" <?php if ($editar->getCurso() == "Prótese Dentária") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-tooth'></i> Prótese Dentária"></option>
										<option value="Eletrônica" <?php if ($editar->getCurso() == "Eletrônica") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-microchip'></i> Eletrônica"></option>
										<option value="Ensino Médio" <?php if ($editar->getCurso() == "Ensino Médio") echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-graduation-cap'></i> Ensino Médio Regular"></option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="genero"><i class="fa-solid fa-venus-mars"></i> Gênero :</label>
									<select name="genero" class="form-control selectpicker" required>
										<option value="">Selecione o gênero</option>
										<option value=0 <?php if ($editar->getGenero() == 0) echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-mars'></i> Masculino"></option>
										<option value=1 <?php if ($editar->getGenero() == 1) echo 'selected="selected"' ?> data-content="<i class='fa-solid fa-venus'></i> Feminino"></option>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="data_nascimento"><i class="fi-calendar"></i> Data de Nascimento :</label>
									<input name="data_nascimento" type="date" class="form-control " value="<?php echo htmlentities($editar->getDataNascimento(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" onpaste="return false" required>
								</div>
							</div>

							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="telefone"><i class="fi-telephone"></i> Telefone :</label>
									<script src="assets/js/masks.js"></script>
									<input name="telefone" type="tel" placeholder="Digite o número de telefone..." onkeydown="return maskTelephone(event)" class="form-control" value="<?php echo htmlentities($editar->getTelefone(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" onpaste="return false" maxlength="15" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Endereço de E-mail :</label>
									<input name="email" placeholder="Digite o endereço de e-mail..." type="email" class="form-control" value="<?php echo htmlentities($editar->getEmail(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" onpaste="return false" maxlength="150" required>
								</div>
							</div>

							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<div class="form-horizontal">
										<label for="endereco" style="font-size: 10.5pt"><i class="fa fa-home" aria-hidden="true"></i> Endereço Residencial:</label>
										<br>
										<input name="endereco" id="cep" placeholder="Digite o cep do endereço..." type="text" value="<?php echo htmlentities($editar->getEndereco(), ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" onkeypress="return /[0-9]/i.test(event.key)" style="width:280px;max-width:280px;display:inline-block" class="form-control" onpaste="return false" autocomplete="off" maxlength="8" required>
										<button id="VerificarCEP" class="btn btn-secondary" style="margin-left:-8px;margin-top:-2px;min-height:36px;" type="button"><i class="fa-solid fa-magnifying-glass-location"></i></button>
									</div>
								</div>
							</div>
						</div>

						<div style="display: flex; justify-content: center" class="row">
							<div class="form-group">
								<div class="modal-footer justify-content-center">
									<button type="submit" class="btn btn-primary" name="submit"><i class="fa-solid fa-pen"></i> Atualizar</button>
									<button type="reset" onclick="document.getElementById('form').reset();" class="btn btn-primary"><i class="fa-solid fa-repeat"></i> Limpar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include_once('includes/scripts.php') ?>

	<script src="../controllers/web/viacep/viacep.js" type="module"></script>

</body>

</html>