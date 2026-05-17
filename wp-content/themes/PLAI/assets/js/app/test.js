console.log("test");
document.addEventListener('DOMContentLoaded', () => {

    const accordions = document.querySelectorAll('.accordion');

    accordions.forEach((accordion) => {

        const items = accordion.querySelectorAll('.accordion__item');

        items.forEach((item) => {

            item.addEventListener('toggle', () => {

                if (item.open) {

                    items.forEach((otherItem) => {

                        if (otherItem !== item) {
                            otherItem.removeAttribute('open');
                        }

                    });

                }

            });

        });

    });

});

document.addEventListener("DOMContentLoaded", () => {

    const burger = document.getElementById("burger");
    const nav = document.querySelector(".header__nav");

    burger.addEventListener("click", () => {
        nav.classList.toggle("active");
    });

});