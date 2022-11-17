const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/Helpers/helpers.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                128: "32rem",
                144: "36rem",
            },
            keyframes: {
                "fade-in": {
                    "0%": { opacity: "0%" },
                    "100%": { opacity: "100%" },
                },
            },
            animation: {
                "fade-in": "fade-in 0.3s ease-in-out",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
