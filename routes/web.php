<?php
// default page
Route::get('/', function () {
    return view('welcome');
});

// http://oscreport.test/report1
Route::get('/report1', 'ServiceController@report1');



// http://oscreport.test/hello
Route::get('/hello', function() {
    echo "Hello World";
    // query guna model (Eloquent)
    // return data dlm array of obj
    // get(), paginate(10), all(), first(), find(1) - by pk
    $services = \App\Models\Service::where('serviceid_int', '>=', 10)
    ->where('serviceid_int', '<=', 20)
    //->whereOr()
    ->orderBy('serviceid_int', 'desc')
    ->get();
    // [{}, {}, {}]
    foreach ($services as $s) {
        echo $s->servicename_tx . '<hr>';
    }
});
