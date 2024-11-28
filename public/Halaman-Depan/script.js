//  md:bg-slate-200 absolute top-14 w-full left-0 divide-y-2 divide-slate-900

const menu = document.querySelector('#menu');
const hamburgerMenu = document.querySelector('#hamburger-menu');
const closeHamburger = document.querySelector('.fa-xmark');
const OpenHamburger = document.querySelector('.fa-bars');

menu.addEventListener('click', displayMenu);
hamburgerMenu.addEventListener('click', displayMenu);

function displayMenu() {
  if (menu.classList.contains('absolute')) {
    OpenHamburger.style.display = 'inline';
    closeHamburger.style.display = 'none';

    menu.classList.add('hidden');
    menu.classList.remove('absolute');
    menu.classList.remove('top-14');
    menu.classList.remove('w-full');
    menu.classList.remove('left-0');
    menu.classList.remove('divide-y-2');
    menu.classList.remove('divide-slate-900');
    menu.classList.remove('bg-slate-200');
  } else {
    OpenHamburger.style.display = 'none';
    closeHamburger.style.display = 'inline';

    menu.classList.remove('hidden');
    menu.classList.add('absolute');
    menu.classList.add('top-14');
    menu.classList.add('w-full');
    menu.classList.add('left-0');
    menu.classList.add('divide-y-2');
    menu.classList.add('divide-slate-900');
    menu.classList.add('bg-slate-200');
  }
}
