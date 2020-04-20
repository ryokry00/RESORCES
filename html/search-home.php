<!DOCTYPE html>
<html　lang="en">
<head>
<meta charset="UTF-8">
<meta name="keywords"content="AFFIX WORKS,KIKOKOSTADINOV,EYTYS,KAIKO,ADER ERROR">
<meta name="description" content="JUST ONLY FOR FINDING SELECT SHOP IN TOKYO">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/search-home.css">

  <title>TOB TOKYO OUTFIT BASE</title>
</head>
<body>
<?php
$brandnameErr=$locationnameErr="";
$brandname=$locationname="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["brandname"])){
    $brandnameErr="BrandName is required";
  }else{
    $brandname=test_input($_POST["brandname"]);

    if(!preg_match('/[a-zA-Z_0-9 ]/',$brandname)){
      $brandErr="Only letters and white space and 0~9 allowed";
    }
  }
  if(empty($_POST["locationname"])){
    $locationnameErr="LocationName is required";
  }else{
    $locationname=test_input($_POST["locationname"]);

    if(!preg_match('/[a-zA-Z_0-9 ]/',$locationname)){
      $locationnameErr="Only letters and white space and 0~9 allowed";
    }
  }
}

function test_input($data){
  $data=trim($data);
  $data=stripcslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
?>


<header class="page-header wrapper">
  <ul class="toplogo">
    <li><a href="index.html"><img src="images/toblogo.png" alt="TOB home"></a></li>
  </ul>

  <h1><a href="index.html"><img class="headlogo" src="images/headlogo.png" alt="TOKYO OUTFIT BASE"></a></h1>
  <nav>
    <ul class="main-nav">
    <li><a href="search-home.html"><img class="menulogo" src="images/searchhome-logo.png" alt="Search Form"></a></li>
      <li><a href="location-home.html"><img class="menulogo" src="images/locationlogo.png" alt="from location"></a></li>
        <li><a href="brand-home.html"><img class="menulogo" src="images/brandlogo.png" alt="from brand"></a></li>
      </ul>
    </nav>
</header>
<main>
  <form action="result.html">
  <div class="searchformat wrapper">
   <ul class="searchformat-brand">

   <li><img class="searchformat-brandlogo" src="images/search-brand.png" alt="SearchForm-brand"></li>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <li>
      <input id="search-input" placeholder="1つキーワードを入力" type="text" name="searchbrand-key" value="<?php echo $brandname;?>">
      <span class="error">*<?php echo $brandnameErr;?></span>
      <input id="search-buttom" type="submit" value="Submit">
    </form>
         </li>
  </ul>
  <ul class="searchformat-location">
    <li><img class="searchformat-brandlogo" src="images/search-location.png" alt="SearchForm-location"></li>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <li>
      <input type="radio" name="locationname" <?php if(isset($locationname)&&$locationname=="daikanyama")echo "checked";?> value="daikanyama">DAIKANYAMA
      <input type="radio" name="locationname" <?php if(isset($locationname)&&$locationname=="harajuku")echo "checked";?> value="harajuku">HARAJUKU
      <input type="radio" name="locationname" <?php if(isset($locationname)&&$locationname=="nakameguro")echo "checked";?> value="nakameguro">NAKAMEGURO
      <input type="radio" name="locationname" <?php if(isset($locationname)&&$locationname=="shibuya")echo "checked";?> value="shibuya">SHIBUYA
      <input type="radio" name="locationname" <?php if(isset($locationname)&&$locationname=="shinjuku")echo "checked";?> value="shinjuku">SHINJUKU
      <span class="error">*<?php echo $locationnameErr;?></span>
      <input id="search-buttom" class="fas" type="submit" value="Submit">
    </form>
      </li>
  </ul>
  </div>
  <?php
  echo "<h6>INPUT</h6>";
  echo $brandname;
  echo "<br>"
  echo $locationname;
   ?>
</main>
</body>
</html>
