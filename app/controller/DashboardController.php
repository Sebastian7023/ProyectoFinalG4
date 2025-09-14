<?php

class DashboardController {

    public function index() {
        $vista = 'app/views/dashboard/index.php';
        $titulo = 'Bienvenido al panel';
        require 'app/views/layout.php';
    }
    
}