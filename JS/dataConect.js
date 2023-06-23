//Table-user-data//
var boton = document.getElementById("miBoton");
var tabla = document.getElementById("tableData");

boton.addEventListener("click", function() {
  if (tabla.style.display === "none") {
    tabla.style.display = "table";
  } else {
    tabla.style.display = "none";
  }
});
var mostrar = false;

function mostrarInput() {
  mostrar = !mostrar;
  if (mostrar) {
    document.getElementById("contenedor-input").style.display = "block";
  } else {
    document.getElementById("contenedor-input").style.display = "none";
  }
}
