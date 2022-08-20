<?php

use App\Core\Form\Form;
use App\Model\RegisterModel;

/**
 * @var RegisterModel $model ;
 */
?>
<section class="col-md-5 mx-auto p-2">
    <div class="text-center">
        <h1 class="fw-semibold fs-2">Register</h1>
        <p class="py-2">
            Already have an account?
            <a href="login" class="text-primary text-decoration-none">Click here </a>
            to login.
        </p>
    </div>

    <?php $form = Form::begin('', 'post') ?>

    <div class="d-flex flex-wrap justify-content-center">
        <?= $form->field($model, 'nickname') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordField() ?>
        <?= $form->field($model, 'confirmPassword')->passwordField() ?>

        <button type="submit" class="btn btn-primary text-white mt-5 px-6">Submit</button>
    </div>
    <?php Form::end() ?>
</section>
