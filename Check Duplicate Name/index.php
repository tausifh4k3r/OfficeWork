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

<script src="js/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
$( document ).ready(function() {
  $('.dropify').dropify();
  $("table").hide();
  $("#fetchButtonGetContent").hide();

});

// function loadFileAsText(){
//   $(".frmData").html("");
//   var fileToLoad = document.getElementById("fileToLoad").files[0];
//   var fileReader = new FileReader();
//   fileReader.onload = function(fileLoadedEvent){
//       var textFromFileLoaded = fileLoadedEvent.target.result;
//       // alert(textFromFileLoaded);
//     //   document.getElementById("inputTextToSave").value = textFromFileLoaded;
//     $(".frmData").html(textFromFileLoaded);
//   };

//   fileReader.readAsText(fileToLoad, "UTF-8");

// }


  function LoadPage(){
        
       
            $(".MainContainer").html("");
               $("#AndError").html("");
          $("#PlusError").html("");
                var objdata = new FormData();
                objdata.append("Url",$("#txtUrl").val());
            $.ajax({
                type: 'post',
                url: 'File_get_content_api.php',
                data:objdata,
               contentType: false,
               processData:false,
                success: function(res) {
                    
                    console.log(res);
                    $("#fetchButtonGetContent").show();

                   $(".frmData").html(res);

                    // $("#lstclient").html(str);
                }

            });
        // });
    }

function checkDuplicates(){
  $("table").show();
  // $(".divIds").html("");
  var str="";
  var Srno=0;
$('form').find('[name]').each(function(){
  var name = $('[name="'+this.name+'"]');
  str+=`<tr>`;
  Srno++;
  if(name.length>1 && name[0]==this) {
    // console.log('Duplicate name '+this.name);
      // $(".divIds").append("<br><label style='color:red'>Duplicate name"+this.name+"</label><br>");
      alert("Found");
      str+=`
      <td>${Srno}</td>
      <td>${this.name}</td>
      <td><label style='color:red'>Duplicate name Found"${this.name}"</label></td>
      `;
     
   }else{
    
            //   var labelName = $('[name="'+this.name+'"]').prev().text();
            // alert(labelName);
            // var associatedLabel = $('label[name="'+this.name+'"]');
//    var previousSibling = $('[name="'+this.name+'"]').prev(); // Get the immediately preceding sibling
//     console.log(previousSibling.prev().find('br').length); // Remove <br> elements from the sibling

//     var labelText = previousSibling.text(); // Get the text content of the label
//     console.log('Label text:', labelText);


    str+=`
      <td>${Srno}</td>
      <td>${this.name}</td>
      <td><label style='color:green'>Not Found</label></td>
      `;
      // $(".divIds").append("<br><label style='color:green'>Not Found</label><br>");

  }
  str+=`</tr>`;
});
$(".tbodyResult").html(str);

   $('select option').each(function() {
         
        var value = $(this).val();
        if (value.includes('&')) {
          $("#AndError").html("");
          $("#PlusError").html("");
            console.log("Ampersand detected in option: " + value);
            $("#AndError").append(`<span>Ampersand detected in option:${value}</span><br>`);
        }

        if (value.includes('+')) {
          $("#PlusError").append(`<br><span>Plus detected in option:${value}</span>`);
        }

    });

}


// function CheckIds(){
//   var myHTML= $(".frmData").html();
// var strippedHtml = myHTML.replace(/<[^>]+>/g, '');

// var TT = myHTML.search(`GovExec-0173-EN-1.png`);

// console.log(TT);


// }

    </script>
</html>