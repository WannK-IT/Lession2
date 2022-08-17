<?php

if ($_SESSION['role_id'] == 1) {
    $totalUsers = (!empty($listUsers)) ? count($listUsers) : 0;
    echo '<form method="GET" id="form-search">
            <div class="form-group">
                <input type="hidden" name="module" value="backend">
                <input type="hidden" name="controller" value="home">
                <input type="hidden" name="action" value="index">
                <input type="text" class="form-control" name="search" id="searchBar" placeholder="&#61442;  Search by full name" value="' . trim($this->arrParam['search'] ?? '') . '">
            </div>
        </form>
    <div class="result-search">
        <p class="text-14">Search found <b>' . $totalUsers . '</b> results</p>
    </div>';
}
