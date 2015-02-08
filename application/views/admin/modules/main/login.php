<?php echo form_open('', array("id" => "loginForm",'method'=>'post'));?>
    <fieldset>
        <div class="form-group has-feedback ">
            <label>E-mail</label>
            <div class="input-group">
                <span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
                <input type="email" class="form-control" name="user[email]" maxlength="50" placeholder="E-mail">
            </div>
            <span class="help-block"></span>
        </div>
        <div class="form-group has-feedback">
            <label>Пароль</label>
            <div class="input-group">
                <span class="input-group-addon "><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control" name="user[password]" maxlength="50" placeholder="Пароль">
            </div>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-black col-sm-2 col-sm-offset-10">Войти</button>
        </div>
    </fieldset>
<?php echo form_close(); ?>

