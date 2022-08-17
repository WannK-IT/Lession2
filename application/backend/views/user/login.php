<?php 
    $registerURL   = URL::createLink(DEFAULT_MODULE, USER_CONTROLLER, USER_REG_ACTION);

    $arrFormLogin = [
        // Email Address
        [
            'label' => Form::createLabel('email', 'Email Address'),
            'input' => Form::createInput('email', 'email', '', "We'll never share your email with anyone else.")
        ],

        // Password
        [
            'label' => Form::createLabel('password', 'Password'),
            'input' => Form::createInput('password', 'password', '')
        ],

        // Token
        [
            'label' => '',
            'input' => Form::createInput('_token', 'hidden', Helper::randomString(10))
        ],
    ];

    $formLogin = Form::showForm($arrFormLogin);
?>

<div class="content border border-secondary my-4 mx-3">
    <form method="POST" action="" class="m-4">
        <?php 
        if(!empty($_SESSION['login_failed'])){
            echo Helper::showError($_SESSION['login_failed']);
            unset($_SESSION['login_failed']);
        }
            
        ?>
        <?= $formLogin ?>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>

        <button type="submit" class="btn btn-primary">Sign in</button>

        <p class="mt-3 text-14">Not a member ? <a class="text-decoration-none" href="<?= $registerURL ?>">Signup now</a></p>
    </form>
</div>