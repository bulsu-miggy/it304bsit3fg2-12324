<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<style>
    *{
        transition: 3s ease-in-out;
    }
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-form {
    max-width: 300px;
    margin: 0 auto;
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
</style>
<body>
<div class="login-container">
        <form class="login-form">
            <h2>Login as Admin</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" onclick = "login(event)">Login</button>
        </form>
    </div>
    <script>
        
        function login(event){
            event.preventDefault()
            let username = document.getElementById("username").value
            let password=document.getElementById("password").value


            if(username === 'admin' && password === 'password'){
                alert("successful")
                window.location.href = "admin-pages.php"
            }
            else{
                alert("wrong")
            }
        }
    </script>




      
   
</body>
</html>