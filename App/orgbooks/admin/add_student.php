<?php include_once('includes/header.php') ?>

<body>
	<?php include_once('../controllers/scripts/alertDialog.php') ?>

	<?php include_once('includes/navbar.php') ?>

	<?php include_once('includes/right_sidebar.php') ?>

	<?php include_once('includes/left_sidebar.php') ?>

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
									<li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-user-plus"></i> Adicionar Aluno(a)</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-30 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"><i class="ion-plus-circled"></i> Formulário do Aluno(a)</h4>
							<br>
						</div>
						<br>
					</div>

					<div class="wizard-content">
						<form method="POST" action="../controllers/alunos/controllerCadastroAluno.php">
							<section>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="matricula"><i class="fa fa-vcard" aria-hidden="true"></i> Registro de Matrícula :</label>
											<input name="matricula" placeholder="Digite o registro de matrícula..." type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control wizard-required" onpaste="return false" required maxlength="5">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="pnome"><i class="fi-torso"></i> Primeiro Nome:</label>
											<input name="pnome" placeholder="Digite o primeiro nome..." type="text" onkeydown="return /^[A-zÀ-ÖØ-öø-ÿ]+$/.test(event.key)" class="form-control wizard-required" onpaste="return false" required maxlength="50">
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="snome"><i class="fi-torso"></i> Segundo Nome:</label>
											<input name="snome" placeholder="Digite o segundo nome..." type="text" onkeydown="return /^[A-zÀ-ÖØ-öø-ÿ]+$/.test(event.key)" class="form-control wizard-required" onpaste="return false" required maxlength="50">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="genero"><i class="fa-solid fa-venus-mars"></i> Gênero :</label>
											<select name="genero" class="form-control selectpicker" required>
												<option value="">Selecione o gênero</option>
												<option value=0 data-content="<i class='fa-solid fa-mars'></i> Masculino"></option>
												<option value=1 data-content="<i class='fa-solid fa-venus'></i> Feminino"></option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="data_nascimento"><i class="fi-calendar"></i> Data de Nascimento :</label>
											<input name="data_nascimento" type="date" class="form-control " onpaste="return false" required />
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="telefone"><i class="fi-telephone"></i> Telefone :</label>
											<script src="assets/js/masks.js"></script>
											<input name="telefone" type="tel" placeholder="Digite o número de telefone..." onkeydown="return maskTelephone(event)" class="form-control" onpaste="return false" maxlength="15" required />
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Endereço de E-mail :</label>
											<input name="email" placeholder="Digite o endereço de e-mail..." type="email" class="form-control" onpaste="return false" maxlength="150" required />
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="curso"><i class="fa-solid fa-school"></i> Curso :</label>
											<select name="curso" class="form-control selectpicker" data-live-search="true" data-none-selected-text="Nenhum registro encontrado..." data-none-results-text="<i class='fa-solid fa-question'></i> Nenhum resultado correspondente..." data-dropup-auto="false" required>
												<option value="">Selecione o curso...</option>
												<option value="Desenvolvimento de Sistemas" data-content="<i class='fa-solid fa-code'></i> Desenvolvimento de Sistemas"></option>
												<option value="Administração" data-content="<i class='fa-solid fa-money'></i> Administração"></option>
												<option value="Mecatrônica" data-content="<i class='fa-solid fa-robot'></i> Mecatrônica"></option>
												<option value="Exatas" data-content="<i class='fa-solid fa-calculator'></i> Exatas"></option>
												<option value="Edificações" data-content="<i class='fa-solid fa-person-digging'></i> Edificações"></option>
												<option value="Prótese Dentária" data-content="<i class='fa-solid fa-tooth'></i> Prótese Dentária"></option>
												<option value="Eletrônica" data-content="<i class='fa-solid fa-microchip'></i> Eletrônica"></option>
												<option value="Ensino Médio Regular" data-content="<i class='fa-solid fa-graduation-cap'></i> Ensino Médio"></option>
											</select>
											
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<div class="form-horizontal">
												<label for="endereco" style="font-size: 10.5pt"><i class="fa fa-home" aria-hidden="true"></i> Endereço Residencial:</label>
												<br>
												<input name="endereco" id="cep" placeholder="Digite o cep do endereço..." type="text" onkeypress="return /[0-9]/i.test(event.key)" style="width:280px;max-width:280px;display:inline-block" class="form-control" onpaste="return false" autocomplete="off" maxlength="8" required>
												<button id="VerificarCEP" class="btn btn-secondary" style="margin-left:-8px;margin-top:-2px;min-height:36px;" type="button"><i class="fa-solid fa-magnifying-glass-location"></i></button>
											</div>
										</div>
									</div>
									
								</div>

								<div style="margin:auto" class="col-md-4 col-sm-12">
									<div class="form-group">
										<label style="font-size:16px;"></label>
										<div class="modal-footer justify-content-center">
											<button type="submit" class="btn btn-primary" name="add_student" id="add_student" data-toggle="modal"><i class="fa-solid fa-circle-plus"></i> Adicionar	</button>
											<button type="reset" class="btn btn-primary" data-toggle="modal"><i class="fa-solid fa-repeat"></i> Limpar</button>
										</div>
									</div>
								</div>
							</div>
						</section>
					</form>
				</div>
			</div>
		</div>

		<?php include_once('includes/footer.php'); ?>

	</div>
	</div>
	
	<!-- js -->
	
	<?php include_once('includes/scripts.php') ?>

	<script src="../controllers/web/viacep/viacep.js" type="module"></script>
</body>

</html>