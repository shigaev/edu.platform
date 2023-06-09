import './scss/main';
import {Header} from "./js/components/header";
import {Footer} from "./js/components/footer";

let header = new Header('header');
let footer = new Footer('footer');
let footerText = new Footer('.footer-text');

header.setBgColor('#fefefe');
footer.setBgColor('#2f2f2f');
footerText.setColor('green');