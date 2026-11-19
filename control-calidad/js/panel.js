// panel.js · Pide los datos a api.php con fetch y los pinta en el panel
const LIMITE = 5 // % máximo de defectos para que un lote sea apto

const estado = document.getElementById("estado")
const tablaProductos = document.getElementById("tabla-productos")
const detalle = document.getElementById("detalle")
const tituloDetalle = document.getElementById("titulo-detalle")

// 2,5 → "2,50 %"
function formatearPorcentaje(numero) {
  return numero.toFixed(2).replace(".", ",") + " %"
}

// Pinta las cuatro tarjetas de arriba
function pintarTotales(totales) {
  document.getElementById("total-inspecciones").textContent =
    totales.inspecciones
  document.getElementById("total-aptas").textContent = totales.aptas
  document.getElementById("total-no-aptas").textContent = totales.no_aptas

  const revisadas = Number(totales.piezas_revisadas)
  const tasa =
    revisadas > 0 ? (Number(totales.piezas_defectuosas) * 100) / revisadas : 0
  document.getElementById("tasa-global").textContent = formatearPorcentaje(tasa)
}

// Pinta una fila por producto, con la tasa en rojo o verde
function pintarProductos(productos) {
  tablaProductos.innerHTML = ""

  productos.forEach((producto) => {
    const fila = document.createElement("tr")
    let tasaTexto = "Sin datos"
    let clase = ""
    if (producto.tasa !== null) {
      tasaTexto = formatearPorcentaje(Number(producto.tasa))
      clase = Number(producto.tasa) > LIMITE ? "tasa-alta" : "tasa-baja"
    }

    fila.innerHTML = `
            <td>${producto.codigo}</td>
            <td>${producto.nombre}</td>
            <td class="numero">${producto.inspecciones}</td>
            <td class="numero">${producto.revisadas}</td>
            <td class="numero">${producto.defectuosas}</td>
            <td class="numero ${clase}">${tasaTexto}</td>
            <td><button>Ver</button></td>
        `
    fila
      .querySelector("button")
      .addEventListener("click", () => cargarDetalle(producto))
    tablaProductos.appendChild(fila)
  })
}

// Pinta ranking de inspectores
function pintarRankingInspectores(inspectores) {
  const inspectorTop = document.getElementById("inspector-top")
  if (inspectores.length > 0) {
    inspectorTop.textContent = inspectores[0].nombre
  } else {
    inspectorTop.textContent = "–"
  }
}

// Pide el resumen a la API
async function cargarResumen() {
  try {
    const [resResumen, resInspectores] = await Promise.all([
      fetch("api.php?accion=resumen"),
      fetch("api.php?accion=inspectores"),
    ])
    if (!resResumen.ok) throw new Error("Error " + resResumen.status)
    if (!resInspectores.ok) throw new Error("Error " + resInspectores.status)

    const [datos, inspectores] = await Promise.all([
      resResumen.json(),
      resInspectores.json(),
    ])
    pintarTotales(datos.totales)
    pintarProductos(datos.productos)
    pintarRankingInspectores(inspectores)
    estado.textContent = ""
  } catch (error) {
    console.error(error)
    estado.textContent = "No se han podido cargar los datos."
  }
}

// Pide a la API las inspecciones de un producto y las pinta
async function cargarDetalle(producto) {
  tituloDetalle.textContent = "Inspecciones de " + producto.nombre
  detalle.innerHTML = "<p>Cargando...</p>"

  try {
    const res = await fetch(
      "api.php?accion=inspecciones&producto=" + producto.id,
    )
    if (!res.ok) {
      throw new Error("Error " + res.status)
    }
    const inspecciones = await res.json()

    if (inspecciones.length === 0) {
      detalle.innerHTML = "<p>Este producto todavía no tiene inspecciones.</p>"
      return
    }

    const filas = inspecciones
      .map(
        (i) => `
            <tr>
                <td>${i.fecha.split("-").reverse().join("/")}</td>
                <td>${i.lote}</td>
                <td>${i.inspector}</td>
                <td class="numero">${i.piezas_defectuosas} de ${i.piezas_revisadas}</td>
                <td><span class="etiqueta ${i.resultado === "Apto" ? "apto" : "no-apto"}">${i.resultado}</span></td>
            </tr>
        `,
      )
      .join("")

    detalle.innerHTML = `
            <table>
                <tr><th>Fecha</th><th>Lote</th><th>Inspector</th><th class="numero">Defectuosas</th><th>Resultado</th></tr>
                ${filas}
            </table>
        `
  } catch (error) {
    console.error(error)
    detalle.innerHTML = "<p>No se han podido cargar las inspecciones.</p>"
  }
}

cargarResumen()
