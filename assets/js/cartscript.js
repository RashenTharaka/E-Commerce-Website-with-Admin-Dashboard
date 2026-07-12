const menu = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .navbar');

if (menu && navbar) {
   menu.onclick = () => {
      menu.classList.toggle('fa-times');
      navbar.classList.toggle('active');
   };

   window.onscroll = () => {
      menu.classList.remove('fa-times');
      navbar.classList.remove('active');
   };
}

const closeEdit = document.querySelector('#close-edit');
if (closeEdit) {
   closeEdit.onclick = () => {
      const editContainer = document.querySelector('.edit-form-container');
      if (editContainer) {
         editContainer.style.display = 'none';
      }
   };
}
