<?php

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