<?php
include '../extension/config.php';

$sql = "select * from post where post_user='{$_POST['user']}' order by id desc";
$query = mysqli_query($conn,$sql) or die("Query Failed: ".mysqli_error($conn));
$str = "";
if (mysqli_num_rows($query)>0) {
  $str .= '<br><table class="table table-hover">
    <tbody>
      <tr>
        <th>Title</th>
        <th>View</th>
        <th>Edit</th>
        <th>Trash</th>
        <th>Date</th>
      </tr>';
  while($row = mysqli_fetch_assoc($query)){
      $id = base64_encode($row['id']);
    $str .= "<tr>
                <td> {$row["title"]} </td>
                <td>{$row["view"]}</td>
                <td><a class='btn btn-primary' id='edit' href='crud/post_edit.php?post_id={$id}' role='button'><i class='bi bi-pencil-square'></i></a></td>
                <td><button class='btn btn-danger' id='delete' data-post_id='{$id}'><i class='bi bi-trash-fill'></i></button></td>
                <td>{$row["date"]}</td>
            </tr>";
  }
  echo $str;
}else{
  echo "<h1 style='text-align:center;color:red;'>No Post Found </h1>";
}

?>
