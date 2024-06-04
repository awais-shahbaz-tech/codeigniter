<script>
     

  
    </script>



<section class='page-header'>
  <div class="container">
    <div class='row'>
      <div class="col-md-12">
        <h1><?php echo $alldata['title']; ?></h1>
      </div>
    </div>
  </div>
</section>




<div class="container mt-5 mb-5">
    	<div class="row" id="productsdata">
        <?php if($alldata){

foreach($alldata['products'] as $product){
?>
    		<div class="col-md-3  mb-4">
				<div class="product-detail" data-name="<?= $product['name'] ?>" data-image="<?= $product['image'] ?>" data-price="<?= $product['price'] ?>">
				<div class="card" >
    					<div class="image-container">
    						<div class="first">
    							<div class="d-flex justify-content-between align-items-center">
    							<span class="discount">-25%</span>
    							<span class="wishlist"><i class="fa fa-heart-o"></i></span>
    						    </div>
    						</div>
							<div >
                                <a href="<?= base_url(); ?>webpage/productdetail/ideas/1">
                                    <img src="<?= $product['image']; ?>" class="img-fluid rounded thumbnail-image">
                                </a>
                            </div>
    					
    					</div>
    					<div class="product-detail-container p-2">
    							<div class="d-flex flex-column ">
    								<h5 class="dress-name"><?php echo $product["name"]; ?></h5>
    								<div class="d-flex flex-row  mb-2">
    									<span class="new-price"><?php echo $product["price"]; ?></span>
    									<!-- <small class="old-price text-right">$5.99</small> -->
    								</div>
    							</div>
    							<div class="d-flex justify-content-between align-items-center pt-1">
    								<div class="color-select d-flex ">
    									<input type="button" name="grey" class="btn creme">
    									<input type="button" name="red" class="btn red ml-2">
    									<input type="button" name="blue" class="btn blue ml-2">

    								</div>

    								<div class="d-flex ">
    									
    									<span class="item-size mr-2 btn" type="button">S</span>
    									<span class="item-size mr-2 btn" type="button">M</span>
    									<span class="item-size btn" type="button">L</span>

    								</div>
    								
 
    							</div>


    							<div class="d-flex justify-content-between align-items-center pt-1">
    								<div>
    									<i class="fa fa-star-o rating-star"></i>
    									<span class="rating-number">4.8</span>
    								</div>

    								
    								
    							</div>

    						

    					</div>
    					
    				</div>
			</div>
    				







    				

    			
    		</div>
            <?php    
        }
        }?>
    	</div>
        <nav aria-label="..." class='d-flex justify-content-center align-items-center mt-3'>
  <ul class="pagination">

    <li class="page-item active"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/1">1</a></li>
    <li class="page-item ">
      <a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/2">2 <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/3">3</a></li>
	<li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/4">4</a></li>
	<li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/5">5</a></li>
	<li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/6">6</a></li>
	<li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/7">7</a></li>
	<li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/8">8</a></li>
	<li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/9">9</a></li>
	<li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/10">10</a></li>
	<li class="page-item"><a class="page-link" href="<?php echo base_url();?>webpage/products/ideas/11">11</a></li>
   
  </ul>
</nav>
       <script>
		   function setSessionData(name, image, price) {
            $.ajax({
               
				url:"<?php echo base_url(); ?>"+"set-session-data",
                type: 'POST',
                data: {
                    name: name,
                    image: image,
                    price: price
                },
                success: function(response) {
                    if (response.status === 'success') {
                       
                    }
                }
            });
        }

		      $(document).ready(function() {
            $('.product-detail').on('click', function() {
				
                var price = $(this).data('price');
				var name = $(this).data('name');
               var image=$(this).data('image');
			  
			
                 setSessionData(name, image, price);
            });
        });



		// Assuming you have jQuery included in your project

// Wait for the DOM to be ready

	   </script>
    </div>