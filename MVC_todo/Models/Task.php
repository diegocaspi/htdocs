<?php
class Task extends Model
{
    public function create($title, $description, $employee_id)
    {
        $sql = "INSERT INTO tasks (title, description, created_at, updated_at, employee_id) VALUES (:title, :description, :created_at, :updated_at, :employee_id)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'title' => $title,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'employee_id' => $employee_id
        ]);
    }

    public function edit($id, $title, $description, $employee_id)
    {
        $sql = "UPDATE tasks SET title = :title, description = :description , updated_at = :updated_at, employee_id = :employee_id WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s'),
            'employee_id' => $employee_id
        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM tasks WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

    public function showTask($id)
    {
        $sql = "SELECT * FROM tasks WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function showAllTasks()
    {
        $sql = "SELECT * FROM tasks";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function filterByTitle($title)
    {
        $sql = "SELECT * FROM tasks WHERE title LIKE :title";

        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            'title' => ('%' . $title . '%')
        ]);

        return $req->fetchAll();
    }

    public function getAllEmployeeTasks($id)
    {
        $sql = "SELECT * FROM tasks WHERE employee_id = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            "id" => $id
        ]);
        return $req->fetchAll();
    }

    public function count()
    {
        $sql = "SELECT COUNT(*) FROM tasks";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
}
