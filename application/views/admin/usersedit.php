<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>828 Admin - Inventory</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminform.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php $this->load->view('admin/sidetemplate'); ?>
    <main>
        <section>
            <h2><a href="<?php echo base_url('users/page/1') ?>" class='header-link-group'>Users</a>>Edit</h2>
            <div class="form-container">
                <h5>User Information</h5>
                <?php $id=0; foreach($user as $info){$id=$info->id;}?>
                <form action="<?php echo base_url('users/edit/id/').$id ?>" method="POST">
                    <?php foreach($user as $info){ ?>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Email</p>
                                <input type="text" name="email" value="<?php echo $info->email ?>" class="input-form-group" readonly>
                            </div> 
                        </div>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Firstname</p>
                                <input type="text" name="firstname" value="<?php echo $info->firstname ?>" class="input-form-group" readonly>
                            </div> 
                        </div>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Lastname</p>
                                <input type="text" name="lastname" value="<?php echo $info->lastname ?>" class="input-form-group" readonly>
                            </div> 
                        </div>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Username</p>
                                <input type="text" name="lastname" value="<?php echo $info->username ?>" class="input-form-group" readonly>
                            </div> 
                        </div>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Role</p>
                                <select name="role">
                                    <option value="admin" <?php echo ($info->role=='admin')?'selected':'' ?>>Admin</option>
                                    <option value="user" <?php echo ($info->role=='user')?'selected':'' ?>>User</option>
                                </select>
                            </div>
                        </div>
                        <div class="field-groups">
                            <div class="input-group">
                                <button type="submit" class="input-form-group btn">Edit User</button>
                            </div>
                        </div>
                    <?php } ?>
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