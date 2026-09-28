<?= view('partials/header', ['title' => 'Home']) ?>
<span class="eyebrow">Point of sale, made clear</span>
<h1>Keep the counter moving.</h1>
<p>GENIE POS gives your team a calm, practical home for the people and accounts behind every sale.</p>
<div class="actions">
    <a class="button primary" href="<?= base_url('customers') ?>">View customers</a>
    <a class="button" href="<?= base_url('users') ?>">View staff accounts</a>
</div>
<div class="stat-grid">
    <div class="stat"><strong>05</strong><span>Customer accounts ready to serve</span></div>
    <div class="stat"><strong>05</strong><span>Staff accounts across the team</span></div>
    <div class="stat"><strong>04</strong><span>Core pages in this first release</span></div>
</div>
<div class="section-heading">
    <span class="eyebrow">Start here</span>
    <h3>One place for the people behind each transaction.</h3>
</div>
<div class="info-grid">
    <div class="info-block"><h3>Customer context</h3><p>Find contact details quickly when a returning customer needs help at the counter.</p></div>
    <div class="info-block"><h3>Team visibility</h3><p>See who has access to the system and the role each staff member performs.</p></div>
    <div class="info-block"><h3>Ready to grow</h3><p>This foundation can later connect to products, sales, inventory, and reporting.</p></div>
</div>
<?= view('partials/footer') ?>