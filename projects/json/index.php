<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <script>
        function generateTable(data) {
            console.log(data);
            var converted_data = [];
            converted_data.push(JSON.parse(data));
            console.log(converted_data);
            // fill columns
            var columns = [];
            for (var i = 0; i < converted_data.length; i++) {
                for (var key in converted_data[i]) {
                    if (columns.indexOf(key) === -1) {
                        columns.push(key);
                    }
                }
            }

            // creating the table
            var table = document.createElement("table");
            var tr = table.insertRow(-1);
            for (var i = 0; i < columns.length; i++) {
                var th = document.createElement("th");
                th.innerHTML = columns[i];
                tr.appendChild(th);
            }

            for (var i = 0; i < converted_data.length; i++) {
                tr = table.insertRow(-1);

                for (var j = 0; j < columns.length; j++) {
                    var tabCell = tr.insertCell(-1);
                    tabCell.innerHTML = converted_data[i][columns[j]];
                }
            }
            var divc = document.getElementById("content");
            divc.innerHTML = "";
            divc.appendChild(table);
        }

        function onButtonPressed() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    generateTable(this.responseText);
                }
            };
            xhttp.open("GET", "data.php?action=" + document.getElementById("action").value + '&code=' + document.getElementById("code").value, true);
            xhttp.send();
        }
    </script>
    <body>
        <label for="action">Action</label> <br>
        <input type="text" name="action" id="action"> <br> <br>
        <label for="code">Code</label> <br>
        <input type="text" name="code" id="code"> <br> <br>
        <input type="button" onclick="onButtonPressed()" value="Submit">

        <br><br><br>
        <div id='content'>
            <h2>Nothing</h2>
        </div>
    </body>
</html>