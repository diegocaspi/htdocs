<html>
<script>
    function onRegPressed() {

    }

    function goToLogin() {
        var div = document.getElementById('content');
        div.innerText = '';

        // top text
        var h2 = document.createElement("h2");
        h2.innerText = "Login";
        div.appendChild(h2);
        
        // form
        div.appendChild(document.createElement("br"));
        // email label
        var emailLabel = document.createElement("label");
        emailLabel.innerText = 'Email';
        emailLabel.setAttribute("for", "login_email");
        div.appendChild(emailLabel);

        div.appendChild(document.createElement("br"));
        //email field
        var emailField = document.createElement("input");
        emailField.setAttribute("type", "text");
        emailField.setAttribute("name", "login_email");
        emailField.setAttribute("id", "login_email");

        div.appendChild(emailField);
    }
</script>

<body>
    <div id='content'>
    <h2>Registration</h2> <br>
        <label for="reg_name">Name</label> <br>
        <input type="text" name="reg_name" id="reg_name"> <br>
        <label for="reg_surname">Surname</label> <br>
        <input type="text" name="reg_surname" id="reg_surname"> <br>
        <label for="reg_email">Email</label> <br>
        <input type="text" name="reg_email" id="reg_email"> <br>
        <label for="reg_psw1">Password</label> <br>
        <input type="text" name="reg_pws1" id="reg_pws1"> <br>
        <label for="reg_psw2">Ripeti password</label> <br>
        <input type="text" name="reg_pws2" id="reg_pws2"> <br> <br>
        <button onclick="onRegPressed()">Submit</button>

        <br> <br>
        <button onclick="goToLogin()">Go to login</button>
    </div>
</body>
</html>