import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
      extend: {
          columns: {
              '4xs': '14rem',
          },
          gridColumn: {
              'span-16': 'span 16 / span 16',
          },
          fontSize: {
              sm: ['14px', '20px'],
              base: ['16px', '24px'],
              lg: ['20px', '28px'],
              xl: ['24px', '32px'],
          },
          colors:{
              danger: 'red'
          }
      }
  },
  plugins: [
    require('daisyui'),
  ],
  daisyui: {
    themes:[
        "dracula",
    ],
    themes: true,
    base: true,
    styled: true,
    },
}

