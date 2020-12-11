const mix = require('laravel-mix');

mix.js('resources/js/app/app.js', 'public/js');
mix.sass('resources/sass/app/app.scss', 'public/css').options({ processCssUrls: false });


if (mix.inProduction()) {

    mix.webpackConfig({
        output: {
            publicPath: '/',
            chunkFilename: 'js/[name].[hash].js',
        },
    });

    mix.version();
}
else {

    mix.webpackConfig({
        output: {
            publicPath: '/',
            chunkFilename: 'js/[name].js',
        },
    });

    mix.webpackConfig({
        devtool: 'source-map'
    }).sourceMaps();

    mix.disableNotifications();
}
