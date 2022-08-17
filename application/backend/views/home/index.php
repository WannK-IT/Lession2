<?php
// Check if not logged in => redirect to Login form
if (empty($_SESSION['flag_login'])) {
    URL::direct(DEFAULT_MODULE, USER_CONTROLLER, USER_LOGIN_ACTION);
}
?>
<?php
// Fetch data
$xhtmlUser  = $permission = '';
$listUsers  = $this->listUsers;
if (!empty($listUsers)) {
    $index = 1;
    foreach ($listUsers as $infoUser) {
        $urlDelete  = URL::createLink(DEFAULT_MODULE, DEFAULT_CONTROLLER, 'delete', ['id' => $infoUser['id']]);
        $urlEdit  = URL::createLink(DEFAULT_MODULE, DEFAULT_CONTROLLER, 'form', ['task' => 'edit', 'id' => $infoUser['id']]);
        $urlCopy  = URL::createLink(DEFAULT_MODULE, DEFAULT_CONTROLLER, 'form', ['task' => 'copy', 'id' => $infoUser['id']]);
        $urlView  = URL::createLink(DEFAULT_MODULE, DEFAULT_CONTROLLER, 'view', ['id' => $infoUser['id']]);
        $xhtmlUser .= '<tr>
                <td class="text-center">' . $index . '</td>
                <td class="text-center">' . $infoUser['fullName'] . '</td>
                <td class="text-center">' . $infoUser['email'] . '</td>
                <td class="text-center">' . $infoUser['role_name'] . '</td>
                <td class="text-center">';

        // Check if user is Admin => full per
        if ($_SESSION['role_id'] == 1) {
            $permission = '<a href="' . $urlEdit . '" title="Edit"><i class="fa fa-pencil-square-o fa-lg pr-1" aria-hidden="true"></i></a>
            <a href="' . $urlDelete . '" title="Delete"><i class="fa fa-ban fa-lg pr-1 text-danger" aria-hidden="true"></i></a>
            <a href="' . $urlCopy . '" title="Copy"><i class="fa fa-clone fa-lg pr-1" aria-hidden="true"></i></a>
            <a href="' . $urlView . '" title="View"><i class="fa fa-eye fa-lg pr-1" aria-hidden="true"></i></a>';
        } else {
            $permission = '<a href="' . $urlEdit . '" title="Edit"><i class="fa fa-pencil-square-o fa-lg pr-1" aria-hidden="true"></i></a>
            <a href="' . $urlView . '" title="View"><i class="fa fa-eye fa-lg pr-1" aria-hidden="true"></i></a>';
        }

        $xhtmlUser .= $permission . '</td></tr>';
        $index++;
    }
} else {
    $xhtmlUser  = Helper::showEmptyRow();
}
?>

<div class="content my-4 mx-3">
    <?php require_once "elements/search.php" ?>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Fullname</th>
                <th class="text-center">Email</th>
                <th class="text-center">Role</th>
                <th class="text-center">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?= $xhtmlUser ?>
        </tbody>
    </table>
</div>