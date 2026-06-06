import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans:    ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
                jakarta: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
                grotesk: ['Space Grotesk', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                dotech: {
                    blue:  '#2563EB',
                    navy:  '#1E3A8A',
                    dark:  '#0F172A',
                    light: '#EFF6FF',
                },
            },
            animation: {
                'pulse-slow':  'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'slide-up':    'slideUp 0.3s ease-out',
                'fade-in':     'fadeIn 0.5s ease-out',
            },
            keyframes: {
                slideUp: {
                    '0%':   { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)',    opacity: '1' },
                },
                fadeIn: {
                    '0%':   { opacity: '0' },
                    '100%': { opacity: '1' },
                },
            },
        },
    },

    plugins: [
        forms,
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
    ],
};
