<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	$name = 'Aleksandr';
// 	return View::make('hello')->with('name', $name);
// 	//return 'hello';
// });


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/users', function() {
    $users = User::all(); //Eloquent syntax like select *from users;
    //$user = User::find(1);
    //$users = DB::table('users')->get();
    //$users = DB::table('users')->where('username', '!=', 'admin')->get();
    //return $user->username; 
    //return $users;

    //return View::make('/users/index')->with('users', $users);
    return View::make('users.index', ['users' => $users]);
});

Route::get('users/{username}', function($username) {
    $user = User::whereUsername($username)->first();

    return View::make('users.show', ['user' => $user]);
});

Route::get('/adduser', function() {
    // $user = new User;
    // $user->username = 'NewUser';
    // $user->password = Hash::make('password');
    // $user->save();
    User::create([
        'id' => 4,
        'username' => 'AnotherUser',
        'password' => Hash::make('1234')
    ]);

    return User::all();
});

Route::get('/firstuser', function() {
    $user = DB::table('users')->find(1);
    //dd($user); //die(var_dump($user)) SUGAR
    return $user->username;
    //return $user; //not string exception
});

Route::get('/select', function() {
    $users = DB::select('select * from users');

    return $users;
    //dd($users);

});
    