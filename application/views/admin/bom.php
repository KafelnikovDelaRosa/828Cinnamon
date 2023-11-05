<!doctype html>
<html lang="en">
  <head>
    <title>828 Admin - Bill of Materials</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #bom-mask{
            position:absolute;
            display:flex;
            justify-content:center;
            align-items:center;
            top:0;
            left:0;
            height:100vh;
            width:100%;
            background-color:rgba(0,0,0,0.5);
            z-index:200;
            visibility:hidden;
            transition:visibility;
        }
        #bom-mask[aria-hidden="true"]{
            visibility:visible;
        }
        .container-1,.container-2 {
            padding: 16px;
            background:white;
        }
        /* Full-width input fields */
        input[type=text], input[type=password], input[type=file],textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=number],select{
            width:100%;
            padding:15px;
            margin:5px 0 22px 0;
            display:inline-block;
            border:none;
            background: #f1f1f1;
        }
        input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        }

        .registerbtn:hover {
        opacity:1;
        }

        /* Add a blue text color to links */
        a {
        color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
        background-color: #f1f1f1;
        text-align: center;
        }
    </style>
  </head>
  <body>

    <main>
        <nav>
        <div class="logo">
                <img src="<?php echo base_url('images/guest_pic.jpg')?>">
                <p style="color:white; padding-left:5px;">Admin</p>
            </div>
            <div class="choices">
                <div class="selection" onclick="window.location.href='<?php echo base_url('Dashboard')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-speedometer" viewBox="0 0 16 16">
                    <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                    <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                    </svg>
                    <a href="#">Dashboard</a>
                </div>
                <div class="selection" onclick="window.location.href='<?php echo base_url('BOM')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/>
                    </svg>
                    <a href="#">BOM</a>
                </div>
                 <div class="selection" onclick="window.location.href='<?php echo base_url('Scheduling')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-calendar-event" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>
                    <a href="#">Scheduling</a>
                </div>
                <div class="selection"  onclick="window.location.href='<?php echo base_url('Inventory')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-archive-fill" viewBox="0 0 16 16">
                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                    </svg>
                     <a href="#">Inventory</a>
                </div>
                <div class="selection"  onclick="window.location.href='<?php echo base_url('Products')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="white" class="bi bi-bag-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                    </svg>
                    <a href="#">Products</a>
                </div>
                <div class="selection" onclick="window.location.href='<?php echo base_url('Orders')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="white" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <a href="#">Orders</a>
                </div>
                <div class="selection" onclick="window.location.href='<?php echo base_url('Users')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="white" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                    <a href="#">Users</a>
                </div>
                 <div class="selection" onclick="window.location.href='<?php echo base_url('Alerts')?>'">
                    <i class="fas fa-bell fa-lg" style="color:white;"></i>
                    <a href="#">Alerts</a>
                </div>
                <div class="selection" onclick="window.location.href='<?php echo base_url('Logout')?>'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="white" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    <a href="">Logout</a>
                </div>
            </nav>
            
        <section>
            <div class="bom-mask-prompt" id="bom-mask" aria-hidden="false">
                <div class="container-1" style="width:25%;">
                    <h1 style="display:flex; justify-content:space-between">
                        Bom   
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x-square close-bom" aria-controls="bom-mask" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>  
                    </h1>
                    <p>Please fill in the field for the item</p>
                    <hr>
                    <label for="image"><b>No of Recipe to Create</b></label>
                    <input type="number" id='recipeno' value="">
                    <span style="color:red" id="errornumber"></span>
                    <?php 
                        $ingredients=array(
                            'code'=>array(),
                            'name'=>array(),
                            'quantity'=>array(),
                            'unit'=>array(),
                            'price'=>array()
                        );
                        $inventory=array(
                            'code'=>array(),
                            'name'=>array(),
                            'quantity'=>array(),
                            'unit'=>array(),
                        );
                        foreach($recipes as $ingredient){
                            $ingredients['code'][]=$ingredient->code;
                            $ingredients['name'][]=$ingredient->name;
                            $ingredients['quantity'][]=$ingredient->quantity;
                            $ingredients['unit'][]=$ingredient->unit;
                            $ingredients['price'][]=$ingredient->price;
                        }
                        foreach($items as $item){
                            $inventory['code'][]=$item->itemcode;
                            $inventory['name'][]=$item->itemname;
                            $inventory['quantity'][]=$item->quantity;
                            $inventory['unit'][]=$item->unit;
                        }
                    ?>
                    <button type="submit" onclick='displayBom(<?php echo json_encode($ingredients)?>,<?php echo json_encode($inventory) ?>)'class="registerbtn">Generate BOM</button>
                </div>
                <div class="container-2" hidden="true" style="height:75%; overflow-y:scroll;">
                    <h1 style="display:flex; justify-content:space-between">
                        Bill of Materials 
                    </h1>
                    <p id='recipe'></p>
                    <p id='rolls'></p>
                    <hr>
                    <caption>For Dough</caption>
                    <table class="table table-striped table-inverse" style="align-self:center;">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Required Quantity</th>
                                <th>Remaining Quantity</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="doughtable">
                        </tbody>       
                    </table>
                    <caption>For Fillings</caption>
                    <table class="table table-striped table-inverse" style="align-self:center;">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Required Quantity</th>
                                <th>Remaining Quantity</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="fillingtable">
                        </tbody>       
                    </table>
                    <p id="total" style="font-size:1.5rem;"></p>
                    <button type="submit" onclick='saveBom()' class="registerbtn">Save</button>
                    <button type="submit" onclick='cancelBom()' class="registerbtn">Cancel</button>
                </div>
            </div>
            <p class="tagline">Bill of Materials</p>
            <a aria-controls="bom-mask" style="display:flex; width:10em; align-items:center" aria-expanded="false" class="btn btn-primary text-white btn-add">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Create BOM
            </a>  
            <?php if(empty($bom)){ ?>
                <p class="tagline">Bom Table is Empty</p>
            <?php } else { ?>
                <br><br>
                <table class="table table-striped table-inverse" style="width:40%">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bom as $chart){?>
                            <tr>
                                <td><?php echo $chart->bomno?></td>
                                <td><?php echo $chart->code?></td>
                                <td><?php echo "₱".$chart->cost?></td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="cursor:pointer;" width="25" height="25" fill="currentColor" onclick="window.location.href='<?php echo base_url("Inventory/removeInventory/".$item->itemid) ?>'"  class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" style="cursor:pointer;"  onclick='editItem(<?php echo json_encode($data)?>)' viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </section>
    </main>
    <script>
        var totalCost=document.querySelector("#total");
        var ingredientList=new Array();
        var inventoryList=new Array();
        var sortedInventory={
                code:[],
                name:[],
                quantity:[],
                unit:[]
        };
        const formRecipe=document.querySelector('.container-1');
        const bomReceipt=document.querySelector('.container-2');
        const bomButton=document.querySelector('.btn-add');
        const bomPrompt=document.querySelector('#bom-mask');
        const closeBomPrompt=document.querySelector('.close-bom');
        closeBomPrompt.addEventListener('click',()=>{
            const visible=bomPrompt.getAttribute('aria-hidden');
            if(visible==="true"){
                bomPrompt.setAttribute('aria-hidden',false);
                bomButton.setAttribute('aria-expanded',false);
            }
        });
        bomButton.addEventListener('click',()=>{
            const visible=bomPrompt.getAttribute('aria-hidden');
            if(visible==="false"){
                bomPrompt.setAttribute('aria-hidden',true);
                bomButton.setAttribute('aria-expanded',true);
            }
        });
        function saveBom(){
            const form=document.createElement("form");
            form.method='POST';
            form.action='<?php echo base_url("BOM/addBom")?>';
            const bomCode=document.createElement('input');
            bomCode.type="hidden";
            bomCode.name="bomcode";
            bomCode.value='BOM';
            const materials=document.createElement('input');
            materials.type="hidden";
            materials.name="materials";
            materials.value=JSON.stringify(sortedInventory);
            const cost=document.createElement('input');
            cost.type="hidden";
            cost.name="cost";
            cost.value=totalCost.value;
            form.append(bomCode);
            form.append(materials);
            form.append(cost);
            document.body.appendChild(form);
            form.submit();
        }
        function cancelBom(){
            const tableDough=document.querySelector("#doughtable");
            const tableFill=document.querySelector("#fillingtable");
            let i=0;
            let j=0;
            while(i<9){
                const doughData=tableDough.querySelector("tr:first-child");
                tableDough.removeChild(doughData);
                i++;
            }
            while(j<4){
                const fillData=tableFill.querySelector("tr:first-child");
                tableFill.removeChild(fillData);
                j++;
            }
            //empty both ingredientList and the inventoryList
            delete ingredientList.code;
            delete ingredientList.name;
            delete ingredientList.quantity;
            delete ingredientList.unit;
            delete ingredientList.price;
            delete inventoryList.code;
            delete inventoryList.name;
            delete inventoryList.quantity;
            delete inventoryList.unit;
            sortedInventory.code.splice(0,14);
            sortedInventory.name.splice(0,14);
            sortedInventory.quantity.splice(0,14);
            sortedInventory.unit.splice(0,14);
            bomPrompt.setAttribute('aria-hidden',false);
            bomButton.setAttribute('aria-expanded',false);
            formRecipe.hidden=false;
            bomReceipt.hidden=true;
            document.querySelector('#recipeno').value="";
        }
        function displayBom(ingredients,inventory){
            ingredientList=ingredients;
            inventoryList=inventory;
            const rolls=24;
            ingredientList.code.forEach((code)=>{
                const index=inventoryList.code.indexOf(code);
                sortedInventory.code.push(code);
                sortedInventory.name.push(inventoryList['name'][index]);
                sortedInventory.quantity.push(inventoryList['quantity'][index]);
                sortedInventory.unit.push(inventoryList['unit'][index]);
            });
            const inputValue=document.querySelector('#recipeno');
            const errorMessage=document.querySelector('#errornumber');
            if(inputValue.value.length==0){
                errorMessage.textContent="Please Provide a Value";
            }
            else{
                const recipeText=document.querySelector('#recipe');
                const rollsText=document.querySelector('#rolls');
                rollsText.textContent="Total No of Rolls: "+(Number(inputValue.value)*rolls)+" pcs";
                recipeText.textContent="No of Recipe: "+inputValue.value;
                errorMessage.textContent="";
                formRecipe.hidden=true;
                bomReceipt.hidden=false;
                for(let i=0;i<14;i++){
                    //update ingredientList quantity and price
                    if(i<9){
                        let remainingQuantity=sortedInventory['quantity'][i];
                        let code=ingredientList['code'][i];
                        let name=ingredientList['name'][i];
                        let quantity=Number(inputValue.value)*Number(ingredientList['quantity'][i]);
                        let unit=ingredientList['unit'][i];
                        let price=Number(inputValue.value)*Number(ingredientList['price'][i]);
                        let status=(remainingQuantity>quantity)?'ok':'warning';
                        let newRow=document.createElement("tr");
                        let codeCell=document.createElement("td");
                        codeCell.setAttribute('id',`code-data-${i}`)
                        codeCell.textContent=code;
                        let nameCell=document.createElement("td");
                        nameCell.setAttribute('id',`name-data-${i}`)
                        nameCell.textContent=name;
                        let quantityCell=document.createElement("td");
                        quantityCell.setAttribute('id',`quantity-data-${i}`)
                        quantityCell.textContent=(quantity);
                        let remainingCell=document.createElement("td");
                        remainingCell.setAttribute('id',`remaining-data-${i}`);
                        remainingCell=remainingQuantity;
                        let unitCell=document.createElement("td");
                        unitCell.setAttribute('id',`unit-data-${i}`);
                        unitCell.textContent=unit;
                        let priceCell=document.createElement("td");
                        priceCell.setAttribute('id',`price-data-${i}`);
                        priceCell.textContent="₱"+price;
                        let statusCell=document.createElement("td");
                        statusCell.textContent=status;
                        let tableDough=document.querySelector("#doughtable");
                        newRow.append(codeCell);
                        newRow.append(nameCell);
                        newRow.append(quantityCell);
                        newRow.append(remainingCell);
                        newRow.append(unitCell);
                        newRow.append(priceCell);
                        newRow.append(statusCell);
                        tableDough.append(newRow);
                    }
                    else{
                        let remainingQuantity=sortedInventory['quantity'][i];
                        let code=ingredientList['code'][i];
                        let name=ingredientList['name'][i];
                        let quantity=Number(inputValue.value)*Number(ingredientList['quantity'][i]);
                        let unit=ingredientList['unit'][i];
                        let price=Number(inputValue.value)*Number(ingredientList['price'][i]);
                        let status=(remainingQuantity>quantity)?'ok':'warning';
                        let newRow=document.createElement("tr");
                        let codeCell=document.createElement("td");
                        codeCell.textContent=code;
                        let nameCell=document.createElement("td");
                        nameCell.textContent=name;
                        let quantityCell=document.createElement("td");
                        quantityCell.textContent=(quantity);
                        let remainingCell=document.createElement("td");
                        remainingCell=remainingQuantity;
                        let unitCell=document.createElement("td");
                        unitCell.textContent=unit;
                        let priceCell=document.createElement("td");
                        priceCell.textContent="₱"+price;
                        let statusCell=document.createElement("td");
                        statusCell.textContent=status;
                        let tableFill=document.querySelector("#fillingtable");
                        newRow.append(codeCell);
                        newRow.append(nameCell);
                        newRow.append(quantityCell);
                        newRow.append(remainingCell);
                        newRow.append(unitCell);
                        newRow.append(priceCell);
                        newRow.append(statusCell);
                        tableFill.append(newRow);
                    }
                }
                sortedInventory.code.forEach((code)=>{
                    const index=sortedInventory.code.indexOf(code);
                    sortedInventory.quantity[index]=sortedInventory.quantity[index]-ingredientList.quantity[index];
                });
                let total=0;
                ingredientList.price.forEach((price)=>{
                    total+=Number(price)*inputValue.value; 
                });
                totalCost.value=total;
                totalCost.textContent="Total: "+"₱"+total;
            }
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>