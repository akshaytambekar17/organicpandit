$(".btn-lg").on('click', function(e){
    e.preventDefault(); // this will prevent the defualt behavior of the button

    // find which button was clicked
    butId = $(this).attr('id');

    $.ajax({
          method: "POST",
          url: "/controllerDummy/run/",
          data: { button: butId }
        })
      .done(function( msg ) {
        // do something
      });        
});