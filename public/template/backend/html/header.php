<?php
$homeURL    = URL::createLink(DEFAULT_MODULE, DEFAULT_CONTROLLER, DEFAULT_ACTION);

// Check if logged in => show button: Home & Logout
if (isset($_SESSION['flag_login']) && $_SESSION['flag_login'] == true) {
    $logOutURL  = URL::createLink(DEFAULT_MODULE, USER_CONTROLLER, USER_LOGOUT_ACTION);
    $arrNav = [
        [
            'link'  => $homeURL,
            'name'  => 'home'
        ],
        [
            'link'  => $logOutURL,
            'name'  => 'logout'
        ],
    ];

    $navBar = Helper::navBar($arrNav, $this->arrParam['controller']);

// Check if not logged in => show button: Home & Login (or Register)
} else {
    if ($this->arrParam['action'] == 'register') {
        $navBarAccount  = 'Register';
        $linkNav        = URL::createLink(DEFAULT_MODULE, USER_CONTROLLER, USER_REG_ACTION);
    } elseif ($this->arrParam['action'] == 'login') {
        $navBarAccount  = 'Login';
        $linkNav        = URL::createLink(DEFAULT_MODULE, USER_CONTROLLER, USER_LOGIN_ACTION);
    }
    $arrNav = [
        [
            'link'  => $homeURL,
            'name'  => 'home'
        ],
        [
            'link'  => $linkNav,
            'name'  => $navBarAccount
        ],
    ];
    $navBar = Helper::navBar($arrNav, $this->arrParam['action']);
}

?>

<div class="nav-header">
    <div class="row">
        <div class="col-sm-6 d-flex align-items-center">
            <?= $navBar ?>
        </div>
        <div class="col-sm-6 text-right">
            <img class="img-fluid mr-1" width="70" src="https://itviec.com/rails/active_storage/representations/proxy/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBeWtwREE9PSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--6a961a174c57d5a6a4debb065f73f12095e9485b/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdCem9MWm05eWJXRjBTU0lJYW5CbkJqb0dSVlE2RkhKbGMybDZaVjkwYjE5c2FXMXBkRnNIYVFJc0FXa0NMQUU9IiwiZXhwIjpudWxsLCJwdXIiOiJ2YXJpYXRpb24ifX0=--091b576187e678c126e08874e5757891d97541a7/lampart-logo.jpg" alt="logo">
        </div>
    </div>
</div>