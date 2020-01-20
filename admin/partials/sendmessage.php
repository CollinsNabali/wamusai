
<!-- DataTables Example -->
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="card-header">
               <i class="fas fa-phone"></i>
                Send Message
            </div>
            <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                           
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input type="text" class="form-control"  name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="details">Message</label>
                                    <textarea id="message" class="form-control" name="message"></textarea>
                                </div>
                                <div class="form-group tm-yellow-gradient-bg text-center">
                                    <button type="submit" name="send" value="send" class="btn btn-primary"><i class="fas fa-mobile"></i> Send SMS</button>
                                </div>                                                 
                        </form>  
            </div>           
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="card-header">
               <i class="fas fa-envelope"></i>
                Send Email
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Recipient Email address</label>
                        <input type="email" class="form-control" require="required"  name="email">
                    </div>
                    <div class="form-group">
                        <label>Compose</label>
                        <textarea class="form-control" name="mail" require="required"></textarea>
                    </div>
                    <div class="form-group" style="text-align:center;">
                        <button type="submit" class="btn btn-success"><i class="fas fa-envelope"></i>  Send</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</div>
<?php 

function sendSMS($phone, $message){
   require_once('AfricasTalkingGateway.php');
    $username   = "jim";
    $apikey     = "892a4d70246623ad1eb11fc01bc9220520bd031d5d6ac8b0d937d89afe9d28f6";
    $recipients = "$phone";
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    try
    {
        $result = $gateway->sendMessage($recipients, $message);
        // status is either "Success" or "error message"
    }
    catch ( AfricasTalkingGatewayException $e )
    {

    }
}


include 'partials/connection.php';
if (isset($_POST['send'])) {

    $phone = $_POST['phone'];
    $message  = $_POST['message'];


    sendSMS($phone,$message);
    
    
    
}

?>




     