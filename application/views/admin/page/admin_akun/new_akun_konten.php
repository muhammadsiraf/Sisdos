<div class="container">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <h5 class="card-header">New Akun</h5>
                <div class="card-body">
                <!-- <?php echo validation_errors(); ?> -->
                    <?php echo form_open("dosen/view_form_new_akun")?>
                        <label for="">Username</label>
                        <input type="text" name="username" id="" class="form-control" value="<?php echo set_value('username'); ?>">
                        <?php echo form_error('username', '<div class="alert alert-danger">', '</div>'); ?>
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" value="<?php echo set_value('password'); ?>">
                        <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                        <label for="">Password Confirm</label>
                        <input type="password" name="password_conf" id="" class="form-control" value="<?php echo set_value('password_conf'); ?>">
                        <?php echo form_error('password_conf', '<div class="alert alert-danger">', '</div>'); ?>
                        <br>
                        <input type="submit" class="btn btn-success" class="btn btn-primary" value="submit">
                    </form> 
                </div>  
            </div>
        </div>
    </div>
</div>