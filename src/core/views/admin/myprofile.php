
<div class="gm-12">
    <?php view::alerts(); ?>
    <form method="post" action="admin/profile" class="g-form">

    <br><div class="gm-12">
    <label class="gm-3"><?=__('Name')?></label>
    <input name="gila_username" value="<?=session::key('user_name')?>" class="gm-3" />
    </div>

    <br><div class="gm-12">
    <label class="gm-3"><?=__('Email')?></label>
    <input disabled value="<?=session::key('user_email')?>" class="gm-3" />
    </div>

    <br><div class="gm-12">
    <label class="gm-3"><?=__('Twitter Account')?></label>
    <input name='twitter_account' value="<?=$c->twitter_account?>" class="gm-3" />
    </div>

    <br><button type="submit" name="submit-btn" onclick="this.value='submited'"
    class="btn btn-primary"><?=__('Update Profile')?></button>
    </form>

    <form method="post" action="admin/profile" class="g-form">

    <br><div class="gm-12">
    <label class="gm-3"><?=('Password')?></label>
    <input name="old_pass" type="password" class="gm-3" />
    </div>

    <br><div class="gm-12">
    <label class="gm-3"><?=__('New Password')?></label>
    <input name="new_pass" type="password" class="gm-3" />
    </div>

    <br><div class="gm-12">
    <label class="gm-3"><?=__('Confirm Password')?></label>
    <input name="new_pass2" type="password" class="gm-3" />
    </div>

    <br><button type="submit" name="submit-btn" onclick="this.value='password'"
    class="btn btn-primary"><?=__('Change Password')?></button>
    </form>

    <form method="post" action="admin/profile" class="g-form">

    <br><div class="gm-12">
    <label class="gm-3"><?=__('Unique Token Key')?></label>
    <input readonly disabled type="text" value="<?=$c->token?>" class="gm-3" />
    </div>

    <br><div class="gm-12">
    <button type="submit" name="token" value="generate"
    class="btn btn-primary gm-3"><?=__('Generate Token Key')?></button>
    <button type="submit" name="token" value="delete"
    class="btn btn-primary gm-3"><?=__('Delete Token Key')?></button>
    </div>

    </form>
</div>