document.addEventListener('DOMContentLoaded', () => {

    const burger = document.querySelector('.burger-menu');

    if (!burger || !menu) return;

    burger.addEventListener('click', () => {

        burger.classList.toggle('active');

    });

});