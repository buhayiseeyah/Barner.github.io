<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="../css/LoginForm stylesheet.css"/>
  </head>
<body>

<div id="LoginForm">

  <div id="LoginButton">
      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log In</button>
  </div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" method='post'>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Form">&times;</span>
      <img src="../images/avatar.png" alt="Avatar" class="avatar"/>
    </div>

    <div class="container">
      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email Address" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      
      <div id="ModalLog">
        <button name="click" type="submit">Log In</button>
      </div>

    </div>

    <div class="container" style="background-color:#cccccc">
    </div>
  </form>
</div>
<?php include 'login.php';?>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
