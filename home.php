<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Mercedes-benz</title>
  <link rel="stylesheet" href="home.css">
</head>

<body style="background-image: url(resources/DSC_0223.jpg); background-size: 105%; ">

  <?php
  session_start();
  $userName = $_SESSION['Name'];

  ?>

  <div>
    <center>
      <h3 style="font-size: 55px; font-family: 'Times New Roman', Times, serif; color:white; padding-top: 10px;padding-bottom: 10px;">
        <b>YOUR MERCEDES-BENZ</b>
      </h3>
      <p style="font-size: 25px;font-family: 'Times New Roman', Times, serif;color:white;">
        Hello, <?php echo "$userName" ?>
      </p>

      <div>
        <div style="font-size: 18px; font-family: 'Times New Roman' , Times, serif; color:white; display:inline-flex;padding-bottom: 20px;">

          <div style="padding-left: 100px; padding-right: 100px; ">
            <p style="padding-bottom: 10px;">Your Mercedes-Benz Profile</p>
            <button class="btn" onclick="ListProf()"> Profile Details
            </button>
          </div>

          <div style="padding-left: 100px; padding-right: 100px">
            <p style="padding-bottom: 10px;">Purchase a New Mercedes</p>
            <button class="btn" onclick="shop()">Shop A Mercedes</button>
          </div>

          <!-- <div style="padding-left: 100px; padding-right: 100px">
            <p style="padding-bottom: 10px;">Tack Your Orders</p>
            <button class="btn" onclick="shop()">Check Orders</button>
          </div> -->
        </div>
      </div>

      <div style="padding-top:30px;font-size: 18px; font-family: 'Times New Roman', Times, serif; color:white;" id="ajaxDiv">
      </div>

      <div style="padding-top:30px;font-size: 18px; font-family: 'Times New Roman', Times, serif; color:white;" id="ajaxDiv2">
      </div>

      <div style="padding-top:30px;padding-bottom: 30px;font-size: 18px; font-family: 'Times New Roman', Times, serif; color:white;" id="ajaxDiv3">
      </div>
  </div>

  </center>
  </div>
</body>


<script>
  function ListProf() {
    let ajaxRequest = new XMLHttpRequest();
    ajaxRequest.onreadystatechange = function() {
      if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
        document.getElementById("ajaxDiv").innerHTML = ajaxRequest.responseText;
        document.getElementById("ajaxDiv2").innerHTML = "";
        document.getElementById("ajaxDiv3").innerHTML = "";
      }
    }

    ajaxRequest.open("GET", "listdetails.php", true);
    ajaxRequest.send();

  }

  function Edit() {
    let ajaxRequest = new XMLHttpRequest();
    ajaxRequest.onreadystatechange = function() {
      if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
        document.getElementById("ajaxDiv2").innerHTML = ajaxRequest.responseText;
      }
    }

    ajaxRequest.open("GET", "editprofile.php", true);
    ajaxRequest.send();

  }

  function Update() {

    let name = document.getElementsByName("Name")[0].value;
    let Numb = document.getElementsByName("Phone")[0].value;
    let Email = document.getElementsByName("Email")[0].value;
    let Pass = document.getElementsByName("Pass")[0].value;
    let Address = document.getElementsByName("address")[0].value;
    let BillInfo = document.getElementsByName("CardNumb")[0].value;
    let code = document.getElementsByName("Code")[0].value;

    let ajaxRequest = new XMLHttpRequest();
    ajaxRequest.onreadystatechange = function() {
      if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
        document.getElementById("ajaxDiv").innerHTML = "";
        document.getElementById("ajaxDiv2").innerHTML = "";
      }
    }

    console.log(name);
    console.log(Numb);
    console.log(Email);
    console.log(Pass);
    console.log(Address);
    console.log(BillInfo);
    console.log(code);

    
    let url = "update.php?name=" + encodeURIComponent(name) + "&phone=" + encodeURIComponent(Numb) + "&email=" + Email + "&pass=" + encodeURIComponent(Pass) + "&address=" + encodeURIComponent(Address) + "&card=" + encodeURIComponent(BillInfo) + "&code=" + encodeURIComponent(code);
    console.log(url);
    ajaxRequest.open("GET", url, true);
    ajaxRequest.send();
    console.log(ajaxRequest.responseText);

  }

  function shop() {
    let ajaxRequest = new XMLHttpRequest();
    ajaxRequest.onreadystatechange = function() {
      if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
        document.getElementById("ajaxDiv").innerHTML = ajaxRequest.responseText;
        document.getElementById("ajaxDiv2").innerHTML = "";
        document.getElementById("ajaxDiv3").innerHTML = "";

      }
    }

    ajaxRequest.open("GET", "shop.php", true);
    ajaxRequest.send();

  }

  function selectTrim() {
    var select = document.getElementById("select");
    var Modelvalue = select.value;

    let ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function() {
      if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
        document.getElementById("ajaxDiv2").innerHTML = ajaxRequest.responseText;
        document.getElementById("ajaxDiv3").innerHTML = "";
      }
    }

    ajaxRequest.open("GET", "SelectTrim.php?model=" + encodeURIComponent(Modelvalue), true);
    ajaxRequest.send();
  }

  function order() {
    var model = document.getElementById("select");
    var Modelvalue = model.value;

    var Trim = document.getElementById("Select");
    var Trimvalue = Trim.value;

    let ajaxRequest = new XMLHttpRequest();

    ajaxRequest.onreadystatechange = function() {
      if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
        document.getElementById("ajaxDiv3").innerHTML = ajaxRequest.responseText;
      }
    }

    ajaxRequest.open("GET", "Order.php?trim=" + encodeURIComponent(Trimvalue) + "&model=" + encodeURIComponent(Modelvalue), true);
    ajaxRequest.send();
  }

  function PlaceOrder() {

    var model = document.getElementById("select");
    var Modelvalue = model.value;

    var Trim = document.getElementById("Select");
    var Trimvalue = Trim.value;

    let ajaxRequest = new XMLHttpRequest();
    ajaxRequest.onreadystatechange = function() {
      if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
        document.getElementById("ajaxDiv").innerHTML = "Thank You For Your Order";
        document.getElementById("ajaxDiv2").innerHTML = "";
        document.getElementById("ajaxDiv3").innerHTML = "";

      }
    }
    
    let url2 = "insertorder.php?trim=" + encodeURIComponent(Trimvalue) + "&model=" + encodeURIComponent(Modelvalue);
    console.log(url2);
    ajaxRequest.open("GET", url2 , true);
    ajaxRequest.send();

  }
</script>

</html>