<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> FriendsBook </title>

<link rel="stylesheet" type="text/css" href="default.css" />
</head>

<body>

<div id="page">

    <div class="block rounded">
        <h1>FriendsBook</h1>
    </div>
    
    <div class="block_main rounded">
        <h2>What's on your mind</h2>
        
        <form method="post" action="shout.php">
            Name: <input type="text" name="name" id="name"  />
            Message: <input type="text" id="message" name="message" class="message" /><input type="submit" id="submit" value="Submit" />
        </form>
        
        <div id="shout">
            
        </div>
    </div>

<div class="footer block_footer rounded">
      <a href="#">By Php Team</a>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    
    //populating shoutbox the first time
    refresh_shoutbox();
    // recurring refresh every 15 seconds
    setInterval("refresh_shoutbox()", 500);

    $("#submit").click(function() {
        // getting the values that user typed
        var name    = $("#name").val();
        var message = $("#message").val();
        // forming the queryString
        var data            = 'name='+ name +'&message='+ message;

        // ajax call
        $.ajax({
            type: "POST",
            url: "shout.php",
            data: data,
            success: function(html){ // this happen after we get result
                $("#shout").slideToggle(200, function(){
                    $(this).html(html).slideToggle(200);
                    $("#message").val("");
                });
          }
        });    
        return false;
    });
});

function refresh_shoutbox() {
    var data = 'refresh=1';
    
    $.ajax({
            type: "POST",
            url: "shout.php",
            data: data,
            success: function(html){ // this happen after we get result
                $("#shout").html(html);
            }
        });
}


</script>
</body>
</html>
