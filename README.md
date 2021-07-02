### PROTECCIÓN DE DATOS SENSIBLES, EN PHP, DENTRO DE LA CARPETA PÚBLICA DEL SERVIDOR
___

#### INTRODUCCIÓN

Algo que podemos necesitar es el querer proteger el acceso a determinados ficheros con datos sensibles en su contenido.

Para ello, tal vez, lo más recomendable es el alojar dichos ficheros fuera de la raíz del sitio web. Pero, lo que sucede es que esto no es siempre posible, puesto que la mayoría de los hostings de alojamiento web no lo permiten.

Entonces, de esta manera, se muestra una práctica solución que, aunque no siendo la ideal, nos llevará al resultado esperado.

#### EXPLICACIÓN

Así, la solución que se muestra en el código consiste en definir una constante que sirva para definir si queremos habilitar el acceso directo a un determinado fichero, o no.

-- index.php --

```

define('ACCESO_PERMITIDO', true); // Permitimos el acceso al contenido del fichero
include_once('../config/config.php');

```

Y, después, comprobar el valor de la constante al inicio de la declaración del código del script PHP en el que queramos proteger la accesibilidad mediante la siguiente funcionalidad:

-- config.php --

```
if (defined('ACCESO_PERMITIDO') === false) {
    header('HTTP/1.0 403 Forbidden'); // Prohibimos el acceso al fichero
    exit();
}

```

... de este modo, la llamada directa al fichero desde la URL del navegador no concluirá con la carga del fichero o ejecución del script.

*URL*

```
http://localhost:3000/php_file_access_protection/config/config.php

```

*RESPUESTA DEL SERVIDOR*

```
Se ha denegado el acceso a localhost
No tienes autorización para ver esta página.
HTTP ERROR 403

```

#### CONSIDERACIONES

Si el fichero a proteger se requiere, o incluye, desde otro script PHP hay que tener en cuenta el definir antes del *require*, o *include*, el valor de la constante a *true*, para que el contenido del fichero cargue según lo esperado.

Ej. 

```
/*
Definimos a true el valor de la constante para que el include sea funcional
*/
define('ACCESO_PERMITIDO', true); 
include_once('../config/config.php');

```

