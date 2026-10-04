<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login - Puihaha Electric') ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/custom.css?v=20261005c') ?>" rel="stylesheet">
</head>
<body class="auth-body">
    <main class="auth-page">
        <section class="auth-hero">
            <div class="auth-mark">
                <i class="fas fa-bolt"></i>
            </div>
            <div>
                <h1>Hello<br>Puihaha Electric</h1>
                <p>Manage customer accounts, search records, use pagination, and maintain electric service data in one focused workspace.</p>
            </div>
            <p class="auth-footnote">&copy; Submitted by Soriano, John Ronen. Staff access only.</p>
        </section>

        <section class="auth-form-panel">
            <a href="<?= base_url() ?>" class="auth-brand">
                <i class="fas fa-bolt"></i>
                <span>Puihaha Electric</span>
            </a>

            <div class="auth-form-card">
                <p class="eyebrow mb-2">Customer Records</p>
                <h2>Welcome Back!</h2>
                <p class="auth-muted">Log in with your staff account to continue.</p>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="post" class="auth-form">
                    <?= csrf_field() ?>
                    <label for="username">Username or Registered Email</label>
                    <input type="text" id="username" name="username" value="<?= esc(old('username')) ?>" required autofocus>

                    <label for="password">Password</label>
                    <div class="auth-password-field">
                        <input type="password" id="password" name="password" required>
                        <button type="button" class="password-toggle" aria-label="Show password" data-target="password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    <button type="submit" class="auth-submit">Login Now</button>
                </form>

                <p class="auth-hint">Default staff login: <strong>admin</strong> / <strong>admin123</strong><br>Registered accounts log in using their email address.</p>
            </div>
        </section>
    </main>

    <script src="<?= base_url('public/assets/js/app.js?v=20261005c') ?>"></script>
</body>
</html>
