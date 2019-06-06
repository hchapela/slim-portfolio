console.log('hey'); // Hamburger

const $burgers = document.querySelectorAll('.navbar-burger'); // Iterate through burgers

if ($burgers.length > 0) {
  for ($_burger of $burgers) {
    $_burger.addEventListener('click', () => {
      const $menu = document.querySelector('.navbar-menu');
      $_burger.classList.toggle('is-active');
      $menu.classList.toggle('is-active');
    });
  }
} //