<!DOCTYPE html>
<?php include "extension/session.php";?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Entry</title>
        <meta name="description" content="http://www.sirah.epizy.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "extension/cdn.php";?>
    </head>
<style>
*{
    margin: 0px;
    padding: 0px;
}
body{
    background-color:#18181b;
    font-family:consolas;
}
.table{
    background-color:white;
    margin-top:1%;
    font-family:consolas;
}
.table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.date{
    width:20%;
}
.table .danger{
    background:red;
}
.date input{
    margin-left:5%;
}
table thead th{
    text-align:center;
}
</style>
<body>

<div class="container">
    <?php include "files/navbar.php";?>
<div class="row">
  <div class="message" id="message" style="margin-top:2px;">

  </div>
<form  id="form" autocomplete="off">
        <div class="date">
            <input class="form-control" type="hidden" id="date" value="<?php echo date("d-m-Y"); ?>" required>
            <input class="btn btn-success" type="submit" id="submit" value="UPDATE" required>
        </div>
        <input type="hidden" id="user" value="<?php echo $_SESSION['unique_id'];?>">
    <table class="table">
        <thead>
            <tr class="table-danger">
            <th scope="col">Variance</th>
            <th scope="col">Fojor</th>
            <th scope="col">Juhor</th>
            <th scope="col">Asor</th>
            <th scope="col">Magrib</th>
            <th scope="col">Esha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">Fard</th>
            <td>
                <div class="d-flex justify-content-around">
                    <input  type="radio" name="a" id="ff"  value="2" required> Yes
                    <input  type="radio" name="a" id="ff"  value="0" required> No
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-around">
                    <input type="radio" name="b" id="fj"  value="4" required> Yes
                    <input type="radio" name="b" id="fj"  value="0" required> No
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-around">
                    <input type="radio" name="c" id="fa"  value="4" required> Yes
                    <input type="radio" name="c" id="fa"  value="0" required> No
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-around">
                    <input type="radio" name="d" id="fm"  value="3" required> Yes
                    <input type="radio" name="d" id="fm"  value="0" required> No
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-around">
                    <input type="radio" name="e" id="fe"  value="4" required> Yes
                    <input type="radio" name="e" id="fe"  value="0" required> No
                </div>
            </td>
            </tr>
            <tr>
                <th colspan="1">Quran</th>
                <td colspan="2"><input class="form-control" name="f" type="number" id="quran" placeholder="Count Ayat" required></td>
                <td colspan="3"><input class="form-control" name="f" type="text" id="ayat" placeholder="Address of Ayat" required></td>
            </tr>
            <tr>
                <th colspan="1">Hadith</th>
                <td colspan="2"><input class="form-control" name="g" type="number" id="hadith" placeholder="Count Hadith" required></td>
                <td colspan="3"><input class="form-control" name="g" type="text" id="hadith_ayat" placeholder="Topic of Hadiht's" required></td>
            </tr>
            <tr>
                <th colspan="2" scope="row">Truthfullness</th>
                <td colspan="3">
                    <div class="d-flex justify-content-around">
                    <input type="radio" id="truth" name="h"  value="1" required> Yes
                    <input type="radio" id="truth" name="h"  value="0" required> No
                </div>
                </td>
                <td class="danger">
                    <input type="number" class="form-control" id="dawah" placeholder="Dawah" required>
                </td>
            </tr>
            <tr>
                <th colspan="2" scope="row">Sadaqah</th>
                <td colspan="4"><input class="form-control" type="number" id="sadaqah" placeholder="Amount" required></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</form>
<?php include "extension/js.php";?>
<script type="text/javascript">
  $(document).ready(function() {
      $("#submit").on("click",function(e) {
        e.preventDefault();
        var date = $("#date").val();
        var user = $("#user").val();
        var ff = $("#ff").val();
        var fj = $("#fj").val();
        var fa = $("#fa").val();
        var fm = $("#fm").val();
        var fe = $("#fe").val();
        var quran = $("#quran").val();
        var quran_ayat = $("#quran_ayat").val();
        var hadith = $("#hadith").val();
        var hadith_ayat = $("#hadith_ayat").val();
        var truth = $("#truth").val();
        var dawah = $("#dawah").val();
        var sadaqah = $("#sadaqah").val();

        $.ajax({
            url:"ajax/entry.php",
            type:"POST",
            data:{date:date,user:user,ff:ff,fj:fj,fa:fa,fm:fm,fe:fe,quran:quran,quran_ayat:quran_ayat,hadith:hadith,hadith_ayat:hadith_ayat,truth:truth,dawah:dawah,sadaqah:sadaqah},
            success:function(data){
              $("#message").html(data);
              document.getElementById("form").reset();
            }
        });

      });
  });
</script>
</body>
</html>
