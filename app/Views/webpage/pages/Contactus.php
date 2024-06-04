<?php 
        if(session()->getFlashdata('sent')){
        ?>

		<div class="alert w-50 d-flex justify-content-center alert-success alert-dismissible fade show" role="alert">
			<?php echo session()->getFlashdata("sent"); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>
        <?php } ?>
<div class="container_contact d-flex justify-content-center">

				<div class="">
			   <img class="img_contact_contact" src="https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-message-icon-design-vector-png-image_1587713.jpg" alt="IMG">	
		      </div>
			   <div class="">
					<h2 class="form-title">Contact us</h2>
						<p class="justify text-muted-contact">Have an enquiry or would like to give us feedback?<br>Fill out the form below to contact our team.</p>

                        <form action = "<?php echo base_url().'send-mail' ; ?>" method = "POST" >
						<div class="form-group-contact pt-2 pl-1">
							<label for="exampleInputName">Your name</label>
							<input type="text" class="form-control" name="name" id="exampleInputName">
						</div>


						<div class="form-group-contact pl-1">
							<label for="exampleInputEmail1">Your email address</label>
 						 	<input type="email" class="form-control" name="mailTo" id="exampleInputEmail1">
						</div>
                        
                        <div class="form-group-contact pt-2 pl-1">
							<label for="exampleInputName">Subject</label>
							<input type="text" class="form-control" name="subject" id="exampleInputName">
						</div>

						<div class="form-group-contact pl-1">
    						<label for="exampleFormControlTextarea1">Your message</label>
    						<textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="5"></textarea>

  						</div>
  						<div class="row">
  							<div class="col-md-3 offset-md-9"><button type="submit" class="btn-contact btn-primary">Send</button></div>
  						</div>
						
  						
  					</form>
						
			</div>
		
			
		</div>