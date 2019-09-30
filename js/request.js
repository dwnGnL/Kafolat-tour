let openRequest = document.querySelectorAll('.request');
let exit = document.querySelector('.exit');

for (let i = 0; i < openRequest.length; i++) {
  openRequest[i].addEventListener('click', openRequestWindow);
};

exit.addEventListener('click', closeRequestWindow);

function openRequestWindow() {
  document.body.classList.add('open-request-window');
};

function closeRequestWindow() {
  document.body.classList.remove('open-request-window');
};
