# Modelo de examen · MF0493 Implantación de aplicaciones web

## parte 1 - caso práctico: un día de trabajo con GitHub

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
    ```git
    git push origin main
    ```
1. **Primera modificación**
2. **Segunda modificación**





   


