<?php
$info   = $this->infoUser;
$xhtml  = '<p><b>Full name:</b> ' . $info['fullName'] . '</p>
            <p><b>Email address:</b> ' . $info['email'] . '</p>
            <p><b>Role name:</b> ' . $info['role_name'] . '</p>
            <p><b>Created on:</b> ' . date('d/m/Y H:i:s', strtotime($info['created_date'])) . '</p>';
?>
<div class="content border border-secondary my-4 mx-3">
    <form method="POST" action="" class="m-4">
        <h3 class="mb-3 text-center"><?= $this->title ?></h3>
        <div>
            <?= $xhtml ?>
        </div>
        <a href="<?= URL::createLink(DEFAULT_MODULE, DEFAULT_CONTROLLER, DEFAULT_ACTION) ?>" class="btn btn-secondary">Quay lại</a>
    </form>
</div>