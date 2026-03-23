/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./templates/**/*.php", "./assets/js/**/*.js"],
  corePlugins: {
    preflight: false,
  },
  theme: {
    extend: {},
  },
  plugins: [],
};
