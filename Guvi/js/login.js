$(document).ready(function() {
    $('#loginForm').submit(function(event) {


      // Prevent default form submission
      event.preventDefault();

      // Serialize form data
      var formData = $(this).serialize();
    var email = $('#email').val();
    var password = $('#password').val();


      // AJAX call
      $.ajax({
        type: 'POST',
        url: './php/login.php',
        data: formData,
        success: function(response) {
          const responseData = JSON.parse(response) // Log the server response


          // Handle success (if needed)
          if(responseData.status==='success'){
            localStorage.setItem('email',JSON.stringify(responseData.email))
            localStorage.setItem('id',JSON.stringify(responseData.id))
            window.location.href = 'profile.html'
          }
          else{
            alert('Invalid Credentials')
          }
        },
        error: function(xhr, status, error) {
       
          
          // Handle errors (if needed)
        }
      });
    });
  });