<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/14
 * Time: 12:33
 */
use think\facade\Route;
Route::rule('smscode', 'sms/code', 'POST');