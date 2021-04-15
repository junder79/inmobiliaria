<div class="header shadow-lg">
	<div class="logo">
		<span>Combustible</span>
	</div>
	<a href="#" class="nav-trigger"><span></span></a>
</div>
<div class="side-nav">
	<div class="logo">
		<span>Combustible</span>
	</div>

	<nav>
		<ul>
			<li>
				<a href="combustible" id="combustible">
					<span><i style="color:white" class="fa fa-home"></i></span>
					<span>Combustible</span>
				</a>
			</li>

			<li>
				<a href="proveedor" id="proveedor">
					<span><i style="color:white" class="fa fa-home"></i></span>
					<span>Combustible Proveedor</span>
				</a>
			</li>
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