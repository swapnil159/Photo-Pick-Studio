<?php
  include 'conn.php';
  $user=$_SESSION['user'];

  $query="SELECT First_Name,Last_Name,Gender,Email FROM Register WHERE Username='$user'";
  $result=mysqli_query($conn,$query);

  $row=mysqli_fetch_array($result);
?>
<!Doctype html>
<html>
  <head>
    <title>PROFILE PAGE</title>
  </head>
  <body>
    <div>
      <h1>WELCOME  <?php echo $user ?> </h1>
    </div>
    <div>
      <table cellspacing="30">
        <tr>
          <td>First Name</td>
          <td><?php echo $row['First_Name'] ?></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td><?php echo $row['Last_Name'] ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $row['Gender'] ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $row['Email'] ?></td>
        </tr>
      </table>
      <hr>
    </div>
    <div>
      <table cellspacing="45">
      <?php
        $query="SELECT Album_Name,Album_Description,date_time,Cover FROM Album WHERE Username='$user'";
        $result=mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {?>
          <tr>
            <td>
              <div>
                <img height="100" width="100" src=<?php echo "ALBUMS/".$user."/".$row['Album_Name']."/".$row['Cover'] ?>><br/>
                <a href=<?php echo "Display_Album.php?id=&album=".$row['Album_Name'] ?>><?php echo $row['Album_Name'] ?></a>
              </div>
            </td>
            <td>Created on <?php echo $row['date_time'] ?></td>
            <td><?php echo $row['Album_Description'] ?></td>
          </tr>
        <?php
        }
      ?>
    </table>
    </div>
  </body>
</html>
