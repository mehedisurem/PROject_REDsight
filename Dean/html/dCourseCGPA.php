<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSSFolder/dSidebar.css">
  <link rel="stylesheet" href="../CSSFolder/mainHome.css">
  <link rel="stylesheet" href="../CSSFolder/courseTrend.css">
  <link rel="stylesheet" href="../CSSFolder/searchbarFrom.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- <link rel="stylesheet" href="../CSSFolder/dEnrollment.css"> -->

  </script>
</head>

<body>
  <?php include('dSidebarhtml.php') ?>
  <section class="LogoSPRM">
    <div class="sprm">SPRM</div>
    <div class="searchDiv">
      <div class="searchDiv">
        <form method="POST">
          <p>Course ID:</p>
          <input type="text" name="course" placeholder="Ex: CSC101">
          <p>Year:</p>
          <select name="year">
            <option value="2020" selected>2020</option>
            <option value="2021">2021</option>
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
    <h2 class="show-text-center"> Course trend</h2>
    <canvas id="linechart" class="pieChart" style="margin-left:33vw; background-color:#E4E9F7!important;"></canvas>

    <h1 style="margin-left: 18vw !important;font-size: 28px !important;font-weight: 500 !important;color: var(--text-color) !important;font-family:'Poppins', sans-serif !important;padding: 12px 20px !important; width:60vw" id="status"></h1>
  </section>
  <script src="../JSFolder/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>

</html>
<?php
require_once(__DIR__ . "/../../Includes/connection.php");
include('../PHP/dCourseCGPAchart.php');

?>