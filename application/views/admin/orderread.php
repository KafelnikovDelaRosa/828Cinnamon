<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <title>828 Admin - Orders</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminform.css') ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php $this->load->view('admin/sidetemplate'); ?>
    <main>
        <section>
            <h2><a href="<?php echo base_url('order/page/1') ?>" class='header-link-group'>Orders</a>>Receipt</h2>
            <?php foreach($orders as $order){ ?>
                <div class="receipt-container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                    <div class="col-md-6">
                    <address>
                        <strong>828Cinnamon</strong>
                        <br>
                        Quezon City,
                        <br>
                        CBE Town 1 Royal Street
                        <br>
                        <abbr title="Phone">P:</abbr> +639154054375
                    </address>
                    </div>
                    <div class="col-md-6 text-right">
                    <p>
                        Address: <b id="val-1"><?php echo $order['address'] ?></b>
                    </p>
                    <p>
                        Date: <b id="val-2"><?php $dateTime=new DateTime($order['ordercreated']); echo $dateTime->format('F j Y')?></b>
                    </p>
                    <p>
                        Order #: <b id="val-3"><?php echo $order['orderid']?></b>
                    </p>
                    <p>
                        Status: <b id="val-4"><?php echo $order['orderstatus']?></b>
                    </p>
                    </div>
                </div>
                <div class="text-center">
                    <h1>Order Receipt</h1>
                </div>
                <table class="table table-hover receipt-table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>#</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                    </tr>
                    <?php $dataJson=json_decode($order['orders'],TRUE)?>
                    <?php foreach($dataJson as $data){?>
                        <tr>
                            <td class='text-center'><?php echo $data['name'] ?></td>
                            <td class='text-center'><?php echo $data['stock'] ?></td>
                            <td class='text-center'><?php echo '₱'.$data['price'] ?></td>
                            <td class='text-center'><?php echo '₱'.$data['price']*$data['stock']?></td>
                        </tr>
                    <?php } ?>
                </thead>
                    <tbody id="Orders">
                    <tr>
                        <td colspan="2"></td>
                        <td class="text-right">
                            <h4>
                                <strong>Total:</strong>
                            </h4>
                        </td>
                        <td class="text-center text-danger">
                        <h4>
                            <strong id="val-5"><?php echo '₱'.$order['cost'] ?></strong>
                        </h4>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                </div>
                </div>
            <?php }?>
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