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
    <style>
        .table-inputs{
            width:75%;
        }
    </style>
</head>
<body>
    <?php $this->load->view('admin/sidetemplate') ?>
    <?php $requiredCalc=array();?>
    <main>
        <section>
            <h2><a href="<?php echo base_url('mrp') ?>" class='header-link-group'>MRP</a>><a href="<?php echo base_url('mrp/given')?>" class='header-link-group'>Given</a>><a href="<?php echo base_url('mrp/expected') ?>" class='header-link-group'>Expected</a>><a href="<?php echo base_url('mrp/requirements')?>" class="header-link-group">Requirements</a>>Schedule</h2>
            <div class="table-container" style="height:auto">
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
                                            <td><?php echo $item['total']?></td>
                                            <td><?php echo $item['status']?></td>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($materialScheds as $scheds) {?>
                            <?php $materials=json_decode($scheds->materials,true);?>
                                <?php foreach($materials as $item){?>
                                    <tr>
                                        <td><?php echo $item['code']?></td>
                                        <td><?php echo $item['name']?></td>
                                        <td><?php echo $item['required_stock']?></td>
                                        <td><?php echo $item['quantity']?></td>
                                        <td><?php echo $item['unit']?></td>
                                        <td><?php echo $item['to']?></td>
                                        <td><?php echo $item['status']?></td>
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
                    </tbody>
                </table>
                <br>
                <i class="fa-solid fa-plus-circle add-production" style="color:black;font-size:1.5rem;align-self:center;"></i>
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
                            </tr>
                        <?php } ?>  
                    </tbody>
                </table>
                <br>
                <button onclick="completeMRP()" class="input-form-group btn">Complete MRP</button>
            </div>
        </section>
    </main>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        let contents=[{
            id:1,
            name:'',
            description:'',
            duration:'',
            due:'',
            status:'in progress'
        }];
        btn.onclick = ()=>{
            sidebar.classList.toggle('active');
        }
        function displayTableContents(){
            let table=document.querySelector('.body-production');
            let rows=table.querySelectorAll('tr');
            rows.forEach(row=>{
                row.remove();
            }) 
            contents.forEach(content=>{
                const table_row=document.createElement('tr');
                const col_name=document.createElement('td');
                const nameInput=document.createElement('input');
                nameInput.type="text";
                nameInput.setAttribute('class',`table-inputs name _${content.id}`);
                nameInput.setAttribute('onchange',`inputEdit(${content.id},'name','.name._${content.id}')`)
                nameInput.setAttribute('value',content.name)
                col_name.append(nameInput);
                const col_description=document.createElement('td');
                const descriptionInput=document.createElement('textarea');
                descriptionInput.setAttribute('class',`table-inputs description _${content.id}`);
                descriptionInput.setAttribute('onchange',`inputEdit(${content.id},'description',".description._${content.id}")`)
                descriptionInput.textContent=content.description;
                col_description.append(descriptionInput);
                const col_duration=document.createElement('td');
                const durationInput=document.createElement('input');
                durationInput.setAttribute('class',`table-inputs duration _${content.id}`);
                durationInput.setAttribute('onchange',`inputEdit(${content.id},'duration','.duration._${content.id}')`)
                durationInput.setAttribute('value',content.duration);
                col_duration.append(durationInput);
                const col_dueDate=document.createElement('td');
                const dueDateInput=document.createElement('input');
                dueDateInput.type="date";
                dueDateInput.setAttribute('class',`table-inputs date _${content.id}`);
                dueDateInput.setAttribute('onchange',`inputEdit(${content.id},'date',".date._${content.id}")`)
                dueDateInput.setAttribute('value',content.date)
                col_dueDate.append(dueDateInput);
                const col_status=document.createElement('td');
                col_status.textContent=content.status;
                const col_action=document.createElement('td');
                const actionIcon=document.createElement('I');
                actionIcon.setAttribute('class','fa-solid fa-times-circle');
                actionIcon.setAttribute('onclick',`remove(${content.id})`);
                col_action.append(actionIcon);
                table_row.append(col_name);
                table_row.append(col_description);
                table_row.append(col_duration);
                table_row.append(col_dueDate);
                table_row.append(col_status);
                table_row.append(col_action);
                table.append(table_row);
            })
        }
        function completeMRP(){
            let form=document.createElement('form');
            form.method="POST";
            form.action="<?php echo base_url('mrp/mrpsuccess') ?>";
            let inputSchedule=document.createElement('input');
            inputSchedule.name="schedules";
            inputSchedule.type="hidden";
            inputSchedule.value=JSON.stringify(contents);
            form.append(inputSchedule);
            document.body.append(form);
            form.submit();
        }
        function inputEdit(id,key,selector){
            const input=document.querySelector(selector);
            contents.forEach(content=>{
                if(content.id==id){
                    content[`${key}`]=input.value;
                }
            })
        }
        function remove(idfind){
            let count=0;
            contents.forEach(content=>{
                if(content.id==idfind){
                    contents.splice(count,1);
                }
                count++;
            })
            count=1;
            contents.forEach(content=>{
                content.id=count;
                count++;
            })
            displayTableContents();
        }
        const addBtn=document.querySelector('.add-production');
        addBtn.addEventListener('click',()=>{
            let data={
                id:contents.length+1,
                name:'',
                description:'',
                duration:'',
                due:'',
                status:'in progress'
            }
            contents.push(data);
            displayTableContents();
        })
        displayTableContents();
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>