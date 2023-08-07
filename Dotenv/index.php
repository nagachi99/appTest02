<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';
use Dotenv\Dotenv;
echo Dotenv::createImmutable(__DIR__)->load()['DB_USER'];
