<!DOCTYPE html>
<html lang="ru">
<head>
 <?php
$website_title = 'Контакты'; 
  require 'blocks/head.php';
 ?>
</head>
<body>
<?php require 'blocks/header.php'; ?>

 <main class="container mt-5">
    <div class="row">
     <div class="col-md-8 mb-3">

     <h4>Обратная связь</h4>
    <form action="" method="post">
     <label for="username">Ваше Имя</label>
     <input type="text" name="username" id="username" class="form-control">

     <label for="email">Ваша почта</label>
     <input type="email" name="email" id="email" class="form-control">

     <label for="mess">Сообщения</label>
     <textarea name="mess" id="mess" class="form-control"></textarea> 

     <div class="alert alert-danger mt-3" id="errorBlock"></div>

     <button type="button" id="mess_send" class="btn btn-success mt-3">Отправить сообщение</button>
    </form>
    </div>


     <?php  require 'blocks/aside.php'; ?>
     </div>
     </main>

     <?php require 'blocks/footer.php'; ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
     <script>
$('#mess_send').click(function () {
     var name = $('#username').val();
     var email = $('#email').val();
     var mess = $('#mess').val();
 
     $.ajax({
      url: 'ajax/mail.php', 
      type: 'POST',
      cache: false,   
      data: {'username' : name, 'email' : email, 'mess' : mess},
      datatype: 'html',
      success: function(data) {
        if(data == 'Готово') {
          $('#mess_send').text('Все готово'); 
          $('#errorBlock').hide(); 
          $('#username').val("");
          $('#email').val(""); 
          $('#mess').val("");       

        }
        else {
      $('#errorBlock').show();
      $('#errorBlock').text(data);      
      }
     } 
   });
});
 </script>
</body>
</html>  