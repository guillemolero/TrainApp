<?php
$nouser = "";
$nopass = "";
$noalias = "";

if (isset($_POST['login']))
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $alias = $_POST['alias'];
        if (empty($user) || empty($password))
            {
                if (empty($user) && empty($password) && empty($alias))
                    {
                        $nouser = "Introduzca de las credenciales a crear";
                        $nopass = "";
                        $noalias = "";
                    }
                else
                    {
                        if(empty($user))
                            {
                                $nouser = "Introduzca el nombre del usuario a crear.<br>";
                                $nopass = "";
                                $noalias = "";
                            }
                        if(empty($password))
                            {
                                $nouser = "";
                                $nopass = "Introduzca la contraseña.<br>";
                                $noalias = "";
                            }
                        if(empty($alias))
                            {
                                $nouser = "";
                                $nopass = "";
                                $noalias = "Introduzca el alias del usuario.";
                            }
                    }
            }
        else 
            {
                //$bdd = new PDO('mysql:host=localhost;dbname=trainapp', 'root', 'q1w2e3r4t5y6');
                $bdd = new PDO('mysql:host=localhost;dbname=id1903252_trainapp;charset=utf8', 'id1903252_guillemolero', 'guillegmg8'); //este es el mio, asi no tenemos que estar borrando y poniendo

                //en el pdo se usan consultas preparadas (marioly me quitó puntos por esto un puñado de veces)
                $sql = $bdd->prepare("INSERT INTO usuarios (nombre, password, user) VALUES (?, ?, ?)"); //las interrogaciones son los parametros
                $sql->bindParam(1, $user); //los parámetros se asignan por orden (hay otra forma pero me parece más simple esta)
                $sql->bindParam(2, $password);
                $sql->bindParam(3, $alias);
                $sql->execute();
                header("Location: index.php");
            }      
    }
