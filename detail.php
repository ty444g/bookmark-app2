<?php
// detail.php: データ更新用ページ
$id = $_GET["id"];

include("funcs.php");
$pdo = db_conn();

// データ取得 SQL
$sql = "SELECT * FROM gs_an_table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
}

// 単一レコード取得
$v = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* 全体 */
    body {
      background-color: #f8f9fa;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
    }
    /* ナビバー */
    .navbar {
      background-color: #007bff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .navbar .navbar-brand {
      color: #fff;
      font-weight: bold;
    }
    .navbar .navbar-brand:hover {
      color: #e2e6ea;
    }
    /* メインコンテナ */
    main.container {
      max-width: 600px;
      margin: 40px auto;
    }
    /* フォームカード */
    .card {
      border-radius: .5rem;
      box-shadow: 0 .125rem .25rem rgba(0, 0, 0, 0.075);
    }
    .card-header {
      background-color: #ffffff;
      border-bottom: 1px solid #dee2e6;
      font-size: 1.5rem;
      font-weight: 600;
      padding: 1rem 1.5rem;
    }
    .card-body {
      padding: 1.5rem;
    }
    /* 入力 */
    .form-group {
      margin-bottom: 1rem;
    }
    .form-group label {
      font-weight: 500;
      display: block;
      margin-bottom: .5rem;
    }
    .form-control {
      width: 100%;
      padding: .5rem;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      font-size: 1rem;
    }
    .form-control:focus {
      outline: none;
      box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
    }
    /* ボタン */
    .btn-submit {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: .5rem 1.25rem;
      font-size: 1rem;
      border-radius: .25rem;
      cursor: pointer;
    }
    .btn-submit:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <!-- ヘッダー -->
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="select.php">データ一覧</a>
      </div>
    </nav>
  </header>

  <!-- メイン -->
  <main class="container">
    <div class="card">
      <div class="card-header">ブックマーク更新</div>
      <div class="card-body">
        <form method="POST" action="update.php">
          <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" class="form-control" value="<?= h($v['title']) ?>">
          </div>
          <div class="form-group">
            <label for="url">URL</label>
            <input type="text" id="url" name="url" class="form-control" value="<?= h($v['url']) ?>">
          </div>
          <div class="form-group">
            <label for="naiyou">詳細</label>
            <textarea id="naiyou" name="naiyou" rows="4" class="form-control"><?= h($v['naiyou']) ?></textarea>
          </div>
          <input type="hidden" name="id" value="<?= h($v['id']) ?>">
          <button type="submit" class="btn-submit">更新</button>
        </form>
      </div>
    </div>
  </main>

</body>
</html>
