// sPell:disable

// inspeccion.js · Ayuda y validación del formulario de nueva inspección
const LIMITE = 5 // % máximo de defectos para que un lote sea apto

const form = document.getElementById("form-inspeccion")
const inputRevisadas = document.getElementById("revisadas")
const inputDefectuosas = document.getElementById("defectuosas")
const previsualizacion = document.getElementById("previsualizacion")
const aviso = document.getElementById("aviso-js")

// Muestra el % de defectos y el resultado mientras se escribe
function actualizarPrevisualizacion() {
  const revisadas = Number(inputRevisadas.value)
  const defectuosas = Number(inputDefectuosas.value)

  if (
    revisadas > 0
    && inputDefectuosas.value !== ""
    && defectuosas <= revisadas
  ) {
    const porcentaje = (defectuosas * 100) / revisadas
    const resultado = porcentaje <= LIMITE ? "APTO" : "NO APTO"
    previsualizacion.textContent = `Defectos: ${porcentaje.toFixed(2).replace(".", ",")} % → el lote será ${resultado}`
    previsualizacion.style.color = porcentaje <= LIMITE ? "#1f7a34" : "#b42318"
  } else {
    previsualizacion.textContent = ""
  }
}

// Antes de enviar, comprueba lo básico en el navegador
function validar(evento) {
  const errores = []
  if (form.producto.value === "") errores.push("elige un producto")
  if (form.inspector.value === "") errores.push("elige un inspector")
  if (form.lote.value.trim() === "") errores.push("escribe el lote")

  const revisadas = Number(inputRevisadas.value)
  const defectuosas = Number(inputDefectuosas.value)
  if (!Number.isInteger(revisadas) || revisadas <= 0)
    errores.push("las piezas revisadas deben ser mayores que 0")
  if (
    inputDefectuosas.value === ""
    || !Number.isInteger(defectuosas)
    || defectuosas < 0
  )
    errores.push("indica las piezas defectuosas")
  else if (defectuosas > revisadas)
    errores.push("no puede haber más defectuosas que revisadas")

  if (errores.length > 0) {
    evento.preventDefault() // no se envía el formulario
    aviso.textContent = "Revisa el formulario: " + errores.join(", ") + "."
  } else {
    aviso.textContent = ""
  }
}

inputRevisadas.addEventListener("input", actualizarPrevisualizacion)
inputDefectuosas.addEventListener("input", actualizarPrevisualizacion)
form.addEventListener("submit", validar)
