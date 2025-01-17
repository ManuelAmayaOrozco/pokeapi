<?php

    function login($email, $password, $list_emails) {

        foreach( $list_emails as $user=>$pass ) {

            if( $user == $email ) {

                if ($pass == $password) {

                    return true;

                } else {

                    return false;

                }

            } else {

                return false;

            }

        }

    }


?>