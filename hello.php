<?php
include_once 'config.php';

//print_r($_SESSION);die;

if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    //unset($_SESSION['sessData']['status']);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>SWARZIE</title>
    <style>
      h1 {
    text-align: center;
}
h2 {
    text-align: center;
}
 .gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #42B32F;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #42B32F;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}
   .column {
  float: left;
 width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
 .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:transparent;
   color: black;
   text-align: center;
}     
     
    </style>
  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
 <a class=>
    <img src="images/bull.png" width="30" height="30" alt="" loading="lazy">
  </a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        </a>
      </li>
      <li class="nav-item">
        </a>
      </li>
       <li class="nav-item">
       </a>
    
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
        <form class="form-inline my-2 my-lg-0">
      <a href="profile.php" class="profile">Profile</a>
    </form> 
 <form class="form-inline my-2 my-lg-0">
      <a href="useaccount.php?logoutSubmit=1" class="logout">Logout</a>
    </form>
  </div>
</nav>
    
       
        <h1>Swarzie</h1>
        <h2>Game Categories</h2>
        
    <div class="row">
  <div class="column">
    <a href="#">
    <img src="images/educate.jpg" alt="Snow" style="width:60%">
     </a> 
  </div>
  <div class="column">
    <a href="#">
    <img src="images/action.jpg" alt="Forest" style="width:60%">
      </a> 
  </div>
  <div class="column">
    <a href="#">
    <img src="images/advent.jpg" alt="Mountains" style="width:60%">
      </a> 
  </div>
</div>
  <div class="row">
  <div class="column">
    <a href="#">
    <img src="images/sport.jpg" alt="Snow" style="width:60%">
      </a> 
  </div>
  <div class="column">
    <a href="#">
    <img src="images/rolep.jpg" alt="Forest" style="width:60%">
      </a> 
  </div>
  <div class="column">
    <a href="#">
    <img src="images/simulate.jpg" alt="Mountains" style="width:60%">
      </a> 
  </div>
</div>         

 
 <div class="footer">
  <p><br><a href="about.php">About</a></br>© 2020 Tinico Enterprises.  All rights reserved.</p>
</div> 
    
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <script src="js/bootstrap.min.js" type="text/javascript" rel="script"></script>
<script src="https://ajax.googleapis.com..."></script>
<script src="js/jquery-1.11.3.min.js" type="text/javascript" rel="script"></script>
         <script>
        $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>                  
        </body>
</html>
