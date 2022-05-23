const mix = require('laravel-mix');
const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin');

module.exports = {
    module: {
      rules: [
        {
          test: /\.s(c|a)ss$/,
          use: [
            'vue-style-loader',
            'css-loader',
            {
              loader: 'sass-loader',
              // Requires sass-loader@^7.0.0
              options: {
                implementation: require('sass'),
                indentedSyntax: true // optional
              },
              // Requires >= sass-loader@^8.0.0
              options: {
                implementation: require('sass'),
                sassOptions: {
                  indentedSyntax: true // optional
                },
              options: {
                data: "@import '@/styles/variables.scss';"
              },
              options: {
                prependData: "@import '@/styles/variables.scss';"
              },
              },
            },
          ],
        },
      ],
      plugins: [
        new VuetifyLoaderPlugin()
      ],
    }
  }

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/base.js', 'public/js')
   .js('resources/js/cliente.js', 'public/js')
   .js('resources/js/web.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
