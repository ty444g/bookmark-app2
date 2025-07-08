<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* 全体のスタイル */
    body {
      background-color: #f8f9fa;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
    }

    /* ナビゲーションバー */
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
      margin-top: 40px;
      margin-bottom: 40px;
    }

    /* ジャンボトロン風フォームラッパー */
    .jumbotron {
      background-color: #ffffff;
      border-radius: .5rem;
      padding: 2rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    /* フォーム要素 */
    fieldset {
      border: none;
      padding: 0;
      margin: 0;
    }
    legend {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      font-weight: 600;
    }
    form label {
      display: block;
      font-weight: 500;
      margin-bottom: .5rem;
    }
    form input[type="text"],
    form textarea {
      width: 100%;
      padding: .5rem;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      margin-bottom: 1rem;
      font-size: 1rem;
    }
    form textarea {
      resize: vertical;
    }

    /* ボタン */
    .btn-submit {
      display: inline-block;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: .5rem 1.25rem;
      font-size: 1rem;
      border-radius: .25rem;
      cursor: pointer;
      text-decoration: none;
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
        <a class="navbar-brand" href="select.php">データ一覧へ移動</a>
      </div>
    </nav>
  </header>

  <!-- メインコンテンツ -->
  <main class="container">
    <div class="jumbotron">
      <form method="POST" action="insert.php">
        <fieldset>
          <legend>ブックマークの追加</legend>

          <label for="title">タイトル</label>
          <input type="text" id="title" name="title" placeholder="例：サイト名">

          <label for="url">URL</label>
          <input type="text" id="url" name="url" placeholder="例：https://example.com">

          <label for="naiyou">詳細</label>
          <textarea id="naiyou" name="naiyou" rows="4" placeholder="サイトの説明を入力"></textarea>

          <button type="submit" class="btn-submit">登録</button>
        </fieldset>
      </form>
    </div>
  </main>

</body>
</html>
