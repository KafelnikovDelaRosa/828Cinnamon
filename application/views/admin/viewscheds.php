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
                    <?php $restocks=json_decode($scheds->itemlist,true);$itemProcureList=json_encode($restocks)?>
                        <?php foreach($restocks as $item){?>
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
                                <?php if($item['status']=='in progress'){ ?>
                                    <td><i class="fa-solid fa-check-circle option-action updatestock" aria-data=<?php echo $item['code']?>></i></td> 
                                <?php } else{?>
                                    <td><i class="fa-solid fa-check-circle option-action" style="color:green"></i></td> 
                                <?php }?>
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
                <?php $materials=json_decode($bomscheds->materials,true);$materialList=json_encode($materials);?>
                    <?php foreach($materials as $item){?>
                        <tr>
                            <td><?php echo $item['code']?></td>
                            <td><?php echo $item['name']?></td>
                            <td><?php echo $item['required_stock']?></td>
                            <td><?php echo $item['quantity']?></td>
                            <td><?php echo $item['unit']?></td>
                            <td><?php echo $item['to']?></td>
                            <td><?php echo $item['status']?></td>
                            <?php if($item['status']=='in progress'){ ?>
                                <td><i class="fa-solid fa-check-circle option-action updatebom" aria-data=<?php echo $item['code']?>></i></td> 
                            <?php } else{?>
                                <td><i class="fa-solid fa-check-circle option-action" style="color:green"></i></td> 
                            <?php }?>
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
                <?php $info=json_decode($schedule->procedure_list,true);$infoList=json_encode($info)?>
                    <?php foreach($info as $todo){?>
                        <tr>
                            <td><?php echo $todo['name']?></td>
                            <td><?php echo ($todo['description']=='-'||$todo['description']=='')?'-':$todo['description']?></td>
                            <td><?php echo $todo['duration']?></td>
                            <td><?php echo $todo['date']?></td>
                            <td><?php echo $todo['status']?></td>
                            <?php if($todo['status']=='in progress'){ ?>
                                <td><i class="fa-solid fa-check-circle option-action updateproduction" aria-data="<?php echo $todo['name']?>"></i></td> 
                            <?php } else{?>
                                <td><i class="fa-solid fa-check-circle option-action" style="color:green"></i></td> 
                            <?php }?>
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
                    <?php if($orders->orderstatus=='ready'||$orders->orderstatus=='started'){ ?>
                        <td><i class="fa-solid fa-check-circle option-action completeorder" aria-data="<?php echo $orders->orderid?>"></i></td> 
                    <?php } else{?>
                        <td><i class="fa-solid fa-check-circle option-action" style="color:green"></i></td> 
                    <?php }?>
                </tr>
            <?php } ?>  
        </tbody>
    </table>
    <br>
</div>
<script>
    let restocks=<?php echo $itemProcureList; ?>;
    let materials=<?php echo $materialList; ?>;
    let scheds=<?php echo $infoList; ?>;
    let restockEvents=document.querySelectorAll('.updatestock');
    let inventoryEvents=document.querySelectorAll('.updatebom');
    let productionEvents=document.querySelectorAll('.updateproduction');
    let completeOrderEvents=document.querySelectorAll('.completeorder');
    completeOrderEvents.forEach(compEvent=>{
        compEvent.addEventListener('click',()=>{
            const orderid=compEvent.getAttribute('aria-data');
            Swal.fire({
                icon:'question',
                title:`Do you want to mark order no ${orderid} as complete?`,
                showCancelButton:true,
                confirmButtonText:'Yes',
                cancelButtonText:'No'
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let form=document.createElement('form');
                    let input=document.createElement('input');
                    form.method="POST";
                    let date="<?php echo $date?>";
                    let phpUrl="<?php echo base_url('mrp/completeorder/id/')?>";
                    let idUrl=phpUrl+orderid
                    let fullUrl=idUrl+'/date/'+date;
                    form.action=fullUrl;
                    input.type="hidden";
                    input.value=orderid;
                    input.name="orderid";
                    form.append(input);
                    document.body.append(form);
                    form.submit();
                }
            });
        })
    })
    function updateProduction(name){
        scheds.forEach(sched=>{
            if(sched.name===name){
                sched.status='completed';
                let form=document.createElement('form');
                form.method="POST";
                form.action="<?php echo base_url('mrp/productcomplete/date/').$date?>";
                let updateProd=document.createElement('input');
                updateProd.type="hidden";
                updateProd.name="schedupdates";
                updateProd.value=JSON.stringify(scheds);
                console.log(scheds,sched);
                form.append(updateProd);
                document.body.append(form);
                form.submit();
            }
        })
    }
    function completeProduction(name){
        scheds.forEach(sched=>{
            if(sched.name===name){
                sched.status='completed';
                let form=document.createElement('form');
                form.method="POST";
                form.action="<?php echo base_url('mrp/productnotify/date/').$date ?>";
                let updateProd=document.createElement('input');
                updateProd.type="hidden";
                updateProd.name="schedupdates";
                updateProd.value=JSON.stringify(scheds);
                form.append(updateProd);
                document.body.append(form);
                form.submit();
            }
        })
    }
    productionEvents.forEach(prodEvent=>{
        prodEvent.addEventListener('click',()=>{
            const name=prodEvent.getAttribute('aria-data');
            const schedsFiltered=scheds.filter(sched=>sched.status=='in progress');
            console.log(schedsFiltered.length);
            if(schedsFiltered.length==1){
                completeProduction(name);
            }
            else{
                updateProduction(name);
            }
        })
    });
    function updateProcurements(code){
        materials.forEach(material=>{
            if(material.code===code){
                material.status='completed';
                let form=document.createElement('form');
                form.method="POST";
                form.action="<?php echo base_url('mrp/bomcomplete/date/').$date?>";
                let updateTakeStock=document.createElement('input');
                updateTakeStock.type="hidden";
                updateTakeStock.name="takestock";
                updateTakeStock.value=JSON.stringify(material);
                let updateBom=document.createElement('input');
                updateBom.type="hidden";
                updateBom.name="bomupdates";
                updateBom.value=JSON.stringify(materials);
                console.log(materials,material);
                form.append(updateTakeStock);
                form.append(updateBom);
                document.body.append(form);
                form.submit();
            }
        })
    }
    inventoryEvents.forEach(invEvent=>{
        invEvent.addEventListener('click',()=>{
            const code=invEvent.getAttribute('aria-data');
            updateProcurements(code);
        })
    });
    function updateStatus(code){
        restocks.forEach(item=>{
            if(item.code===code){
                console.log(restocks,item);
                item.status='completed';
                item.level='high';
                let form=document.createElement('form');
                form.method="POST";
                form.action="<?php echo base_url('mrp/restock/date/').$date?>"
                let updateRestock=document.createElement('input');
                updateRestock.type="hidden";
                updateRestock.name="restocks";
                updateRestock.value=JSON.stringify(restocks);
                let restockItem=document.createElement('input');
                restockItem.type="hidden";
                restockItem.name="restockCertain"
                restockItem.value=JSON.stringify(item);
                form.append(updateRestock);
                form.append(restockItem);
                document.body.append(form);
                form.submit();
            }
        })
    }
    restockEvents.forEach(resEvent=>{
        resEvent.addEventListener('click',()=>{
            const code=resEvent.getAttribute('aria-data');
            updateStatus(code);
        }) 
    })
</script>