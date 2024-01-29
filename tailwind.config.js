/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",

      ],
  theme: {
    container: {
        center: true,
      },
    extend: {
        fontFamily: {
            'Roboto': ['"Roboto"', 'cursive'],
          },
    },
  },
  plugins: [
    require('flowbite/plugin')
],
darkMode: 'class',
}
