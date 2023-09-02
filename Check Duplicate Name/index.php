<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1.0">
    <title>Tausif Patel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<tr>
    <!-- <td>Select a File to Load:</td> -->
    <!-- <td><input type="file" id="fileToLoad" class='dropify' onchange="loadFileAsText()"> </td> -->
    <!-- <td><button onchange="loadFileAsText()">Load Selected File</button><td> -->
</tr>
    <div class="container">
    <h1 class='text-center'>Enter Landing Page Url And Check Duplicate data []</h1>
  <br>
  <div class="row">
  <label for="">Enter Landing Page URL</label>
    <div class="col-8">
  
<input type='url' class='form-control' id='txtUrl'>
</div>
<div class="col-auto">
<button id="fetchButton" class='btn btn-success' onclick="LoadPage();">Load Page</button>
<td><button class='btn btn-success' id="fetchButtonGetContent" onclick="checkDuplicates()">Check</button><td>

</div>
<div class='divIds'>
  <div class="row">
    <div class="col-8">
          <table class='table table-bordered '>
          <thead>
              <tr>
                  <td>Sr No</td>
                  <td>Ids Name</td>
                  <td>Status</td>
                  
              </tr>
          </thead>
          
          <tbody class='tbodyResult'>
                

          </tbody>
        
          </table>
          </div>
          <div class="col-4 mt-3">
                  <div id="AndError" style="color: red;font-weight: 900;">

                  </div>
                  <div id="PlusError" style="color: red;font-weight: 900;">

                  </div>
              </div>
              
          </div>
</div>
    <div class='frmData' hidden>

   </div>    

   <!-- <button onclick='CheckIds();'> Check Ids</button> -->
</body>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="YouCantSee.js"></script>


</html>