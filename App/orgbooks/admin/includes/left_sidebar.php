<div class="left-side-bar">
	<div class="brand-logo" style="margin-top: 75px">
		<a href="admin_dashboard.php">
			<img src="../public/images/logo.png" style="width: 125px;margin:auto;" alt="" class="dark-logo" draggable="false">
			<img src="../public/images/logo.png" style="width: 125px;margin:auto" alt="" class="light-logo" draggable="false">
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<br>
	<div class="menu-block customscroll" style="margin-top: 50px;">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li class="dropdown">
					<a href="admin_dashboard.php" class="dropdown-toggle no-arrow">
						<span class="micon fa-solid fa-chart-pie"></span><span class="mtext">Overview</span>
					</a>
				</li>
				<li>
					<a href="books.php" class="dropdown-toggle no-arrow">
						<span class="micon fa-solid fa-book"></span><span class="mtext">Livros</span>
					</a>
				</li>
				<li>
					<a href="editions.php" class="dropdown-toggle no-arrow">
						<span class="micon fa-solid fa-bookmark"></span><span class="mtext">Edições</span>
					</a>
				</li>
				<li>
					<a href="loans.php" class="dropdown-toggle no-arrow">
						<span class="micon fa-solid fa-wallet"></span><span class="mtext">Empréstimos</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon fa-solid fa-users"></span><span class="mtext">Alunos</span>
					</a>
					<ul class="submenu">
						<li><a href="add_student.php"><i class="fa-solid fa-circle-plus"></i> Novo aluno(a)</a></li>
						<li><a href="students.php"><i class="fa-solid fa-list-ul"></i> Listar</a></li>
					</ul>
				</li>

				<li>
					<div class="dropdown-divider"></div>
				</li>
				<li>
					<a href="generate_qrcode.php" class="dropdown-toggle no-arrow">
						<i class="micon fa fa-qrcode" aria-hidden="true"></i><span class="mtext">Gerar QRCode</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>