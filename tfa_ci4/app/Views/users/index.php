<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
POS System - User Accounts
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="page-heading-row">

    <div class="page-header">
        <h1>User Accounts</h1>
        <p>View staff accounts and their assigned roles.</p>
    </div>

    <a href="<?= site_url('/') ?>" class="back-link">
        ← Back to Home
    </a>

</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>