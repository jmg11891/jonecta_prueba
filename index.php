<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Konecta - prueba</title>
	<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css	">
	<link rel="stylesheet" href="/node_modules/sweetalert2/dist/sweetalert2.min.css	">

	<script src="/node_modules/jquery/dist/jquery.js"></script>
	<script src="/node_modules/vue/dist/vue.min.js"></script>
	<script src="/node_modules/vuex/dist/vuex.min.js"></script>
	<script src="/node_modules/jquery-ui-npm/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

	<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/node_modules/axios/dist/axios.min.js"></script>
	<script src="/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
	<script src="https://use.fontawesome.com/d49adc1c4b.js"></script>
	<script src="js/app.js"></script>
	<script src="build/app.js"></script>
	<script src="build/appComponents.js"></script>

</head>
<body>
	<div class="container" id="appInventario">
		<section-nav></section-nav>

		<div class="row">
			<div class="col col-12">
				<div class="tab-content" id="pills-tabContent">
					<div role="tabpanel" class="tab-pane fade show active" id="tab_productos" aria-labelledby="tab_productos-tab">
						<productos></productos>
					</div>
					<!-- <div role="tabpanel" class="tab-pane fade show" id="tab_inventario" aria-labelledby="tab_inventario-tab">
						Inventario hola
					</div> -->
				</div>
			</div>
		</div>

		<div class="row">

		</div>
	</div>
</body>
<script>
	App.initApp();
	// $('.nav-pills a').on('click', function (e) {
	// 	e.preventDefault()
	// 	$(this).tab('show');
	// })
</script>
</html>