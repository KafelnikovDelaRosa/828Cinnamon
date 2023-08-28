<?php

define('TESTBASEPATH', __DIR__ . '/../');
require TESTBASEPATH . 'index.php';
$CI = &get_instance();
$CI->load->model('InventoryModel');
// Create an instance of the InventoryModel
$inventoryModel = new InventoryModel();

// Specify the path to the Excel file
$filePath = TESTBASEPATH . 'Excel/828Recipe.xlsx';

// Call the excelTesting() function
$result = $inventoryModel->excelTesting($filePath);

// Process the result
print_r($result);