<?= view('partials/header', ['title' => $title]) ?>
<div class="page-heading">
    <span class="eyebrow">Accounts / Staff</span>
    <h2><?= esc($title) ?></h2>
    <p><?= $isEdit ? 'Update this staff account.' : 'Add a staff account to the POS directory.' ?></p>
</div>
<?php if ($errors !== []): ?>
    <div class="form-errors" role="alert">
        <strong>Please correct the following:</strong>
        <ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul>
    </div>
<?php endif; ?>
<form class="account-form" action="<?= esc($action) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <label class="form-field">
        <span>Username</span>
        <input type="text" name="username" maxlength="50" required autocomplete="username"
            value="<?= esc($values['username'] ?? $user['username'] ?? '') ?>">
    </label>
    <label class="form-field">
        <span>Full name</span>
        <input type="text" name="full_name" maxlength="100" required autocomplete="name"
            value="<?= esc($values['full_name'] ?? $user['full_name'] ?? '') ?>">
    </label>
    <?php if ($isEdit): ?>
        <div class="form-field">
            <span>Current avatar</span>
            <img class="avatar-preview" src="<?= ! empty($user['avatar'])
                ? base_url('uploads/avatars/' . rawurlencode($user['avatar']))
                : base_url('images/avatar-placeholder.svg') ?>" alt="Current avatar for <?= esc($user['full_name']) ?>">
        </div>
        <label class="form-field">
            <span>Profile picture <small>JPG or PNG, up to 2 MB</small></span>
            <input type="file" name="avatar" accept="image/jpeg,image/png">
        </label>
    <?php endif; ?>
    <div class="actions">
        <button class="button primary" type="submit"><?= $isEdit ? 'Save changes' : 'Create user' ?></button>
        <a class="button" href="<?= site_url('users') ?>">Cancel</a>
    </div>
</form>
<?= view('partials/footer') ?>