<?php
$loginURL   = URL::createLink(DEFAULT_MODULE, USER_CONTROLLER, USER_LOGIN_ACTION);
$dataField  = $this->results ?? $this->arrParam;
$dataErrors = $this->errors ?? '';

$arrFormRegister = [
    // Full Name
    [
        'label' => Form::createLabel('fullName', 'Full name'),
        'input' => Form::createInput('fullName', 'text', $dataField['fullName'] ?? '')
    ],

    // Email Address
    [
        'label' => Form::createLabel('email', 'Email address'),
        'input' => Form::createInput('email', 'text', $dataField['email'] ?? '', "We'll never share your email with anyone else.")
    ],

    // Password
    [
        'label' => Form::createLabel('password', 'Password'),
        'input' => Form::createInput('password', 'password', $dataField['password'] ?? '')
    ],

    // Retype Password
    [
        'label' => Form::createLabel('re_password', 'Confirm password'),
        'input' => Form::createInput('re_password', 'password', '')
    ],

    // Token
    [
        'label' => '',
        'input' => Form::createInput('_token', 'hidden', Helper::randomString(10))
    ],
];

$formRegister = Form::showForm($arrFormRegister);
?>

<div class="content border border-secondary my-4 mx-3">
    <form method="POST" action="" class="m-4">
        <?php 
            if(!empty($dataErrors)){
                echo Helper::showError($dataErrors);
            }
        ?>
        <?= $formRegister ?>

        <button type="submit" class="btn btn-primary">Register</button>
        <p class="mt-3 text-14">Already have an account ? <a class="text-decoration-none" href="<?= $loginURL ?>">Login now</a></p>
    </form>
</div>