<html>
<head>
  <title></title>
  <style>
    #loading, #success{display: none}
  </style>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <link href="../css/formstyle.css" rel="stylesheet" type="text/css" />
  <script>
    $(function(){
      $('form').submit(function(e){
        var thisForm = $(this);
        //Prevent the default form action
        e.preventDefault();
        //Hide the form
        $(this).fadeOut(function(){
          //Display the "loading" message
          $("#loading").fadeIn(function(){
            //Post the form to the send script
            $.ajax({
              type: 'POST',
              url: thisForm.attr("action"),
              data: thisForm.serialize(),
              //Wait for a successful response
              success: function(data){
                //Hide the "loading" message
                $("#loading").fadeOut(function(){
                  //Display the "success" message
                  $("#success").text(data).fadeIn();
                });
              }
            });
          });
        });
      })
    });
  </script>
</head>

<body>
  <form method='post' action='../tools/mailer.php'>
    <input class="email field" placeholder="your@email.com" name='email' type='email'><br>
    <input type='submit' class="submit subbutton" value="">
  </form>
  <div id="loading">
    Sending...
  </div>
  <div id="success">
  </div>
</body>
</html>