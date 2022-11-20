<?php
echo password_hash('123',PASSWORD_DEFAULT);
session_start();
var_dump($_COOKIE);
//setcookie('lang', 'en', time()+300);
var_dump($_SESSION);