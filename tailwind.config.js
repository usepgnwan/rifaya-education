// tailwind.config.js
const { addDynamicIconSelectors } = require('@iconify/tailwind');
/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  mode: 'jit',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        height:{
            "500px" : "500px",
            "400px" : "400px",
            "-520px" : "-520px",
            "2.5" : "8px !important",
            '-1/2': '-50%',
            "100%" : "100% !important"
        },
        animation: {
            "ping-slow" :  "ping 2s cubic-bezier(0, 0, 0.8, 0.2) infinite",
            "typing": "typing 2s steps(20) infinite alternate, blink 5s infinite"
        },
        keyframes: {
            typing: {
            "0%": {
                width: "0%",
                visibility: "hidden"
            },
            "100%": {
                width: "100%"
            }
            },
            blink: {
            "50%": {
                borderColor: "transparent"
            },
            "100%": {
                borderColor: "white"
            }
            }
        },
        fontFamily: {
            'inter' : ['Inter'],
            'poppins' : ['Poppins']
        }
    }
},
  plugins: [
    require('flowbite/plugin'),
    addDynamicIconSelectors({
        prefix: 'icon',
    }),
  ],
}

