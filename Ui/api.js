    // You will need to have jQuery running on your webpage to run this script.
 
    $(function() {
       // Replace pageUrl with a page you want to call.
       var pageUrl = "https://api.nhs.uk/conditions/acne";
       // Replace {subscription-key} with your subscription key found here: https://developer.api.nhs.uk/developer.
       var subscriptionkey = "802d5323546045efab3767beabde66bf";
     $.ajax({
         type: 'GET',
         url: pageUrl,
         headers: {
          'subscription-key':subscriptionkey,
          'Content-Type':'application/json'
      },
         dataType: 'json',
         success: function (data) {
           console.log(data)
		    var result = $('<div />').append(data).find('#result').html();
            $('#result').html(result);
         }
     });
 
 
     });
 