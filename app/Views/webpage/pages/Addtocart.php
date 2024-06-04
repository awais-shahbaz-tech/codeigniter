<div class="mb-5 ">
    <div class="card-cart ">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Shopping Cart</b></h4></div>
                        <div class="col align-self-center text-right text-muted"><?php echo count($cartdata); ?></div>
                    </div>
                </div>   
                <?php 
                // Initialize total price variable
                $totalPrice = 0;
                if($cartdata){
                    foreach($cartdata as $cart){
                        // Calculate subtotal for each item
                        $subtotal = $cart["product_price"] * $cart["product_quantity"];
                        // Add subtotal to total price
                        $totalPrice += $subtotal;
                ?> 
                <div class="row border-top border-bottom" >
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid img-size" src="<?php echo $cart["product_image"]; ?>"></div>
                        <div class="col">
                            <div class="row text-muted"><?php echo $cart["product_name"]; ?> </div>
                        </div>
                        <div class="col">
                        <a href="#" class="quantity-update" data-id="<?php echo $cart['id']; ?>" data-action="minus">-</a><a href="#" class="border p-1 m-1"><?php echo $cart["product_quantity"]; ?></a><a href="#" class="quantity-update" data-id="<?php echo $cart['id']; ?>" data-action="plus">+</a>
                        </div>
                        <div class="col"><?php echo $cart["brand_name"]; ?></div>
                        <div class="col"><?php echo $subtotal; ?> <span class="close" data-id="<?php echo $cart['id']; ?>">&#10005;</span></div>
                    </div>
                </div>
                <?php    
                    }
                }?>
                <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
            </div>
            <div class="col-md-4 summary">
                <div><h5><b>Summary</b></h5></div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">ITEMS <?php echo count($cartdata); ?></div>
                    <div class="col text-right">PKR <?php echo number_format($totalPrice, 2); ?></div>
                </div>
                <form>
                    <p>SHIPPING</p>
                    <select><option class="text-muted">Standard-Delivery- PKR5.00</option></select>
                    <p>GIVE CODE</p>
                    <input id="code" placeholder="Enter your code" class="input-cart">
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">PKR <?php echo number_format($totalPrice + 5, 2); ?></div>
                </div>
                <button class="btn-cart">CHECKOUT</button>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const quantityLinks = document.querySelectorAll('.quantity-update');
        const closeIcons = document.querySelectorAll('.close');

        quantityLinks.forEach(function (link) {
            link.addEventListener('click', updateQuantity);
        });

        closeIcons.forEach(function (icon) {
            icon.addEventListener('click', removeCartItem);
        });

        function updateQuantity(event) {
            event.preventDefault();

            const quantityElement = this.parentNode.querySelector('.border');
            let quantity = parseInt(quantityElement.textContent);
            const productId = this.getAttribute('data-id');
            const action = this.getAttribute('data-action');

            if (action === 'plus') {
                quantity++;
            } else if (action === 'minus') {
                if (quantity > 1) {
                    quantity--;
                }
            }

            quantityElement.textContent = quantity;

            $.ajax({
                url:"<?php echo base_url(); ?>"+"updatecart",
                type: 'POST',
                data: {
                    id: productId,
                    product_quantity: quantity
                },
                success: function(response) {
                    alert(response?.status);
                },
            });
        }

        function removeCartItem(event) {
            event.preventDefault();

            const productId = this.getAttribute('data-id');
            
         console.log("3434" ,productId )
            $.ajax({
                url:"<?php echo base_url(); ?>"+"removecart",
                type: 'POST',
                data: {
                    id: productId
                },
                success: function(response) {
                    alert(response?.status);
                },
            });
        }
    });
</script>

</div>
