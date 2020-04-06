import {Cart} from './cart';

export class Autoloader {
    constructor() {
        this.lazyLoad()
    }

    lazyLoad() {
        let page = $('meta[name="page"]').attr('content');

        switch (page) {
            case 'cart':
                    new Cart();
                break;

            default:
                // new Global
        }
    }
}