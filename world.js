window.addEventListener("DOMContentLoaded", () =>{

    var btn = document.getElementById("lookup");
    
    var httpRequest;

    btn.addEventListener('click', (e) =>{
        e.preventDefault();
        httpRequest = new XMLHttpRequest();
        var input = document.getElementById("country").value;
        var url = "world.php" + "?country=" + input;
        httpRequest.onreadystatechange = findCountry;
        httpRequest.open('GET', url);
        httpRequest.send();

    });//end button action listener

    var findCountry = function (){
        if(httpRequest.readyState===XMLHttpRequest.DONE){
            if(httpRequest.status === 200){
                var response = httpRequest.responseText;
                console.log(response);
                var result = document.getElementById("result");
                result.innerHTML=response;
            }else{
                alert("There was a problem with the request");
            }
        }
    }
});