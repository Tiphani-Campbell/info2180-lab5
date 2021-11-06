window.addEventListener("DOMContentLoaded", () =>{

    var btn = document.getElementById("lookup");
    var citybtn = document.getElementById("cities");
    
    var httpRequest;

    btn.addEventListener('click', (e) =>{
        e.preventDefault();
        httpRequest = new XMLHttpRequest();
        var input = document.getElementById("country").value;
        var url = "world.php" + "?country=" + input;
        httpRequest.onreadystatechange = findResults;
        httpRequest.open('GET', url);
        httpRequest.send();

    });//end button action listener

    citybtn.addEventListener('click', (e) =>{
        e.preventDefault();
        httpRequest = new XMLHttpRequest();
        var input = document.getElementById("country").value;
        var url = "world.php" + "?country=" + input + "&context=cities";
        httpRequest.onreadystatechange=findResults;
        httpRequest.open('GET',url);
        httpRequest.send();

    });//end city button action listener

    var findResults = function (){
        if(httpRequest.readyState===XMLHttpRequest.DONE){
            if(httpRequest.status === 200){
                var response = httpRequest.responseText;
                var result = document.getElementById("result");
                result.setAttribute("tag","table");
                result.innerHTML=response;
            }else{
                alert("There was a problem with the request");
            }
        }
    }
});