/** @type {import('tailwindcss').Config} */
export default {
    presets: [
            require("./vendor/wireui/wireui/tailwind.config.js")
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
      ],
  theme: {
    container: {
        center: true,
      },
    extend: {
        fontFamily: {
            'Roboto': ['"Roboto"', 'cursive'],
        },
        colors: {
            vw: {
                navy:       '#001E50',
                'navy-mid': '#1F2F57',
                blue:       '#6091C3',
                silver:     '#C2C3C4',
                'off-white': '#FDFAF9',
            },
        },
    },
  },
  plugins: [
    require('flowbite/plugin')
],
darkMode: 'class',
}
