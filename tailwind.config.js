import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'light': '#fff',
                'dark': '#000',
                'primary': '#0313AC',
                'primary-light': '#E7EDFB',
                'secondary': 'white',
                'secondary-light': '#CF957B',
                'success': 'green',
                'success-light': 'lightgreen',
                'warning': '#FF9119',
                'warning-light': '#ffe9ad',
                'danger': 'red',
                'danger-light': '#ffb3ad',

                'reverse-light': '#000',
                'reverse-dark': '#fff',
                'reverse-primary': '#fff',
                'reverse-primary-light': '#0313AC',
                'reverse-secondary': '#0313AC',
                'reverse-secondary-light': 'brown',
                'reverse-success': '#fff',
                'reverse-success-light': 'green',
                'reverse-warning': '#fff',
                'reverse-warning-light': '#FF9119',
                'reverse-danger': '#fad9da',
                'reverse-danger-light': 'red',
              },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
