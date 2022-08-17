<?php
$dataField  = $this->results ?? $this->arrParam;
$dataErrors = $this->errors ?? '';

$arrRoles   = array_column($this->listRoles, 'role_name', 'id');
$arrForm    = [
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

    // Permission
    [
        'label' => ($_SESSION['role_id'] == 1) ? Form::createLabel('role_id', 'Permission') : '',
        'input' => ($_SESSION['role_id'] == 1) ? Form::createFormSelectBox('role_id', $arrRoles, $dataField['role_id']) : Form::createInput('role_id', 'hidden', $dataField['role_id'])
    ],

    // Token
    [
        'label' => '',
        'input' => Form::createInput('_token', 'hidden', Helper::randomString(10))
    ],
];

$form = Form::showForm($arrForm);
?>

<div class="content border border-secondary my-4 mx-3">
    <form method="POST" action="" class="m-4">
        <h3 class="mb-3 text-center"><?= $this->title ?></h3>
        <?php
        if (!empty($dataErrors)) {
            echo Helper::showError($dataErrors);
        }
        ?>
        <?= $form ?>
        
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="<?= URL::createLink(DEFAULT_MODULE, DEFAULT_CONTROLLER, DEFAULT_ACTION) ?>" class="btn btn-secondary">Quay lại</a>
    </form>
</div>