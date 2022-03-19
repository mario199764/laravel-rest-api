<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Reset state before starting test
//POST /reset
//200 OK
route::post('/reset','ResetController@reset');

//Get balance for non-existing account
//GET /balance?account_id=1234
//404 0

//Create account with initial balance
//POST /event {"type":"deposit", "destination":"100", "amount":10}
//201 {"destination": {"id":"100", "balance":10}}

//Deposit into existing account
//POST /event {"type":"deposit", "destination":"100", "amount":10}
//201 {"destination": {"id":"100", "balance":20}}

//Get balance for existing account
//GET /balance?account_id=100
//200 20
route::get('/balance','BalanceController@show');

//Withdraw from non-existing account
//POST /event {"type":"withdraw", "origin":"200", "amount":10}
//404 0

//Withdraw from existing account
//POST /event {"type":"withdraw", "origin":"100", "amount":5}

//Transfer from existing account
//201 {"origin": {"id":"100", "balance":15}}

//Transfer from existing account
//POST /event {"type":"transfer", "origin":"100", "amount":15, "destination":"300"}

//Transfer from non-existing account
//201 {"origin": {"id":"100", "balance":0}, "destination": {"id":"300", "balance":15}}

//Transfer from non-existing account
//POST /event {"type":"transfer", "origin":"200", "amount":15, "destination":"300"}
//404 0

route::post('/event','EventController@store');
