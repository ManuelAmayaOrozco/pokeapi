<?php

    // Función para el login que busca si existe un usuario y contraseña idéntico al insertado

    function login($email, $password, $list_users) {

        foreach( $list_users as $user ) {
        
            if( $user["email"] == $email ) {

                if( $user["password"] == $password ) {
                
                    return true;

                }

            }

        }

        return false;

    }


?>