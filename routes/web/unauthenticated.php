<?php
/**
 * Created by PhpStorm.
 * User: lucka
 * Date: 17/08/19
 * Time: 23:53
 */

Route::get('/', function () {
    return view('wellcome');
});

Auth::routes(['verify' => true]);

