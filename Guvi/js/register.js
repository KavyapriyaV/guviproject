$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
      // Prevent default form submission
      event.preventDefault();

      // Serialize form data
      var formData = $(this).serialize();

      // AJAX call
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
          console.error(error); // Log any errors
          console.log("hi")
          // Handle errors (if needed)
        }
      });
    });
  });

