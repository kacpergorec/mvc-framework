<?php

use App\Core\Form\Form;
use App\Model\User;

/**
 * @var User $model ;
 */
?>
<section class="col-md-4 mx-auto p-2">
    <div class="text-center">
        <h1 class="fs-2">Register</h1>
        <p class="py-2">
            Already have an account?
            <a href="login" class="text-primary text-decoration-none fw-semibold">Click here </a>
            to login.
        </p>
    </div>

    <?php $form = Form::begin('', 'post') ?>

    <div class="d-flex flex-wrap justify-content-center">
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordField() ?>
        <?= $form->field($model, 'confirmPassword')->passwordField() ?>

        <button type="submit" class="btn btn-primary text-white mt-5 px-6 fw-semibold">Sign up <i class="bi bi-check"></i></button>
    </div>
    <?php Form::end() ?>
</section>
