<h1>Edit subtask</h1>

<form method='post' action=''>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value ="<?php if (isset($subtask["title"])) echo $subtask["title"];?>">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description" value ="<?php if (isset($subtask["description"])) echo $subtask["description"];?>">
    </div>

    <div class="form-group">
        <label for="task_id">Task</label>
        <input type="text" class="form-control" id="task_id" placeholder="Enter task" name="task_id" value ="<?php if (isset($subtask["task_id"])) echo $subtask["task_id"];?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>