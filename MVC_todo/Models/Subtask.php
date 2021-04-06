<?php
class Subtask extends Model
{
    public function create($title, $description, $task_id)
    {
        $sql = "INSERT INTO subtasks (title, description, task_id) VALUES (:title, :description, :task_id)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'title' => $title,
            'description' => $description,
            'task_id' => $task_id
        ]);
    }

    public function edit($id, $title, $description, $task_id)
    {
        $sql = "UPDATE subtasks SET title = :title, description = :description, task_id = :task_id WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'task_id' => $task_id
        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM subtasks WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

    public function showSubtask($id)
    {
        $sql = "SELECT * FROM subtasks WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([$id]);
        return $req->fetch();
    }

    public function showAllSubtasks()
    {
        $sql = "SELECT * FROM subtasks";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getAllTaskSubtasks($id)
    {
        $sql = "SELECT * FROM subtasks WHERE task_id = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([
            "id" => $id
        ]);
        return $req->fetchAll();
    }

    public function count()
    {
        $sql = "SELECT COUNT(*) FROM subtasks";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }
}
