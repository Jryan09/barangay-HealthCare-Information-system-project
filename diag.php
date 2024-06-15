<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Navigation</title>
</head>
<body>
  <nav>
    <ul>
      <li><a href="#" id="homeLink">Home</a></li>
      <li><a href="#" id="aboutLink">About</a></li>
      <li><a href="#" id="contactLink">Contact</a></li>
      
    </ul>
  </nav>
  
  <div id="content">

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const homeLink = document.getElementById('homeLink');
      const aboutLink = document.getElementById('aboutLink');
      const contactLink = document.getElementById('contactLink');

      homeLink.addEventListener('click', function(event) {
        event.preventDefault();
        console.log('Home link clicked');
    
      });

      aboutLink.addEventListener('click', function(event) {
        event.preventDefault();
        console.log('About link clicked');
      
      });

      contactLink.addEventListener('click', function(event) {
        event.preventDefault();
        console.log('Contact link clicked');
        
      });

      document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function(event) {
          event.preventDefault();
          console.log('Unhandled link clicked');
          window.location.href = 'about.html'; 
        });
      });
    });
  </script>
</body>
</html>