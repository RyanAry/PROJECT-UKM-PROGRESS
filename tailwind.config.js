/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["public/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        'primary': '#223d3c',
        'secondary': '#ede7e3',
        'tertiary': '#ffffff',
        'quaternary': '#d1cbc7',
        'quinary': '#81827c',
      },
      fontFamily: {
        'poppins': ['Poppins'],
        'montserrat': ['Montserrat'],
      },
    },
  },
  plugins: [],
}

