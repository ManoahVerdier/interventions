

export class Autoloader {
    constructor() {
        this.lazyLoad()
    }

    lazyLoad() {
        let page = $('meta[name="page"]').attr('content');

        switch (page) {

            default:
                // new Global
        }
    }
}