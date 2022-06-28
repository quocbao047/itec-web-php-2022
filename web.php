<?php
// register routes in your app

Router::get("", function() {
    include "views/home.php";
});

Router::get("posts", function() {
    $postsController = new PostsController;
    $postsController->getPosts();
});

Router::post("posts/delete", function() {
    // create postsController
    $postsController = new PostsController;
    // call delete() method (make sure you create it in the post controller)
    $postsController->delete();
});


Router::get("posts/get/{id}", function($id) {
    $postsController = new PostsController;
    $postsController->getPost($id);
});

Router::get("posts/create", function() {
    $postsController = new PostsController;
    $postsController->newPost();
});

Router::post("posts/create", function() {
    $postsController = new PostsController;
    $postsController->create($_POST);
});

Router::get("users/login", function() {
    $usersController = new UsersController;
    $usersController->getLogin();
});

Router::post("users/login", function() {
    $usersController = new UsersController;
    $usersController->login();
});

Router::get("posts/api", function() {
    echo "welcome to post api";
});

Router::get("users", function() {
    echo "Welcome MVC user";
});

Router::post("users/create", function() {
    $usersController = new UsersController;
    $usersController->create();
});

Router::get("users/logout", function() {
    $_SESSION = [];
    Router::redirect("");
});

if(Router::$found === false) {
   include "views/_404.php";
}
