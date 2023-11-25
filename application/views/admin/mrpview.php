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
    <style>
        .form-container{
            width:100%;
        }
    </style>
</head>
<body> 
    <?php $this->load->view('admin/sidetemplate')?>
    <main>
        <section>
            <h2><a href="<?php echo base_url('mrp')?>" class='header-link-group'>MRP</a>>View</h2> 
            <!--Form Given -->
            <div class="form-container">
                <h5>Given</h5>
                <?php foreach($mrp as $mrp_field){ ?>
                    <form>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Current no of requested rolls</p>
                                <input type="number" value="<?php echo $mrp_field->required_rolls?>" class="input-form-group num1" readonly>
                            </div>
                        </div>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Starting delivery/pickup</p>
                                <input type="date" value="<?php echo $mrp_field->starting_deployment?>" class="input-form-group" readonly>
                            </div>
                            <div class="input-group">
                                <p>To</p>
                                <input type="date" value="<?php echo $mrp_field->ending_deployment?>"  class="input-form-group" readonly>
                            </div>
                        </div>
                    </form>
                <?php }?>
            </div>
            <br>
            <!-- Form Expected -->
            <div class="form-container">
                <h5>Expected</h5>
                <?php foreach($sales as $saleinfo){?>
                    <form>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Expected Sales</p>
                                <input type="number" value="<?php echo $saleinfo->expected_sales ?>" class="input-form-group num1" readonly>
                            </div>
                        </div>
                        <div class="field-groups">
                            <div class="input-group">
                                <p>Date of compliance</p>
                                <?php foreach($mrp as $mrp_field){ ?>
                                    <input type="date" value="<?php echo $mrp_field->mrp_due?>" class="input-form-group" readonly>
                                <?php }?>
                            </div> 
                        </div> 
                    </form>   
                <?php }?>
            </div>
            <!-- Table Requirement -->
            <div class="table-container" style="height:auto">
                <?php
                    $givenRolls=0;
                    $completionDate="";
                    $requiredCalc=array();
                    foreach($mrp as $mrp_field){
                        $givenRolls=$mrp_field->required_rolls;
                        $completionDate=$mrp_field->mrp_due;
                    }
                    $quantityMultiplier=0;
                    $rollsConstant=30;
                    while($rollsConstant<$givenRolls){
                        $rollsConstant+=30;
                    }
                    while($rollsConstant>0){
                        $quantityMultiplier++;
                        $rollsConstant-=30;
                    }
                ?>
                <div class="entry-container">
                    <h5>Material Requirements</h5>
                </div>
                <div class="entry-container">
                    <h6>Required no of cinnamon rolls: <?php echo $givenRolls?></h6>
                </div>
                <div class="entry-container">
                    <h6>No of cinnamon rolls produced: <?php echo 30*$quantityMultiplier;?></h6>
                </div>
                <div class="entry-container">
                    <h6>Date of completion:<?php echo $completionDate;?></h6>
                </div>
                <br>
                <div class="entry-container">
                    <h5>Dough Requirements</h5>
                </div>
                <table class="table-content">
                    <thead class="table-head">
                    <tr>
                        <td>Code</td>
                        <td>Name</td>
                        <td>Estimated Quantity</td>
                        <td>Unit</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($recipes as $recipe){ ?>
                            <?php
                                array_push($requiredCalc,array(
                                    'code'=>$recipe->code,
                                    'name'=>$recipe->name,
                                    'quantity'=>$quantityMultiplier*$recipe->quantity,
                                    'stock'=>0
                                ));
                            ?>
                            <?php if($recipe->code!='CINN001'&&$recipe->code!='SUGAR002'&&$recipe!='BUTTER001'){?>
                                <tr>
                                    <td><?php echo $recipe->code?></td>
                                    <td><?php echo $recipe->name?></td>
                                    <td><?php echo $quantityMultiplier*$recipe->quantity?></td>
                                    <td><?php echo $recipe->unit?></td>
                                </tr>
                            <?php }?>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <div class="entry-container">
                    <h5>Filling Requirements</h5>
                </div>
                <table class="table-content">
                    <thead class="table-head">
                    <tr>
                        <td>Code</td>
                        <td>Name</td>
                        <td>Estimated Quantity</td>
                        <td>Unit</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($recipes as $recipe){ ?>
                            <?php if($recipe->code=='CINN001'||$recipe->code=='SUGAR002'){?>
                                <tr>
                                    <td><?php echo $recipe->code?></td>
                                    <td><?php echo $recipe->name?></td>
                                    <td><?php echo $quantityMultiplier*$recipe->quantity?></td>
                                    <td><?php echo $recipe->unit?></td>
                                </tr>
                            <?php }?>
                        <?php } ?>
                        <tr>
                            <?php 
                                $butterQuantityConst=30*$quantityMultiplier;
                                foreach($requiredCalc as &$ingredients){
                                    if($ingredients['code']=='BUTTER001'){
                                        $ingredients['quantity']+=$butterQuantityConst;
                                        break;
                                    }
                                }
                            ?>
                            <td>BUTTER001</td>
                            <td>buttercup</td>
                            <td><?php echo $butterQuantityConst ?></td>
                            <td>g</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="entry-container">
                    <h5>Inventory Status</h5>
                </div>
                <table class="table-content">
                    <thead class="table-head">
                        <tr>
                            <td>Code</td>
                            <td>Name</td>
                            <td>Estimated Stock Used</td>
                            <td>Inventory</td>
                            <td>Quantity</td>
                            <td>Unit</td>
                            <td>Item Level</td>
                            <td>Icon</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($inventories as $item){ ?>
                            <?php
                                $estimatedStock=0;
                                foreach($requiredCalc as $required){
                                    if($required['code']===$item->itemcode){
                                        $stock=0;
                                        $constQuantity=0;
                                        $totalQuantity=0;
                                        if($required['code']==="SUGAR001"||$required['code']==="SALT001"||$required['code']==="YEAST001"||$required['code']==="NUT001"){
                                            break;
                                        }
                                        else if($item->unit=="kg"){
                                            $constQuantity=$item->quantity*1000;
                                        }
                                        else if($item->unit=="g"){
                                            $constQuantity=$item->quantity;
                                        }
                                        else{
                                            $constQuantity=1;
                                        }
                                        while($totalQuantity<$required['quantity']){
                                            $stock+=1;
                                            $totalQuantity+=$constQuantity;
                                        }
                                        $estimatedStock+=$stock;
                                    }
                                }
                            ?>
                            <tr>
                                <td class="codes"><?php echo $item->itemcode?></td>
                                <td class="name"><?php echo $item->itemname?></td>
                                <td class="stocks"><?php echo $estimatedStock?></td>
                                <td><?php echo $item->stock?></td>
                                <td class="quantity"><?php echo $item->quantity?></td>
                                <td class="unit"><?php echo $item->unit?></td>
                                <td><?php echo $item->itemlevel?></td>
                                <td>
                                    <?php if($item->itemlevel=='low'){ ?>
                                        <i class="fa-solid fa-exclamation-circle" style="color:#ffca80;"></i>
                                    <?php } else {?>
                                        <i class="fa-solid fa-check-circle" style="color:green;"></i>
                                    <?php } ?>
                                </td>
                                <td class="hidden cost"><?php echo $item->cost ?></td>
                                <td class="hidden status">in progress</td>
                                <td class="hidden level"><?php echo $item->itemlevel?></td>
                                <?php if($item->itemlevel=='low'){?>
                                    <td class="hidden maxstock"><?php echo $item->requirestock ?></td>
                                    <td class="hidden currentstock"><?php echo $item->stock ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?> 
                    </tbody>
                </table>
                <br>
            </div>
            <!-- BOM Table -->
            <div class="table-container" style="height:auto;">
                <div class="entry-container">
                    <h5>Bill Of Materials</h5>
                </div>
                <table class="table-content">
                    <thead class="table-head">
                        <tr>
                            <td>Code</td>
                            <td>Name</td>
                            <td>Stocks</td>
                            <td>Quantity</td>
                            <td>Unit</td>
                            <td>Cost</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total=0; foreach($bomessentials as $bomcosts){?>
                            <?php $total=$bomcosts->cost?>
                            <?php $bommaterials=json_decode($bomcosts->materials,true);?>
                            <?php foreach($bommaterials as $bominfo){?>
                                <tr>
                                    <td><?php echo $bominfo['code']?></td>
                                    <td><?php echo $bominfo['name']?></td>
                                    <td><?php echo $bominfo['required_stock']?></td>
                                    <td><?php echo $bominfo['quantity']?></td>
                                    <td><?php echo $bominfo['unit']?></td>
                                    <td><?php echo '₱'.$bominfo['cost']?></td>
                                    <td><?php echo '₱'.$bominfo['total']?></td>
                                </tr>
                            <?php }?>
                        <?php }?>
                        <tr>
                            <td>Total</td>
                            <td colspan=6><?php echo '₱'.$total ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </div>
            <!-- Schedule Table -->
            <div class="table-container" style="height:auto">
                <div class="entry-container">
                    <h5>Schedules</h5>
                </div>
                <br>
                <div class="entry-container">
                    <h5>Procurement Schedule</h5>
                </div>
                <div class="entry-container">
                    <h6>Inventory Restock</h6>
                </div>
                <?php if(empty($restockScheds)){?>
                    <div class="entry-container">
                        <h6>Inventory levels satisfied</h6>
                    </div>
                <?php } else{?>
                    <table class="table-content">
                        <thead class="table-head">
                            <tr>
                                <td>Code</td>
                                <td>Name</td>
                                <td>Required Stock</td>
                                <td>Quantity</td>
                                <td>Unit</td>
                                <td>Cost</td>
                                <td>Due</td>
                                <td>Total</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($restockScheds as $scheds) {?>
                                <?php $materials=json_decode($scheds->itemlist,true);?>
                                    <?php foreach($materials as $item){?>
                                        <tr>
                                            <td><?php echo $item['code']?></td>
                                            <td><?php echo $item['name']?></td>
                                            <td><?php echo $item['required_stock']?></td>
                                            <td><?php echo $item['quantity']?></td>
                                            <td><?php echo $item['unit']?></td>
                                            <td><?php echo $item['cost']?></td>
                                            <td><?php echo $item['to']?></td>
                                            <td><?php echo '₱'.$item['total']?></td>
                                            <td><?php echo $item['status']?></td>
                                            <td><i class="fa-solid fa-check-circle option-action"></i></td>
                                        <tr>
                                    <?php }?>
                            <?php }?>     
                        </tbody>
                    </table>
                <?php }?>
                <br>
                <div class="entry-container">
                    <h6>Materials</h6>
                </div>
                <table class="table-content">
                    <thead class="table-head">
                        <tr>
                            <td>Code</td>
                            <td>Name</td>
                            <td>Required Stock</td>
                            <td>Quantity</td>
                            <td>Unit</td>
                            <td>Due</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bomessentials as $bomscheds) {?>
                            <?php $materials=json_decode($bomscheds->materials,true);?>
                                <?php foreach($materials as $item){?>
                                    <tr>
                                        <td><?php echo $item['code']?></td>
                                        <td><?php echo $item['name']?></td>
                                        <td><?php echo $item['required_stock']?></td>
                                        <td><?php echo $item['quantity']?></td>
                                        <td><?php echo $item['unit']?></td>
                                        <td><?php echo $item['to']?></td>
                                        <td><?php echo $item['status']?></td>
                                        <td><i class="fa-solid fa-check-circle option-action"></i></td>
                                    <tr>
                                <?php }?>
                        <?php }?>     
                    </tbody>
                </table>
                <br>
                <div class="entry-container">
                    <h5>Production Schedule</h5>
                </div>
                <table class="table-content">
                    <thead class="table-head">
                        <tr>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Duration</td>
                            <td>Due Date</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody class="body-production">
                        <?php foreach($schedules as $schedule) {?>
                            <?php $info=json_decode($schedule->procedure_list,true);?>
                                <?php foreach($info as $todo){?>
                                    <tr>
                                        <td><?php echo $todo['name']?></td>
                                        <td><?php echo ($todo['description']=='')?'-':$todo['description']?></td>
                                        <td><?php echo $todo['duration']?></td>
                                        <td><?php echo $todo['date']?></td>
                                        <td><?php echo $todo['status']?></td>
                                        <td><i class="fa-solid fa-check-circle option-action"></i></td>
                                    <tr>
                                <?php }?>
                        <?php }?>   
                    </tbody>
                </table>
                <br>
                <br>
                <div class="entry-container">
                    <h5>Deployment Schedule</h5>
                </div>
                <table class="table-content">
                    <thead class="table-head">
                        <tr>
                            <td>Order Id</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Order Due</td>
                            <td>Deployment status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody class="body-production">   
                        <?php foreach($orderScheds as $orders){ ?> 
                            <tr>
                                <td><?php echo $orders->orderid ?></td>
                                <td><?php echo $orders->email ?></td>
                                <td><?php echo $orders->phone ?></td>
                                <td><?php echo $orders->address ?></td>
                                <td><?php echo $orders->orderdue ?></td>
                                <td><?php echo $orders->orderstatus ?></td>
                                <td><i class="fa-solid fa-check-circle option-action"></i></td>
                            </tr>
                        <?php } ?>  
                    </tbody>
                </table>
                <br>
            </div>
        </section>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = function () {
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>