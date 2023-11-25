<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <title>828 Admin - Alerts</title>
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
            <h2>Alerts</h2>
            <div class="table-container" style='height:auto;'>
                <div class="entry-container">
                    <h5>Inventory Status</h5>
                    <i class="fa-solid fa-exclamation-circle" style="color:#ffca80;"></i>
                </div>
                <?php if(empty($alerts)){?>
                    <div class="entry-container">
                        <h5>Inventory levels satisfied</h5>
                    </div>
                <?php } else{?>
                    <table class="table-content">
                        <thead class="table-head">
                            <tr>
                                <td>Code</td>
                                <td>Name</td>
                                <td>Restock Value</td>
                                <td>Quantity</td>
                                <td>Unit</td>
                                <td>Cost</td>
                                <td>Restock At</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($alerts as $scheds) {?>
                                <?php $materials=json_decode($scheds->itemlist,true);?>
                                    <?php foreach($materials as $item){?>
                                        <?php if($item['level']!='low'){continue;} ?>
                                        <tr>
                                            <td><?php echo $item['code']?></td>
                                            <td><?php echo $item['name']?></td>
                                            <td><?php echo $item['required_stock']?></td>
                                            <td><?php echo $item['quantity']?></td>
                                            <td><?php echo $item['unit']?></td>
                                            <td><?php echo $item['cost']?></td>
                                            <td><?php echo $item['to']?></td>
                                            <td><?php echo $item['total']?></td>
                                        <tr>
                                    <?php }?>
                            <?php }?>     
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
                const value=content.getAttribute('aria-data');
                console.log(value);
            })
        });
    </script>
</body>
</html>