/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class', // enables .dark class toggle
  theme: {
    extend: {
      colors: {
        primary: '#042a2b',    // 60%
        secondary: '#5eb1bf',  // 30%
        accent: '#54f2f2',     // 10%
        highlight: '#f4e04d',
        light: '#fcfcfc',
        dark: {
          primary: '#0b1e1f',
          secondary: '#407d86',
          accent: '#4ddada',
          highlight: '#d2c13d',
          light: '#dceef0',
        },
      },
    },
  },
  plugins: [],
}
