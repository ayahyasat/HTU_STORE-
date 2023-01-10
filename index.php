<?php
session_start();

use Core\Helpers\Fake;
use Core\Model\User;
use Core\Router;

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});



if (isset($_COOKIE['user_id']) && !isset($_SESSION['user'])) { // check if there is user_id cookie.
    // log in the user automatically
    $user = new User(); // get the user model
    $logged_in_user = $user->get_by_id($_COOKIE['user_id']); // get the user by id
    $_SESSION['user'] = array( // set up the user session that idecates that the user is logged in. 
        'username' => $logged_in_user->username,
        'display_name' => $logged_in_user->display_name,
        'email' => $logged_in_user->email,
        'user_id' => $logged_in_user->id,
        "file_name"=> $logged_in_user->file_name,
        'is_admin_view' => true
    );
}

// This code will run only at the first time of using the app.
Fake::is_first_time();
// For public access

Router::get('/', 'front.index'); // Display home.php

// For web administrators
Router::get('/login', "authentication.login"); // Displays the login form
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form

// athenticated
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard
Router::get('/profile', "admin.single"); // Displays the admin dashboard

// athenticated + permissions [item:read]
Router::get('/items', "items.index"); // list of items (HTML)
Router::get('/item', "items.single"); // Displays single item (HTML)
// athenticated + permissions [item:create]
Router::get('/items/create', "items.create"); // Display the creation form (HTML)
Router::post('/items/store', "items.store"); // Creates the items (PHP)
// athenticated + permissions [item:read, item:create]
Router::get('/items/edit', "items.edit"); // Display the edit form (HTML)
Router::post('/items/update', "items.update"); // Updates the items (PHP)
// athenticated + permissions [item:read, item:detele]
Router::get('/items/delete', "items.delete"); // Delete the item (PHP)

// athenticated + permissions [transaction:read]
Router::get('/transactions', "transactions.index"); // list of transactions (HTML)
Router::get('/transaction', "transactions.single"); // Displays single transaction (HTML)

// athenticated + permissions [transaction:read, transaction:create]
Router::get('/transactions/edit', "transactions.edit"); // Display the edit form (HTML)
Router::post('/transactions/update', "transactions.update"); // Updates the transactions (PHP)

// athenticated + permissions [transaction:read, transaction:detele]
Router::get('/transactions/delete', "transactions.delete"); // Delete the transaction from transaction page (PHP)

// athenticated + permissions [transaction:create, , transaction:detele , , transaction:edit]
Router::get('/transactions/create', "sellings.create"); // Display the creation form (HTML)
Router::post('/transactions/store', "sellings.store"); // Creates the transactions (PHP)
Router::post('/sellings/update', "sellings.update"); //Updates the edit form from selling dashboard (HTML)
Router::get('/sellings/delete', "sellings.delete"); // Delete the transaction from selling dashboard (PHP)
Router::get('/sellings/edit_s', "sellings.edit_s"); // Display the "edit form" from selling dashboard(HTML)

// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single user (HTML)
// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the user (PHP)

// api requests
Router::post('/api/transactions/create', 'endpoints.transactions_create');
Router::post('/api/transactions/update', 'endpoints.transactions_update');
Router::post('/api/transactions/delete', 'endpoints.transactions_delete');
Router::post('/api/transactions/edit', 'endpoints.transactions_edit');


Router::redirect();
