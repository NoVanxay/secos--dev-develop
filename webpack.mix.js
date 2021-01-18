const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


    let mixFrontend = require('laravel-mix');

    const fullPublicPath = "public/frontend";

    mixFrontend.setPublicPath(fullPublicPath);

    mixFrontend.js('public/js/libs.js', 'public/frontend/js')
        .sass('public/sass/libs.scss', 'public/frontend/css');


    mixFrontend.options({
        processCssUrls: false,
        purifyCss: false,
        clearConsole: false
    });


    // copy non processing files to public path
    mixFrontend.copyDirectory('public/images', 'public/frontend/images');

    if (mixFrontend.inProduction()) {
        mixFrontend.version();
        mixFrontend.sourceMaps();
    }

