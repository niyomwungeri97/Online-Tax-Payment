<!DOCTYPE html>
<html>
<head>
<title>User Information Management</title>
<style>
  body {background-color: #8f7878;
     font-family: sans-serif; }
  #login-form, #info-display, #edit-form { margin-bottom: 20px; padding: 15px; border: 1px solid #631919; }
  #edit-form { display: none; }
  background-image:purple;
</style>
</head>
<center>
<body><h2>LOGIN</h2>
<!--image slider-->
<div class="slider">
  <img class="slide"src="image5.jpeg"height="500" width="600">
  <img class="slide"src="">
  <div id="login-form">
    <h2>Login</h2>
    <label for="login-username">Username:</label>
    <input type="text" id="login-username"><br><br>
    <label for="login-password">Password:</label>
    <input type="password" id="login-password"><br><br>
    <button onclick="login()">Login</button>
    <p id="login-message"></p>
  </div>

  <div id="info-display" style="display: none;">
    <h2>Your Information</h2>
    <p><strong>Username:</strong> <span id="display-username"></span></p>
    <p><strong>Email:</strong> <span id="display-email"></span></p>
    <button onclick="showEditForm()">Edit</button>
    <button onclick="deleteInfo()">Delete</button>
    <p id="delete-message"></p>
  </div>

  <div id="edit-form">
    <h2>Edit Information</h2>
    <label for="edit-username">Username:</label>
    <input type="text" id="edit-username"><br><br>
    <label for="edit-email">Email:</label>
    <input type="email" id="edit-email"><br><br>
    <button onclick="saveChanges()">Save Changes</button>
    <button onclick="hideEditForm()">Cancel</button>
    <p id="edit-message"></p>
  </div>

  <script>
    let storedInfo = {
      username: "testuser",
      email: "test@example.com",
      password: "password123"
    };

    let isLoggedIn = false;

    function login() {
      const usernameInput = document.getElementById('login-username').value;
      const passwordInput = document.getElementById('login-password').value;
      const loginMessage = document.getElementById('login-message');

      if (usernameInput === storedInfo.username && passwordInput === storedInfo.password) {
        isLoggedIn = true;
        document.getElementById('login-form').style.display = 'none';
        document.getElementById('info-display').style.display = 'block';
        document.getElementById('display-username').textContent = storedInfo.username;
        document.getElementById('display-email').textContent = storedInfo.email;
        loginMessage.textContent = '';
      } else {
        loginMessage.textContent = 'you have loged in you can start payment';
      }
    }

    function showEditForm() {
      if (isLoggedIn) {
        document.getElementById('info-display').style.display = 'none';
        document.getElementById('edit-form').style.display = 'block';
        document.getElementById('edit-username').value = storedInfo.username;
        document.getElementById('edit-email').value = storedInfo.email;
        document.getElementById('edit-message').textContent = '';
      } else {
        alert('Please log in first.');
      }
    }

    function hideEditForm() {
      document.getElementById('info-display').style.display = 'block';
      document.getElementById('edit-form').style.display = 'none';
    }

    function saveChanges() {
      if (isLoggedIn) {
        const newUsername = document.getElementById('edit-username').value;
        const newEmail = document.getElementById('edit-email').value;
        const editMessage = document.getElementById('edit-message');

        storedInfo.username = newUsername;
        storedInfo.email = newEmail;

        document.getElementById('display-username').textContent = storedInfo.username;
        document.getElementById('display-email').textContent = storedInfo.email;
        hideEditForm();
        editMessage.textContent = 'Changes saved successfully!';
      } else {
        alert('Please log in first.');
      }
    }

    function deleteInfo() {
      if (isLoggedIn) {
        const confirmDelete = confirm('Are you sure you want to delete your information?');
        if (confirmDelete) {  
          storedInfo = {}; 
          isLoggedIn = false;
          document.getElementById('info-display').style.display = 'none';
          document.getElementById('edit-form').style.display = 'none';
          document.getElementById('login-form').style.display = 'block';
          document.getElementById('delete-message').textContent = 'Information deleted.';
        } else {
          document.getElementById('delete-message').textContent = 'Deletion cancelled.';
        }
      } else {
        alert('Please log in first.');
      }
    }
     // Get form values
     const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
    let hasErrors = false;

if (!username) {
    document.getElementById('usernameError').textContent = 'Please enter username.';
    document.getElementById('usernameError').style.display = 'block';
    hasErrors = true;
}

if (!password) {
    document.getElementById('passwordError').textContent = 'Please enter the password.';
    document.getElementById('passwordError').style.display = 'block';
    hasErrors = true;
}

if (hasErrors) {
    return; // Stop processing if there are errors
}

  </script>
</center>
</body>
</html>


