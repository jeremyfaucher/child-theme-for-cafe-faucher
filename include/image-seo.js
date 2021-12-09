
  $("form").on("submit", function (e) {
    var dataString = $(this).serialize();
    // event.preventDefault();
    $.ajax({
      type: "POST",
      //url: "/wp-content/themes/design2seo/include/process3.php",
      url: "http://localhost/blog/wp-content/themes/design2seo/include/process3.php",
      data: dataString,
      beforeSend: function(html) {
        $(".loaderDiv").show();
        $(".details").hide();
        var theURL = $('#name1').val();
        $(".the-url").html(theURL);
        //console.log(dataString);
      },
      success: function (html) {
        $(".loaderDiv").hide();
        $('#msg').html(html);
        console.log('works!')
        // Display message back to the user here
      }
    });
    e.preventDefault();
  });

