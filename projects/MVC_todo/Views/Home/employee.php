<h2>Welcome back, <?php echo $username ?> </h2>
<div class="mx-auto" style="height: 20px;"></div>

<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <div class="col-md-20">
                <div class="mx-auto" style="height: 20px;"></div>
            </div>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Description</th>
            </tr>
        </thead>
        <?php
        foreach ($tasks as $task) {
            echo '<tr>';
            echo "<td>" . $task['id'] . "</td>";
            echo "<td>" . $task['title'] . "</td>";
            echo "<td>" . $task['description'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>