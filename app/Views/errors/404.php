<?php $this->layout(config('view.layout')); ?>

<?php $this->start('page') ?>

<div class="error-area-404">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="error-content">
                    <h1>404</h1>
                    <h2>Oops! Page Not Found!</h2>
                    <p>The page you are looking for does not exist. It might have been moved or deleted.</p>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>