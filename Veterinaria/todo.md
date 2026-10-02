# Huella Viva: tareas del proyecto

Prototipo actual: vistas estáticas HTML y CSS. Los formularios y filtros aún no procesan datos, y el cierre de sesión solo vuelve a la pantalla de acceso.

El proyecto usará arrays PHP estáticos, como `gimnasio/socios.php`; no utilizará base de datos. Un array definido en un archivo PHP se vuelve a cargar en cada petición: los cambios no quedan guardados automáticamente. Puedes usar `$_SESSION` para conservar cambios durante la sesión de una persona, pero no es almacenamiento permanente ni compartido entre usuarios.

## Orden de trabajo

1. **Preparar los datos estáticos** (completado)
   - [x] Crear arrays de prueba en `datos/usuarios.php`, `datos/responsables.php`, `datos/pacientes.php`, `datos/veterinarios.php` y `datos/citas.php`.
   - [x] Relacionar pacientes con responsables y citas con pacientes y veterinarios mediante identificadores.
   - [x] Guardar hashes de contraseña para las cuentas de demostración; sus credenciales están indicadas en `datos/usuarios.php`.
   - [x] Usar estados consistentes para las citas: `pendiente`, `confirmada`, `cancelada` y `completada`.

2. **Convertir las vistas en páginas PHP**
   - Cambiar los `.html` a `.php` y conservar `styles.css`.
   - Incluir los archivos de datos con `require` y generar tablas y opciones de formularios a partir de los arrays.
   - Mantener el procesamiento de formularios separado del HTML tanto como sea posible.

3. **Implementar inicio y cierre de sesión**
   - Crear la clase `Usuario` y buscar el usuario por correo en el array de usuarios.
   - Validar la contraseña con `password_verify()`, guardar el identificador y el rol en `$_SESSION` y redirigir al panel.
   - Proteger las páginas privadas, regenerar el identificador de sesión al iniciar sesión y destruir la sesión al cerrarla.

4. **Implementar pacientes y responsables**
   - Crear objetos `Paciente` y `Responsable` a partir de los arrays de prueba.
   - Mostrar listados y fichas, y validar los campos obligatorios al enviar formularios.
   - Decidir si las altas y modificaciones serán solo demostrativas o se conservarán temporalmente en `$_SESSION`.

5. **Implementar agenda y gestión de citas**
   - Crear objetos `Cita` asociados a un paciente y un veterinario.
   - Listar y filtrar citas por fecha, paciente, profesional y estado.
   - Implementar confirmación, cancelación y reprogramación; comprobar solapamientos para un veterinario.
   - Si se cambia el array de citas durante una sesión, guardar esa copia en `$_SESSION`; documentar que no es persistencia permanente.

6. **Conectar el panel**
   - Calcular los recuentos y las próximas citas a partir de los arrays.
   - Mostrar mensajes de éxito, error y estados vacíos en formularios y listados.

7. **Verificar y endurecer**
   - Probar acceso válido e inválido, permisos, formularios, filtros y cambios de estado.
   - Validar entradas en el servidor y escapar toda salida dinámica con `htmlspecialchars()`.
   - Comprobar estados vacíos, redirecciones y visualización en móvil.

## Clases para practicar

Empieza con entidades sencillas creadas desde los arrays estáticos. Las clases representan los datos y sus reglas; no necesitan conectarse a una base de datos.

### `Usuario`
- **Propiedades:** `id`, `nombre`, `email`, `passwordHash`, `rol`, `activo`.
- **Funciones:** `verificarPassword($password)`, `esAdministrador()`, `estaActivo()`.
- El hash se crea al registrar o cambiar la contraseña; nunca guardes la contraseña original.

### `Responsable`
- **Propiedades:** `id`, `nombre`, `telefono`, `email`, `direccion`.
- **Funciones:** `actualizarContacto($telefono, $email, $direccion)`, `nombreCompleto()`.
- Estos datos pueden estar en cada ficha de paciente al principio; una clase propia facilita que varios animales compartan responsable.

### `Paciente`
- **Propiedades:** `id`, `nombre`, `especie`, `raza`, `fechaNacimiento`, `sexo`, `microchip`, `responsableId`.
- **Funciones:** `calcularEdad()`, `actualizarDatos(...)`, `resumen()`.
- La edad debe calcularse desde la fecha de nacimiento, no guardarse como un valor fijo.

### `Veterinario`
- **Propiedades:** `id`, `nombre`, `email`, `telefono`, `especialidad`, `activo`.
- **Funciones:** `actualizarEspecialidad($especialidad)`, `estaDisponible($fechaHora)`.
- La disponibilidad completa puede depender de las citas y reglas de agenda, no solo de esta clase.

### `Cita`
- **Propiedades:** `id`, `pacienteId`, `veterinarioId`, `fechaHora`, `motivo`, `notas`, `estado`.
- **Funciones:** `confirmar()`, `cancelar()`, `reprogramar($fechaHora)`, `puedeModificar()`.
- Define estados consistentes, por ejemplo: `pendiente`, `confirmada`, `cancelada` y `completada`.
