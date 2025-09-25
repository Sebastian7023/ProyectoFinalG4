<?php
//app/controller/HomeController.php

class HomeController {
    public function index() { 
        $vista = 'app/views/home/index.php';       
        $titulo = 'Pretty Girl Beauty Salón - Inicio';        
        require 'app/views/layout.php';        
    }
}