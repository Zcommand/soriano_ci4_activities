<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
POS System - Home
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="hero">
    <span class="hero-label">POINT-OF-SALE SYSTEM</span>

    <h1>Simple account management<br>in one place.</h1>

    <p>
        Manage customer information and staff accounts
        through a simple and organized interface.
    </p>
</section>

<section class="dashboard-grid">

    <a href="<?= site_url('customers') ?>" class="dashboard-card">
        <div class="card-icon">C</div>

        <div>
            <h2>Customer Accounts</h2>
            <p>View customer names, email addresses, and contact numbers.</p>
            <span>View customers →</span>
        </div>
    </a>

    <a href="<?= site_url('users') ?>" class="dashboard-card">
        <div class="card-icon">U</div>

        <div>
            <h2>User Accounts</h2>
            <p>View staff accounts and their assigned system roles.</p>
            <span>View users →</span>
        </div>
    </a>

</section>

<?= $this->endSection() ?>