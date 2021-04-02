<?php

class Employee extends Model
{
    public function create($name, $surname, $email)
    {
        $prev_sql = 'SELECT * FROM employees WHERE email = :email';
        $prev_req = Database::getBdd()->prepare($prev_sql);
        $prev_req->execute([
            'email' => $email
        ]);

        if ($prev_req->fetch()) {
            // if user already exist return false
            return false;
        } else {
            // generate password
            $gen = base64_encode(openssl_random_pseudo_bytes(6));
            $sql = 'INSERT INTO employees (name, surname, email, password) VALUES (:name, :surname, :email, :password)';

            $req = Database::getBdd()->prepare($sql);

            $success = $req->execute([
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'password' => md5($gen)
            ]);
            return $success ? $gen : false;
        }
    }

    public function edit($id, $name, $surname, $email)
    {
        $sql = 'UPDATE employees SET name = :name, surname = :surname, email = :email WHERE id = :id';

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM employees WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

    public function login($email, $password)
    {
        $sql = 'SELECT id, name, surname, email FROM employees WHERE email = :email AND password = :password';
        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            'email' => $email,
            'password' => md5($password)
        ]);

        return $req->fetch();
    }

    public function showEmployee($id)
    {
        $sql = 'SELECT id, name, surname, email FROM employees WHERE id = :id';
        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
        return $req->fetch();
    }

    public function showAllEmployees()
    {
        $sql = 'SELECT id, name, surname, email FROM employees';
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function filterBySurname($surname)
    {
        $sql = "SELECT * FROM employees WHERE surname LIKE :surname";

        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            'surname' => ('%' . $surname . '%')
        ]);

        return $req->fetchAll();
    }

    public function count()
    {
        $sql = "SELECT COUNT(*) FROM employees";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();

        return $req->fetch();
    }
}
