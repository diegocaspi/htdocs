<h1>Employees</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <div class="col-md-20">
                <a href="/MVC_todo/employees/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new employee</a>
                <div class="mx-auto" style="height: 20px;"></div>
            </div>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($employees as $employee) {
            echo '<tr>';
            echo "<td>" . $employee['id'] . "</td>";
            echo "<td>" . $employee['name'] . "</td>";
            echo "<td>" . $employee['surname'] . "</td>";
            echo "<td>" . $employee['email'] . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC_todo/employees/edit/" . $employee["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC_todo/employees/delete/" . $employee["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>