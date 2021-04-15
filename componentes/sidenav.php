<div class="header shadow-lg">
	<div class="logo">
		<span>inmobiliaria</span>
	</div>
	<a href="#" class="nav-trigger"><span></span></a>
</div>
<div class="side-nav">
	<div class="logo">
		<span>inmobiliaria</span>
	</div>

	<nav>
		<ul>
			<li>
				<a href="inicio" id="inicio">
					<span><i style="color:white" class="fa fa-home"></i></span>
					<span>Inicio</span>
				</a>
			</li>

			<?php
				if ($_SESSION['tipo_usuario'] == 1) {  ?>
					<li>
						<a href="usuarios" id="usuarios">
							<span><i style="color:white" class="fa fa-user"></i></span>
							<span>Usuarios</span>
						</a>
					</li>
			<?php } ?>
			<li>
				<a href="logout" id="logout">
					<span><i style="color:white" class="fas fa-sign-out-alt"></i></span>
					<span>Cerrar Sesión</span>
				</a>
			</li>
		</ul>
	</nav>
</div>

<script>
	$('#inicio').click(function() {
		NProgress.start();
	});
	$('#usuarios').click(function() {
		NProgress.start();
	});
	$('#logout').click(function() {
		NProgress.start();
	});
</script>