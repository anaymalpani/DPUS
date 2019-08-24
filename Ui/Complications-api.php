<!DOCTYPE html>
<html>
<head>
    <title>JSSample</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body>
<div id="div1"></div>
<div id="div2"></div>
<div id="div3"></div>
<div id="div4"></div>
<div id="div5"></div>
<div id="div6"></div>
<div id="div7"></div>
<script type="text/javascript">
    $(function() {
      var bimari = "acne";
	  var view_data;
        $.ajax({
            url: "https://api.nhs.uk/conditions/" + bimari + "/Complications/",
            beforeSend: function(xhrObj){
                // Request headers
                xhrObj.setRequestHeader("subscription-key","802d5323546045efab3767beabde66bf");
            },
            type: "GET",
            // Request body
            data: "{body}",
        })
        .done(function(data) {
            alert("success");
			console.log(data); 
			$( '#div1').html( data.mainEntityOfPage[0].mainEntityOfPage[0].text );
			$( '#div2').html( data.mainEntityOfPage[1].mainEntityOfPage[0].text );
			$( '#div3').html( data.mainEntityOfPage[2].mainEntityOfPage[0].text );
			$( '#div4').html( data.mainEntityOfPage[3].mainEntityOfPage[0].text );
			$( '#div5').html( data.mainEntityOfPage[4].mainEntityOfPage[0].text );
			$( '#div6').html( data.mainEntityOfPage[5].mainEntityOfPage[0].text );
			$( '#div7').html( data.mainEntityOfPage[6].mainEntityOfPage[0].text );
        })
        .fail(function() {
            alert("error");
        });
    });
</script>
</body>
</html>


<?php
/*<!DOCTYPE html>
<html lang="en">

<head>
	<script  src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>zz
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JSON Test</title>
</head>
<body>
  <div class="result" id="result"></div>     
</body>  

<script src="api.js"></script>
<script>
/*
if (typeof console  != "undefined") 
  if (typeof console.log != 'undefined')
    console.olog = console.log;
else
  console.olog = function() {};

console.log = function(data) {
  console.olog(data);
  $('#debugDiv').append('<p>' + data + '</p>');
};
console.error = console.debug = console.info =  console.log

</script>
</html>
*/

?>

