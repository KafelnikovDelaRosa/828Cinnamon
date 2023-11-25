<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <title>828 Admin - MRP</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body> 
    <?php $this->load->view('admin/sidetemplate')?>
    <main>
        <section>
            <h2>MRP</h2>
            <a aria-controls="add-prompt" style="display:flex; width:10em; align-items:center" onclick="startMrp()" class="btn btn-primary text-white btn-add">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Create MRP
            </a>
            <div class="table-container" style='height:auto;'>
                <div class="entry-container">
                    <h5>Mrp Summary</h5>
                </div>
                <?php if(empty($mrp)){?>
                    <div class="entry-container">
                        <h5>No entries found</h5>
                    </div>
                <?php } else{?>
                    <table class="table-content">
                    <thead class="table-head">
                    <tr>
                        <td>Id</td>
                        <td>MRP Created</td>
                        <td>Date of Compliance</td>
                        <td>Starting Deployment</td>
                        <td>Ending Deployment</td>
                        <td>Required Rolls</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mrp as $info){ ?>
                            <tr>
                                <td><?php echo $info->mrp_id?></td>
                                <td><?php echo $info->mrp_created?></td>
                                <td><?php echo $info->mrp_due?></td>
                                <td><?php echo $info->starting_deployment?></td>
                                <td><?php echo $info->ending_deployment?></td>
                                <td><?php echo $info->required_rolls?></td>
                                <td><i class="fa-solid fa-book option-action" aria-data='<?php echo $info->mrp_created?>'></i></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php }?>
            </div>
        </section>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
        function startMrp(){
            let noCurrentOrders="<?php echo (empty($has_order))?1:0 ?>";
            if(noCurrentOrders>0){
                Swal.fire({
                    icon:'warning',
                    title: `Cannot initiate MRP without current orders`,
                    confirmButtonText: 'OK'
                })
                return;
            }
            window.location.href="<?php echo base_url('mrp/given') ?>";
        }
        let reads=document.querySelectorAll('.fa-book');
        reads.forEach(content=>{
            content.addEventListener('click',()=>{
                const date=content.getAttribute('aria-data');
                const datePart=date.split(' ')[0];
                let phpUrl="<?php echo base_url('mrp/view/date/')?>";
                let fullUrl=phpUrl+datePart;
                window.location.href=fullUrl;
            })
        });
    </script>
</body>
</html>