<?php

class UsersController {
    public function index() {
        require_once __DIR__ . '/../views/user/list.php';
    }
    public function add() {
        require_once __DIR__ . '/../views/user/add.php';
    }
    public function edit() {
        require_once __DIR__ . '/../views/user/edit.php';
    }
}
