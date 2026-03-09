/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./templates/admin/**/*.php", "./assets/js/**/*.js"],
  corePlugins: {
    preflight: false,
  },
  theme: {
    extend: {},
  },
  plugins: [],
};
