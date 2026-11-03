# Modelo de examen · MF0493 Implantación de aplicaciones web

## Parte 1 · caso práctico: un día de trabajo con GitHub

**Situación.** Trabajas en una empresa de desarrollo. En tu ordenador tienes la carpeta `veterinaria_web` con la aplicación de la clínica terminada y funcionando en local con XAMPP:

``` 
veterinaria_web/
├── conexion.php
├── datos.php
├── cabecera.php
├── index.php
├── clientes.php
├── mascotas.php
├── visitas.php
├── estilos.css
└── js/
```

La carpeta todavía **no** es un repositorio de Git. Tu responsable ha creado en GitHub el repositorio vacío `https://github.com/clinica-patitas/veterinaria_web.git.`

A lo largo del día vas a subir el proyecto y varias modificaciones. En cada punto, escribe los **comandos de Git en el orden correcto** y, al lado de cada uno, una **línea que explique qué hace**. Usa exactamente los ***mensajes de commit** que se indican.

1. **Primera subida**
Sube todo el proyecto a la rama `main` del repositorio de GitHub. Para ello:
  - Convierte la carpeta `veterinaria web` en un repositorio de Git.
    ```
    git init 
    ```
  - Llama `main` a la rama principal
    ``` 
    git branch -M main 
    ```
  - Prepara todos los archivos del proyecto para guardarlos.
    ```
    git add .
    ```
  - Guarda la primera versión con el mensaje: **Primera versión de la aplicación**
    ```
    git commit -m "Primera versión de la aplicación"
    ```
  - Conecta tu repositorio local con el repositorio de GitHub `https://github.com/clinica-patitas/veterinaria_web.git`
    ```
    git remote add origin https://github.com/clinica-patitas/veterinaria_web.git 
    ```
  - Sube la rama `main` a GitHub y déjala enlazada para los siguientes envíos.
    ```
    git push origin main
    ```
2. **Primera modificación**
El cliente quire otros colores y has cambiado el archivo **estilos.css** para subir el cambio:
  - Comprueba qué archivos has modificado. Indica también qué te mostraría el comando
    ```
    git status 
    // muestra que archivos se han modificado en este caso, 'estilos.css'
    ```
  - Prepara el archivo estilos.css para guardarlo.
    ```
    git add estilos.css
    ```
  - Guarda el cambio con el mensaje: **Cambiar colores de la cabecera**
    ```
    git commit -m "Cambiar colores de la cabecera"
    ```
  - Sube el cambio a GitHub.
    ```
    git push origin main
    ```


3. **Segunda modificación**
Has creado la página nueva **contacto.php** y has añadido su enlace en el menú de **cabecera.php** Para subir los cambios:
  - Prepara los dos archivos, el nuevo y el modificado, para guardarlos.
    ```
    git add .
    ```
  - Guarda los dos archivos en un único commit con el mensaje: **añadir página de contacto**
    ```
    git commit -m "añadir página de contacto"
    ```
  - Sube el cambio a GitHub
    ```
    git push origin main
    ```

## Parte 2 · Preguntas cortas
Responde de forma breve. En el examen entraran **dos** de estas preguntas

1. ¿Qué es la integración continua (CI)?
  Pruebas automatizadas al subir cambios del proyecto

2. ¿Qué es el despliegue continuo (CD)?
  Despliegue automático al servidor

3. ¿Qué es un certificado SSL/TLS?
  Documento digital emitido por una autoridad certificadora y que se instala en el servidor

4. ¿Qué diferencia hay entre HTTP y HTTPS? ¿Por qué una web con formularios debe usar HTTPS?
  HTTP envía la información sin cifrar. 
  HTTPS la cifra mediante TLS. 
  Una web con formularios debe usar HTTPS para proteger datos como contraseñas, emails o información personal.
   
5. ¿Qué es el DNS?
  Traduce un nombre de dominio a una dirección ip

6. ¿Qué hace el navegador desde que escribes mi-proyecto.com hasta que ves la página?
   Busca la Ip del dominio en el DNS y envía una petición al servidor web de esa IP.
   
7. ¿Qué diferencia hay entre un registro DNS de tipo A y uno de tipo CNAME?
  DNS tipo A traduce dominio a ip y tipo CNAME es un alias del dominio

8. ¿Qué diferencia hay entre internet, una intranet y una extranet? Pon un ejemplo de cada una.
  - internet: red publica
  - intranet: red privada
  - extranet: parte de una red privada accesible a usuarios externos autorizados
  
9.  ¿Qué es Vercel?
  plataforma para alojar y desplegar aplicaciones web

10.  ¿Qué requisitos son necesarios para tener una web con HTTPS?
  Un dominio y el certificado SSL/TLS





   


