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
</head>
<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <span>828 Admin</span>
            </div>
            <i class="fa-solid fa-bars" id = "btn"></i>
        </div>
        <div class="user">
            <img src = "<?php echo base_url('images/guest_pic.jpg')?>" alt="secret-user" class = "user-img">
            <div class="">
                <p class = "bold">Kafelnikov</p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href = "<?php echo base_url('dashboard') ?>">
                    <i class="fa-solid fa-grip"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href = "<?php echo base_url('mrp') ?>">
                    <i class="fas fa-calendar"></i>
                    <span class="nav-item">MRP</span>
                </a>
                <span class="tooltip">MRP</span>
            </li>
            <li>
                <a href = "<?php echo base_url('inventory/page/1')?>">
                    <i class="fas fa-shopping-basket"></i>
                    <span class="nav-item">Inventory</span>
                </a>
                <span class="tooltip">Inventory</span>
            </li>
            <li>
                <a href = "<?php echo base_url('products')?>">
                    <i class="fas fa-store-alt"></i>
                    <span class="nav-item">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href = "<?php echo base_url('order')?>">
                    <i class="fas fa-scroll"></i>
                    <span class="nav-item">Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>
            <li>
                <a href = "<?php echo base_url('users')?>">
                    <i class="fa-solid fa-users"></i>
                    <span class="nav-item">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>
            <li>
                <a href = "<?php echo base_url('alerts')?>">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="nav-item">Alerts</span>
                </a>
                <span class="tooltip">Alerts</span>
            </li>
            <li>
                <a href = "<?php echo base_url('logout')?>">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>
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
                            <th>Minimum Quantity (g/pcs)</th>
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
                                    <td><?php echo $item->minquantity ?></td>
                                    <td><?php echo $item->quantity?></td>
                                    <td><?php echo $item->unit?></td>
                                    <td><?php echo "₱".$item->cost?></td>
                                    <td><?php echo $item->itemlevel ?></td>
                                    <td>
                                        <i class="fa-solid fa-trash option-action"></i>
                                        <i class="fa-solid fa-edit option-action"></i>
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
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </main>
</body>
</html>