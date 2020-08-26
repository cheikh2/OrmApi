<?php

namespace libs\system;

class BootStrap
{
  public function __construct()
  {

    ######---si l'utilisateur tape quelque chose au niveau du navigateur----#########
    if (isset($_GET["url"])) {
      #####----stocker l'url dans un tableau------########
      $url = explode("/", $_GET["url"]);

      $controller_file = "src/controller/" . $url[0] . "Controller.php";
      if (file_exists($controller_file)) {

        require_once $controller_file;

        $_file = $url[0] . "Controller";

        $controller_object = new $_file();
        if (isset($url[2])) {

          $method = $url[1];
          if (method_exists($controller_object, $method)) {
            $controller_object->$method($url[2]);
          } else {
            die($method . " n'existe pas dans le controller " . $_file);
          }
        } else if (isset($url[1])) {
          $method = $url[1];
          if (method_exists($controller_object, $method)) {
            $controller_object->$method();
          } 
          else {
            die($method . " n'existe pas dans le controller " . $_file);
          }
        }
      } 
      else {
        die($controller_file . " n'existe pas");
      }
    } 
    else {
      echo "Bienvenue à la banque du peuple";
    }
  }
}
