<?php

session_start();
$con = mysqli_connect('localhost', 'root', '', 'studentpanel');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['save_excel_data'])) { // $_POST instead of $_post
    $fileName = $_FILES['import_file']['name']; // $_FILES instead of $_Files
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name']; // $_FILES instead of $_Files

        /** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $row) {
            $fullName = $row['0'];
            $email = $row['1'];
            $phone = $row['2'];
            $course = $row['3'];
            $studentQuery = "INSERT INTO students (fullname, email, phone, course) VALUES ('$fullName', '$email', '$phone', '$course')";


            $result = mysqli_query($con, $studentQuery);
            $msg = true;
        }
        if (isset($msg)) {
            $_SESSION['message'] = "Successfully imported";
            header('location: index.php');
            exit(0);
        }
        $_SESSION['message'] = "Not imported";
        header('location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Invalid file";
        header('location: index.php');
        exit(0);
    }
}
