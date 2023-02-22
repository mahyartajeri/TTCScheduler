<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Document</title>
    <nav class=" navbar-expand-lg  navbar navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">TTC</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">EDIT <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">VIEW</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">HOME</a>
                </li>
            </ul>

        </div>

        <form class="form-inline my-2 my-lg-0">
        <input aria-label="Search" class="form-control mr-sm-2" name="name" onblur="hideDiv()" onfocus="showDiv()" type="text" placeholder="Search..." onkeyup="showPreview(this.value)">
       
      
    </form>

     

  






    </nav>

    <div id="preview"  ></div>


    <script>
        function showPreview(str) {
            if (str.length == 0) {
                document.getElementById("preview").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("preview").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "search.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>

    <script>
        const submitBtn = document.getElementById('submit');
        const showmeDiv = document.getElementById('preview');
        
     
        function hideDiv() {
            var div = document.getElementById("preview");

            div.style.display = "none";

        }

        function showDiv(){
            var div = document.getElementById("preview");
            div.style.display = "block";

        }
    </script>
</head>