<html>
<head>
  <title></title>
  <style>
    #loading, #success{display: none}
  </style>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
                  $("#success").text(data).fadeIn(function(){
                    window.setTimeout(function(){location.reload()},1800)
                  })
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
    <input id="email" class="email field" name='email' type='email'><br>
    <div class="press_enter" id="pressEnter"><p class="big_text">press enter to submit</p></div>
  </form>
  <div id="loading">
    submitting...
  </div>
  <div id="success">
  </div>
  <script>

$('#pressEnter').hide()
$('#email').hide()
$('#email').fadeIn()

var setemailText = 1;
setDefaultText = function(){
  setemailText = 1;
  var emailInput = $('#email');
  emailInput.val('type your email adress here ');
  var strLength= emailInput.val().length;
  emailInput.focus();
  emailInput[0].setSelectionRange(strLength, strLength);
  $('#pressEnter').fadeOut()
}

$("#email").on('keydown', function(){
  if(setemailText == 1){
    $('#email').val('');
  }
  if($("#email").val().length > 1){
    $('#pressEnter').fadeIn()
  }
  setemailText = 0;
});
$("#email").on('keyup', function(){
  if($('#email').val() == "" && setemailText == 0){
    setDefaultText();
  }
});
setDefaultText();
</script>
</body>
</html>