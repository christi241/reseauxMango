



 
  

  $(document).ready(function() {
    $('#myModal').modal('show');

    $('#myModal1').on('hidden.bs.modal', function () {
    history.pushState(null, null, window.location.href="../index.php"); // ajoute une nouvelle entrée à l'historique
    location.reload(); // recharge la page
    });
  });
  

   
   
 
 


