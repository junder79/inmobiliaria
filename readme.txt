1.- Cambiar variable $_SESSION['active'] por una del proyecto actual. En -> plantilla_principal,login,sesion.
2.- En -manifest.json- Cambiar nombres.
3.- En -sw.js- Cambiar ruta del proyecto
4.- En -plantilla_principal.php- añadir las rutas permitidas para acceder.
5.- En -validaciones/validarLogin.php- Verificar consulta.
6.- Editar -componentes/sidenav.php- con las rutas correspondientes.
7.- En -APP/conexion.php- editar las credenciales de base de datos.
8.- Verificar en -APP- (eliminarUsuario,funciones,insertarUsuario), en -componentes- (inicio,modalAgregarUsuario,usuarios).