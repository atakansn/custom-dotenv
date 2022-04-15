<?php

spl_autoload_register(static fn($f)=>require "$f.php");

require 'helpers.php';

env_rm_variable('DB_CONNECTION2');

$env = new Env('.env');


