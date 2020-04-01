<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>E-nova</title>
  <link rel="stylesheet" href="public/css/homeChatStyle.css">
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel="stylesheet">
</head>

<body>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/admin/header.php'); ?>

  <div class="container">

    <h1>Assistance</h1>

    <div id="main">
      
      <div class="listConversations">
        
        <?php
        while ($conversation = $listConversation->fetch())
        {
          ?>
          
          <a href="index.php?page=mailbox&action=redirectionConversation&client_id=<?= $conversation['customer_number'] ?>">
            <div class="clientConversation">
              
              <div class="user-photo"><img src="public/images/client.png"></div>
              <div class="text">
                <p class="nameUser">
                  <?= htmlspecialchars($conversation['first_name'] . " " . $conversation['last_name']); ?> 
                </p>
                <p class="lastMessage">
                  <?= htmlspecialchars($conversation['content'] . " - " . $conversation['date_time']); ?>
                </p>
              </div>

            </div> 
          </a>

          <?php
        }
        $listConversation->closeCursor();
        ?>
        
      </div>

    </div>    

  </div>

  <?php require($_SERVER['DOCUMENT_ROOT'].'/app/view/footer.php'); ?>

</body>

</html>