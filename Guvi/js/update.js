document.getElementById('editProfileBtn').addEventListener('click', function() {
    document.querySelectorAll('.edit').forEach(function(input) {
      input.removeAttribute('readonly');
    });
    document.getElementById('saveProfileBtn').classList.remove('d-none');
    document.getElementById('editProfileBtn').classList.add('d-none');
  });

  $(document).ready(function() {
      // AJAX call
      $.ajax({
        type: 'POST',
        url: './php/display.php',
        data: {
 id : JSON.parse(localStorage.getItem('id')),
        },
        success: function(response) {
          const responseData = JSON.parse(response) // Log the server response
          // Handle success (if needed)
          if(responseData.status==='success'){
            console.log('success')
            $('#email').val(responseData.email)
            $('#username').val(responseData.username)
            $('#dob').val(responseData.dob)
            $('#age').val(responseData.age)
            $('#contact').val(responseData.contact)
            $('#id').val(responseData.id)
          }
        },
        error: function(xhr, status, error) {
    
          // Handle errors (if needed)
        }
      });
    
      $('#profileForm').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();
  
        // Serialize form data
        var formData = $(this).serialize();
  
        // AJAX call
        $.ajax({
          type: 'POST',
          url: './php/update.php',
          data: formData,
          success: function(response) {
            // Handle success (if needed)
            $('#editProfileBtn').removeClass('d-none');
            $('#saveProfileBtn').addClass('d-none');
          },
          error: function(xhr, status, error) {
         
          }
        });
      });
  });

  const logoutBtn = document.getElementById('logoutBtn')
  logoutBtn.addEventListener('click',function(){
    localStorage.removeItem('email');
    localStorage.removeItem('id');
    window.location.href = 'login.html'
  })