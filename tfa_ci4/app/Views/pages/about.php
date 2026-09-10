<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
POS System - About
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="page-heading-row">

    <div class="page-header">
        <h1>About</h1>
        <p>Learn more about the purpose and structure of this application.</p>
    </div>

    <a href="<?= site_url('/') ?>" class="back-link">
        ← Return
    </a>

</div>


<!-- Project Overview -->

<section class="about-grid">

    <div class="card about-main">
        <span class="section-label">THE PROJECT</span>
        <h2>A foundation for a Point-of-Sale system.</h2>

        <p>
            This application is a basic four-page Point-of-Sale system
            developed using CodeIgniter 4. It demonstrates how routes,
            controllers, and views work together to deliver structured
            web pages using the MVC architecture.
        </p>

        <p>
            Customer and user records are currently handled through static
            PHP arrays, serving as temporary data sources before database
            integration is introduced.
        </p>
    </div>


    <!-- Academic Context -->

    <div class="card academic-card">

        <span class="section-label">ACADEMIC CONTEXT</span>

        <div class="about-detail">
            <span>Course</span>
            <strong>IT0049</strong>
            <p>Web System Technologies</p>
        </div>

        <div class="about-detail">
            <span>Activity</span>
            <strong>Technical Formative Assessment</strong>
            <p>
                From Zero to Four Pages:
                Your First CodeIgniter Application
            </p>
        </div>

        <div class="about-detail">
            <span>Framework</span>
            <strong>CodeIgniter 4</strong>
            <p>PHP Web Framework</p>
        </div>

    </div>

</section>


<!-- MVC Workflow -->

<section class="concept-section">

    <div class="concept-heading">
        <span class="section-label">HOW IT WORKS</span>
        <h2>Built around the MVC workflow</h2>
    </div>


    <div class="concept-grid">

        <div class="concept-card">
            <span>01</span>
            <h3>Route</h3>
            <p>
                Receives the requested URL and determines which
                controller method should run.
            </p>
        </div>


        <div class="concept-card">

            <span>02</span>
            <h3>Controller</h3>
            <p>
                Handles the request, prepares the required data,
                and selects the appropriate view.
            </p>
        </div>


        <div class="concept-card">

            <span>03</span>
            <h3>View</h3>
            <p>
                Receives the data and renders the final interface
                displayed in the browser.
            </p>
        </div>
    </div>

</section>

<?= $this->endSection() ?>