<form class="row g-3 needs-validation" action="/register" method="POST" id="form_register" novalidate>
    <div class="title">
        <h3>No Account? Register</h3>
        <p>
            Registration takes less than a minute but gives you full
            control over your orders.
        </p>
    </div>
    <div class="form-floating mb-3">
        <input type="username" name="username" value="<?= $params['username'] ?? null ?>" class="form-control <?= isset($errors['username']) ? ' is-invalid' : ''  ?>" id="username" placeholder="Your username" required>
        <label for="username">Username</label>
        <div class="invalid-feedback">
            <?= $errors['username'] ?? null; ?>
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="email" name="email" value="<?= $params['email'] ?? null ?>" class="form-control <?= isset($errors['email']) ? ' is-invalid' : ''  ?>" id="email" placeholder="name@example.com" required>
        <label for="email">Email address</label>
        <div class="invalid-feedback">
            <?= $errors['email'] ?? null ?>
        </div>

    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control <?= isset($errors['password']) ? ' is-invalid' : ''  ?>" id="password" placeholder="Password" required>
        <label for="password">Password</label>
        <div class="invalid-feedback">
            <?= $errors['password'] ?? null ?>
        </div>
    </div>
    <div class="form-floating">
        <input type="password" name="confirm_password" class="form-control <?= isset($errors['confirm_password']) ? ' is-invalid' : ''  ?>" id="confirm_password" placeholder="Password" required>
        <label for="confirm_password">Confirm Password</label>
        <div class="invalid-feedback">
            <?= $errors['confirm_password'] ?? null ?>
        </div>
    </div>

    <div class="form-floating">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="terms" required>
            <label class="form-check-label" for="terms">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
    <div class="button">
        <button class="btn" type="submit">Register</button>
    </div>
    <p class="outer-link">
        Already have an account? <a href="login.php">Login Now</a>
    </p>
</form>