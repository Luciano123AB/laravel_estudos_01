<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
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

// -----------------------------------------
// ROUTE PARAMETERS
// -----------------------------------------

Route::get("/valor/{value}", [MainController::class, "mostrarValor"]);

Route::get("/valores/{value01}/{value02}", [MainController::class, "mostrarValores"]);

Route::get("/valores02/{value01}/{value02}", [MainController::class, "mostrarValores02"]);

Route::get("/opcional/{value?}", [MainController::class, "mostrarValorOpcional"]);

Route::get("/opcional02/{value01}/{value02?}", [MainController::class, "mostrarValorOpcional02"]);

Route::get("/user/{user_id}/post/{post_id}", [MainController::class, "mostrarPosts"]);

// -----------------------------------------
// ROUTE PARAMETERS WITH CONSTRAINTS
// -----------------------------------------

Route::get("/exp01/{value}", function($value) {
    echo $value;
})->where("value", "[0-9]+");

Route::get("/exp02/{value}", function($value) {
    echo $value;
})->where("value", "[A-Za-z0-9]+");

Route::get("/exp03/{value01}/{value02}", function($value01, $value02) {
    echo "$value01 e $value02";
})->where([
    "value01" => "[0-9]+",
    "value02" => "[A-Za-z0-9]+"
]);

// -----------------------------------------
// ROUTE NAMES
// -----------------------------------------

Route::get("/rota_abc", function() {
    return "rota_nomeada";
})->name("rota_nomeada");

Route::get("/rota_referenciada", function() {
    return redirect()->route("rota_nomeada");
});

Route::prefix("admin")->group(function() {
    Route::get("/home", [MainController::class, "index"]);
    Route::get("/about", [MainController::class, "about"]);
    Route::get("/management", [MainController::class, "mostraValor"]);
});

Route::get("/admin/only", function() {
    echo "Apenas administradores!";
})->middleware([OnlyAdmin::class]);

Route::middleware([OnlyAdmin::class])->group(function() {
    Route::get("/admin/only02", function() {
        return "Apenas administradores 1!";
    });

    Route::get("/admin/only03", function() {
        return "Apenas administradores 2!";
    });
});

// Route::get("/new", [UserController::class, "new"]);
// Route::get("/edit", [UserController::class, "edit"]);
// Route::get("/delete", [UserController::class, "delete"]);

Route::controller(UserController::class)->group(function() {
    Route::get("/user/new", "new");
    Route::get("/user/edit", "edit");
    Route::get("/user/delete", "delete");
});

Route::fallback(function() {
    echo "PÁGINA NÃO ENCONTRADA!";
});