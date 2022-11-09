<!DOCTYPE html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>OrgBooks</title>

	<style>
		#password-view {
			outline: none;
			border: none;
			background: none;
			color: #484f57;
		}


		#password_icon:hover {
			transition: 0.2s all;
			filter: drop-shadow(1px 1px 1px grey);
			color: #584c7c;
		}

		#signin {
			color: white;
			border-radius: 1em;
		}
	</style>
	
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="public/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="public/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon-16x16.png">


	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link rel="stylesheet" href="vendors/fonts/font-awesome-6.2.0/css/all.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

	<div style="background-image: linear-gradient(60deg, #584c7c 0%, #1f262a 60%); height: 100%" class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container" data-aos="fade-left">
			<div class="row align-items-center">
				<div class="col-md-12 mx-auto" style="height: 450px">
					<div class="login-box bg-white box-shadow border-radius-10" style="border: 2px solid rgba(192, 192, 192, 0.6)">
						<div class="login-title">
							<h2 class="text-center" style="color: linear-gradient(60deg, #1f262a 0%, #584c7c 120%);"><i class="fa-solid fa-book-open-reader"></i> Bem-vindo novamente!</h2>
						</div>
						<form method="POST" action="controllers/login/controllerLogin.php">
							<div class="input-group custom">
								<input type="email" class="form-control form-control-lg" placeholder="Endereço de Email" name="username" id="username" maxlength="200" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="Senha" name="password" id="password" maxlength="50" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><button type="button" id="password-view" onclick="tooglePassword()"><i id="password_icon" class="fa fa-lock" aria-hidden="true"></i></button></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" style="background-image: linear-gradient(60deg, #1f262a 0%, #584c7c 120%);" class="btn btn-block" name="signin" id="signin" style="margin-top: 1em;"><i class="fa-solid fa-right-to-bracket"></i> Entrar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

			<!-- waves -->
			


	<!-- js -->
	<script>
		AOS.init();

		function tooglePassword() {
			let field = document.getElementById('password');

			if (field.type == "password") {
				field.type = "text";
			} else {
				field.type = "password";
			}
		}
	</script>

	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>