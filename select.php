<?php
// funcs.php を読み込み、DB 接続
include("funcs.php");
$pdo = db_conn();

// データ取得 SQL
$sql = "SELECT * FROM gs_an_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
}

// 全データ取得
$values = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($values, JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ブックマーク表示</title>
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
      max-width: 800px;
      margin: 40px auto;
    }
    /* カード */
    .card {
      border-radius: .5rem;
      box-shadow: 0 .125rem .25rem rgba(0, 0, 0, 0.075);
      margin-bottom: 2rem;
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
    /* テーブル */
    .table thead th {
      background-color: #e9ecef;
    }
    /* ボタン */
    .btn-edit {
      margin-right: .5rem;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">データ登録へ移動</a>
      </div>
    </nav>
  </header>

  <!-- Main -->
  <main class="container">
    <div class="card">
      <div class="card-header">ブックマーク一覧</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover mb-0">
            <thead>
              <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>詳細</th>
                <th>URL</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($values as $v): ?>
              <tr>
                <td><?= h($v['id']) ?></td>
                <td><?= h($v['title']) ?></td>
                <td><?= h($v['naiyou']) ?></td>    
                <td><?= h($v['url']) ?></td>                
                <td>
                  <a href="detail.php?id=<?= h($v['id']) ?>" class="btn btn-sm btn-primary btn-edit">更新</a>
                  <a href="delete.php?id=<?= h($v['id']) ?>" class="btn btn-sm btn-danger">削除</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <script>
    // デバッグ用：JSON データをコンソールに出力
    const data = '<?php echo $json; ?>';
    console.log(JSON.parse(data));
  </script>
</body>
</html>
