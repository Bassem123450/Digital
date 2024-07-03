document.addEventListener('DOMContentLoaded', function() {
    // Function to show the success message
    function showSuccessMessage() {
      var successMessage = document.getElementById('success-message');
      successMessage.style.display = 'block';
  
      // Hide the success message after 3 seconds
      setTimeout(function() {
        successMessage.style.display = 'none';
      }, 3000); // 3000 milliseconds = 3 seconds
    }
  
    // Example: Call the showSuccessMessage function after submitting feedback successfully
    // Replace this with your actual code to submit feedback and call the function accordingly
    // For demonstration purposes:
    var submitButton = document.getElementById('submit-feedback-button');
    submitButton.addEventListener('click', function() {
      // Simulate successful submission
      // In your actual code, this part should be replaced with AJAX request or form submission
      // Assume feedback is successfully submitted after 2 seconds
      setTimeout(function() {
        showSuccessMessage();
      }, 2000); // 2000 milliseconds = 2 seconds
    });
  });
  