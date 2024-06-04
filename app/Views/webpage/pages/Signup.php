<div class='mb-5 '>

    <div class="form-bg mb-5 " bis_skin_checked="1">
        <div class="" bis_skin_checked="1">
            <div class="row  justify-content-center align-items-center min-vh-100" bis_skin_checked="1">
                <div class="col-md-4 col-md-offset-4" bis_skin_checked="1">
                    <div class="form-container" bis_skin_checked="1">
                        <div class="form-icon" bis_skin_checked="1"><i class="fa fa-user"></i></div>
                        <h3 class="title">SignUp</h3>
                        <form class="form-horizontal" method="post" action = "<?php echo base_url().'signupuser' ; ?>">
                        <div class="form-group" bis_skin_checked="1">
                                <div class="row">
                                    <label class="form-label">Username</label>
                                </div>
                                <div class="row">
                                    <input class="form-control-login form-control" name="username" type="text"
                                        placeholder="username">
                                </div>
                            </div>
                            <div class="form-group" bis_skin_checked="1">
                                <div class="row">
                                    <label class="form-label">email</label>
                                </div>
                                <div class="row">
                                    <input class="form-control-login form-control" name="email" type="email"
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
                            <button type="submit" class="btn-login btn-default">SignUp</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>