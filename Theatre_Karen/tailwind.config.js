/** @type {import('tailwindcss').Config} */
  //add path to all pages/component, eg:
  // './components/**/*.{html,js}',
  // './pages/**/*.{html,js}',
  // './index.html',
module.exports = {
  content: ["./**/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

