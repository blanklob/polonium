var cross = document.querySelector(".hamburger");
var menu = document.querySelector(".mobile__menu");

cross.addEventListener("click", () => {
  menu.classList.toggle("is-active");
});
