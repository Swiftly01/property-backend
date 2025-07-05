import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import daisyui from 'daisyui';


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: { 
                secondary: " #F1F1F3",
                darkest: "#02122B",
                primary: "#022A68",
                brown: "#A0A0A0",
                accent: "#18BEE1",
                danger: "#FF3D00",
                'primary-hover': '#0640A0',
                "neutral-white": "#F9FCFD",
                "neutral-dark": "#010105",
                'custom-blue-gray': '#8E95A9',
            },
            
            backgroundImage: {
                'wallpaper': "url('/assets/images/wallpaper.jpg')",
            }
        },
    },

    plugins: [forms, daisyui,  require('flowbite/plugin') ],
};
