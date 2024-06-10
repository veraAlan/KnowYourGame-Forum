##  KnowYourGame-Forum

This project showcases the use of Laravel, Blade, and MySQL for Advanced Web Programming at UNCo.

## Requirements

- [Laravel](https://laravel.com/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/)

## Usage Instructions

1. Clone the repository into your preferred directory:

```bash
git clone https://github.com/veraAlan/KnowYourGame-Forum.git
```

2. Posicionarse en /KnowYourGame-Forum/KYG-forum

```bash
cd KYG-forum
```

3. Installar las dependencias de composer en el projecto:

```bash
composer install
```

4.Installar las dependencias de npm en el projecto:

```bash
npm install
```

5. En el archivo .env configurar la conexión a la base de datos:

```bash
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=kyg_forum
DB_USERNAME=root
DB_PASSWORD=Password
```

**Nota:** Si no esta el .env, copie el .env.example y cambie el nombre a .env

6. Generamos las nuevas claves

```bash
php artisan key:generate
```

7.  compilamos y prepara los archivos de origen de tu proyecto web para su despliegue en un entorno de producción

```bash
npm run build
```

8. Abrir el servidor local con el comando

```bash
php artisan serve
```
