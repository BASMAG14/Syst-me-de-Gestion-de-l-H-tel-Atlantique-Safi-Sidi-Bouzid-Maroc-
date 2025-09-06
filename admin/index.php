<?php  
session_start();  
if(isset($_SESSION["user"])) {  
    header("location:home.php");  
    exit();
}

include('db.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($con,$_POST['user']);
    $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
    
    $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        $_SESSION['user'] = $myusername;
        header("location: home.php");
        exit();
    } else {
        echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
    }
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>PANO RAMA ADMIN</title>
  
  
     
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  
</head>
<style>
  input[type="submit"][name="sub"] {
    background: #39c0ed !important;  
    color: #fff !important;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 1.1em;
    padding: 18px 0;
    box-shadow: 0 2px 8px rgba(57, 192, 237, 0.61);
    transition: background 0.3s, transform 0.2s;
}
input[type="submit"][name="sub"]:hover {
    background: #0074D9 !important; 
    color: #fff !important;
    transform: translateY(-2px) scale(1.03);
}
.input-group {
    display: flex;
    align-items: center;
    margin-bottom: 24px;
    min-height: 48px; 
}
.input-icon-outside {
    margin-right: 10px;
    color: #39c0ed;
    font-size: 1.3em;
    display: flex;
    align-items: center;
}
.toggle-password-outside {
    background: none !important;  
    border: none !important;
    box-shadow: none !important;
    margin: 0 10px 0 0;
    color: #39c0ed;
    font-size: 1.3em;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    padding: 0;
}
.login-input {
    height: 48px !important;
    min-height: 48px !important;
    max-height: 48px !important;
    padding: 12px 12px;
    border: 2px solid #39c0ed;
    border-radius: 8px;
    background: #f4faff !important;
    color: #001f3f !important;
    font-size: 1.1em;
    outline: none;
    transition: border-color 0.3s, box-shadow 0.3s;
    box-sizing: border-box;
    line-height: 24px;
}
.login-input:-webkit-autofill,
.login-input:-webkit-autofill:focus {
    background: #f4faff !important;
    -webkit-box-shadow: 0 0 0 1000px #f4faff inset !important;
    -webkit-text-fill-color: #001f3f !important;
}
.login-input:focus {
    border-color: #0074D9;
    box-shadow: 0 0 0 2px #39c0ed33;
}
.input-icon,
.toggle-password {
    background: none !important;
    border: none !important;
    box-shadow: none !important;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
    padding: 0;
}
.input-icon {
    left: 12px;
    color: #39c0ed !important;
    font-size: 1.3em;
    pointer-events: none;
}
.toggle-password {
    right: 14px;
    color: #39c0ed !important;
    font-size: 1.3em;
    cursor: pointer;
}
.toggle-password-outside {
    margin-left: 10px;
    color: #39c0ed;
    font-size: 1.3em;
    cursor: pointer;
    display: flex;
    align-items: center;
}
.input-icon-outside i,
.toggle-password-outside i {
    background: none !important;
    box-shadow: none !important;
    border: none !important;
    color: #39c0ed !important;
    font-size: 1.5em;
    width: auto;
    height: auto;
    padding: 0;
    margin: 0;
    display: inline-block;
}
.input-icon-outside,
.toggle-password-outside {
    background: none !important;
    box-shadow: none !important;
    border: none !important;
}
</style>
<body>
  <div id="clouds">
	<div class="cloud x1"></div>
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">


      <div id="login">

        <form method="post">

          <fieldset class="clearfix">

            <div class="input-group">
  <span class="input-icon-outside"><i class="fa fa-user"></i></span>
  <input 
    type="text"  
    name="user" 
    required
    class="login-input"
  >
</div>
<div class="input-group">
  <span class="input-icon-outside"><i class="fa fa-lock"></i></span>
  <input 
    type="password" 
    name="pass"  
    id="password-field"
    required
    class="login-input"
  >
  <span id="togglePassword" class="toggle-password-outside">
    <i class="fa fa-eye"></i>
  </span>
</div>
            <p><input type="submit" name="sub"  value="Admin Sign In"></p>

          </fieldset>

        </form>

       

      </div> 

    </div>

  
</body>
</html>

<script>
document.getElementById('togglePassword').onclick = function() {
    var passField = document.getElementById('password-field');
    var icon = this.querySelector('i');
    if (passField.type === "password") {
        passField.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passField.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
};
</script>

<?php
?>
