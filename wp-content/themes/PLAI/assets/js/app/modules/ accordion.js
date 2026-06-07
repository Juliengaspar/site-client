export class Accordion {

    constructor(selector = '.accordion') {
        this.accordions = document.querySelectorAll(selector);
    }

    init() {
        this.accordions.forEach((accordion) => {

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
    }

}