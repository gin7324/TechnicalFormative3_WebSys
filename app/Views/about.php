<?= view('partials/header', ['title' => 'About']) ?>
<div class="page-heading">
    <span class="eyebrow">About the system</span>
    <h2>Simple tools for a busy counter.</h2>
    <p>This first version of GENIE POS focuses on clear account views and an easy path between the pages your team uses most.</p>
</div>
    <div class="info-grid">
        <div class="info-block"><h3>Clear by design</h3><p>Important account details stay visible, readable, and easy to scan during a busy shift.</p></div>
        <div class="info-block"><h3>Built for teams</h3><p>Customer information and staff roles have dedicated spaces so everyone knows where to look.</p></div>
        <div class="info-block"><h3>Room to expand</h3><p>Static sample data keeps this first release simple while leaving the structure ready for a database.</p></div>
    </div>
    <div class="section-heading">
        <span class="eyebrow">What comes next</span>
        <h3>A practical path from prototype to daily tool.</h3>
    </div>
    <p>The next stages can add secure sign-in, real customer and user management, product catalogues, sales transactions, inventory tracking, and reports.</p>
<div class="actions">
    <a class="button primary" href="<?= base_url('customers') ?>">Browse customer accounts</a>
    <a class="button" href="<?= base_url('users') ?>">Browse user accounts</a>
</div>
<?= view('partials/footer') ?>