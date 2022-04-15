<?php

if(!function_exists('env')) {

    function env(string $key, string $default = '')
    {
        return (new Env('.env'))->getValue($key) ?: $default;
    }
}

if(!function_exists('env_add_variable')) {

    function env_add_variable(string $key, string $value = null): bool|int
    {
        return (new Env('.env'))->addVarible($key,$value);
    }
}

if(!function_exists('env_rm_variable')) {

    function env_rm_variable(string $key): bool|int
    {
        return (new Env('.env'))->rmVarible($key) . "\n";
    }
}