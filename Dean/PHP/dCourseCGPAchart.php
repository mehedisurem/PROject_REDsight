<?php
require_once(__DIR__ . "/../../Includes/connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $year = $_POST['year'];
  $semester = $_POST['semester'];
  $course = $_POST['course'];

  $sql = "SELECT 
grade_table.grade,
COUNT(student.StudentID) AS num_students
FROM (
SELECT DISTINCT 
  CASE 
    WHEN en.GradeMarks > 90 THEN 4.0
    WHEN en.GradeMarks > 85 THEN 3.7
    WHEN en.GradeMarks > 80 THEN 3.3
    WHEN en.GradeMarks > 75 THEN 3.0
    WHEN en.GradeMarks > 70 THEN 2.7
    WHEN en.GradeMarks > 65 THEN 2.3
    WHEN en.GradeMarks > 60 THEN 2.0
    WHEN en.GradeMarks > 55 THEN 1.7
    WHEN en.GradeMarks > 50 THEN 1.3
    WHEN en.GradeMarks > 45 THEN 1.0
    ELSE 0
  END AS grade
FROM enrollment en
CROSS JOIN (
  SELECT 0.0 AS grade UNION
  SELECT 1.0 UNION SELECT 1.3 UNION SELECT 1.7 UNION SELECT 2.0 UNION
  SELECT 2.3 UNION SELECT 2.7 UNION SELECT 3.0 UNION SELECT 3.3 UNION
  SELECT 3.7 UNION SELECT 4.0
) AS grade_values
) AS grade_table
LEFT JOIN (
SELECT 
  st.StudentID,
  CASE 
    WHEN en.GradeMarks > 90 THEN 4.0
    WHEN en.GradeMarks > 85 THEN 3.7
    WHEN en.GradeMarks > 80 THEN 3.3
    WHEN en.GradeMarks > 75 THEN 3.0
    WHEN en.GradeMarks > 70 THEN 2.7
    WHEN en.GradeMarks > 65 THEN 2.3
    WHEN en.GradeMarks > 60 THEN 2.0
    WHEN en.GradeMarks > 55 THEN 1.7
    WHEN en.GradeMarks > 50 THEN 1.3
    WHEN en.GradeMarks > 45 THEN 1.0
    ELSE 0
  END AS grade
FROM student st 
JOIN registration r ON r.StudentID = st.StudentID 
JOIN enrollment en ON en.RegistrationID = r.RegistrationID
JOIN section sc ON sc.SectionID = en.SectionID
WHERE AdmissionYear = '$year' AND AdmissionSemester = '$semester' AND sc.CourseID= '$course'
) AS student
ON grade_table.grade = student.grade
GROUP BY grade_table.grade
ORDER BY grade_table.grade DESC
";
  if ($result = $conn->query($sql)) {
    $data = array();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      $json_data = json_encode($data);
      echo '<style>
        #linechart {
          width: 500px !important;
          height: 400px !important;
        }
      </style>
      <script>
        var ctx = document.getElementById("linechart").getContext("2d");
        var data = {
          labels: [';
      foreach ($data as $row) {
        echo '"' . $row['grade'] . '", ';
      }
      echo '],
        datasets: [{
          label: "Number of Students",
          data: [';
      foreach ($data as $row) {
        echo $row['num_students'] . ', ';
      }
      echo '],
          backgroundColor: "rgba(255, 99, 132, 0.2)",
          borderColor: "rgba(255, 99, 132, 1)",
          borderWidth: 1
        }]
        };
        var options = {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        };
        var myLineChart = new Chart(ctx, {
          type: "line",
          data: data,
          options: options
        });
      </script>';

      echo "<script>console.log(" . json_encode($data) . ");</script>";
    } else {
      $NewTxt = "No Record available for course: $course year: $year and semester: $semester! Try 'CSE104' year: '2020' and semester: 'Autumn' instead";
      echo '<script>var myText = "' . $NewTxt . '"; document.getElementById("status").innerHTML = myText;</script>';
    }

    // $conn->close();


  }
}
