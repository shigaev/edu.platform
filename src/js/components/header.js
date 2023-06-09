export class Header {
    constructor(domElemet, color = '') {
        this.domElemet = domElemet;
        this.color = color;
    }

    setBgColor(color) {
        const selectHeader = document.querySelector(this.domElemet);

        if (selectHeader) {
            selectHeader.style.backgroundColor = color;
        }
    }

    setColor(color) {
        const selectElement = document.querySelector(this.domElemet);

        if (selectElement) {
            selectElement.style.color = color;
        }
    }
}