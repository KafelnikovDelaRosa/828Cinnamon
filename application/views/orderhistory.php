<!doctype html>
<html lang="en">
  <head>
    <title>828 Page - Order History</title>
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
    }
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
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
  </style>
</head>
<body>
  <nav>
        <a href="<?php echo base_url('Landing')?>" style="text-decoration:none">
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
    <div class="py-5 text-center">
        <h2>Order History</h2>
    </div>
    <?php if(empty($orders)){?>
      <center><h2>You have no purchases</h2></center>
    <?php } else{?>
      <table class="table table-striped table-inverse" style="align-self:center;">
          <thead class="thead-inverse">
              <tr>
                  <th>Receipt No</th>
                  <th>Mode of Payment</th>
                  <th>Order Status</th>
                  <th>Order Date</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach($orders as $order){
              $items=array(
                'address'=>$order->address,
                'receipt'=>$order->receiptno,
                'orders'=>$order->orders,
                'date'=>$order->orderdate,
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
              <td>
                <p id="recieptno" onclick='showReceipt(<?php echo json_encode($items)?>)'>
                  <?php echo $order->receiptno?>
                </p>
              </td>
              <td><?php echo $order->paymentmode?></td>
              <td><?php echo $order->orderstatus?></td>
              <td><?php echo $order->orderdate ?></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
      <div class="buttons" style="display:flex;justify-content:space-evenly;">
        <button class="btn btn1 btn-primary" onclick="window.location.href='<?php echo base_url('OrderHistory/pending')?>'">Pending</button>
        <button class="btn btn2 btn-success" onclick="window.location.href='<?php echo base_url('OrderHistory/completed')?>'">Completed</button>
        <button class="btn btn3 btn-danger" onclick="window.location.href='<?php echo base_url('OrderHistory/cancelled')?>'">Cancelled</button>
      </div>
    <?php } ?>
  <div>
  <script>
    var itemData=new Array;
    var itemReceipt="";
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
      form.action='<?php echo base_url("OrderHistory/payOrder");?>';
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
      form.action='<?php echo base_url("OrderHistory/cancelOrder");?>';
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