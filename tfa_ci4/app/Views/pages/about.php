<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
POS System - About
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="page-heading-row">

    <div class="page-header">
        <h1>About</h1>
        <p>Learn more about this Point-of-Sale system.</p>
    </div>

    <a href="<?= site_url('/') ?>" class="back-link">
        ← Back to Home
    </a>

</div>

<div class="card">
    <h2>About the System</h2>
    <p>
        This Point-of-Sale system is built using CodeIgniter 4 and follows
        the Model-View-Controller architecture.
    <br>
        Submitted for IT0049 (Web System Technologies). Technical Formative
        Assessment:FROM ZERO TO FOUR PAGES: YOUR FIRST CODEIGNITER APPLICATION
    </p>
</div>


<?= $this->endSection() ?>