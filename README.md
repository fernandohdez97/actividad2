## Introducción

El presente proyecto tiene como finalidad la creación de una API de autentificación en donde se puede llevar a cabo el registro de un usuario bajo ciertos campos debidamente validados así como la consulta de registros para ver si efectivamente existe dentro de la base de datos y proceder a la simulación de el logueo.

## Instrucciones

Es necesario correr la migración para la generación de la base de datos pero antes configurar los parámetros de la BD local en las variables de entorno .env completando los siguientes campos:

DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD

Ejecutar el comando para ejecutar la migración:

php artisan migrate

Por defecto se ha utilizado la base de datos: actividad2_seguridad con usuario root y password vacio.

Posteriormente, es necesario correr el seeder que llena el usuario de prueba solicitado en el enunciado con el comando:

php artisan db:seed

Finalmente correr el servidor con el comando para proceder a las pruebas includias en la colección de Postman.

php artisan serve