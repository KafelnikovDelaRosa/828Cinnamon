<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>828 Admin - Inventory</title>
    <link rel="stylesheet" href="<?php echo base_url('CSS/adminstyle.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include('sidetemplate.php'); ?>
    <?php sideBar(); ?> 
    <main>
        <section>
            <h2>Inventory</h2>
            <a aria-controls="add-prompt" style="display:flex; width:10em; align-items:center" href="<?php echo base_url('inventory/add') ?>" class="btn btn-primary text-white btn-add">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Add Inventory
            </a>
            <div class="fields-container">
                <div class="fields">
                    <div class="search field-group-search">
                        <p>What are you searching for?</p>
                        <input id="search-value" type="text" name="term" class="input-group" placeholder="e.g id, code, name">
                    </div>
                    <div class="sortbar field-group">
                        <p>Sort by</p>
                        <select id='sort-data' onchange="inputHandler('#sort-data','sortby')" name="sort-data" value="itemcode" class="input-group">
                            <option value="all" <?php echo ($category==='all'&&isset($category))?'selected':''?>>All</option>
                            <option value="itemcode" <?php echo ($category==='itemcode'&&isset($category))?'selected':''?>>Code</option>
                            <option value="itemname" <?php echo ($category==='itemname'&&isset($category))?'selected':''?>>Name</option>
                            <option value="quantity" <?php echo ($category==='quantity'&&isset($category))?'selected':''?>>Quantity</option>
                            <option value="cost" <?php echo ($category==='cost'&&isset($category))?'selected':''?>>Cost</option>
                        </select>
                    </div>
                    <div class="level field-group">
                        <p>Level</p>
                        <select id='filter-data' onchange="inputHandler('#filter-data','filter')" name="level-data" class="input-group">
                            <option value="all" <?php echo ($level==='all'&&isset($level))?'selected':''?>>All</option>
                            <option value="high" <?php echo ($level==='high'&&isset($level))?'selected':''?>>High</option>
                            <option value="low" <?php echo ($level==='low'&&isset($level))?'selected':''?>>Low</option>
                        </select>
                    </div>
                </div>
                <div class="submit">
                    <div class="submit field-group">
                        <button class="search-filter" onclick="inputHandler('#search-value','search')">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-container">
                <div class="entry-container">
                    <h5>Material Summary</h5>
                    <div class="links">
                        <?php $entry=0;$page=1; ?>
                        <?php do{ ?>
                            <?php if($entry==$total_entries){break;}?>
                            <?php if(empty($inventory)){ break; }?>
                            <?php if($cur_page==$page){ echo $page;?>
                            <?php } else if($category!='all') {?>
                                <a href="<?php echo base_url('inventory/sortby/').$category.'/'.$page?>"><?php echo $page ?></a>
                            <?php } else if($level!='all') {?>
                                <a href="<?php echo base_url('inventory/filter/').$level.'/'.$page?>"><?php echo $page ?></a>
                            <?php } else{ ?>
                                <a href="<?php echo base_url('inventory/page/').$page?>"><?php echo $page ?></a>
                            <?php } ?>
                        <?php 
                            $entry+=$per_page;
                            $page+=1;
                        ?>
                        <?php }while($entry<=$total_entries) ?>
                    </div>
                </div>
                <table class="table-content">
                    <?php if(!empty($inventory)){?>
                        <thead class="table-head">
                        <tr>
                            <th>Id</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Current Stock</th>
                            <th>Stock Threshold</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Cost</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($inventory as $item){ ?>
                                <tr>
                                    <td><?php echo $item->itemid ?></td>
                                    <td><?php echo $item->itemcode?></td>
                                    <td><?php echo $item->itemname ?></td>
                                    <td><?php echo $item->stock?></td>
                                    <td><?php echo $item->minstock ?></td>
                                    <td><?php echo $item->quantity?></td>
                                    <td><?php echo $item->unit?></td>
                                    <td><?php echo "₱".$item->cost?></td>
                                    <td><?php echo $item->itemlevel ?></td>
                                    <td>
                                        <i class="fa-solid fa-trash option-action" aria-data='<?php echo $item->itemid ?>'></i>
                                        <i class="fa-solid fa-edit option-action" aria-data='<?php echo $item->itemid ?>'></i>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } else { ?>
                        <h5>No entries found</h5>
                    <?php } ?>
                </table>
            </div>
        </section>
        </main>
        <script>
            let btn = document.querySelector('#btn');
            let sidebar = document.querySelector('.sidebar');
            btn.onclick = ()=>{
                sidebar.classList.toggle('active');
            }
            function inputHandler(inputId,method){
                const fieldData=document.querySelector(inputId);
                if(fieldData.value===""||fieldData.value==='all'){
                    window.location.href="<?php echo base_url('inventory/page/1') ?>";
                    return;
                } 
                const methodUrl=`inventory/${method}/${fieldData.value}/1`;
                const phpBaseUrl='<?php echo base_url()?>';
                const fullUrl=phpBaseUrl+methodUrl; 
                window.location.href=fullUrl;
            }
            let editList=document.querySelectorAll('.fa-edit');
            editList.forEach(edit=>{
                edit.addEventListener('click',()=>{
                    let id=edit.getAttribute('aria-data');
                    const phpUrl="<?php echo base_url('inventory/edit/id/') ?>";
                    let fullUrl=phpUrl+id;
                    window.location.href=fullUrl;
                });
            });
            let removeList=document.querySelectorAll('.fa-trash');
            removeList.forEach(remove=>{
                remove.addEventListener('click',()=>{
                    let id=remove.getAttribute('aria-data');
                    const phpUrl="<?php echo base_url('inventory/remove/id/') ?>";
                    let fullUrl=phpUrl+id;
                    Swal.fire({
                        icon:'question',
                        title: `Are you sure you want to remove material no ${id} entries?`,
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location.href=fullUrl;
                        }
                    })
                });
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </main>
</body>
</html>