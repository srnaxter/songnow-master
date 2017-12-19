# Instalación

Configurar el archivo .env.example con tus datos de acceso a la base de datos.
Renombrar el **.env.example** a **.env**
## Cargar la base de datos

Puedes utilizar el script **_createdb.sql_** para construir la base de datos contra la que se ejecuta la aplicación.

### Línea de comandos
Para importar la base de datos desde la teminal:

```
$ mysql -u username -p < createdb.sql
```

donde _username_ y _password_ son las credenciales de acceso a tu servidor MySQL.

## Configurar ruta de inicio

En   [xampp](https://es.wikipedia.org/wiki/XAMPP) selecciona la ruta de inicio como songnow-master/public ubicada en apache httpd.conf

Si todo ha salido correctamente deberias tener esto:

![Ejemplo](https://imgur.com/a/xWC3l)

En el caso que no funcione contacta conmigo.

### Rutas de acceso

La web cuenta con rutas para usuarios autenticados, sin autenticar, y rutas libres.

La mayoria de las rutas solo estan permitidas para los usuarios Logueados.

# Guia de uso

Si queremeos ver toda la informacion, pincharemos en el nombre del artista y os saldra esta ventana:

![Ejemplo](https://imgur.com/a/tBMah)

Aqui es donde podremos ver toda la informacion he incluso dejar un comentario.

Si en el caso queremos añadir algo nuevo a la lista pulsaremos en añadir song donde saldra todo el formulario del cual tendremos que rellenar las parte requeridas. Ejemplo:

![Ejemplo](https://imgur.com/a/Q5kaO)

Tambien podremos editar y eliminar cada una de las canciones con los botonoes de editar o borrar:

![Ejemplo](https://imgur.com/a/OFX9k)

En caso de borrar os sadra una venta que os dira si estais seguro de borrar:

![Ejemplo](https://imgur.com/a/9hz23)

y en caso de editar os saldra el mismo formulario que el añadir, donde podreis editar cada información que teniais antes:

![Ejemplo](https://imgur.com/a/Q5Ltj)

### Gracias.

