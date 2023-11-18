<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>828 Admin - Inventory</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php 
        include('sidetemplate.php');
        include('crudtemplate.php'); 
    ?>
    <?php sideBar(); ?> 
    <main>
        <?php
            $config=array(
                'table_type'=>'inventory',
                'header'=>'Inventory',
                'placeholder'=>'e.g id, code, name',
                'categories'=>array(
                    'all'=>'all',
                    'itemcode'=>'itemcode',
                    'itemname'=>'itemname',
                    'quantity'=>'quantity',
                    'cost'=>'cost'
                ),
                'category'=>$category,
                'filter_selection'=>$level,
                'filter_name'=>'Level',
                'filter_values'=>array(
                    'all',
                    'high',
                    'low'
                ),
                'cur_page'=>$cur_page,
                'per_page'=>$per_page,
                'total_entries'=>$total_entries,
                'last_entries'=>$last_entries,
                'table_name'=>'Material Summary',
                'table_headers'=>array('Id','Code','Name','Current Stock','Stock Threshold','Quantity','Unit','Cost','Level','Action'),
                'root_url'=>'inventory',
                'entry_keys'=>array('itemid','itemcode','itemname','stock','minstock','quantity','unit','cost','itemlevel'),
                'entries' =>$entries
            );
            crud($config);
        ?>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = ()=>{
            sidebar.classList.toggle('active');
        }
    </script>
    <?php  crudScript($config) ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>