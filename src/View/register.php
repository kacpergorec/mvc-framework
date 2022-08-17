<?php ?>
<section class="text-gray-600 dark:text-gray-100 body-font relative">
    <div class="container px-5 py-3 mx-auto">
        <div class="flex flex-col text-center w-full mb-5">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4">Register</h1>
            <p class="text-sm dark:text-gray-200 mt-3">Already have an account? <a href="login" class="text-primary-500">Click here </a>to login.</p>
        </div>
        <form action="" method="post">
            <div class="lg:w-1/3 md:w-2/3  mx-auto">
                <div class="flex flex-wrap">
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="nickname" class="leading-7 text-sm">Nickname</label>
                            <input type="nickname" id="nickname" name="nickname"
                                   class="dark:text-gray-200 w-full bg-gray-100 dark:bg-stone-800 bg-opacity-50 rounded border border-gray-300 dark:border-stone-700 focus:ring-1 ring-primary-500 dark:focus:bg-stone-700 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm">Email</label>
                            <input type="email" id="email" name="email"
                                   class="dark:text-gray-200 w-full bg-gray-100 dark:bg-stone-800 bg-opacity-50 rounded border border-gray-300 dark:border-stone-700 focus:ring-1 ring-primary-500 dark:focus:bg-stone-700 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="password" class="leading-7 text-sm">Password</label>
                            <input type="password" id="password" name="password"
                                   class="dark:text-gray-200 w-full bg-gray-100 dark:bg-stone-800 bg-opacity-50 rounded border border-gray-300 dark:border-stone-700 focus:ring-1 ring-primary-500 dark:focus:bg-stone-700 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-8 w-full">
                        <button class="flex mx-auto text-white bg-primary-500 border-0 py-2 px-16 focus:outline-none hover:bg-primary-600 rounded text-lg">
                            Signup
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>