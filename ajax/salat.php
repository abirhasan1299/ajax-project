<?php
include '../extension/config.php';




  $sql = "select * from salat where user='{$_POST['user']}' order by id desc limit {$_POST['limit']}";

  $query = mysqli_query($conn,$sql) or die("Query Failed: ".mysqli_error($conn));

  $str = "";

  if(mysqli_num_rows($query)>0){
    $str .='<br><table class="table table-bordered border-primary">
      <tbody>
        <tr>
          <th>Date</th>
          <th>Fojor</th>
          <th>Juhor</th>
          <th>Asor</th>
          <th>Magrib</th>
          <th>Esha</th>
        </tr>';
    while ($row = mysqli_fetch_assoc($query)) {
      $str .="<tr>
                  <td> {$row["date"]} </td>
                  <td>{$row["ff"]}</td>
                  <td>{$row["fj"]}</td>
                  <td>{$row["fa"]}</td>
                  <td>{$row["fm"]}</td>
                  <td>{$row["fe"]}</td>
              </tr>";
    }
    $str .="</tbody></table>";
    echo $str;
  }else {
    echo "No data Found".mysqli_error($conn);
  }


 ?>
