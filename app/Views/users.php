<?= view('partials/header', ['title' => 'User Accounts']) ?>
<div class="page-heading">
    <span class="eyebrow">Accounts / Staff</span>
    <h2>User Accounts</h2>
    <p>Staff access details for the people who keep the counter running.</p>
    <div class="actions">
        <a class="button primary" href="<?= site_url('users/new') ?>">Add user</a>
    </div>
</div>
<?php if ($message = session()->getFlashdata('success')): ?>
    <p class="notice" role="status"><?= esc($message) ?></p>
<?php endif; ?>
<div class="stat-grid">
    <div class="stat"><strong><?= count($users) ?></strong><span>Total staff accounts</span></div>
    <div class="stat"><strong>Live</strong><span>Account records retrieved from MySQL</span></div>
    <div class="stat"><strong>Secure</strong><span>Access details kept in one place</span></div>
</div>
<div class="section-heading">
    <span class="eyebrow">Team directory</span>
    <h3>Know who is responsible for what.</h3>
</div>
<div class="table-wrap">
    <table>
        <thead>
            <tr><th>Avatar</th><th>Username</th><th>Full name</th><th>Created at</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <img class="avatar" src="<?= ! empty($user['avatar'])
                            ? base_url('uploads/avatars/' . rawurlencode($user['avatar']))
                            : base_url('images/avatar-placeholder.svg') ?>" alt="Avatar for <?= esc($user['full_name']) ?>">
                    </td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['created_at']) ?></td>
                    <td><a href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= view('partials/footer') ?>