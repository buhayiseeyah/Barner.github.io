<html>
  <head>
    <title>News</title>
    <link rel="stylesheet" type="text/css" href="../css/index stylesheet.css">
  </head>
<body>
  <?php include 'guest_header.php';?>

  <!--content area-->
      <!--Body part of the content-->
      <div id="content2" class="right">
        <!--The title part of the form-->
        <h4 class="headerform">
          SIGN UP<br>
            <img id="headerimage" src="../images/TopicLine.jpg"/><br>
        </h4>
        <!--The form part. The file here is to be changed. LOL-->
        <div id = "lol">
        <?php if($flag==1) echo "Error password";?>
        <form id="sign_up_user" action="../sponsor/sponsor_home1.php" method='post' onsubmit="return myFunction()">
            <fieldset>
            <legend class="titleSU">Site Information</legend>
            <table class="t1">
              <tr>
                <td class="left"> Password:</td>
                <td> 
                <input class="text" placeholder="Enter password" type='password' name='pw1' id="pw1" required/> 
                </td>
              </tr>
              <tr>
                <td class="left"> Reenter password:</td>
                <td> 
                <input class="text" placeholder="Re-enter password" type='password' name='pw2' id="pw2"  onkeyup="checkPass(); return false;" required/>
                 <span id="confirmMessage" class="confirmMessage"></span>
                </td>
              </tr>
            </table>
            </fieldset>

            <fieldset>
            <legend class="titleSU">Personal Information</legend>
            <table class="t1">
              <tr>
                <td class="left"> First Name:</td>
                <td> <input class="text" placeholder="Type your first name..." type='text' name='fname' value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>" required/></td>
              </tr>
              <tr>
                <td class="left"> Middle Name:</td>
                <td> <input class="text" placeholder="Type your middle name..." type='text' name='mname' value="<?php if(isset($_POST['mname'])) echo $_POST['mname']; ?>"/> </td>
              </tr>
              <tr>
                <td class="left"> Last Name:</td>
                <td> <input class="text" placeholder="Type your last name..."type='text' name='lname' value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>"required/></td>
              </tr>
              <tr>
                <td class="left"> Birthdate: </td>
                <td> 
                <input class="numb" placeholder="DD" type='text' name='day' value="<?php if(isset($_POST['day'])) echo $_POST['day']; ?>" required/>
                <input class="numb" placeholder="MM"type='text' name='mon' value="<?php if(isset($_POST['mon'])) echo $_POST['mon']; ?>" required/>
                <input class="numb" placeholder="YYYY"type='text' name='yr' value="<?php if(isset($_POST['yr'])) echo $_POST['yr']; ?>" required/></td>
              </tr>
              <tr>
                <td class="left"> Gender: </td>
                <td> <select class="dropdown" name='gender'>
                    <option <?php if (isset($gender) && $gender=="---") echo "selected";?>>---</option>
                    <option <?php if (isset($gender) && $gender=="Male") echo "selected";?>>Male</option>
                    <option <?php if (isset($gender) && $gender=="Female") echo "selected";?>>Female</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="left"> Status: </td>
                <td><select class="dropdown" name='status'>
                    <option <?php if (isset($status) && $status=="---") echo "selected";?>>---<//option>
                    <option <?php if (isset($status) && $status=="Single") echo "selected";?>>Single</option>
                    <option <?php if (isset($status) && $status=="Married") echo "selected";?>>Married</option>
                </select>
                </td>
              </tr>
              <tr>
                <td class="left"> Email Address: </td>
                <td> <input class="text" placeholder="e.g. marjorie@example.com" type='email' name='email' value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required/> </td>
              </tr>
            </table>
            </fieldset>
            <fieldset>
            <legend class="titleSU">Address Information</legend>
              <table class="t1">
                <tr>
                  <td> Country: </td>
                  <td> <input type='text' name='country' value="<?php if(isset($_POST['country'])) echo $_POST['country']; ?>" required/> </td>
                  <td> City: </td>
                  <td> <input type='text' name='city' value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>" required/> </td>
                </tr>
                <tr>
                  <td> Postal Address: </td>
                  <td> <input type='text' placeholder="Block number, Lot #, Street, etc." name='p_address' class="text" value="<?php if(isset($_POST['p_address'])) echo $_POST['p_address']; ?>" required/> </td>
                </tr>
              </table>
            </fieldset>
            
            <fieldset>
            <legend class="titleSU">Sponsorship Information</legend>
            <table class="sponsorfield">
              <tr>
                <td> Number of Children: </td>
                <td> <input class="numb" type='text' name='numOfChild' value="<?php if(isset($_POST['numOfChild'])) echo $_POST['numOfChild']; ?>" required/></td>
              <tr>
                <td> Preferred Gender of Children: </td>
                <td> <select class="dropdown" name='pref_gender'">
                    <option <?php if (isset($pref_gender) && $pref_gender=="---") echo "selected";?>>---</option>
                    <option <?php if (isset($pref_gender) && $pref_gender=="Male") echo "selected";?>>Male</option>
                    <option <?php if (isset($pref_gender) && $pref_gender=="Female") echo "selected";?>>Female</option>
                    <option <?php if (isset($pref_gender) && $pref_gender=="Any") echo "selected";?>>Any</option>
                  </select>
               </td>
              </tr>
            </table>
            </fieldset>

            <!--Submit button here-->
            <div id="submitbutton">
             <input type='submit' id="submit" name='submit' value='Submit' onkeyup="submitState(); return false;" />
            </div>
        </form>
        </div>
      </div>

  <?php include '../footer.php';?>

  <script src="../js/jquery-3.1.0.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>