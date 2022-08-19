<?php  ?>
<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            100: 'hsl(346, 84%, 95%)',
                            200: 'hsl(346, 84%, 90%)',
                            300: 'hsl(346, 84%, 80%)',
                            400: 'hsl(346, 84%, 70%)',
                            500: 'hsl(346, 84%, 60%)',
                            600: 'hsl(346, 84%, 50%)',
                            700: 'hsl(346, 84%, 40%)',
                            800: 'hsl(346, 84%, 30%)',
                            900: 'hsl(346, 84%, 20%)',
                        },
                        secondary: {
                            100: 'hsl(205, 94%, 90%)',
                            200: 'hsl(205, 94%, 80%)',
                            300: 'hsl(205, 94%, 70%)',
                            400: 'hsl(205, 94%, 60%)',
                            500: 'hsl(205, 94%, 50%)',
                            600: 'hsl(205, 94%, 40%)',
                            700: 'hsl(205, 94%, 30%)',
                            800: 'hsl(205, 94%, 20%)',
                            900: 'hsl(205, 94%, 10%)',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter var', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <title>MVC Framework 1.0</title>
</head>
<body class="dark:bg-stone-900 text-gray-600 dark:text-gray-100">
<header class="body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 dark:text-white mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-primary-500 rounded-full"
                 viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl flex">MVC Framework</span>
        </a>
        <div class="hidden md:contents">
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-primary-400 p-2" href="/">Home</a>
                <a class="mr-5 hover:text-primary-400 p-2" href="#">Documentation</a>
                <a class="mr-5 hover:text-primary-400 p-2" href="#">Pricing</a>
                <a class="mr-5 hover:text-primary-400 p-2" href="contact">Contact</a>
            </nav>
            <a href="login"
               class="mr-3 dark:hover:bg-gray-600 inline-flex dark:bg-gray-700 dark:text-gray-200 items-center bg-gray-200 text-gray-800 border-0 py-1 px-4 focus:outline-primary hover:bg-gray-300 rounded text-base mt-4 md:mt-0">
                Sign in
            </a>
            <a href="register"
               class="dark:text-gray-100 text-gray-900 border-0 py-1 px-4 focus:outline-primary rounded text-base mt-4 md:mt-0">
                Register
            </a>
        </div>
    </div>
</header>
<div class="container mx-auto p-5">
    {{content}}
</div>
</body>
</html>