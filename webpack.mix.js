const mix = require("laravel-mix");
const path = require('path')


mix.js("resources/js/app.js", "public/js")
    .vue(3)
    .postCss("resources/css/app.css", "public/css")
    .version();
