<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''　サクラサーバーなら自分のID PW
  //$pdo = new PDO('mysql:dbname=_gs_kadai;charset=utf8;host=mysql3101.db.sakura.ne.jp','','');
  $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONECT:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_kadai_an_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or false

//３．データ表示
//$view=""; //無視
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Book登録表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
div{padding: 10px;font-size:16px;}
td{border: 1px solid black;}
</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">📝データ登録📝</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
     <table>
    <?php foreach($values as $value){ ?>
      <tr>
        <td><?=$value["id"]?></td>
        <td><?=$value["username"]?></td>
        <td><?=$value["bookname"]?></td>
        <td><a href="<?=htmlspecialchars($value["bookurl"], ENT_QUOTES, 'UTF-8')?>" target="_blank"><?=htmlspecialchars($value["bookurl"], ENT_QUOTES, 'UTF-8')?></a></td>
        <td><?=$value["comment"]?></td>
        <td><?=$value["indate"]?></td>
      </tr>
    <?php } ?>
     </table> 
    </div>
</div>
<!-- Main[End] -->



<script>
  //JSON受け取り




</script>
</body>
</html>
