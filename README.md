##  KnowYourGame-Forum

**[ES]** Este proyecto demuestra el uso de Laravel con una base de datos MySQL. Este proyecto fue hecho para Programacion Web Avanzada a UNCo. 

**[EN]** This project showcases the use of Laravel with a MySQL database. Made this project for Advanced Web Programming at UNCo.

## Information

- Laravel: v11.9
- PHP: v8.2

## Requirements

- [Laravel](https://laravel.com/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/)
- [NodeJs](https://nodejs.org/en)

## Usage Instructions

1. **[ES]** Clonar el repositorio en tu directorio preferido:
   
   **[EN]** Clone the repository into your preferred directory:

```bash
git clone https://github.com/veraAlan/KnowYourGame-Forum.git
```

2. **[ES]** Posicionarse en /KnowYourGame-Forum/KYG-forum
   
   **[EN]** Position yourself on /KnowYourGame-Forum/KYG-forum

```bash
cd KYG-forum
```

3. **[ES]** Installar las dependencias de composer en el projecto:
   
   **[EN]** Install required dependencies with composer:

```bash
composer install
```

4. **[ES]** Installar las dependencias de npm en el projecto:
   
   **[EN]** Install required dependencies with npm:

```bash
npm install
```

5. **[ES]** En el archivo .env, dentro de la carpeta KYG-forum, configurar la conexión a la base de datos:
   
   **[EN]** In the .env file inside the KYG-forum folder, configure the database connection:

**[ES]** Normalmente lo unico necesario es la contraseña to the database.

**[EN]** Usually, the only changed needed is the Password for the database.

```bash
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=kyg_forum
DB_USERNAME=root
DB_PASSWORD=Password
```

**Nota:** **[ES]** Si no esta el .env, copie el .env.example y cambie el nombre a .env

**Notes:** **[EN]** If you cannot find the .env file, create a copy of .env.example and change its name to .env


6. **[ES]** Generamos las nuevas claves:
   
   **[EN]** Generate the new keys:

```bash
php artisan key:generate
```

7. **[ES]** compilamos y prepara los archivos de origen del proyecto web para su despliegue en un entorno de producción:
   
   **[EN]** Compile and prepare the origin files for the project, that can be deployed in your production environment:

```bash
npm run build
```

8. **[ES]** Migramos la las tablas de la base de datos:
   
   **[EN]** Migrate the tables to you database:

```bash
php artisan migrate
```

9. **[ES]** Creamos el link simbolico para las carpetas de almacenamiento:
   
   **[EN]** Create a symbolic link to the storage folders:

**Nota:** **[ES]** Deberia devolver errores diciend que el link simbolico ya esta hecho.

**Nota:** **[ES]** This should show some errors telling us the symbolic link is already made.

```bash
php artisan storage:link
```

10. **[ES]** Abrir el servidor local con el comando:
   
    **[EN]** Open the local server:

```bash
php artisan serve
```
