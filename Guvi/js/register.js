$(document).ready(function() {
    $('#registrationForm').submit(function(event) {

      event.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        type: 'POST',
        url: './php/register.php',
        data: formData,
        success: function(response) {
            const responseData = JSON.parse(response)
            if(responseData.status === 'success'){
                window.location.href = 'login.html'
            }
            else{
                alert('Enter the valid data')
            }
        },
        error: function(xhr, status, error) {
          console.error(error); 
          console.log("hi")
        }
      });
    });
  });

