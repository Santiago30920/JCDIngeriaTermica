setInterval(function(){ 
    $.get('server.php', function(response){
        alert("Respuesta: " + response);
    }); 
}, 3000);