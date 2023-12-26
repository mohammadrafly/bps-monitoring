/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      'colors': {
        'bps-green-fade': 'rgba(104, 185, 46, 0.6)',
        'bps-green': 'rgba(104, 185, 46)',
        'bps-orange': '#f7941e',
      }
    },
  },
  plugins: [],
}