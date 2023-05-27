document.addEventListener("DOMContentLoaded", function() {
    var welcomeText = "Suporte a MEIs com excelência";

    var welcomeMessage = document.querySelector('.welcome-message');
    
    var typingSpeed = 50;
    
    for (var i = 0; i < welcomeText.length; i++) {
      (function(i) {
        setTimeout(function() {
          welcomeMessage.innerHTML += welcomeText.charAt(i);
        }, i * typingSpeed);
      })(i);
    }
  });
  