<!doctype html>
<html lang="en">
  <head>
    <title>828 Page - Notification</title>
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
                <p style="cursor:pointer; font-size:1rem;" onclick="closeMessage()">X</p>
              </div>
              <div class="col-md-6">
                <address>
                  <strong>From: <p id="sender"></p></strong>
                  <strong>To: <p id="receiver"></p></strong>
                  <strong>Subject: <p id="subject"></p></strong>
                </address>
              </div>
            </div>
            <hr>
            <div class="message-container">
                <p id="message"></p>
            </div>
          </div>
        </div>
    </div>
    </div>
    <div class="py-5 text-center">
        <h2>Notifications</h2>
    </div>
    <?php if(empty($msg)){?>
      <center><h2>You have no notifications</h2></center>
    <?php } else{?>
      <table class="table table-striped table-inverse" style="align-self:center; ">
          <thead class="thead-inverse">
              <tr>
                  <th>Sender</th> 
                  <th>Subject</th>
                  <th></th>
                  <th>Date</date>
              </tr>
          </thead>
          <tbody>
            <?php foreach($msg as $content){
              $contents=array(
                'sender'=>$content->sender,
                'receiver'=>$content->receiver,
                'subject'=>$content->subject,
                'message'=>$content->message
              );
            ?>
            <tr>
              <td>
                <?php echo $content->sender?>
              </td>
              <td onclick='showMessage(<?php echo json_encode($contents)?>)' style="cursor:pointer">
                  <?php echo $content->subject?>
              </td>
              <td></td>
              <td><?php echo $content->date?></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
    <?php } ?>
  <div>
  <script>
    var itemData=new Array;
    const receiptButton=document.querySelector("#recieptno");
    const togglereceiptScreen=document.querySelector("#receipt-mask");
    receiptButton.addEventListener('click',()=>{
      const visible=togglereceiptScreen.getAttribute("data-visible");
      if(visible==="false"){
        togglereceiptScreen.setAttribute("data-visible",true);
        receiptButton.setAttribute("aria-expanded",true);
      }
    });
    function closeMessage(){
      const closeReceipt=document.querySelector("#receipt-mask");
      closeReceipt.hidden=true;
    }
    function showMessage(contents){
      const showReceipt=document.querySelector("#receipt-mask");
      //place receipt values here
      const msgValueSender=document.querySelector("#sender");
      const msgValueReceiver=document.querySelector("#receiver");
      const msgValueSubject=document.querySelector("#subject");
      const msgValueMessage=document.querySelector("#message");
      showReceipt.hidden=false;
      //set the one for the list of orders
      msgValueSender.textContent=contents.sender;
      msgValueReceiver.textContent=contents.receiver;
      msgValueSubject.textContent=contents.subject;
      msgValueMessage.textContent=contents.message;

    }
  </script>
  </body>
</html>