<h1>Create employee</h1>
<form method='post' action=''>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value=<?php if (isset($name)) echo $name ?>>
    </div>

    <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname" value=<?php if (isset($surname)) echo $surname ?>>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
        <p class="text-danger"><?php if (isset($email_err)) echo $email_err ?></p>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>