



<div class="container">
    <div id="demo" class=" mt-3 mb-5 border" data-ride="carousel">
        <div class="">
            <div class="">
                <div class="card-detail ">

      <?php 
        if(session('detail')){
        ?>
                    <div class="row">
                        <div class="col-md-6 text-center align-self-center"> <img class="img-fluid"
                                src="<?php echo session('detail')['image']; ?>"> </div>
                        <div class="col-md-6 info">
                            <div class="row title">
                                <div class="col">
                                <h2><?php echo session('detail')['name']; ?></h2>
                                </div>
                              
                            </div>
                            <p>Natural Description here</p> <span class="fa fa-star checked"></span>  <p><?php echo session('detail')['price']; ?></p> <span
                                class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span
                                class="fa fa-star checked"></span> <span class="fa fa-star-half-full"></span> 
                           
                                <div
                                class="add-to-cart" data-name="<?php echo session('detail')['name']; ?>" data-image="<?php echo session('detail')['image']; ?>" data-price="<?php echo session('detail')['price']; ?>"
                                class="d-flex justify-content-end mt-5" style="position: absolute; bottom: 0; right: 0;"> <div class="border p-3 border-success rounded text-white ">Add To Cart</div> </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
       
        </div>
    </div>
    <script>
          $(document).ready(function() {
            $('.add-to-cart').click(function() {
              
                var userId = 2;
                var brandName = "ideas";
                var productname = $(this).data('name');
                var productprice = $(this).data('price');
                var productimage = $(this).data('image');
                var productqunity = 1;
                
               console.log("222323" , productprice)
                $.ajax({
                    url:"<?php echo base_url(); ?>"+"addtocartphp",
                  
                    type: 'POST',
                    data: {
                        user_id: userId,
                        brand_name: brandName,
                        product_name: productname,
                        product_price: productprice,
                        product_image: productimage,
                        product_quantity : productqunity
                    },
                    success: function(response) {
                        alert(response?.status);
                    },
                 
                });
            });
        });
    </script>
</div>