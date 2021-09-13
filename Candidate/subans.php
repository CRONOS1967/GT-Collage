
<?php
session_start();
require_once '../Backend/Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$data = array();
$data[0] = null;
$data[1] = 0;
$data[2] = $_SESSION['exid'];
$data[3] = $_SESSION['en'];
# code...
$q = "SELECT * FROM Exams join Questions on idExams = Exams_idExams where idExams =" . $_SESSION['exid'] . " ";
$ques = mysqli_query($conn, $q) or die(mysqli_error($conn));
while ($res = mysqli_fetch_assoc($ques)) {
  $q = strval($res['idQuestions']);
  if (isset($_POST["ans" . $q])) {
    if ($_POST[$q] == $res['idQuestions']) {
      # code...
      if ($_POST["ans" . $q] == $res['Answer']) {
        # code...
        $data[1]++;
      }
    }
  }
}
$obj->setAttrs($conn, 'Results', $data);
$obj->insert();
$q = "UPDATE `exam_enrols` SET `Status`='taken' WHERE `Candidates_idCandidates`='" . $_SESSION['en'] . "' and `Exams_idExams`='" . $_SESSION['exid'] . "'";
mysqli_query($conn, $q);
echo '<script>alert("You have taken the test")</script>';
echo '
    <script>
      location.replace("result.php")

    </script>';
?>