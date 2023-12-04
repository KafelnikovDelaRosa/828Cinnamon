<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <title>828 Admin - MRP</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminform.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body> 
    <?php $this->load->view('admin/sidetemplate')?>
    <?php
        $date=array();
        $expected=array();
        $actualSales=array();
        foreach($sales as $sale){
            array_push($date,date('Y-m-d',strtotime($sale->sale_created)));
            array_push($expected,$sale->expected_sales);
            array_push($actualSales,$sale->current_sales);
        } 
    ?>
    <main>
        <section>
            <h2>Dashboard</h2>
            <div class="table-container" style='height:auto;' id="table-container-forecast">
                <div class="entry-container">
                    <h5>Sales Forecast</h5>
                    <button class="input-form-group btn" onclick="printPage('#table-container-forecast')" style="height:2.18rem;">Print</button>
                </div>
                <br>
                <div id="chart"></div>
            </div>
            <div class="table-container" style='height:auto;' id="table-container-inventory">
                <div class="entry-container">
                    <h5>Inventory Status</h5>
                    <button class="input-form-group btn" style="height:2.18rem;" onclick="printPage('#table-container-inventory')">Print</button>
                </div>
                <br>
                <?php if(empty($items)){ ?>
                    <div class="entry-container">
                    <h5>Item levels are satisfied</h5>
                    </div>
                <?php } else {?>
                    <table class="table-content">
                        <thead class="table-head">
                            <tr>
                                <td>Item Id</td>
                                <td>Code</td>
                                <td>Name</td>
                                <td>Stocks Remaining</td>
                                <td>Item Level</td>
                                <td>Icon</td>
                            </tr>
                        </thead>
                        <tbody class="body-production">   
                            <?php foreach($items as $item){ ?> 
                                <tr>
                                    <td><?php echo $item->itemid ?></td>
                                    <td><?php echo $item->itemcode ?></td>
                                    <td><?php echo $item->itemname ?></td>
                                    <td><?php echo $item->stock ?></td>
                                    <td><?php echo $item->itemlevel ?></td>
                                    <td><i class="fa-solid fa-exclamation-circle" style="color:#ffca80;"></i></td>
                                </tr>
                            <?php } ?>  
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            <div class="table-container" style='height:auto;' id='table-container-orders'>
                <div class="entry-container">
                    <h5>Current Orders</h5>
                    <button class="input-form-group btn" onclick="printPage('#table-container-orders')" style="height:2.18rem;">Print</button>
                </div>
                <br>
                <?php if(empty($currentOrders)){ ?>
                    <div class="entry-container">
                    <h5>You have no current orders</h5>
                </div>
                <?php } else {?>
                    <table class="table-content">
                        <thead class="table-head">
                            <tr>
                                <td>Order Id</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Order Due</td>
                                <td>Order status</td>
                            </tr>
                        </thead>
                        <tbody class="body-production">   
                            <?php foreach($currentOrders as $orders){ ?> 
                                <tr>
                                    <td><?php echo $orders->orderid ?></td>
                                    <td><?php echo $orders->email ?></td>
                                    <td><?php echo $orders->phone ?></td>
                                    <td><?php echo $orders->address ?></td>
                                    <td><?php echo $orders->orderdue ?></td>
                                    <td><?php echo $orders->orderstatus ?></td> 
                                </tr>
                            <?php } ?>  
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            <div class="table-container" style='height:auto;' id='table-container-customer'>
                <div class="entry-container">
                    <h5>Customer Tracker</h5>
                    <button class="input-form-group btn" onclick="printPage('#table-container-customer')" style="height:2.18rem;">Print</button>
                </div>
                <div class="entry-container">
                    <h6>Started</h6>
                </div>
                <?php if(empty($customerStatus)){ ?>
                    <div class="entry-container">
                        <h6>You have not started any orders</h6>
                    </div>
                <?php } else{?>
                    <table class="table-content">
                        <thead class="table-head">
                            <tr>
                                <td>Order id</td>
                                <td>Customer email</td>
                                <td>Phone</td>
                                <td>Order Due</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody class="body-production">   
                            <?php foreach($customerStatus as $customer){?>
                                <?php if($customer->orderstatus==='started'){?>
                                    <tr>
                                        <td><?php echo $customer->orderid ?></td>
                                        <td><?php echo $customer->email ?></td>
                                        <td><?php echo $customer->phone ?></td>
                                        <td><?php echo $customer->orderdue ?></td>
                                        <td><?php echo $customer->orderstatus ?></td>
                                    </tr>
                                <?php }?>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php }?>
                <br>
                <div class="entry-container">
                    <h6>Ready For Pickup</h6>
                </div>
                <?php if(empty($customerStatus)){ ?>
                    <div class="entry-container">
                        <h6>There are no ready orders</h6>
                    </div>
                <?php } else{?>
                    <table class="table-content">
                        <thead class="table-head">
                            <tr>
                                <td>Order id</td>
                                <td>Customer email</td>
                                <td>Phone</td>
                                <td>Order Due</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody class="body-production">   
                            <?php foreach($customerStatus as $customer){?>
                                <?php if($customer->orderstatus==='ready'){?>
                                    <tr>
                                        <td><?php echo $customer->orderid ?></td>
                                        <td><?php echo $customer->email ?></td>
                                        <td><?php echo $customer->phone ?></td>
                                        <td><?php echo $customer->orderdue ?></td>
                                        <td><?php echo $customer->orderstatus ?></td>
                                    </tr>
                                <?php }?>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php }?>
            </div>
            <div class="table-container" style='height:auto;' id="table-container-transactions">
                <div class="entry-container">
                    <h5>Transactions</h5>
                    <button class="input-form-group btn" onclick="printPage('#table-container-transactions')"style="height:2.18rem;">Print</button>
                </div>
                <br>
                <table class="table-content">
                    <thead class="table-head">
                        <tr>
                            <td>Transaction Id</td>
                            <td>Created</td>
                            <td>Name</td>
                            <td>Gain</td>
                            <td>Loss</td>
                        </tr>
                    </thead>
                    <tbody class="body-production">   
                        <?php foreach($transactions as $transaction){ ?> 
                            <tr>
                                <td><?php echo $transaction->transactionid ?></td>
                                <td><?php echo $transaction->transaction_created ?></td>
                                <td><?php echo $transaction->transaction_name ?></td>
                                <td><?php echo $transaction->gain ?></td>
                                <td><?php echo $transaction->loss ?></td>
                            </tr>
                        <?php } ?>  
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script>
        function printPage(selector){
            let choosenId=document.querySelector(selector).getAttribute('id');
            let titleHeader=document.querySelector('h2');
            let sideBar=document.querySelector('.sidebar');
            let tableInstance=document.querySelectorAll('.table-container');
            titleHeader.classList.add('hide-on-print');
            sideBar.classList.add('hide-on-print');
            tableInstance.forEach(table=>{
                const idTable=table.getAttribute('id');
                if(idTable!=choosenId){
                    table.classList.add('hide-on-print');
                }
            })
            window.print();
            titleHeader.classList.remove('hide-on-print');
            sideBar.classList.remove('hide-on-print');
            tableInstance.forEach(table=>{
                const idTable=table.getAttribute('id');
                if(idTable!=choosenId){
                    table.classList.remove('hide-on-print');
                }
            })
        }
        let dateCategories=<?php echo json_encode($date) ?>;
        let expectedSales=<?php echo json_encode($expected)?>;
        let actualSales=<?php echo json_encode($actualSales)?>;
        console.log(actualSales);
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
        const chartData={
            categories:dateCategories,
            series:[
                {
                    name:'ExpectedSales',
                    data:expectedSales
                },
                {
                    name:'ActualSales',
                    data:actualSales
                }
            ]
        };
        const chartOptions={
            chart:{
                type:'line',
                height:320
            },
            series:chartData.series,
            xaxis:{
                catergories:chartData.categories
            }
        };
        const chart=new ApexCharts(document.querySelector('#chart'),chartOptions);
        chart.render();
    </script>
</body>
</html>