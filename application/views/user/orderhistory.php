<!doctype html>
<html lang="en">
  <head>
    <title>828 Orders Page</title>
    <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link rel="stylesheet" href="<?php echo base_url("CSS/style.css")?>" >
  <style>
  .modal {
    position: fixed;
    display: flex;
    justify-content: center;
    width: 100%;
    height: 100vh;
    background-color: rgba(63, 63, 63, .5);
    opacity: 0;
    visibility: hidden;
    transition: opacity .4s;
  }
  .modal[data-visible="true"] {
    opacity: 1;
    visibility: visible;
  }

  :root{
    --mar:rgb(149, 20, 41);
    --inputbot:#dee2e6;
    --inputbg:#f2f2f2;
  }
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  body{
    min-height:100vh;
  }
  #recieptno{
    position:absolute;
    color:black;
    transition:color;
  }
  #recieptno:hover{
    color:blue;
    cursor:pointer;
  }
  nav{
    justify-content:flex-start;
  }
  h1 {
    text-align: center;
  }

  #receipt-mask{
    position:absolute;
    left:0;
    top:0;
    background-color:rgba(0,0,0,0.5);
    z-index:9999;
    width:100%;
    height:100vh;
  }
  /*  `RECEIPT  */
  .receipt-container {
    border: 1px solid #ccc;
    background-color:white;
    padding: 20px;
    margin-bottom: 20px;
  }
  .receipt-info {
    margin-bottom: 10px;
  }
  .receipt-info span {
    font-weight: bold;
  }
  .receipt-table th {
    text-align: center;
  }
  .receipt-table .text-center {
    text-align: center;
  }
  .total-amount {
    text-align: right;
    font-weight: bold;
  }
  /*  RECEIPT`  */

  /* FIELDS SEARCH */
  .search-container{
    position:relative;
    display:flex;
    flex-direction:column;
    width:100%;
  }
  .search-container .input-row{
    display:flex;
    justify-content:space-between;
  }
  .search-container .input-row .order-field{
    padding:1rem;
    display:flex;
    flex-direction:column;
    width:50%;
    margin-right:1.2rem;
  }
  .search-container .input-row .date-field{
    display:flex;
    flex-direction:column;
    width:50%;
    padding:1rem;
  }
  .search-container .button-row{
    padding:1rem;
    margin-right:1.2rem;
  }
  .search-container .button-row button{
    color:white;
    padding:.3rem 1em .3rem 1em;
    border:none;
    background-color:var(--mar);
    border-radius:5px;
  }
  input[type="text"]{
    padding:.3rem;
    border:none;
    border-bottom:2px solid var(--inputbot);
    background-color:var(--inputbg);
  }
  input[type="date"]{
    padding:.3rem;
    border:none;
    border-bottom:2px solid var(--inputbot);
    background-color:var(--inputbg);
  }
  /* FIELDS SEARCH */            
  </style>
</head>
<body>
  <nav>
        <a href="<?php echo base_url('landing')?>" style="text-decoration:none">
          Back
        </a>
  </nav>
  <br>
  <div class="container" style="display:flex;flex-direction:column;">
    <!--Copy mo nalang to for the mask <div id="receipt-mask" hidden=false style="display:flex;justify-content:center"> </div> -->
    <div id="receipt-mask" hidden=false style="display:flex;justify-content:center">
      <div class="row justify-content-center" style="width:75%">
        <div class="col-md-8">
          <div class="receipt-container">
            <div class="row">
              <div class="col-md-12">
                <p style="cursor:pointer; font-size:1rem;" onclick="closeReceipt()">X</p>
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
                  Address: <b id="val-1"></b>
                </p>
                <p>
                  Date: <b id="val-2"></b>
                </p>
                <p>
                  Receipt #: <b id="val-3"></b>
                </p>
                <p>
                  Status: <b id="val-4"></b>
                </p>
              </div>
            </div>
  
            <div class="text-center">
              <h1>Order Summary</h1>
            </div>
  
            <table class="table table-hover receipt-table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>#</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Total</th>
                </tr>
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
                      <strong id="val-5"></strong>
                    </h4>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="text-center">
              <button type="button" onclick="payReceipt()" hidden="true" class="btn btn-danger btn-lg btn-pay">
                Pay Now <span class="glyphicon glyphicon-chevron-right"></span>
              </button>
              <button type="button" onclick="cancelReceipt()" hidden="true" class="btn btn-danger btn-lg btn-cancel">
                Cancel Order <span class="glyphicon glyphicon-chevron-right"></span>
              </button>
            </div>
          </div>
        </div>
    </div>
    </div>
    <div class="py-3 text-left">
        <h2 style="font-size:2.5rem;">Order History</h2>
        <div class="search-container">
            <form id="orderForm">
              <div class='input-row'>
                  <div class="order-field">
                      <label for="order">Order no.</label>
                      <input type="text" name="order" id="o-no">
                  </div>
                  <div class="date-field">
                      <label for="fromdate">From</label>
                      <input type="date" name="fromdate" id="f-date">
                      <label for="todate">To</label>
                      <input type="date" name="todate" id="t-date">
                  </div>
              </div> 
              <div class='button-row'>
                  <button onclick="search(event)">Search</button>
              </div>
            </form>    
        </div>
    </div>
    <?php if(empty($orders)){?>
      <center><h2>No orders found</h2></center>
    <?php } else{?>
      <h4>Recent Orders</h4>
      <table class="table" style="align-self:center;">
          <thead>
              <tr>
                  <th>Order no.</th>
                  <th>Order issued</th>
                  <th>Receipt no.</th>
                  <th>Mode of payment</th>
                  <th>Total</th>
                  <th>Order status</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach($orders as $order){
              $items=array(
                'address'=>$order->address,
                'receipt'=>$order->receiptno,
                'orders'=>$order->orders,
                'date'=>$order->ordercreated,
                'status'=>$order->orderstatus,
                'total'=>$order->cost
              );
            ?>
            <tr>
              <!--<td><?php 
              $decodedata=json_decode($order->orders,true);
              foreach($decodedata as $orders){
                echo $orders['quantity']." ".$orders['name']."<br>";
              } 
              ?></td>-->
              <td><?php echo $order->orderid?></td>
              <td><?php echo $order->ordercreated ?></td>
              <td>
                <p id="recieptno" onclick='showReceipt(<?php echo json_encode($items)?>)'>
                  <?php echo $order->receiptno?>
                </p>
              </td>
              <td><?php echo $order->paymentmode?></td>
              <td><?php echo "₱".$items['total']?></td>
              <td><?php echo $order->orderstatus?></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
    <?php } ?>
  <div>
  <script>
    var itemData=new Array;
    var itemReceipt="";
    function search(event){
      const myForm=document.querySelector('#orderForm');
      const orderNo=document.querySelector('#o-no');
      const fromDate=document.querySelector('#f-date');
      const toDate=document.querySelector('#t-date'); 
      const date={
        'from':fromDate.value,
        'to':toDate.value
      };
      if(orderNo.value.length>0){
        event.preventDefault();
        const baseUrl="<?php echo base_url('orders/id/')?>";
        const fullUrl=baseUrl+orderNo.value;
        myForm.action=fullUrl;
        myForm.method="POST";
        myForm.submit();
        return;
      }
      else if(date['from'].length!=0&&date['to'].length!=0){
        event.preventDefault();
        const baseUrl="<?php echo base_url('orders/date/')?>";
        const dateString=`${date['from']}/${date['to']}`;
        const fullUrl=baseUrl+dateString;
        myForm.action=fullUrl;
        myForm.method="POST";
        myForm.submit();
        return;
      }
      else{
        event.preventDefault();
        myForm.action="<?php echo base_url('orders')?>";
        myForm.method="POST";
        myForm.submit();
        return;
      }
    }
    const receiptButton=document.querySelector("#recieptno");
    const togglereceiptScreen=document.querySelector("#receipt-mask");
    receiptButton.addEventListener('click',()=>{
      const visible=togglereceiptScreen.getAttribute("data-visible");
      if(visible==="false"){
        togglereceiptScreen.setAttribute("data-visible",true);
        receiptButton.setAttribute("aria-expanded",true);
      }
    });
    function payReceipt(){
      var form=document.createElement('form');
      form.method='POST';
      form.action='<?php echo base_url("orders/payment");?>';
      var input=document.createElement('input');
      input.type='hidden';
      input.name="receipt";
      input.value=itemReceipt;
      form.append(input);
      document.body.appendChild(form);
      form.submit();

    }
    function cancelReceipt(){
      var form=document.createElement('form');
      form.method='POST';
      form.action='<?php echo base_url("orders/cancel");?>';
      var input=document.createElement('input');
      input.type='hidden';
      input.name="receipt";
      input.value=itemReceipt;
      form.append(input);
      document.body.appendChild(form);
      form.submit();
    }
    function closeReceipt(){
      const closeReceipt=document.querySelector("#receipt-mask");
      const tableOrders=document.querySelector("#Orders");
      const showPay=document.querySelector(".btn-pay");
      const showCancel=document.querySelector(".btn-cancel");
      if(itemData.length>1){
        let i=0;
        while(i<itemData.length){
          const firstChild=tableOrders.querySelector("tr:first-child");
          tableOrders.removeChild(firstChild);
          i++;
        }
      }
      else{
        const firstChild=tableOrders.querySelector("tr:first-child");
        tableOrders.removeChild(firstChild)
      }
      closeReceipt.hidden=true;
    }
    function showReceipt(items){
      itemData=JSON.parse(items.orders);
      itemReceipt=items.receipt;
      const date = new Date(items.date);
      const month = date.toLocaleString('default', { month: 'long' });
      const day = date.getDate();
      const year = date.getFullYear();
      const formattedDate = `${month} ${day}, ${year}`;
      const showReceipt=document.querySelector("#receipt-mask");
      //place receipt values here
      const receiptValueAddress=document.querySelector("#val-1");
      const receiptValueDate=document.querySelector("#val-2");
      const receiptValueReceipt=document.querySelector("#val-3");
      const receiptValueStatus=document.querySelector("#val-4")
      showReceipt.hidden=false;
      receiptValueAddress.textContent=items.address;
      receiptValueDate.textContent=formattedDate;
      receiptValueReceipt.textContent=items.receipt;
      receiptValueStatus.textContent=items.status;
      
      //set the one for the list of orders
      const orders= JSON.parse(items.orders);
      if(orders.length>1){
        for(const item of orders){
          let count=1;
          const name=item.name;
          const quantity=item.quantity;
          const price=item.price;
          const total=quantity*price;
          const newRow=document.createElement("tr");
          const nameCell=document.createElement("td");
          nameCell.setAttribute('class','col-md-9 text-center');
          nameCell.textContent=name;
          const quantityCell=document.createElement("td");
          quantityCell.setAttribute('class','col-md-1 text-center');
          quantityCell.textContent=quantity;
          const priceCell=document.createElement("td");
          priceCell.setAttribute('class','col-md-1 text-center');
          priceCell.textContent="₱"+price;
          const totalCell=document.createElement("td");
          totalCell.setAttribute('class','col-md-1 text-center');
          totalCell.textContent="₱"+total;
          newRow.appendChild(nameCell);
          newRow.appendChild(quantityCell);
          newRow.appendChild(priceCell);
          newRow.appendChild(totalCell);
          const tableOrders = document.querySelector("#Orders");
          firstRow = document.querySelector("tr:first-child");
          if(count==1){
            const firstRow = tableOrders.querySelector("tr:first-child");
            tableOrders.insertBefore(newRow,firstRow);
          }
          else{
            const prevRow = tableOrders.querySelector(`tr:nth-child(${count})`);
            tableOrders.insertBefore(newRow,prevRowRow);
          }
          count++;
        }
      }
      else{
          const item=orders[0];
          const name=item.name;
          const quantity=item.quantity;
          const price=item.price;
          const total=quantity*price;
          const newRow=document.createElement("tr");
          const nameCell=document.createElement("td");
          nameCell.setAttribute('class','col-md-9 text-center');
          nameCell.textContent=name;
          const quantityCell=document.createElement("td");
          quantityCell.setAttribute('class','col-md-1 text-center');
          quantityCell.textContent=quantity;
          const priceCell=document.createElement("td");
          priceCell.setAttribute('class','col-md-1 text-center');
          priceCell.textContent="₱"+price;
          const totalCell=document.createElement("td");
          totalCell.setAttribute('class','col-md-1 text-center');
          totalCell.textContent="₱"+total;
          newRow.appendChild(nameCell);
          newRow.appendChild(quantityCell);
          newRow.appendChild(priceCell);
          newRow.appendChild(totalCell);
          const tableOrders = document.querySelector("#Orders");
          const firstRow = tableOrders.querySelector("tr:first-child");
          tableOrders.insertBefore(newRow, firstRow);
      }
      const receiptValueTotal=document.querySelector("#val-5");
      receiptValueTotal.textContent= "₱"+items.total;
      if(items.status=="pending"){
        const showPay=document.querySelector(".btn-pay");
        const showCancel=document.querySelector(".btn-cancel");
        showCancel.hidden=false
        showPay.hidden=false;
      }
    }
  </script>
  </body>
</html>