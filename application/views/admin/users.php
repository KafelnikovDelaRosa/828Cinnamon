<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <title>828 Admin - Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>"> 
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
                'table_type'=>'user',
                'header'=>'Users',
                'placeholder'=>'e.g email, phone, firstname, lastname,username',
                'categories'=>array(
                    'all'=>'all',
                    'email'=>'email',
                    'phone'=>'phone',
                    'firstname'=>'firstname',
                    'lastname'=>'lastname',
                    'username'=>'username',
                    'birthday'=>'birthday'
                ),
                'category'=>$category,
                'filter_selection'=>$role,
                'filter_name'=>'Role',
                'filter_values'=>array(
                    'all',
                    'admin',
                    'user',
                ),
                'cur_page'=>$cur_page,
                'per_page'=>$per_page,
                'total_entries'=>$total_entries,
                'last_entries'=>$last_entries,
                'table_name'=>'User Summary',
                'table_headers'=>array('Id','Email','Phone','Firstname','Lastname','Username','Birthday','Role','Action'),
                'root_url'=>'users',
                'entry_keys'=>array('id','email','phone','firstname','lastname','username','birthday','role'),
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
</body>
</html>