<h1> <?php echo 'Welcome back, ' . $username ?> </h1>
<div class="mx-auto" style="height: 75px;">
</div>

<center>
    <div class='container'>
        <div class="row">
            <div class="col-sm">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Number of employees</div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $employees_count ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-header">Number of tasks</div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $tasks_count ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>