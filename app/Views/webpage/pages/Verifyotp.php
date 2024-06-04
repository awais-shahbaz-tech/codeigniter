<div class='mb-5 '>

    <div class="form-bg mb-5 " bis_skin_checked="1">
        <div class="" bis_skin_checked="1">
            <div class="row  justify-content-center align-items-center min-vh-100" bis_skin_checked="1">
                <div class="col-md-4 col-md-offset-4" bis_skin_checked="1">
                    <div class="form-container" bis_skin_checked="1">
                        <div class="form-icon" bis_skin_checked="1"><i class="fa fa-user"></i></div>
                        <h3 class="title">OTP Verification</h3>
                        <form class="form-horizontal"  method="post" action = "<?php echo base_url().'verifyuser' ; ?>">
                            <div class="form-group" bis_skin_checked="1">
                                <div class="row">
                                    <label class="form-label">OTP</label>
                                </div>
                                <div class="row">
                                    <input name="otp" class="form-control-login form-control" type="number"
                                        placeholder="otp" maxlength="4">
                                </div>
                            </div>
                          
                            <button type="submit" class="btn-login btn-default">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>