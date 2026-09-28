<?= view('partials/header', ['title' => $title]) ?>
<div class="page-heading">
    <span class="eyebrow">Accounts / Customers</span>
    <h2><?= esc($title) ?></h2>
    <p><?= $isEdit ? 'Update this customer\'s contact details.' : 'Add a customer to the POS directory.' ?></p>
</div>
<?php if ($errors !== []): ?>
    <div class="form-errors" role="alert">
        <strong>Please correct the following:</strong>
        <ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul>
    </div>
<?php endif; ?>
<form class="account-form" action="<?= esc($action) ?>" method="post">
    <?= csrf_field() ?>
    <label class="form-field">
        <span>Full name</span>
        <input type="text" name="full_name" maxlength="100" required autocomplete="name"
            value="<?= esc($values['full_name'] ?? $customer['full_name'] ?? '') ?>">
    </label>
    <label class="form-field">
        <span>Email</span>
        <input type="email" name="email" maxlength="100" required autocomplete="email"
            value="<?= esc($values['email'] ?? $customer['email'] ?? '') ?>">
    </label>
    <label class="form-field">
        <span>Phone <small>Optional</small></span>
        <input type="tel" name="phone" maxlength="20" autocomplete="tel"
            value="<?= esc($values['phone'] ?? $customer['phone'] ?? '') ?>">
    </label>
    <div class="actions">
        <button class="button primary" type="submit"><?= $isEdit ? 'Save changes' : 'Create customer' ?></button>
        <a class="button" href="<?= site_url('customers') ?>">Cancel</a>
    </div>
</form>
<?= view('partials/footer') ?>