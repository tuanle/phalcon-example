<?php

if (!function_exists('dump')) {
    /**
     * Dump the passed variables without end the script.
     *
     * @param  mixed
     * @return void
     */
    function dump()
    {
        array_map(function ($x) {
            $string = (new \Phalcon\Debug\Dump([], true))->variable($x);
            echo (PHP_SAPI == 'cli' ? strip_tags($string) . PHP_EOL : $string);
        }, func_get_args());
    }
}

if (!function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function dd()
    {
        call_user_func_array('dump', func_get_args());
        die(1);
    }
}


if (!function_exists('config')) {
    /**
     * Get config by the path
     * Example: config('app')
     *
     * @return mixed|\Phalcon\Config
     */
    function config($path) {
        return new \Phalcon\Config(require BASE_PATH . '/config/' . $path . '.php');
    }
}
