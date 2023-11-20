<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>828 Admin - MRP</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminform.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php $this->load->view('admin/sidetemplate') ?>
    <main>
        <section>
        <h2><a href="<?php echo base_url('mrp') ?>" class='header-link-group'>MRP</a>><a href="<?php echo base_url('mrp/given')?>" class='header-link-group'>Given</a>><a href="<?php echo base_url('mrp/expected') ?>" class='header-link-group'>Expected</a>>Requirements</h2>
            <div class="form-container">
                <h5>Expected</h5>
                <form action="<?php echo base_url('mrp/given') ?>" method="POST">
                    <div class="field-groups">
                        <div class="input-group">
                            <p>Current no of requested rolls</p>
                            <input type="number" onchange="handleNums('.num1')" name="no_rolls"  class="input-form-group num1" readonly>
                            <small class="error-group"><?php echo form_error('no_rolls')?></small>
                        </div>
                    </div>
                    <div class="field-groups">
                        <div class="input-group">
                            <p>Starting delivery/pickup</p>
                            <input type="date" name="from" value="<?php echo (isset($_SESSION['givenDates'][0])?$_SESSION['givenDates'][0]:set_value('from')) ?>" class="input-form-group">
                            <small class="error-group"><?php echo form_error('from') ?></small>
                        </div>
                        <div class="input-group">
                            <p>To</p>
                            <input type="date" name="to" value="<?php echo (isset($_SESSION['givenDates'][1])?$_SESSION['givenDates'][1]:set_value('to'))?>"  class="input-form-group">
                            <small class="error-group"><?php echo form_error('to')?></small>
                        </div>
                    </div>
                    <div class="field-groups">
                        <div class="input-group">
                            <button type="submit" class="input-form-group btn">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = ()=>{
            sidebar.classList.toggle('active');
        }
        function handleNums(numSelector){
            const numSelect=document.querySelector(numSelector);
            if(numSelect.value<0||numSelect.value.length==0){
                numSelect.value=0; 
            } 
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>