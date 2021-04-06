<h1>Subtasks</h1>

<div class="row col-md-20 centered">
    <table class="table table-striped custab">
        <thead>
            <div class="col-md-20">
                <a href="/MVC_todo/subtasks/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new subtask</a>
                <div class="mx-auto" style="height: 20px;"></div>
            </div>

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Task</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($subtasks as $subtask) {
            echo '<tr>';
            echo "<td>" . $subtask['id'] . "</td>";
            echo "<td>" . $subtask['title'] . "</td>";
            echo "<td>" . $subtask['description'] . "</td>";
            echo "<td>" . $subtask['task_id'] . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC_todo/subtasks/edit/" . $subtask["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC_todo/subtasks/delete/" . $subtask["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>