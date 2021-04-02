<h1>Edit task</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value ="<?php if (isset($task["title"])) echo $task["title"];?>">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description" value ="<?php if (isset($task["description"])) echo $task["description"];?>">
    </div>

    <div class="form-group">
        <label for="employee_id">Employee</label>
        <input type="text" class="form-control" id="employee_id" placeholder="Enter employee" name="employee_id" value ="<?php if (isset($task["employee_id"])) echo $task["employee_id"];?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>