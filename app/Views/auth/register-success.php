<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="register-success">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="success-content">
                                <i class="lni lni-checkmark"></i>
                                <h2>Your Account created successfully</h2>
                                <p>Thanks for joining with us, please sign in to your account now.</p>
                                <div class="button">
                                    <a href="/login" class="btn">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>