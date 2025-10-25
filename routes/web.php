<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Assinatura base de uma rota:
// Route::verb("uri", callback); - O callback é a ação que vai ser executada quando a rota foi acionada.

// rota com função anônima.
Route::get("/rota", function() {
    return "<h1>Olá Laravel!</h1>";
});

Route::get("/user", function() {
    return "<h1>Aqui está o usuário!</h1>";
});

Route::get("/injection", function(Request $request) {
    var_dump($request);
});

Route::match(["get", "post"], "/match", function() {
    return "<h1>Aceita GET e POST.</h1>";
});

Route::any("/any", function() {
    return "<h1>Aceita qualquer http verb.</h1>";
});

Route::get("/index", [MainController::class, "index"]);

Route::get("/about", [MainController::class, "about"]);

Route::redirect("/saltar", "/index");

Route::permanentRedirect("/saltar02", "/index");

Route::view("/view", "home");

Route::view("/view", "home", ["myName" => "Luciano Eduardo"]);