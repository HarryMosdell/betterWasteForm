<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
  <script src="betterWaste.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
<link rel="stylesheet" type="text/css" href="customBootstrap.css">
</head>
<?php   session_start();  ?>

<body class=" ">

<style>
   .buttonHover:hover {
  background-color: #233041!important;
  color:white!important;
}

.border-better-waste{ 
      --bs-border-opacity: 1; 
      border-color: #233041 !important; 
    }

    .better-waste-navy-text{ 
      color: #233041 !important; 
    }

    .tran{ 
      transition:2s !important; 
    }
    </style>
<?php 
$errors= [];

 if (isset($_POST['dissposeWaste'])) {
    
    if(empty($_POST['dissposeWaste'])){
     $errors['disspose']=  'please select a value';   //if firstname element of form is empty the array index is set to
      }
        
      if(count($errors)==0){                            //if the array is empty (all fields of the form have been filled)
  
      $_SESSION['dissposeWasteSelection'] = strip_tags($_POST['dissposeWaste']);

      display2();

      }

      else {
    display1();
      }
}



else if (isset($_POST['binCollectionSelection'])) {
    
    if(empty($_POST['binCollectionSelection'])){
        $errors['binCollectionSelectionError']=  'please select a bin';   //if firstname element of form is empty the array index is set to
      }
      
      if(count($errors)==0){                            //if the array is empty (all fields of the form have been filled)
  
      $_SESSION['binCollectionSelection'] =  strip_tags($_POST['binCollectionSelection']);

      display3();

      }

      else {
    display2();
      }
}


else if (isset($_POST['containerSize'])) {
    
    if(empty($_POST['containerSize'])){
        $errors['containerSizeError']=  'please select a container size';   //if firstname element of form is empty the array index is set to
      }
      
      if(count($errors)==0){                            //if the array is empty (all fields of the form have been filled)
  
      $_SESSION['containerSize'] = strip_tags($_POST['containerSize']);

      display4();

      }

      else {
    display3();
      }
}



else if (isset($_POST['stepfive'])) {
    
   
 
    if(empty($_POST['compannyName'])){
        $errors['compannyName']=  'please enter a address';   //if firstname element of form is empty the array index is set to
      }

      if(empty($_POST['compannyPostCode'])){
        $errors['compannyPostCode']=  'please enter a postcode';   //if firstname element of form is empty the array index is set to
      }

      if(is_numeric($_POST['compannyName'])){
        $errors['compannyNameNumeric Error']=  'please enter a text Value';   //if firstname element of form is empty the array index is set to
      }

      if( strlen($_POST['compannyPostCode']) <5)
      {
          $errors['compannyPostCodeError']= "Please enter you're post code in a correct format ";
      }

      if( strlen($_POST['compannyPostCode']) >7)
      {
          $errors['compannyPostCodeError']= "Please enter you're post code in a correct format ";
      }
  
      $_SESSION['compannyName'] =strip_tags($_POST['compannyName']);  //stripping javascript tags
      $_SESSION['compannyPostCode'] =strip_tags($_POST['compannyPostCode']);  //stripping javascript tags

      if(count($errors)==0){    //if the array is empty (all fields of the form have been filled)
                                       
      display5();

      }

      else {
    display4();
      }
}




else if (isset($_POST['stepsix'])) {
    
    if(empty($_POST['firstName'])){
        $errors['FirstNameError']=  'please enter your first name';   //if firstname element of form is empty the array index is set to
      }

      if(empty($_POST['lastName'])){
        $errors['LastNameError']=  'please enter youre postcode';   //if firstname element of form is empty the array index is set to
      }
      
      if(is_numeric($_POST['firstName'])){
        $errors['firstNameNumericError']=  'please entera text value for your First Name';   //if firstname element of form is empty the array index is set to
      }
      
      if(is_numeric($_POST['lastName'])){
        $errors['lastNameNumericError']=  'please entera text value for your Last Name';   //if firstname element of form is empty the array index is set to
      }

      $_SESSION['firstName'] = strip_tags($_POST['firstName']);
      $_SESSION['LastName'] = strip_tags($_POST['lastName']);    
      
      if(count($errors)==0){                            //if the array is empty (all fields of the form have been filled)
        
     
      
      display6();

      }

      else {
    display5();
      }
}



else if (isset($_POST['stepseven'])) {
    
    
    
    if(empty($_POST['PhoneNumber'])){
        $errors['PhoneNumberError']=  'please enter your first number';   //if firstname element of form is empty the array index is set to
      }

      if(empty($_POST['EmailAddress'])){
        $errors['EmailAddressError']=  'please enter youre email address';   //if firstname element of form is empty the array index is set to
      }
          
          if(strlen($_POST['PhoneNumber']) <=11)
          {
              $errors['PhoneNumberLengthError']= "Please enter 11 digits for your'e phone number ";
          }

          if(strlen($_POST['PhoneNumber']) >12)
          {
              $errors['PhoneNumberLengthError']= "Please enter 11 digits for your'e phone number ";
          }

      if(is_numeric($_POST['PhoneNumber']))
      {
          if(strlen($_POST['PhoneNumber']) <=11)
          {
              $errors['PhoneNumber']= "Please enter 11 digits for your'e phone number ";
          }
      }
      
      if (filter_var($_POST['EmailAddress'], FILTER_VALIDATE_EMAIL)) {
       
    } 
    else {
        $errors['NotVaildEmailAddressError']=  'please enter a email address in a correct form';   //if firstname element of form is empty the array index is set to
    }
   
    
      $_SESSION['PhoneNumber'] =strip_tags($_POST['PhoneNumber']);
      $_SESSION['EmailAddress'] =strip_tags($_POST['EmailAddress']);
   
    if(count($errors)==0){                            //if the array is empty (all fields of the form have been filled)

      display7();
   

        if( isset($_SESSION['compannyPostCode']) ){
            $PostCodeWithSpace= str_replace(' ','',$_SESSION['compannyPostCode']);
            $PostCodeWithSpace= wordwrap($_SESSION['compannyPostCode'], strlen($_SESSION['compannyPostCode'])-3,' ', true);
            }
            if( isset($_SESSION['PhoneNumber']) ){
                $phoneNumberWithSpace= str_replace(' ','',$_SESSION['PhoneNumber']);
                $phoneNumberWithSpace= wordwrap($_SESSION['PhoneNumber'], strlen($_SESSION['PhoneNumber'])-7,' ', true);
                }
     
     
      $JsonArray = array("Waste Type"=> $_SESSION['dissposeWasteSelection'],"Bin Collection Basis"=> $_SESSION['binCollectionSelection'],"Container Size"=> $_SESSION['containerSize'], "Company Name"=> $_SESSION['compannyName'], 
      "Post Code"=> $PostCodeWithSpace, "Customer First Name"=> $_SESSION['firstName'], "Customer Last Name"=> $_SESSION['LastName'],
      "Customer Phone Number"=> $phoneNumberWithSpace, "Customer Email Address"=>$_SESSION['EmailAddress']);
            
      $myJSONConversion = json_encode($JsonArray);
      echo $myJSONConversion;
 
      }

      else {
    display6();
      
}
}
else {

    display1();
}  

?>
<?php
function display1 ()
         {?>
             <div class="bg-warning w-100  d-flex flex-lg-column flex-row align-items-center justify-content-center"> <!--  container for form section of page-->


             

<div id="a" class="my-5 d-flex flex-column bg-white rounded align-items-center border-better-waste flex-grow-1 flex-lg-grow-0 border border-5 " style=" min-width:60%; " > <!-- wrapper for form starts here !-->
<div style="background-color:rgb(35, 48, 74);" class="py-4 px-md-4 w-100 d-flex justify-content-center  align-items-center"> <!-- header of form starts here !-->


<div class="" style="">
<div id="ProgressBar" class="rounded" style="width:300px; height:30px;  overflow: hidden; background-color:white; ">
<div id="progressBarFill" class="h-100 position-relative" style="width:0%; background-color:green; ">  <span id="text" class="position-absolute translate-middle" style="left:260px; top:50%; ">  </span></div>
         </div>
         </div>
       

         <script>

function move(CounterEnd) {
    var CounterEnd;
    var elem = document.getElementById("progressBarFill");
    var percentText = document.getElementById("text");

    var counter = 0;
    var id = setInterval(frame, 100);
    function frame() {
      if (counter >= CounterEnd) {
        clearInterval(id);
     
      } else {
    
        counter++;
        elem.style.width =  counter + '%';
        percentText.innerHTML =  counter;
       
      }
    }
  }
move(16);
</script>

</div>  <!-- header of form ends here !-->

<div class="w-100">  <!-- middle part of form starts here !-->
<div class="better-waste-navy-text d-flex align-items-center flex-column px-5 px-sm-0">
<h2 class="">  what type of waste are you trying to disspose of?</h2>
</div>
<div class="container mt-3 mb-5 px-3">
<form action="betterwasteform.html.php" method="post">

    <div class="row gy-3 ">


        <label class="col-6 col-lg-4 position-relative" style="" >
        <div onclick="myFunction()" id="za" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; !important; border-color:#ddd!important; ">
        <input class="position-absolute " style="opacity: 0;" type="submit" name="dissposeWaste" id="za" value="General"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
        <span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> General</span>
         </div>
    </label>

    <label class="col-6 col-lg-4 position-relative" style="" >
        <div onclick="myFunction1()" id="z1" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
        <input class="position-absolute " style="opacity: 0;" type="submit" name="dissposeWaste" id="za" value="Dry Recyling"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
        <span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> Dry Recycling</span>
         </div>
    </label>


    <label class="col-6 col-lg-4 position-relative" style="" >
        <div onclick="myFunction2()" id="z2" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
        <input class="position-absolute " style="opacity: 0;" type="submit" name="dissposeWaste" id="za" value="Food Waste"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
        <span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> Food Waste</span>
         </div>
    </label>


    <label class="col-6 col-lg-4 position-relative" style="" >
        <div onclick="myFunction3()" id="z3" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
        <input class="position-absolute " style="opacity: 0;" type="submit" name="dissposeWaste" id="za" value="Glass"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
        <span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> Glass</span>
         </div>
    </label>

   
    <label class="col-6 col-lg-4 position-relative" style="" >
        <div onclick="myFunction4()" id="z4" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
        <input class="position-absolute " style="opacity: 0;" type="submit" name="dissposeWaste" id="za" value="Clinical"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
        <span style="" class="d-flex justify-content-center align-items-center  w-100 h-100 "> Clinical</span>
         </div>
    </label>
   
    <label class="col-6 col-lg-4 position-relative" style="" >
        <div onclick="myFunction5()" id="z5" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
        <input class="position-absolute " style="opacity: 0;" type="submit" name="dissposeWaste" id="za" value="Other /Unsure"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
        <span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> Other/ Unsure</span>
         </div>
    </label>
       
    
</div>
</div>

<?php if (isset($_POST['dissposeWaste'])) {

    if (empty($_POST['dissposeWaste'])) {

     echo "
     
     <div class='w-100 d-flex justify-content-end px-5 mb-2'>
     <h3> Please Select One The Options </h3>
     
     </div>";
    }

} ?>
</form>
</div> <!-- middle part of form end's here !-->

<div class=" w-100 py-4 " style="background-color: rgb(35, 48, 74);"> <!-- footer of form starts here !-->


</div>  <!-- footer of form end's here !-->




<script>
  
function myFunction() {
  document.getElementById("za").style.backgroundColor =  "#233041";
  document.getElementById("za").style.color = "white";
}

function myFunction1() {
  document.getElementById("z1").style.backgroundColor =  "#233041";
  document.getElementById("z1").style.color = "white";
}

function myFunction2() {
  document.getElementById("z2").style.backgroundColor =  "#233041";
  document.getElementById("z2").style.color = "white";
}

function myFunction3() {
  document.getElementById("z3").style.backgroundColor =  "#233041";
  document.getElementById("z3").style.color = "white";
}

function myFunction4() {
  document.getElementById("z4").style.backgroundColor =  "#233041";
  document.getElementById("z4").style.color = "white";
}

function myFunction5() {
  document.getElementById("z5").style.backgroundColor =  "#233041";   
  document.getElementById("z5").style.color = "white";
}
</script>

</div>  <!--  closing container for the form section -->


<?php }


?>




<?php
function display2 ()
{?>
            <div class="bg-warning w-100  d-flex flex-lg-column flex-row align-items-center justify-content-center"> <!--  container for form section of page-->


             

<div id="a" class="my-5 d-flex flex-column bg-white rounded align-items-center border-better-waste flex-grow-1 flex-lg-grow-0 border border-5 " style=" min-width:60%; " > <!-- wrapper of form starts here !-->
<div style="background-color:rgb(35, 48, 74);" class="py-4 px-md-4 w-100 d-flex justify-content-center  align-items-center">  <!-- header of form starts here !-->


<div class=" d-flex align-items-end order-2 order-lg-1" style="">
<div id="ProgressBar" class="rounded" style="width:300px; height:30px;  overflow: hidden; background-color:white; ">
<div id="progressBarFill" class="h-100 position-relative" style="width:16%; background-color:green; ">  <span id="text" class="position-absolute translate-middle" style="left:260px; top:50%; "> </span></div>
         </div>
         </div>
         <script>

function move(CounterEnd) {
    var CounterEnd;
    var elem = document.getElementById("progressBarFill");
    var percentText = document.getElementById("text");

    var counter = 16;
    var id = setInterval(frame, 100);
    function frame() {
      if (counter >= CounterEnd) {
        clearInterval(id);
     
      } else {
    
        counter++;
        elem.style.width =  counter + '%';
        percentText.innerHTML =  counter;
       console.log(counter);
      }
    }
  }
  move(32);

</script>

</div>   <!-- header of form ends here !-->

<div class="w-100" style=""> <!-- middle section of form starts here !-->
<div class="better-waste-navy-text d-flex align-items-center flex-column px-5 px-sm-0">
<h2 style="">  How often would you like your bins collected? </h2>
</div>
<div class="container mt-3 mb-5 px-3">
<form action="betterwasteform.html.php" method="post">

<div class="row gy-3 ">


<label class="col-6  position-relative" style="" >
<div onclick="myFunction()" id="za" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; !important; border-color:#ddd!important; ">
<input class="position-absolute " style="opacity: 0;" type="submit" name="binCollectionSelection" id="za" value="On Going Collections"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
<span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> On Going Collections</span>
</div>
</label>

<label class="col-6 position-relative" style="" >
<div onclick="myFunction1()" id="z1" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
<input class="position-absolute " style="opacity: 0;" type="submit" name="binCollectionSelection" id="za" value="One Off Collection"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
<span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> One Off Collection</span>
</div>
</label>


</div>
</div>

<?php if (isset($_POST['binCollectionSelection'])) {

if (empty($_POST['binCollectionSelection'])) {

 echo "
 
 <div class='w-100 d-flex justify-content-end px-5 mb-2'>
 <h3> Please Select One The Options </h3>
 
 </div>";
}

} ?>
</form>
</div>   <!-- middle section of form ends here !-->

<div class=" w-100 py-4 " style="background-color: rgb(35, 48, 74);"> <!-- footer of form starts here !-->

</div>  <!--  footer section for form ends here-->
</div>  <!--  wrapper for form  ends here-->

<script>

function myFunction() {
document.getElementById("za").style.backgroundColor =  "#233041";
document.getElementById("za").style.color = "white";
}

function myFunction1() {
document.getElementById("z1").style.backgroundColor =  "#233041";
document.getElementById("z1").style.color = "white";
}


</script>

</div>  <!--  closing container for the form section -->

<?php }


?>


     


<?php
function display3 ()
{?>
<div class="bg-warning w-100  d-flex flex-lg-column flex-row align-items-center justify-content-center"> <!--  container for form section of page-->


             

<div id="a" class="my-5 d-flex flex-column bg-white rounded align-items-center border-better-waste flex-grow-1 flex-lg-grow-0 border border-5 " style=" min-width:60%; " > <!--  wrapper for form starts here-->
<div style="background-color:rgb(35, 48, 74);" class="py-4 px-md-4 w-100 d-flex justify-content-center  align-items-center"> <!--  footer section of form starts here-->


<div class=" d-flex align-items-end order-2 order-lg-1" style="">
<div id="ProgressBar" class="rounded" style="width:300px; height:30px;  overflow: hidden; background-color:white; ">
<div id="progressBarFill" class="h-100 position-relative" style="width:32%; background-color:green; ">  <span id="text" class="position-absolute translate-middle" style="left:260px; top:50%; ">  </span></div>
         </div>
         </div>
         <script>

function move(CounterEnd) {
    var CounterEnd;
    var elem = document.getElementById("progressBarFill");
    var percentText = document.getElementById("text");

    var counter = 32;
    var id = setInterval(frame, 100);
    function frame() {
      if (counter >= CounterEnd) {
        clearInterval(id);
     
      } else {
    
        counter++;
        elem.style.width =  counter + '%';
        percentText.innerHTML =  counter;
       console.log(counter);
      }
    }
  }
  move(48);

</script>

</div> <!--  footer section of form ends here-->

<div class="w-100"> <!--  middle section of form starts here-->
<div class="better-waste-navy-text d-flex align-items-center flex-column">
<h2>  What container size do you need?</h2>
</div>

<div class="container mt-3 mb-5 px-3 ">
<form action="betterwasteform.html.php" method="post">

<div class="row gy-3 ">


<label class="col-6 col-lg-4 position-relative" style="" >
<div onclick="myFunction()" id="za" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; !important; border-color:#ddd!important; ">
<input class="position-absolute " style="opacity: 0;" type="submit" name="containerSize" id="za" value="240L Bin"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
<span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> 240L Bin</span>
</div>
</label>

<label class="col-6 col-lg-4 position-relative" style="" >
<div onclick="myFunction1()" id="z1" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
<input class="position-absolute " style="opacity: 0;" type="submit" name="containerSize" id="za" value="360L Bin"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
<span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> 360L Bin</span>
</div>
</label>


<label class="col-6 col-lg-4 position-relative" style="" >
<div onclick="myFunction2()" id="z2" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
<input class="position-absolute " style="opacity: 0;" type="submit" name="containerSize" id="za" value="660L Bin"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
<span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> 660L Bin</span>
</div>
</label>


<label class="col-6 col-lg-4 position-relative" style="" >
<div onclick="myFunction3()" id="z3" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
<input class="position-absolute " style="opacity: 0;" type="submit" name="containerSize" id="za" value="1100 Bin"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
<span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> 1100 Bin</span>
</div>
</label>


<label class="col-6 col-lg-4 position-relative" style="" >
<div onclick="myFunction4()" id="z4" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
<input class="position-absolute " style="opacity: 0;" type="submit" name="containerSize" id="za" value="Skip/FEL/REL"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
<span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> Skip/FEL/REL</span>
</div>
</label>

<label class="col-6 col-lg-4 position-relative" style="" >
<div onclick="myFunction5()" id="z5" class="border border-1  rounded buttonHover" style="height:80px; background-color:rgb(247, 247, 247); color:#6C757D; border-color:#ddd!important; ">
<input class="position-absolute " style="opacity: 0;" type="submit" name="containerSize" id="za" value="Other/Unsure"   class="buttonHover btn btn-primary btn-lg w-100" style="background-color:rgb(247, 247, 247); color:rgb(108, 117, 125); border: rgb(221, 221, 221);">
<span style="" class="d-flex justify-content-center align-items-center  w-100 h-100"> Other/Unsure</span>
</div>
</label>


</div>
</div>

<?php if (isset($_POST['containerSize'])) {

if (empty($_POST['containerSize'])) {

 echo "
 
 <div class='w-100 d-flex justify-content-end px-5 mb-2'>
 <h3> Please Select One The Options </h3>
 
 </div>";
}

} ?>
</form>
</div>  <!--  middle section of form ends here-->

<div class=" w-100 py-4 " style="background-color: rgb(35, 48, 74);"> <!--  footer section for form starts here-->


</div>  <!--  footer section for form ends here-->
</div>  <!--  wrapper for form  ends here-->
<script>

function myFunction() {
document.getElementById("za").style.backgroundColor =  "#233041";
document.getElementById("za").style.color = "white";
}

function myFunction1() {
document.getElementById("z1").style.backgroundColor =  "#233041";
document.getElementById("z1").style.color = "white";
}

function myFunction2() {
document.getElementById("z2").style.backgroundColor =  "#233041";
document.getElementById("z2").style.color = "white";
}

function myFunction3() {
document.getElementById("z3").style.backgroundColor =  "#233041";
document.getElementById("z3").style.color = "white";
}

function myFunction4() {
document.getElementById("z4").style.backgroundColor =  "#233041";
document.getElementById("z4").style.color = "white";
}

function myFunction5() {
document.getElementById("z5").style.backgroundColor =  "#233041";   
document.getElementById("z5").style.color = "white";
}
</script>

</div>  <!--  closing container for the form section -->


<?php }


?>
      


      <?php
function display4 ()
{?>
  <div class="bg-warning w-100  d-flex flex-lg-column flex-row align-items-center justify-content-center"> <!--  container for form starts here-->


             

<div id="a" class="my-5 d-flex flex-column bg-white rounded align-items-center border-better-waste flex-grow-1 flex-lg-grow-0 border border-5 " style=" min-width:60%; " > <!--  wrapper section of form starts here-->
<div style="background-color:rgb(35, 48, 74);" class="py-4 px-md-4 w-100 d-flex justify-content-center  align-items-center"> <!--  header section of form starts here-->


<div class=" d-flex align-items-end order-2 order-lg-1" style="">
<div id="ProgressBar" class="rounded" style="width:300px; height:30px;  overflow: hidden; background-color:white; ">
<div id="progressBarFill" class="h-100 position-relative" style="width:48%; background-color:green; ">  <span id="text" class="position-absolute translate-middle" style="left:260px; top:50%; ">  </span></div>
         </div>
         </div>
         <script>

function move(CounterEnd) {
    var CounterEnd;
    var elem = document.getElementById("progressBarFill");
    var percentText = document.getElementById("text");

    var counter = 48;
    var id = setInterval(frame, 100);
    function frame() {
      if (counter >= CounterEnd) {
        clearInterval(id);
     
      } else {
    
        counter++;
        elem.style.width =  counter + '%';
        percentText.innerHTML =  counter;
        console.log(counter);
      }
    }
  }
  move(64);

</script>

</div> <!--  header section of form ends here-->

<div class="my-5 my-md-0 w-100 better-waste-navy-text d-flex align-items-center justify-content-center flex-column"> <!--  middle section of form starts here-->
  
<div class="">

<h2>  Your company details </h2>
</div>


<div class="mt-3 mb-5 w-50">
<form action="betterwasteform.html.php" method="post">
<div class="d-flex flex-column" style="">

<label class="" style="" > Company Name * </label>
<input type="text" class=" rounded border-5 border border-better-waste py-2" style=""  name="compannyName" id="za" value="<?php if (isset($_SESSION['compannyName']))
{ echo $_SESSION['compannyName']; }?>" >




<label class="" style="" > Postcode <span class="d-none d-xl-block" > - Please enter your postcode INCLUDING the space to enable us to locate potential suppliers for you * </label>
<input type="text" class="rounded border-5 border border-better-waste py-2" style=""  name="compannyPostCode" id="za" value="<?php if (isset($_SESSION['compannyName']))
{ echo $_SESSION['compannyPostCode']; }?>" >



</div>

</div>

<?php if (isset($_POST['stepfive'])) {

if (empty($_POST['compannyName'])) {

 echo "
 
 <div class='w-100 px-5 mb-2'>
 <h5> Please Enter your companny name  </h5>
 
 </div>";
}


if (empty($_POST['compannyPostCode'])) {

    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> Please Enter your companny post code </h5>
    
    </div>";
   }

   if(is_numeric($_POST['compannyName'])){ 
    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> Please Enter a text value for the Companny Name </h5>
    
    </div>";

   }


   if( strlen($_POST['compannyPostCode']) <5)
   {

    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> post code is too short please enter post code in correctly   </h5>
    
    </div>";
   }

   if( strlen($_POST['compannyPostCode']) >7)
   {

    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> post code is too long please enter a valid post  </h5>
    
    </div>";
   }
} ?>

</div> <!--  middle section of form ends here-->

<div class=" w-100 py-2 d-flex justify-content-end px-3 " style="background-color: rgb(35, 48, 74);"> <!--  footer section of form starts here-->
<button style="background-color: #12a19a;"  name="stepfive"  type="submit" class="btn btn-lg text-white">Continue</button>
</form>

</div> <!--  footer section of form ends here-->
</div> <!--  wrapper of form ends here-->

<script>

function myFunction() {
document.getElementById("za").style.backgroundColor =  "#233041";
document.getElementById("za").style.color = "white";
}

function myFunction1() {
document.getElementById("z1").style.backgroundColor =  "#233041";
document.getElementById("z1").style.color = "white";
}


</script>

</div>  <!--  closing container of the form -->



<?php }


?>

   

      <?php
function display5 ()
{?>
     
     <div class="bg-warning w-100  d-flex flex-lg-column flex-row align-items-center justify-content-center"> <!--  container for form section of page-->


             

<div id="a" class="my-5 d-flex flex-column bg-white rounded align-items-center border-better-waste flex-grow-1 flex-lg-grow-0 border border-5 " style=" min-width:60%; " > <!--  wrapper of the form  starts here -->
<div style="background-color:rgb(35, 48, 74);" class="py-4 px-md-4 w-100 d-flex justify-content-center  align-items-center"> <!--  header of form starts here -->


<div class=" d-flex align-items-end order-2 order-lg-1" style="">
<div id="ProgressBar" class="rounded" style="width:300px; height:30px;  overflow: hidden; background-color:white; ">
<div id="progressBarFill" class="h-100 position-relative" style="width:64%; background-color:green; ">  <span id="text" class="position-absolute translate-middle" style="left:260px; top:50%; ">  </span></div>
         </div>
         </div>
         <script>

function move(CounterEnd) {
    var CounterEnd;
    var elem = document.getElementById("progressBarFill");
    var percentText = document.getElementById("text");

    var counter = 64;
    var id = setInterval(frame, 100);
    function frame() {
      if (counter >= CounterEnd) {
        clearInterval(id);
     
      } else {
    
        counter++;
        elem.style.width =  counter + '%';
        percentText.innerHTML =  counter;
        console.log(counter);
      }
    }
  }
  move(80);

</script>

</div> <!--  header of form ends here -->


<div class="my-5 my-md-0 w-100 better-waste-navy-text d-flex align-items-center justify-content-center flex-column">  <!--  middle section of form starts here -->
<div class="">

<h2>  Your personal details </h2>
</div>

<div class=" mt-3 mb-5 w-50">
<form action="betterwasteform.html.php" method="post" class="">
<div class="d-flex flex-column" style="">

<label class="" style="" > First Name * </label>

<input type="text" class="rounded border-5 border border-better-waste py-2" style=""  name="firstName" id="za" value="<?php if (isset($_SESSION['firstName']))
{ echo $_SESSION['firstName']; }?>" >




<label class="" style="" >Last Name </label>

<input type="text" class="rounded border-5 border border-better-waste py-2" style=""  name="lastName" id="za" value="<?php if (isset($_SESSION['LastName']))
{ echo $_SESSION['LastName']; }?>" >


</div>

</div>

<!-- php code that will executed after the form is submmited !-->
<?php if (isset($_POST['stepsix'])) {

if (empty($_POST['firstName'])) {

 echo "
 
 <div class='w-100 px-5 mb-2'>
 <h5> Please Enter your fisrt name  </h5>
 
 </div>";
}


if (empty($_POST['lastName'])) {

    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> Please Enter your last name </h5>
    
    </div>";
   }

   if(is_numeric($_POST['firstName'])){ 
    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> Please Enter a text value for your first Name </h5>
    
    </div>";

   }

   if(is_numeric($_POST['lastName'])){ 
    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> Please Enter a text value for your Last Name </h5>
    
    </div>";

   }
   
  
} ?>

</div>  <!--  middle section of form ends here -->


<div class=" w-100 py-2 d-flex justify-content-end px-3 " style="background-color: rgb(35, 48, 74);">  <!--  footer of form starts here -->
<button style="background-color: #12a19a;"  name="stepsix"  type="submit" class="btn btn-lg text-white">Continue</button>
</form>


</div>  <!--  footer of form ends here -->
</div>  <!--  wrapper of form ends here -->

<script>

function myFunction() {
document.getElementById("za").style.backgroundColor =  "#233041";
document.getElementById("za").style.color = "white";
}

function myFunction1() {
document.getElementById("z1").style.backgroundColor =  "#233041";
document.getElementById("z1").style.color = "white";
}


</script>

</div>  <!--  closing container for the form section -->


<?php }


?>

 

   <?php
function display6 ()
      
{?>



<div class="bg-warning w-100  d-flex flex-lg-column flex-row align-items-center justify-content-center"> <!--  container for form section of page-->


             

<div id="a" class="my-5 d-flex flex-column bg-white rounded align-items-center border-better-waste flex-grow-1 flex-lg-grow-0 border border-5 " style=" min-width:60%; " >  <!--  wrapper of form starts here -->
<div style="background-color:rgb(35, 48, 74);" class="py-4 px-md-4 w-100 d-flex justify-content-center  align-items-center">  <!--  header of form starts here -->


<div class="d-flex align-items-end order-2 order-lg-1" style="">
<div id="ProgressBar" class="rounded" style="width:300px; height:30px;  overflow: hidden; background-color:white; ">
<div id="progressBarFill" class="h-100 position-relative" style="width:80%; background-color:green;">  <span id="text" class="position-absolute translate-middle" style="left:260px; top:50%; "> </span></div>
         </div>
         </div>
         <script>

function move(CounterEnd) {
    var CounterEnd;
    var elem = document.getElementById("progressBarFill");
    var percentText = document.getElementById("text");

    var counter = 80;
    var id = setInterval(frame, 100);
    function frame() {
      if (counter >= CounterEnd) {
        clearInterval(id);
     
      } else {
    
        counter++;
        elem.style.width =  counter + '%';
        percentText.innerHTML =  counter;
        console.log(counter);
      }
    }
  }
  move(96);

</script>

</div>  <!--  header of form ends here -->

<div class="my-5 my-md-0 w-100 better-waste-navy-text d-flex align-items-center justify-content-center flex-column">  <!--  middle section of form starts here -->

<div class="">

<h2>  Your contact details </h2>
</div>

<div class="mt-3 mb-5 w-50">
<form action="betterwasteform.html.php" method="post" class="">
<div class="d-flex flex-column" style="">

<label class="" style="" > Phone Number </label>
<input type="text" class="rounded border-5 border border-better-waste py-2" style=""  name="PhoneNumber" id="za" value="<?php if (isset($_SESSION['PhoneNumber']))
{ echo $_SESSION['PhoneNumber']; } ?>" >




<label class="" style="" > Email Address </label>
<input type="text" class="rounded border-5 border border-better-waste py-2" style=""  name="EmailAddress" id="za" value="<?php if (isset($_SESSION['EmailAddress']))
{ echo $_SESSION['EmailAddress']; }?>" >



</div>

</div>

<?php if (isset($_POST['stepseven'])) {

if (empty($_POST['PhoneNumber'])) {

 echo "
 
 <div class='w-100 px-5 mb-2'>
 <h5> Please Enter Your Phone Number  </h5>
 
 </div>";
}


if (empty($_POST['EmailAddress'])) {

    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> Please Enter Your Email Address </h5>
    
    </div>";
   }

   if(!is_numeric($_POST['PhoneNumber'])){
    echo "
    
    <div class='w-100 px-5 mb-2'>
    <h5> Please Enter Your Phone Number In a numerical value </h5>
    
    </div>";   
  }


  if( strlen($_POST['PhoneNumber']) <=11)
  {

   echo "
   
   <div class='w-100 px-5 mb-2'>
   <h5>The Phone Number you have entered Is Too short please enter you're phone number with a mininum of 11 digits  </h5>
   </div>";
  }
  
  if( strlen($_POST['PhoneNumber']) >12)

  {

   echo "
   
   <div class='w-100 px-5 mb-2'>
   <h5> The Phone Number Is Too long please enter you're phone number with a mininum of 11 digits  </h5>
   </div>";
  }

  if (filter_var($_POST['EmailAddress'], FILTER_VALIDATE_EMAIL)) { 

  }

  else {
    echo " 
    
    <div class='w-100 px-5 mb-2'>
    <h5> Please Enter Your Email Address In a valid format </h5>  
    </div>";   
  }
} ?>

</div>  <!--  middle section of form ends here -->

<div class=" w-100 py-2 d-flex justify-content-end px-3 " style="background-color: rgb(35, 48, 74);">  <!--  footer of form starts here -->
<button style="background-color: #12a19a;"  name="stepseven"  type="submit" class="btn btn-lg text-white">Continue</button>
</form>

</div>   <!--  footer of form ends here -->
</div>  <!--  wrapper of form ends here -->


<script>

function myFunction() {
document.getElementById("za").style.backgroundColor =  "#233041";
document.getElementById("za").style.color = "white";
}

function myFunction1() {
document.getElementById("z1").style.backgroundColor =  "#233041";
document.getElementById("z1").style.color = "white";
}


</script>

</div>  <!--  closing container for the form section -->


<?php }


?>

<?php
function display7 ()
           
{?>


<div class="my-5 bg-warning w-100  d-flex flex-lg-column flex-row align-items-center justify-content-center"> <!--  container for form section of page-->


             

<div id="a" class="my-5 d-flex flex-column bg-white rounded align-items-center border-better-waste flex-grow-1 flex-lg-grow-0 border border-5 " style=" min-width:60%; " >
<div style="background-color:rgb(35, 48, 74);" class="py-4 px-md-4 w-100 d-flex justify-content-center  align-items-center"> 


<div class=" d-flex align-items-end order-2 order-lg-1" style="">
<div id="ProgressBar" class="rounded" style="width:300px; height:30px;  overflow: hidden; background-color:white; ">
<div id="progressBarFill" class="h-100 position-relative" style="width:11%; background-color:green; transition:2s;">  <span class="position-absolute translate-middle" style="left:260px; top:50%; "> 100% </span></div>
         </div>
         </div>
         <script>
 function ProgressBarWidth (value){
    
    document.getElementById("progressBarFill").style.width=`${value}%`;
    document.getElementById("textd").style.innerHTML=`${value}%`;
 }


 ProgressBarWidth(100);

</script>

</div>
<div class="better-waste-navy-text d-flex align-items-center flex-column py-5  px-5 px-md-0" style="">
<h1>  thank you for filling out the form <?php echo htmlspecialchars($_SESSION['firstName']); session_destroy();?></h1> 
<h2>  A Member of our team will be in touch shortly! </h2>

</div>


</div>
</div>
</div>

</div>  <!--  closing container for the form section -->


<?php }


?>


</body>

</html>
