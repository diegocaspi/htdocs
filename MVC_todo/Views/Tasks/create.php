<script>
    function getSpacer() {
        var spacer = document.createElement('div');
        spacer.style.height = '5px';
        return spacer;
    }

    function populateLivesearchDiv(json) {
        var div = document.getElementById('livesearch');
        div.innerText = '';
        div.appendChild(getSpacer());

        // creating all buttons foreach employee found
        json.forEach(employee => {
            var a = document.createElement('a');
            a.className = 'list-group-item list-group-item-action list-group-item-light';
            a.innerText = employee['id'] + ' - ' + employee['name'] + ' ' + employee['surname'];

            a.onclick = function() {
                document.getElementById('employee_id').value = employee['id'];
            };
            div.appendChild(a);
            div.appendChild(getSpacer());
        });
    }

    function showResult(str) {
        if (str.length == 0) {
            document.getElementById('livesearch').innerHTML = '';
            document.getElementById('livesearch').style.border = '0px';
            return;
        }

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onload = function() {
            console.log(this.responseURL);
            if (this.readyState == 4 && this.status == 200) {
                populateLivesearchDiv(this.response);
            }
        }
        xmlhttp.responseType = 'json';
        xmlhttp.open("GET", "http://127.0.0.1/MVC_todo/tasks/livesearch/" + str, true);
        xmlhttp.send();
    }
</script>

<h1>Create task</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description">
    </div>

    <div class="form-group">
        <label for="employee_id">Employee</label>
        <input type="text" class="form-control" id="employee_id" onkeyup="showResult(this.value)" placeholder="Enter employee" name="employee_id">
    </div>
    <div id="livesearch" class="list-group"></div>
    <div class="mx-auto" style="height: 20px;"></div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-info btn-xs" href="/MVC_todo/employees/create/">Create employee</a>
</form>