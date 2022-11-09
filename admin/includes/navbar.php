<div class="header">
	<div class="header-left">
		<div class="menu-icon dw dw-menu"></div>
	</div>
	<div class="header-right">
		<div class="dashboard-setting user-notification">
			<div class="dropdown">
				<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
					<i class="micon dw dw-settings2"></i>
				</a>
			</div>
		</div>

		<div class="user-info-dropdown">
			<div class="dropdown">

				<?php include_once('config/connection.php') ?>
				<?php include_once('config/session.php') ?>

				<?php
					$stmt = mysqli_prepare($conn, "SELECT nome, location FROM tb_admin WHERE id_admin = ?") 
					or die();

					mysqli_stmt_bind_param($stmt, "i", $session_id);
					$execute = mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_array($result);
				?>

				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon">
						<img style="width: 75px; height: 50px; object-fit: cover;" src="<?php echo (!empty($row['location'])) ? $row['location'] : '../public/images/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="">
					</span>
					<span class="user-name"><?php echo htmlentities(ucfirst($row['nome']), ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					<a class="dropdown-item" href="my_profile.php"><i class="dw dw-user1"></i> Perfil</a>
					<a class="dropdown-item" href="../logout.php"><i class="dw dw-logout"></i> Sair</a>
				</div>
			</div>
		</div>

	</div>
</div>