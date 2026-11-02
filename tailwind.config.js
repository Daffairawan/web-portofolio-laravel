/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
      },
      colors: {
        dark: {
          DEFAULT: '#090d16',
          card: '#0f172a',
          subtle: '#1e293b',
          border: '#334155',
        },
        primary: {
          DEFAULT: '#2563eb',
          hover: '#1d4ed8',
          light: '#3b82f6',
        },
        secondary: {
          DEFAULT: '#38bdf8',
          hover: '#0284c7',
          light: '#7dd3fc',
        },
        accent: {
          DEFAULT: '#60a5fa',
          hover: '#3b82f6',
        }
      },
      animation: {
        'typing': 'typing 3s steps(30, end) forwards, blink .75s step-end infinite',
        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
        'float': 'float 5s ease-in-out infinite',
        'spin-slow': 'spin 15s linear infinite',
      },
      keyframes: {
        typing: {
          '0%': { width: '0' },
          '100%': { width: '100%' }
        },
        blink: {
          '0%, 100%': { borderColor: 'transparent' },
          '50%': { borderColor: '#38bdf8' }
        },
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-10px)' },
        }
      }
    },
  },
  plugins: [],
}
