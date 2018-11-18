# DWES-04
Vamos a aplicar los conocimientos de la unidad en la aplicación de banca electrónica de Forrare Bank visto en la tarea 2.
Usaremos la misma base de datos con 2 tablas, usuarios y movimientos. El usuario con acceso total a dicha base de datos sigue siendo “dwes” con contraseña “dwes”. Los accesos a la base de datos se realizarán a través de la clase DB.
Esta nueva tarea será una combinación de la tarea 2, elementos vistos en la tarea 3 y elementos nuevos de la unidad 4.
Para que nos sea más sencillos comprenderlo, vamos a tomar como base la tarea 2 y a esta le añadiremos/modificaremos los siguientes 
elementos:
- Las contraseñas de los usuarios se almacenarán usando hashing de una sola vía mediante la función crypt, por lo tanto para comprobar si una contraseña es correcta se deberá usar la función password_verify.
- En el acceso a la banca electrónica (usuarios registrados en la BD), al antiguo mensaje de bienvenida con el nombre de usuario, le añadiremos la hora de inicio de sesión (trabajaremos con sesiones).
- Se añadirá una nueva opción al menú de la banca electrónica, que será “Preferencias” y que tendrá el mismo funcionamiento que en la tarea 3. Permitirá al usuario seleccionar el color de fondo con el que se mostrarán todas las páginas. Estas preferencias serán guardadas en una cookie. En caso de que no se hayan establecido preferencias el color por defecto será el blanco. Esta página también ofrecerá la opción de restablecer las preferencias (debe eliminar la cookie). Cuando un usuario cierre sesión, deberán reestablecerse la preferencias.
- Quitaremos toda la parte de administración de usuarios (para evitar que la aplicación sea demasiado extensa).
- Toda la aplicación debe ser creada utilizando POO. Para ellos deberás crear las clases Usuario y Movimiento. No todos los campos de la BD son necesarios en el desarrollo de las clases, así que intenta optimizar su implementación.
- También debes separar la lógica de presentación y la lógica de negocio utilizando plantillas Smarty

NOTA: Aunque la estructura de directorios necesaria para Smarty es conveniente que esté ubicada en un lugar no accesible por el servidor web, para facilitar la corrección de la tarea debe crearse en la misma carpeta en la que está ubicado el proyecto de esta tarea, en una carpeta llamada smarty donde debes situar la estructura de directorios de Smarty (templates, templates_c, configs y cache), es decir, la carpeta smarty debe estar  al mismo nivel que el fichero index.php, banca.php,...
