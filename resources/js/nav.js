 function toggleSidebar() {
     const sideNav = document.getElementById('sideNav');
     const overlay = document.getElementById('overlay');
     const hamburgerIcon = document.getElementById('hamburgerIcon');
     const closeIcon = document.getElementById('closeIcon');

     const isOpen = !sideNav.classList.contains('-translate-x-full');



     if (isOpen) {
         // Close sidebar
         sideNav.classList.add('-translate-x-full');
         sideNav.classList.remove('translate-x-0');
         overlay.classList.add('hidden');
         hamburgerIcon.classList.remove('hidden');
         closeIcon.classList.add('hidden');
     } else {
         // Open sidebar
         sideNav.classList.remove('-translate-x-full');
         sideNav.classList.add('translate-x-0');
         overlay.classList.remove('hidden');
         hamburgerIcon.classList.add('hidden');
         closeIcon.classList.remove('hidden');
     }
 }

 window.toggleSidebar = toggleSidebar;



