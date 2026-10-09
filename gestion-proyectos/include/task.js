console.log(tasks);

function printCards(array) {
  const container = document.getElementById("project-cards");
  container.innerHTML = "";

  array.forEach((element) => {
    const {
      id,
      id_proyecto,
      nombre,
      descripcion,
      estado,
      fecha_inicio,
      fecha_fin,
    } = element;
    const statusClass =
      estado === "cerrada"
        ? "is-closed"
        : estado === "pendiente"
          ? "is-pending"
          : "is-progress";
    const statusText =
      estado === "cerrada"
        ? "Cerrada"
        : estado === "pendiente"
          ? "Pendiente"
          : "En progreso";

    container?.insertAdjacentHTML(
      "beforeend",
      `
      <article class="project-card">
        <div class="project-card-heading">
          <h3>${nombre}</h3>
          <span class="project-state ${statusClass}">${statusText}</span>
        </div>
        <p class="project-description">${descripcion}</p>
        <p class="project-date">Inicio: ${fecha_inicio}</p>
        <p class="project-date">Fin:${fecha_fin}</p>
        <br>
        <form action="task.php?id-project=${id_proyecto}" method="post">
          <input type="hidden" name="delete_id" value='${id}'>
          <button class="logout-button" type="submit">Eliminar tarea</button>
        </form>
      </article>
    `,
    );
  });
}

printCards(tasks);

function getFilter(status) {
  if (status === "") return tasks;
  const filter = tasks.filter((value) => value?.estado === status);
  return filter;
}

const select = document.getElementById("statusSelected");
select.addEventListener("change", (event) => {
  const value = event.target.value;
  console.log(value);
  const arrayFilter = getFilter(value);
  printCards(arrayFilter);
});
