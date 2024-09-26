
const menu = document.querySelector("#menu");
const abrir = document.querySelector("#abrir");
const cerrar = document.querySelector("#cerrar");
const botonesMenu = document.querySelectorAll(".lista li a");
const encargadosBtn = document.getElementById("encargadosBtn");
const contactanosBtn = document.getElementById("contactanosBtn");
const quienessomosBtn = document.getElementById("quienessomosBtn");

function toggleMenu() {
  menu.classList.toggle("ver");
}

abrir.addEventListener("click", toggleMenu);
cerrar.addEventListener("click", toggleMenu);

botonesMenu.forEach((boton) => {
  boton.addEventListener("click", toggleMenu);
});

function handleHashChange() {
  if (window.innerWidth >= 850) {
    if (window.location.href.includes("quienes_somos.html")) {
      quienessomosBtn.style.color = "blue";
    } else {
      quienessomosBtn.style.color = "black";
    }
    if (window.location.hash === "#equipo") {
      encargadosBtn.style.color = "blue";
    } else {
      encargadosBtn.style.color = "black";
    }
    if (window.location.hash === "#contac") {
      contactanosBtn.style.color = "blue";
    } else {
      contactanosBtn.style.color = "black";
    }
  }
}

handleHashChange();

window.addEventListener("hashchange", handleHashChange);

window.addEventListener("resize", handleHashChange);

window.addEventListener("scroll", () => {
  if (window.innerWidth >= 850) { 
    if (window.location.hash !== "#equipo") {
      encargadosBtn.style.color = "black";
    } else {
      encargadosBtn.style.color = "black";
    }

    if (window.location.hash !== "#contac") {
      contactanosBtn.style.color = "black";
    } else {
      contactanosBtn.style.color = "black";
    }
  }
});


