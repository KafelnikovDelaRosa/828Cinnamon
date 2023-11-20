<?php function crud($config){ ?>
    <section>
        <h2><?php echo $config['header'] ?></h2>
        <?php if($config['table_type']!='user'&&$config['table_type']!='order'){ ?>
            <a aria-controls="add-prompt" style="display:flex; width:10em; align-items:center" href="<?php echo base_url().$config['root_url'].'/add' ?>" class="btn btn-primary text-white btn-add">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Add <?php echo $config['header']?>
            </a>
        <?php } ?>
        <div class="fields-container">
            <div class="fields">
                <div class="search field-group-search">
                    <p>What are you searching for?</p>
                    <input id="search-value" type="text" name="term" class="input-group" placeholder="<?php echo $config['placeholder'] ?>">
                </div>
                <div class="sortbar field-group">
                    <p>Sort by</p>
                    <select id='sort-data' onchange="inputHandler('#sort-data','sortby')" name="sort-data" value="itemcode" class="input-group">
                        <?php foreach($config['categories'] as $list => $values) { ?>
                            <option value="<?php echo $values ?>" <?php echo ($config['category']===$values&&isset($config['category']))?'selected':''?>><?php echo ucfirst($values) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="level field-group">
                    <p><?php echo $config['filter_name'] ?></p>
                    <select id='filter-data' onchange="inputHandler('#filter-data','filter')" name="level-data" class="input-group">
                        <?php foreach($config['filter_values'] as $values){ ?>
                            <option value="<?php echo $values?>" <?php echo ($config['filter_selection']===$values&&isset($config['filter_selection']))?'selected':''?>><?php echo ucfirst($values) ?></option>
                        <?php } ?>
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
                <h5><?php echo $config['table_name'] ?></h5>
                <div class="links">
                    <?php 
                        $total_entries=ceil($config['total_entries']/$config['per_page']); 
                        $route=$config['root_url'];
                    ?>
                    <?php for($page=1;$page<$total_entries+1;$page++){?>
                        <?php if ($config['total_entries'] <= $config['per_page']){break;}?>
                        <?php if ($config['cur_page'] == $page){ echo $page;?>
                        <?php } else if($config['category']!='all') {?>
                            <a href="<?php echo base_url("$route/sortby/").$config['category'].'/'.$page?>"><?php echo $page ?></a>
                        <?php } else if($config['filter_selection']!='all') {?>
                            <a href="<?php echo base_url("$route/filter/").$config['filter_selection'].'/'.$page?>"><?php echo $page ?></a>
                        <?php } else{ ?>
                            <a href="<?php echo base_url("$route/page/").$page?>"><?php echo $page ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <table class="table-content">
                <?php if(!empty($config['entries'])){?>
                    <thead class="table-head">
                    <tr>
                        <?php foreach($config['table_headers'] as $headers){ ?>
                            <td><?php echo $headers?></td>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($config['entries'] as $entry){ ?>
                            <tr>
                                <?php foreach($config['entry_keys'] as $key){?>
                                    <?php if($key=="image"){ ?>
                                        <td><img src="<?php echo base_url('uploads/').$entry->$key ?>" width=100 height=100 alt="828 product image"></td>
                                        <?php continue; ?>
                                    <?php } ?>
                                    <td><?php echo ($entry->$key===NULL || $entry->$key==="")?'-':$entry->$key?></td>
                                <?php } ?>
                                <?php if($config['table_type']=='order'){ ?>
                                    <td>
                                        <?php $key=$config['entry_keys'][0]; $status=$config['entry_keys'][12]?>
                                        <?php if($entry->$status!='completed'&&$entry->$status!='cancelled'){?>
                                            <i class="fa-solid fa-book option-action" aria-data='<?php echo $entry->$key?>'></i>
                                            <i class="fa-solid fa-check option-action" aria-data='<?php echo $entry->$key?>'></i>
                                            <i class="fa-solid fa-x option-action" aria-data='<?php echo $entry->$key?>'></i>
                                        <?php } else {?>
                                            <i class="fa-solid fa-book option-action" aria-data='<?php echo $entry->$key?>'></i>
                                        <?php }?>
                                    </td>
                                    <?php continue; ?>
                                <?php } ?>
                                <td>
                                    <?php $key=$config['entry_keys'][0]?>
                                    <i class="fa-solid fa-trash option-action" aria-data='<?php echo $entry->$key?>'></i>
                                    <i class="fa-solid fa-edit option-action" aria-data='<?php echo $entry->$key?>'></i>
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
<?php } ?>
<?php function crudScript($config){ ?>
    <?php $root_url=$config['root_url'] ?>
    <script>
        function inputHandler(inputId,method){
            const fieldData=document.querySelector(inputId);
            if(fieldData.value===""||fieldData.value==='all'){
                window.location.href="<?php echo base_url("$root_url/page/1") ?>";
                return;
            }
            const rootUrl="<?php echo $root_url?>"; 
            const methodUrl=`${rootUrl}/${method}/${fieldData.value}/1`;
            const phpBaseUrl='<?php echo base_url()?>';
            const fullUrl=phpBaseUrl+methodUrl; 
            window.location.href=fullUrl;
        }
        let readList=document.querySelectorAll('.fa-book');
        readList.forEach(read=>{
            read.addEventListener('click',()=>{
                let id=read.getAttribute('aria-data');
                const phpUrl="<?php echo base_url("$root_url/read/id/") ?>";
                let fullUrl=phpUrl+id;
                window.location.href=fullUrl;
            });
        })
        let completeList=document.querySelectorAll('.fa-check');
        completeList.forEach(status=>{
            status.addEventListener('click',()=>{
                let id=status.getAttribute('aria-data');
                const phpUrl="<?php echo base_url("$root_url/complete/id/") ?>";
                let fullUrl=phpUrl+id;
                Swal.fire({
                    icon:'question',
                    title: `Are you done with order no ${id}?`,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location.href=fullUrl;
                    }
                })
            });
        })
        let cancelList=document.querySelectorAll('.fa-x');
        cancelList.forEach(status=>{
            status.addEventListener('click',()=>{
                let id=status.getAttribute('aria-data');
                const phpUrl="<?php echo base_url("$root_url/cancel/id/") ?>";
                let fullUrl=phpUrl+id;
                Swal.fire({
                    icon:'question',
                    title: `Are you sure you want to cancel order no ${id}?`,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location.href=fullUrl;
                    }
                })
            });
        })
        let editList=document.querySelectorAll('.fa-edit');
        editList.forEach(edit=>{
            edit.addEventListener('click',()=>{
                let id=edit.getAttribute('aria-data');
                const phpUrl="<?php echo base_url("$root_url/edit/id/") ?>";
                let fullUrl=phpUrl+id;
                window.location.href=fullUrl;
            });
        });
        let removeList=document.querySelectorAll('.fa-trash');
        removeList.forEach(remove=>{
            remove.addEventListener('click',()=>{
                let tableName="<?php echo $config['table_type'] ?>"
                let id=remove.getAttribute('aria-data');
                const phpUrl="<?php echo base_url("$root_url/remove/id/") ?>";
                let fullUrl=phpUrl+id;
                Swal.fire({
                    icon:'question',
                    title: `Are you sure you want to remove ${tableName} no ${id} entries?`,
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
<?php } ?>