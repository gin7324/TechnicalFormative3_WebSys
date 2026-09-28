<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'GENIE POS') ?> | GENIE POS</title>
    <style>
        :root { --ink: #172121; --muted: #61706d; --paper: #f5f2ea; --panel: #fffdf8; --accent: #db5a3f; --line: #dedbd1; }
        * { box-sizing: border-box; }
        body { margin: 0; color: var(--ink); background: var(--paper); font-family: Georgia, 'Times New Roman', serif; }
        header { display: flex; align-items: center; justify-content: space-between; gap: 24px; max-width: 1120px; margin: auto; padding: 28px 24px; }
        .brand { color: var(--ink); font-size: 1.35rem; font-weight: bold; letter-spacing: .02em; text-decoration: none; }
        nav { display: flex; flex-wrap: wrap; gap: 20px; }
        nav a { color: var(--muted); font-family: Arial, sans-serif; font-size: .88rem; text-decoration: none; }
        nav a:hover { color: var(--accent); }
        main { max-width: 1120px; margin: auto; padding: 56px 24px 80px; }
        .eyebrow { color: var(--accent); font-family: Arial, sans-serif; font-size: .75rem; font-weight: bold; letter-spacing: .14em; text-transform: uppercase; }
        h1 { max-width: 720px; margin: 12px 0 18px; font-size: clamp(2.8rem, 7vw, 5.8rem); line-height: .95; letter-spacing: -.04em; }
        h2 { margin: 8px 0 12px; font-size: 2.2rem; letter-spacing: -.03em; }
        p { max-width: 650px; color: var(--muted); font-family: Arial, sans-serif; line-height: 1.7; }
        .actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 30px; }
        .button { display: inline-block; padding: 13px 18px; border: 1px solid var(--ink); color: var(--ink); font-family: Arial, sans-serif; font-size: .88rem; text-decoration: none; }
        .button.primary { border-color: var(--accent); background: var(--accent); color: white; }
        .stat-grid, .info-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 42px; }
        .stat, .info-block { padding: 22px; border: 1px solid var(--line); background: var(--panel); }
        .stat strong { display: block; margin-bottom: 7px; font-size: 2.1rem; }
        .stat span, .info-block p { margin: 0; color: var(--muted); font-family: Arial, sans-serif; font-size: .85rem; line-height: 1.55; }
        .info-block h3 { margin: 0 0 10px; font-size: 1.25rem; }
        .section-heading { margin: 56px 0 18px; }
        .section-heading h3 { margin: 8px 0; font-size: 1.65rem; }
        .page-heading { margin-bottom: 34px; }
        .table-wrap { overflow-x: auto; border: 1px solid var(--line); background: var(--panel); }
        table { width: 100%; border-collapse: collapse; min-width: 620px; }
        th, td { padding: 18px 20px; border-bottom: 1px solid var(--line); text-align: left; }
        th { color: var(--muted); font-family: Arial, sans-serif; font-size: .72rem; letter-spacing: .1em; text-transform: uppercase; }
        td { font-family: Arial, sans-serif; font-size: .94rem; }
        tbody tr:last-child td { border-bottom: 0; }
        .role { color: var(--accent); font-weight: bold; }
        .account-form { max-width: 680px; }
        .form-field { display: grid; gap: 8px; margin: 0 0 20px; color: var(--ink); font-family: Arial, sans-serif; font-size: .9rem; font-weight: bold; }
        .form-field small { margin-left: 8px; color: var(--muted); font-size: .78rem; font-weight: normal; }
        .form-field input:not([type="file"]) { width: 100%; min-height: 46px; padding: 10px 12px; border: 1px solid var(--line); background: var(--panel); color: var(--ink); font: inherit; }
        .form-field input:focus { outline: 2px solid var(--accent); outline-offset: 2px; }
        .form-errors { max-width: 680px; margin: 0 0 24px; padding: 16px 20px; border-left: 4px solid var(--accent); background: var(--panel); color: var(--ink); font-family: Arial, sans-serif; }
        .form-errors ul { margin-bottom: 0; }
        .notice { padding: 12px 16px; border-left: 4px solid #3f8062; background: var(--panel); }
        .avatar { display: block; width: 48px; height: 48px; border-radius: 50%; object-fit: cover; }
        .avatar-preview { width: 96px; height: 96px; border-radius: 50%; object-fit: cover; }
        footer { max-width: 1120px; margin: auto; padding: 0 24px 28px; color: var(--muted); font-family: Arial, sans-serif; font-size: .78rem; }
        @media (max-width: 760px) { .stat-grid, .info-grid { grid-template-columns: 1fr; } }
        @media (max-width: 600px) { header { align-items: flex-start; flex-direction: column; } main { padding-top: 32px; } }
    </style>
</head>
<body>
<header>
    <a class="brand" href="<?= base_url('/') ?>">GENIE POS</a>
    <nav aria-label="Main navigation">
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('about') ?>">About</a>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </nav>
</header>
<main>