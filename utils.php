<?php
include('koneksi.php');

function updateProfile($id, $username, $nama, $profil)
{
  global $con;

  mysqli_query($con, "UPDATE profile SET nama = '$nama', username = '$username', profile = '$profil' WHERE id = $id");
}

function getHistory($userId, $historyCount = 20)
{
  global $con;

  $result = mysqli_query($con, "SELECT * FROM history WHERE id_user = $userId ORDER BY id DESC LIMIT $historyCount");

  $history = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $history[] = $row;
  }

  return $history;
}

function getProfile($id)
{
  global $con;

  $result = mysqli_query($con, "SELECT * FROM profile WHERE id = $id");

  return mysqli_fetch_assoc($result);
}

function getProfilePicts()
{
  $pictDir = 'img/profile-pict/';
  $allFiles = scandir($pictDir);
  $strip = array_diff($allFiles, array('.', '..'));
  return array_values($strip);
}

function pushHistory($userId, $point, $finishTime)
{
  global $con;

  mysqli_query($con, "INSERT INTO history (id_user, point, finish_time) VALUES ($userId, $point, '$finishTime')");
}

function getExp($id)
{
  global $con;
  // $exp = mysqli_query($con, "SELECT exp FROM profile WHERE id = $id");
  $exp = mysqli_query($con, "SELECT SUM(point) AS exp FROM history WHERE id_user = $id");
  return intval(mysqli_fetch_assoc($exp)['exp']);
}

function getCorrectAnswersCount($answers)
{
  global $con;

  $correctAnswersCount = 0;
  foreach ($answers as $answer) {
    $id = $answer['questionId'];
    $answer = $answer['answer'];
    $correctAnswers = mysqli_query($con, "SELECT is_correct FROM question WHERE id_question = $id");
    $correctAnswers = mysqli_fetch_assoc($correctAnswers)['is_correct'];

    if ($correctAnswers === $answer) $correctAnswersCount++;
  }

  return $correctAnswersCount;
}

function getHistoryCount($finishTime)
{
  global $con;

  $historyCount = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS jumlah_baris FROM history WHERE finish_time='$finishTime'"))['jumlah_baris'];

  return intval($historyCount);
}

// enum of roles
const ADMIN = 'admin';
const USER = 'user';
const ROLES = [ADMIN, USER];
