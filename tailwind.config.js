module.exports = {
  darkMode: 'class', // or 'media' or 'class'
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.html",
  ],
  theme: {
    extend: {
      colors: {
        'nin-green': '#0fc55e',
        'nin-gray': '#aaa',
        'nin-orange': '#ffa200',
        // 'nin-orange': '#f0324f',
        // 'nin-orange': '#C8102E',
      }
    }
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
