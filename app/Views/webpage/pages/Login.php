<div class='mb-5 '>

    <div class="form-bg mb-5 " bis_skin_checked="1">
        <div class="" bis_skin_checked="1">
            <div class="row  justify-content-center align-items-center min-vh-100" bis_skin_checked="1">
                <div class="col-md-4 col-md-offset-4" bis_skin_checked="1">
                    <div class="form-container" bis_skin_checked="1">
                        <div class="form-icon" bis_skin_checked="1"><i class="fa fa-user"></i></div>
                        <h3 class="title">Login</h3>
                        
                        <form class="form-horizontal" method="post" action = "<?php echo base_url().'loginuser' ; ?>">
                        <?php if (session()->getFlashdata("success")): ?>
                        <div class="alert align-self-center alert-success alert-dismissible fade show" role="alert">
			<?php echo session()->getFlashdata("success"); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		</div>
        <?php endif; ?>
                            <div class="form-group" bis_skin_checked="1">
                                <div class="row">
                                    <label class="form-label">email</label>
                                </div>
                                <div class="row">
                                    <input name="email" class="form-control-login form-control" type="email"
                                        placeholder="email address">
                                </div>
                            </div>
                            <div class="form-group" bis_skin_checked="1">
                                <div class="row">
                                    <label>password</label>
                                </div>
                                <div class="row">
                                    <input name="password" class="form-control-login form-control" style="width: 100%;" type="password"
                                        placeholder="password">
                                </div>
                            </div>
                            <button type="submit" class="btn-login btn-default">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>