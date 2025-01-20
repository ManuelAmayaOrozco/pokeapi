<?php

    function login($email, $password, $list_emails) {

        if( $list_emails[1] == $email ) {

            if ($list_emails[2] == $password) {

                return true;

            } else {

                return false;

            }

        } else {

            return false;

        }

    }


?>