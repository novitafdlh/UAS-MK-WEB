// tailwind.config.js
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Palet warna Biru Tua (Dominan)
                'dark-blue': {
                    50: '#E8F0FE',    // Sangat terang, untuk latar belakang subtle
                    100: '#C5D8F6',
                    200: '#99BCEF',
                    300: '#6D9FEB',
                    400: '#3F81E5',
                    500: '#0D47A1',   // Biru Tua Utama (misal: header, sidebar, primary buttons)
                    600: '#0B3A8B',
                    700: '#092D75',   // Lebih gelap, untuk teks heading atau hover
                    800: '#07215F',
                    900: '#04153C',
                    950: '#020C1F',
                },
                // Palet warna Merah (Aksen)
                'red-accent': {
                    50: '#FEE8E8',    // Sangat terang, untuk latar belakang alert/badge
                    100: '#F6C5C5',
                    200: '#EF9999',
                    300: '#EB6D6D',
                    400: '#E53F3F',
                    500: '#E53935',   // Merah Utama (misal: tombol aksi, highlight)
                    600: '#C72F2C',
                    700: '#A92523',
                    800: '#8B1C1A',
                    900: '#6E1311',
                    950: '#3A0A09',
                },
                // Memastikan palet abu-abu standar tetap ada untuk elemen netral
                'gray': {
                    50: '#F9FAFB',
                    100: '#F3F4F6',
                    200: '#E5E7EB',
                    300: '#D1D5DB',
                    400: '#9CA3AF',
                    500: '#6B7280',
                    600: '#4B5563',
                    700: '#374151',
                    800: '#1F2937',
                    900: '#111827',
                }
            }
        },
    },

    plugins: [forms],
};