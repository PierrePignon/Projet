<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>E-nova</title>
  <link rel="stylesheet" href= "public/css/conversationStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/header.php'); ?>

  <div class="container">

    <h1>Assistance</h1>

    <div id="main">

      <div id="user">

        <?php
        while ($message = $messages->fetch())
        {
          if($message['sender'] == "user"){
            ?>
            <div class="chat client">
              <div class="user-photo"><img src="public/images/client.png"></div>
              <p class ="chat-message">  <?= htmlspecialchars($message['content']) ?> </p>
            </div>
            <?php
          }
          else if ($message['sender'] == "admin"){
            ?>
            <div class="chat admin">
              <div class="user-photo"><img src="public/images/admin.png"></div>
              <p class ="chat-message">  <?= htmlspecialchars($message['content']) ?> </p>
            </div>
            <?php
          }
          ;
        }
        ?>

      </div>

      <?php
      $messages->closeCursor();
      ?>

      <script>
        element = document.getElementById('user');
        element.scrollTop = element.scrollHeight;
      </script>

      <div class="containerForm">
        <form action="index.php?page=mailbox&action=sendMessage" method="post">

          <input type="text" name="content" placeholder="Message" id="content">

          <button>Envoyer</button>

        </form>
      </div>

    </div>    

  </div>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>