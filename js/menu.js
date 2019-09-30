let menuButton = document.querySelector('#menu-button');
let mobileMenu = document.querySelector('.mobile-menu');
let menuItem = document.querySelectorAll('.menu-item');
let isOpened = true;

menuButton.addEventListener('click', openCloseMenu);

menuItem.forEach(function (elem) {
  elem.onclick = openCloseMenu;
});

function openCloseMenu() {
  if (isOpened) {
    mobileMenu.style.display = 'block';
  } else {
    mobileMenu.style.display = 'none';
  };
  isOpened = !isOpened;
};
