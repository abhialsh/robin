<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$admin_id = $_SESSION["admin_id"];
$formId = $_GET['id'];

if ($formId) {
    $condition = "`id`='$formId'";
    $result = $dbComObj->viewData($conn, "aj_formBuilder", "*", $condition);
    $num = $dbComObj->num_rows($result);
    $data = $dbComObj->fetch_assoc($result);
    $form_name = $data['form_name'];
    $input_field_arr = json_decode($data['form_data'], true);

//geting headding details
    foreach ($input_field_arr as $key => $fileds) {
        $head_lebel[] = $fileds['label'];
        $head_key[] = $fileds['name'];
    }

// select from filled data 
    $condtion1 = "1 AND form_id= '" . $formId . "' ORDER BY `id` DESC";
    $result1 = $dbComObj->viewData($conn, "ak_user_send_form_data", "*", $condtion1);
    $num1 = $dbComObj->num_rows($result1);

    $field_value_arr = array();

    while ($leadData = $dbComObj->fetch_assoc($result1)) {
        $value_arr = array();
        $LoggedIn_Name = array();
        $LoggedIn_Value = array();
        $form_data = json_decode($leadData['form_data']);
        $LoggedIn_Name = $form_data->LoggedIn_Name;
        $LoggedIn_Value = $form_data->LoggedIn_Value;
        //print_r($LoggedIn_Name);
        //echo "<br><br>";
        //print_r($LoggedIn_Value); 
        //echo "<br><br>";
        //echo '<pre>LoggedIn_Name---';  print_r($LoggedIn_Name);
        foreach ($head_key as $key => $val) {
            $key11 = "";
            $key11 = array_search($val, $LoggedIn_Name);

            //echo $key11; die();
            $value = '';
            if (trim($key11) != "") {
                $value = $LoggedIn_Value[$key11];
            }

            $value_arr[] = $value;
        }
        $field_value_arr[] = $value_arr;
    }


    $user_CSV = array($head_lebel);
    $ij = 0;
    foreach ($field_value_arr as $newField_val) {
        $ij++;
        $arrayVal = $newField_val;
        $user_CSV[$ij] = $arrayVal;
    }


    $fp = fopen('php://output', 'w');
    foreach ($user_CSV as $line) {
        fputcsv($fp, $line, ',');
    }
    fclose($fp);
}
//print_r($user_CSV);
$form_name = preg_replace('/\s+/', '', $form_name);
$file_name = $form_name . date("dmY_H_i") . ".csv";
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
die;
?>