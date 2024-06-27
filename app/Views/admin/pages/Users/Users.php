<main id="main" class="main">

<div class="pagetitle">
  <h1>User Records</h1>
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
                  <b>N</b>ame
                </th>
                <th>Email</th>
                <th>Verify</th>
                <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                <!-- <th>Completion</th> -->
              </tr>
            </thead>
         
            <tbody>
            <?php if($users){
                        foreach($users as $user){

                    ?>
              <tr>
                <td><?php echo $user["username"]; ?></td>
                <td><?php echo $user["email"]; ?></td>
                <td><?php echo $user["verify"]; ?></td>
                <td><?php echo $user["created_at"]; ?></td>
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