<?php require APPROOT .'/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Sign Up</h2>
                <p> Please fill all this fields to finish the registration process.</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                    <div class="form-group mt-3">
                        <label for="name">Name: <sup>*</sup> </label>
                        <input  type="text" name="name"  placeholder="First name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'];?>">
                        <span class="invalid-feedback"><?php echo $data['name_err'];?></span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">Email: <sup>*</sup> </label>
                        <input  type="email" name="email"  placeholder="Email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email'];?>">
                        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Password: <sup>*</sup> </label>
                        <input  type="password" name="password"  placeholder="Password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password'];?>">
                        <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="confirm_password">Confirm password: <sup>*</sup> </label>
                        <input  type="password" name="confirm_password"  placeholder="Confirm password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password'];?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT;?>/users/login" class="btn btn-light btn-block">
                                Have an account? Login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT .'/views/inc/footer.php'; ?>