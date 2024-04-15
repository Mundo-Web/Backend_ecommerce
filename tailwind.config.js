const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    'darkMode': 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                slate: {
                    850: '#181f34',
                },
                verdedecotab: "#74A68D",
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },

            backgroundColor: {
                colorBackgroundHeader: "#21201E",
                colorBackgroundMainTop: "#21201E",
                colorBackgroundProducts: "#F8F6F2",
                colorBackgroundNewProduct: "#38CB89",
              },
 
            
            textColor: {
                colorTextBlack: "#151515",
                verdedecotab: "#74A68D",
              },
              
            borderColor: {
                colorBorder: "#151515",
              },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
