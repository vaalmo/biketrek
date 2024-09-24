# Biketrek

![biketrek](https://github.com/user-attachments/assets/3cdb1ea2-c1d0-4008-acc9-8c5e248ab41a)

----

## Ejecuta el proyecto

Primero debes clonar este repositorio localmente en tu máquina, en el directorio deseado, con el siguiente comando:

```
git clone https://github.com/vaalmo/biketrek.git
```

Asegúrate de tener las herramientas instaladas:

- PHP 8.2.12
- Xampp 
- PHP Composer 2.7.7

Ahora, debes crear la base de datos en phpmyadmin ingresando desde Xampp, con el nombre biketrek_db

Una vez hecho esto, procedemos a entrar a la ruta /biketrek/biketrek, y allí deberás configurar el archivo de variables de entorno (.env) con la información necesaria para hacer la conexión con la base de datos.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biketrek_db
DB_USERNAME=
DB_PASSWORD=
```

Debes ejecutar las migraciones necesarias.

Al finalizar podrás ejecutar desde la terminal el siguiente comando para ejecutar el proyecto:

```
php artisan serve
```




