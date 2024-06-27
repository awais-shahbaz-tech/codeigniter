

<main id="main" class="main">

<div class="pagetitle">
  <h1>Orders Records</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Users</h5>


          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>
                  <b>O</b>rder ID
                </th>
                <th>User ID</th>
                <th>Order Status</th>
                <th>Payment Method</th>
                <th>Delivery Status</th>
                <th>Customer Location</th>
                <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                <!-- <th>Completion</th> -->
              </tr>
            </thead>
         
            <tbody>
            <?php if($orders){
                        foreach($orders as $order){

                    ?>
              <tr>
                <td><?php echo $order["id"]; ?></td>
                <td><?php echo $order["user_id"]; ?></td>
                <td><?php echo $order["order_status"]; ?></td>
                <td><?php echo $order["payment_method"]; ?></td>
                <td><?php echo $order["delivery_status"]; ?></td>
                <td><?php echo $order["customer_location"]; ?></td>
                <td><?php echo $order["order_date"]; ?></td>


                <!-- <td>37%</td> -->
              </tr>
         
              <?php    
                     }
                    }?>
            </tbody>
        
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->