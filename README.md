# PROYECTO-FINAL

## Biblioteca Online

### Descripción
Este proyecto va a consistir en un sistema online de gestión de una biblioteca.

La idea principal es que en una base de datos haya una serie de libros, con su autor, su fecha de publicación y su categoría (amor, fantasía, educativo...)

En la página principal habrá un menú con todos los libros disponibles, un buscador, donde poder buscar los libros por autor, fecha de publicación, categoría y título.

Esta página se basa en una de internet, llamada goodreads: 
https://www.goodreads.com/

![alt text](image.png)

En esta página se usa una base de datos, para poder almacenar los datos de los libros, y poder mostrarlos en la página web. 

### Funcionalidades
En la página del index, aparecerán todos los libros que hay, además de un botón en el cuál aparecerá un buscador, donde se podrán buscar los libros por autor, fecha de publicación y categoría, además de un formulario donde añadir un libro nuevo.

| Funcionalidad          | Descripción                                                                                                               |
|-------------------------|---------------------------------------------------------------------------------------------------------------------------|
| **Mostrar catálogo**   | Muestra todos los libros que hay añadidos en la base de datos.                                                            |
| **Añadir Libro**        | Formulario donde podrás añadir un libro, incluyendo título, autor, categoría, editorial, fecha de publicación y portada.  |
| **Detalles Libro**      | Página con información detallada del libro, con botones para añadirlo a "Actualmente Leyendo" o a "Favoritos".            |
| **Actualmente Leyendo** | Página que muestra los libros en lectura actual. Incluye un botón para finalizar la lectura, con opción de añadir reseñas.|
| **Favoritos**           | Muestra los libros que deseas leer, permitiendo agregar todos los que quieras.                                            |


  

### Lenguajes
- FrontEnd 
  - HTML
  - CSS
  - JS
- BackEnd 
  -  PHP
- Base de datos 
  - MySQL
- Servidor 
  - XAMPP

El enlace a la base de datos, se hace mediante mysqli, aquí muestro un ejemplo real de conexión con una base de datos mediante php:

La conexión a la base de datos se realiza a través de PHP usando `mysqli`. Aquí tienes un ejemplo real de código para establecer la conexión:

```php
<?php
function conexionBD() {
    $host = 'localhost';
    $basededatos = 'biblioteca_online';
    $usuario = 'root';
    $password = '';

    $conexion = new mysqli($host, $usuario, $password, $basededatos);

    if ($conexion->connect_error) {
        die('Error en la conexión: ' . $conexion->connect_error);
    }

    return $conexion;
}
?>