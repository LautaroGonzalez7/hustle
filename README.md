# Proyecto Laravel

Este proyecto es una aplicación web construida con el framework Laravel.

## Requisitos

- PHP >= 8.0
- Composer
- MySQL
- Node.js y npm

## Instalación

Sigue estos pasos para instalar y configurar el proyecto en tu máquina local:

1. Clona el repositorio:

    ```sh
    git clone https://github.com/LautaroGonzalez7/hustle
    cd hustle
    ```

2. Instala las dependencias de PHP con Composer:

    ```sh
    composer install
    ```

3. Copia el archivo de entorno `.env.example` a `.env`:

    ```sh
    cp .env.example .env
    ```

4. Genera la clave de la aplicación:

    ```sh
    php artisan key:generate
    ```

5. Configura el archivo `.env` con los detalles de tu base de datos y otros parámetros de configuración. Aquí tienes un ejemplo de configuración de base de datos:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=data_base_name
    DB_USERNAME=user
    DB_PASSWORD=password
    ```

6. Ejecuta las migraciones para crear las tablas en la base de datos:

    ```sh
    php artisan migrate
    ```

7. (Opcional) Ejecuta los seeders para poblar la base de datos con datos iniciales:

    ```sh
    php artisan db:seed
    ```

## Ejecutar el Servidor

Para iniciar el servidor de desarrollo de Laravel, ejecuta el siguiente comando:

```sh
php artisan serve
