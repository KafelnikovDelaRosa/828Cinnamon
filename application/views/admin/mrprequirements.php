<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>828 Admin - MRP</title> 
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminform.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php $this->load->view('admin/sidetemplate') ?>
    <?php $requiredCalc=array();?>
    <main>
        <section>
            <h2><a href="<?php echo base_url('mrp') ?>" class='header-link-group'>MRP</a>><a href="<?php echo base_url('mrp/given')?>" class='header-link-group'>Given</a>><a href="<?php echo base_url('mrp/expected') ?>" class='header-link-group'>Expected</a>>Requirements</h2>
            <div class="table-container" style="height:auto">
                <?php
                    $quantityMultiplier=0;
                    $rollsConstant=30;
                    while($rollsConstant<$_SESSION['givenRolls']){
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
                    <h6>Required no of cinnamon rolls: <?php echo $_SESSION['givenRolls']?></h6>
                </div>
                <div class="entry-container">
                    <h6>No of cinnamon rolls produced: <?php echo 30*$quantityMultiplier;?></h6>
                </div>
                <div class="entry-container">
                    <h6>Date of completion:<?php echo $_SESSION['expectedCompliance']?></h6>
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
                            <td>Action</td>
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
                    <button onclick="buttonEvents()" class="input-form-group btn">Next</button>
                <br>
            </div>
            </section>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        const bomCount=parseInt("<?php echo $hasBOM; ?>");
        btn.onclick = ()=>{
            sidebar.classList.toggle('active');
        }
        function handleNums(numSelector){
            const numSelect=document.querySelector(numSelector);
            if(numSelect.value<0||numSelect.value.length==0){
                numSelect.value=0; 
            } 
        }
        function buttonEvents(){
            if(bomCount>0){
                window.location.href="<?php echo base_url('mrp/schedule')?>";
                return;
            }
            const currentDate=new Date();
            const year=currentDate.getFullYear();
            const month=currentDate.getMonth()+1;
            const day=currentDate.getDate();
            const codes=document.querySelectorAll('.codes');
            const name=document.querySelectorAll('.name');
            const stock=document.querySelectorAll('.stocks');
            const quantity=document.querySelectorAll('.quantity');
            const units=document.querySelectorAll('.unit');
            const cost=document.querySelectorAll('.cost');
            const status=document.querySelectorAll('.status');
            const level=document.querySelectorAll('.level');
            const maxStock=document.querySelectorAll('.maxstock');
            const currentStock=document.querySelectorAll('.currentstock');
            let itemDict=[];
            let restockList=[];
            let total=0;
            let count=0;
            for(let i=0;i<codes.length;i++){
                let codeStock={code:'',name:'',required_stock:0,quantity:0,unit:'',from:'',to:'',cost:0,total:0,level:'',status:'in progress'};
                codeStock.code=codes[i].textContent;
                codeStock.name=name[i].textContent;
                codeStock.required_stock=parseInt(stock[i].textContent);
                codeStock.quantity=parseInt(quantity[i].textContent);
                codeStock.unit=units[i].textContent;
                codeStock.from=year+'-'+month+'-'+day;
                codeStock.to=year+'-'+month+'-'+(day+1);
                codeStock.cost=parseInt(cost[i].textContent)
                codeStock.total=parseInt(cost[i].textContent*codeStock.required_stock);
                codeStock.status=status[i].textContent;
                codeStock.level=level[i].textContent;
                total+=codeStock.cost;
                itemDict.push(codeStock);
            }
            itemDict.forEach(item=>{
                if(item.level==='low'){
                    restockList.push(item);
                }
            })
            restockList.forEach(list=>{
                list.required_stock=parseInt(maxStock[count].textContent)-parseInt(currentStock[count].textContent);
                list.total=parseInt(list.required_stock*list.cost);
                count++;
            })
            console.log(itemDict,restockList);
            if(restockList.lenght<0){
                var alertType='success';
                var alertTitle='Bill of materials successfully created!';
                var alertConfirm='Proceed'
            }
            else{
                var alertType='warning';
                var alertTitle='Low inventory level detected! Creating schedule for inventory restock before bill of materials';
                var alertConfirm='Proceed'
            }
            Swal.fire({
                icon:alertType,
                title:alertTitle,
                confirmButtonText:alertConfirm,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let form=document.createElement('form');
                    let input=document.createElement('input');
                    let totalInput=document.createElement('input');
                    let restockInput=document.createElement('input');
                    form.method="POST";
                    form.action="<?php echo base_url('mrp/bom')?>";
                    totalInput.type="hidden";
                    totalInput.value=total;
                    totalInput.name="total";
                    input.type="hidden";
                    input.value=JSON.stringify(itemDict);
                    input.name="materials";
                    restockInput.type="hidden";
                    restockInput.value=JSON.stringify(restockList);
                    restockInput.name="restock";
                    form.append(input);
                    form.append(totalInput);
                    form.append(restockInput);
                    document.body.append(form);
                    form.submit();
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>