# Huella Viva: tareas del proyecto

Prototipo actual: vistas estáticas HTML y CSS. Los formularios y filtros aún no procesan datos, y el cierre de sesión solo vuelve a la pantalla de acceso.

El proyecto usará arrays PHP estáticos, como `gimnasio/socios.php`; no utilizará base de datos. Un array definido en un archivo PHP se vuelve a cargar en cada petición: los cambios no quedan guardados automáticamente. Puedes usar `$_SESSION` para conservar cambios durante la sesión de una persona, pero no es almacenamiento permanente ni compartido entre usuarios.

## Orden de trabajo

1. **Preparar los datos estáticos** (completado)
   - [x] Definir usuarios de prueba en `data/usuarios.php`.
   - [x] Definir responsables y pacientes en `data/responsables.php` y `data/pacientes.php`; relacionarlos con `responsableId`.
   - [x] Definir profesionales en `data/veterinarios.php` y citas en `data/citas.php`; relacionar las citas con `pacienteId` y `veterinarioId`.
   - [x] Guardar hashes de contraseña para las cuentas de demostración; las credenciales están indicadas en `data/usuarios.php`.
   - [x] Usar estados consistentes para las citas: `pendiente`, `confirmada`, `cancelada` y `completada`.

2. **Convertir las vistas en páginas PHP**
   - [x] Renombrar las vistas a `index.php`, `dashboard.php`, `citas.php`, `nueva-cita.php`, `pacientes.php` y `nuevo-paciente.php`; conservar `styles.css`.
   - [x]Corregir enlaces y formularios en esos seis archivos para que apunten a `.php` (ahora algunos todavía apuntan a `.html`).
   - Incluir arrays con `require_once __DIR__ . '/data/usuarios.php'` desde páginas de la raíz; generar listados y opciones de formularios desde los arrays correspondientes.
   - [x]Mantener el procesamiento PHP al inicio de cada página o en `includes/`, antes del HTML.

3. **Implementar inicio y cierre de sesión**
   - [x] Revisar `classes/Usuarios.php`: completar/ajustar la clase existente y decidir si se conserva el nombre `Usuarios` o se renombra a `Usuario` junto con el archivo `classes/Usuario.php`.
   - [x]En `index.php`, cargar `data/usuarios.php`, buscar por email y validar con `password_verify()`; mostrar errores sin perder los valores no sensibles del formulario.
   - [x]En `index.php`, iniciar sesión y guardar el ID, nombre y rol; regenerar el ID de sesión y redirigir a `dashboard.php`.
   - [x]Crear `logout.php` para vaciar y destruir la sesión, y luego redirigir a `index.php`.
   - [x]Crear `includes/auth.php` con la comprobación de sesión; incluirlo en `dashboard.php`, `citas.php`, `nueva-cita.php`, `pacientes.php` y `nuevo-paciente.php`.
   - [x]Cambiar los enlaces “Cerrar sesión” de esos cinco archivos para que apunten a `logout.php`.

4. **Implementar pacientes y responsables**
   - Crear `classes/Responsable.php` y `classes/Paciente.php`, con constructores que reciban los datos de cada array.
   - En `pacientes.php`, combinar `data/pacientes.php` con `data/responsables.php` para mostrar responsable, especie y última visita.
   - En `nuevo-paciente.php`, procesar el formulario y validar nombre, especie y datos obligatorios del responsable.
   - Crear `includes/helpers.php` si necesitas funciones compartidas para buscar un elemento por ID o escapar valores.
   - Elegir explícitamente si el formulario solo muestra un resultado de demostración o copia los arrays a `$_SESSION`; no modifica permanentemente los archivos de `data/`.

5. **Implementar agenda y gestión de citas**
   - Crear `classes/Veterinario.php` y `classes/Cita.php`; relacionar cada cita con los arrays de pacientes y veterinarios.
   - En `citas.php`, listar y filtrar citas por fecha, paciente, profesional y estado.
   - En `nueva-cita.php`, cargar pacientes y veterinarios en los desplegables, validar el formulario y crear la cita.
   - Añadir acciones de confirmar/cancelar/reprogramar en `citas.php` y procesarlas solo mediante solicitudes POST.
   - Comprobar solapamientos por veterinario antes de confirmar o reprogramar.
   - Para que los cambios se vean tras otra petición, guardar la copia de citas en `$_SESSION`; documentar que no es persistencia permanente ni compartida.

6. **Conectar el panel**
   - En `dashboard.php`, cargar `data/citas.php`, `data/pacientes.php` y `data/veterinarios.php` y calcular recuentos y próximas citas.
   - Mostrar el nombre de la persona conectada desde `$_SESSION` en `dashboard.php`.
   - En `dashboard.php`, `citas.php` y `pacientes.php`, añadir mensajes de éxito/error y estados vacíos.

7. **Verificar y endurecer**
   - Probar acceso válido e inválido desde `index.php`, rutas protegidas desde `includes/auth.php` y cierre desde `logout.php`.
   - Probar creación de pacientes desde `nuevo-paciente.php` y citas desde `nueva-cita.php`; comprobar filtros y estados en `citas.php`.
   - Validar entradas en el servidor y escapar toda salida dinámica con `htmlspecialchars()` en las vistas PHP.
   - Comprobar re-direcciones, estados vacíos y visualización móvil con `styles.css`.

## Clases para practicar

Empieza con entidades sencillas creadas desde los arrays estáticos. Las clases representan los datos y sus reglas; no necesitan conectarse a una base de datos.

### `Usuario`
- **Archivo:** `classes/Usuario.php` (o `classes/Usuarios.php` si conservas el nombre actual).
- **Propiedades:** `id`, `nombre`, `email`, `passwordHash`, `rol`, `activo`.
- **Funciones:** `verificarPassword($password)`, `esAdministrador()`, `estaActivo()`.
- El hash se crea al registrar o cambiar la contraseña; nunca guardes la contraseña original.

### `Responsable`
- **Archivo:** `classes/Responsable.php`.
- **Propiedades:** `id`, `nombre`, `telefono`, `email`, `direccion`.
- **Funciones:** `actualizarContacto($telefono, $email, $direccion)`, `nombreCompleto()`.
- Estos datos pueden estar en cada ficha de paciente al principio; una clase propia facilita que varios animales compartan responsable.

### `Paciente`
- **Archivo:** `classes/Paciente.php`.
- **Propiedades:** `id`, `nombre`, `especie`, `raza`, `fechaNacimiento`, `sexo`, `microchip`, `responsableId`.
- **Funciones:** `calcularEdad()`, `actualizarDatos(...)`, `resumen()`.
- La edad debe calcularse desde la fecha de nacimiento, no guardarse como un valor fijo.

### `Veterinario`
- **Archivo:** `classes/Veterinario.php`.
- **Propiedades:** `id`, `nombre`, `email`, `telefono`, `especialidad`, `activo`.
- **Funciones:** `actualizarEspecialidad($especialidad)`, `estaDisponible($fechaHora)`.
- La disponibilidad completa puede depender de las citas y reglas de agenda, no solo de esta clase.

### `Cita`
- **Archivo:** `classes/Cita.php`.
- **Propiedades:** `id`, `pacienteId`, `veterinarioId`, `fechaHora`, `motivo`, `notas`, `estado`.
- **Funciones:** `confirmar()`, `cancelar()`, `reprogramar($fechaHora)`, `puedeModificar()`.
- Define estados consistentes, por ejemplo: `pendiente`, `confirmada`, `cancelada` y `completada`.
