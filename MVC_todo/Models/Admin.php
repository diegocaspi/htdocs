<?php

class Admin extends Model {

    public function login($email, $password) {
        $sql = 'SELECT id, name, surname FROM admins WHERE email = :em AND password = :psw';
        $req = Database::getBdd()->prepare($sql);

        $req->execute([
            'em' => $email,
            'psw' => md5($password)
        ]);
        
        return $req->fetch();
    }
}