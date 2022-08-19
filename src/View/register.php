<?php

use App\Core\Form\Form;
use App\Model\RegisterModel;

/**
 * @var RegisterModel $model ;
 */
?>
<section class="text-gray-600 dark:text-gray-100 body-font relative">
    <div class="container px-5 py-3 mx-auto">
        <div class="flex flex-col text-center w-full mb-5">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4">Register</h1>
            <p class="text-sm dark:text-gray-200 mt-3">Already have an account?
                <a href="login" class="text-primary-500">Click here </a>to login.
            </p>
        </div>
        <?php $form = Form::begin('', 'post') ?>
        <div class="lg:w-1/3 md:w-2/3  mx-auto">
            <div class="flex flex-wrap">
                <?= $form->field($model, 'nickname') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordField() ?>
                <?= $form->field($model, 'confirmPassword')->passwordField() ?>
                <button class="mt-5 flex mx-auto text-white bg-primary-500 border-0 py-2 px-16 focus:outline-none hover:bg-primary-600 rounded text-lg">
                    Signup
                </button>
            </div>
        </div>
        <?php Form::end() ?>
    </div>
</section>