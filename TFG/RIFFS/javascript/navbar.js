const btnMenu = document.querySelector("#btnMenu");
const menu = document.querySelector("#menu");
btnMenu.addEventListener("click", function () {
  menu.classList.toggle("mostrar")
});


const botonMenu = document.querySelector('#btnMenu');
const menuDesplegable = document.querySelector('.main-nav');

botonMenu.addEventListener('click', () => {
  menuDesplegable.classList.toggle('main-nav--visible');
});