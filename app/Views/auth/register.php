<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <div class="register-form">
                    <?php if (isset($errors['failed'])) : ?>
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $errors['failed']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $this->insert('auth/register-form', ['errors' => $errors ?? [], 'params' => $params ?? []]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop(); ?>