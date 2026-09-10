<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
POS System - Customer Accounts
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="page-heading-row">

    <div class="page-header">
        <h1>Customer Accounts</h1>
        <p>View and manage customer information.</p>
    </div>

    <a href="<?= site_url('/') ?>" class="back-link">
        ← Return
    </a>

</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>