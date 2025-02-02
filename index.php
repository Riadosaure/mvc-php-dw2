<?php

// On vérifie si un controller est appelé depuis l'url
if(!empty($_GET['controller']))
{
    // On récupère le controller depuis l'url
    $controller = $_GET['controller'];
}
else
{
    // Sinon on utilise le controller par défaut
    $controller = 'home';
}

// On vérifie si le fichier de controller existe
if(file_exists('controller/' . $controller . '-controller.php'))
{
    // On inclut le fichier de controller
    require 'controller/' . $controller . '-controller.php';
    
    // Appel de la fonction présente dans le controller appelé
    if(!empty($_GET['action']))
    {
        // On récupère l'action depuis l'url
        $action = $_GET['action'];
    }
    else
    {
        // Sinon on utilise l'action par défaut
        $action = 'index';
    }

    // On vérifie si la fonction existe dans le controller appelé
    if(function_exists($action))
    {
        // On appelle la fonction
        $action();
    }
    else
    {
        // Sinon on appelle la fonction error404() par défaut
        require 'controller/error-controller.php';
        error404();
    }


}
else
{
    // Sinon on inclut le fichier de controller error par défaut
    require 'controller/error-controller.php';
    error404();
}
