<h1>Tasks</h1>
<div class="row col-md-20 centered">
    <table class="table table-striped custab">
        <thead>
            <div class="col-md-20">
                <a href="/MVC_todo/tasks/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
                <div class="mx-auto" style="height: 20px;"></div>
            </div>

            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Description</th>
                <th>Employee</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($tasks as $task) {
            echo '<tr>';
            echo "<td>" . $task['id'] . "</td>";
            echo "<td>" . $task['title'] . "</td>";
            echo "<td>" . $task['description'] . "</td>";
            echo "<td>" . $task['employee_id'] . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC_todo/tasks/edit/" . $task["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC_todo/tasks/delete/" . $task["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>