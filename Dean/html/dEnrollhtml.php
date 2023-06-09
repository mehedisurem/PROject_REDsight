<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSSFolder/dSidebar.css">
  <link rel="stylesheet" href="../CSSFolder/dEnrollmenent.css">
  <link rel="stylesheet" href="../CSSFolder/mainHome.css">
  <link rel="stylesheet" href="../CSSFolder/searchbarFrom.css">
  <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>

</head>

<body>
  <!-- Importing Sidebar From html/dSidebarhtml.php -->
  <?php include('dSidebarhtml.php') ?>
  <section class="LogoSPRM">
    <div class="sprm">SPRM</div>

    <div class="searchDiv">
      <form method="POST">
        <p>Year:</p>
        <select name="year">
          <option value="2020" selected>2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
        </select>
        <p>Semester:</p>
        <select name="semester">
          <option value="Spring" selected>Spring</option>
          <option value="Summer">Summer</option>
          <option value="Autumn">Autumn</option>

        </select>
        <button type="submit"><img src="../img/search.png" alt="S"></button>
      </form>
    </div>
  </section>
  <section class="mainHome">

    <div style="width:80vw;  margin-top:20px;">
      <h1
        style="margin-left: 28vw !important;font-size: 30px !important;font-weight: 900 !important;color: var(--text-color) !important;font-family:'Poppins', sans-serif !important;padding: 12px 60px !important; width:40vw">
        School Wise Enrollment </h1>
      <canvas id="piechart" class="pieChart" width="400" height="400"
        style="margin-left:30vw; background-color:#E4E9F7!important;"></canvas>
        <h1 style="margin-left: 18vw !important;font-size: 28px !important;font-weight: 500 !important;color: var(--text-color) !important;font-family:'Poppins', sans-serif !important;padding: 12px 20px !important; width:60vw" id="SchoolStats"></h1>

    </div>
    <div class="PDdiv">
      <div class="PDdivD1">
        <h1 class="titleTxt"> Department Wise Enrollment </h1>
        <canvas id="Deptchart" class="pieChart" width="400" height="400"
          style="margin-left:8vw!important;background-color:#E4E9F7!important;"></canvas>
          <h1 class="titleTxt" style="font-size: 28px !important;font-weight: 500 !important;"  id="DeptStats"></h1>
      </div>
      <div class="PDdivP1">
        <h1 class="titleTxt"> Program Wise Enrollment </h1>
        <canvas id="Programchart" class="pieChart" width="400" height="400"
          style="margin-left:8vw!important;background-color:#E4E9F7!important;"></canvas>
          <h1 class="titleTxt" style="font-size: 28px !important;font-weight: 500 !important;" id="ProgramStas"></h1>
      </div>
    </div>
  </section>
  <script src="../JSFolder/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>
<?php 
  require_once(__DIR__ . "/../../Includes/connection.php");
  include('../PHP/dEnrollment.php'); 

?>