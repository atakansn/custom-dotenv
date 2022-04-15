# ENV Class

#### Class created to manage env file

#### Use Of

````php

$env = new Env('.env');

env('DB_CONNECTION');

/*
 * To add a variable
 */
env_add_variable('APP_URL','localhost');

/*
 * To delete a variable
 */
env_rm_variable('APP_URL');


````