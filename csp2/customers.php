<div class="table-responsive customers">          
  <table class="table">
    <thead>
      <tr class="orange">
        <th>ID</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>EMAIL</th>
        <th>BAN CUSTOMER</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM customers ORDER BY id ASC";
      $result = mysqli_query($conn, $sql);
      while($customers = mysqli_fetch_assoc($result)) {
      extract($customers);
      
      echo"<tr>
        <td>$id</td>
        <td>$first_name</td>
        <td>$last_name</td>
        <td>$email</td>
        <td>";
        if ($status == 'active') {
          echo "<a href='ban_user.php?index=$id'><button class='btn btn-danger'>Ban</button></a>";
        } else if ($status != 'active') {
          echo "<button class='btn btn-default'>Banned</button>";
        }
    echo "</td>
      </tr>";
     }
      ?>
    </tbody>
  </table>
</div>