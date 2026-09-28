<?= view('partials/header', ['title' => 'Customer Accounts']) ?>
<div class="page-heading">
    <span class="eyebrow">Accounts / Customers</span>
    <h2>Customer Accounts</h2>
    <p>A quick view of the customers currently known to the shop.</p>
    <div class="actions">
        <a class="button primary" href="<?= site_url('customers/new') ?>">Add customer</a>
    </div>
</div>
<?php if ($message = session()->getFlashdata('success')): ?>
    <p class="notice" role="status"><?= esc($message) ?></p>
<?php endif; ?>
<div class="stat-grid">
    <div class="stat"><strong><?= count($customers) ?></strong><span>Total customer records</span></div>
    <div class="stat"><strong>100%</strong><span>Records include contact details</span></div>
    <div class="stat"><strong>Live</strong><span>Directory available to the counter team</span></div>
</div>
<div class="section-heading">
    <span class="eyebrow">Customer directory</span>
    <h3>Contact details at a glance.</h3>
</div>
<div class="table-wrap">
    <table>
        <thead>
            <tr><th>Full name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td><a href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= view('partials/footer') ?>