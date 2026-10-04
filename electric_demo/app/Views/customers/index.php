<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
$statusBase = static fn(string $status = ''): string => base_url('customers') . '?' . http_build_query(array_filter([
    'search' => $search_keyword,
    'status' => $status,
    'type' => $filter_type,
], static fn($value): bool => $value !== ''));
?>

<section class="admin-shell customer-dashboard">
    <div class="container-fluid px-4">
        <div class="dashboard-topbar">
            <div>
                <div class="dashboard-title-row">
                    <h1>Customers</h1>
                    <span class="dashboard-user">Logged in as <?= esc($username) ?></span>
                </div>
                <p>Manage electric service accounts, contact details, meter records, and customer status.</p>
            </div>
            <a href="<?= base_url('customers/new') ?>" class="btn btn-primary dashboard-create-btn">
                <i class="fas fa-plus me-2"></i>Add Customer
            </a>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success"><?= esc($success) ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>

        <div class="dashboard-metrics">
            <div class="metric-card">
                <span><i class="fas fa-users"></i>Total Customers</span>
                <strong><?= esc($total_accounts) ?></strong>
                <small>All account records</small>
            </div>
            <div class="metric-card is-active">
                <span><i class="fas fa-circle-check"></i>Active</span>
                <strong><?= esc($active_accounts) ?></strong>
                <small>Currently connected</small>
            </div>
            <div class="metric-card is-inactive">
                <span><i class="fas fa-circle-minus"></i>Inactive</span>
                <strong><?= esc($inactive_accounts) ?></strong>
                <small>Temporarily inactive</small>
            </div>
            <div class="metric-card is-suspended">
                <span><i class="fas fa-triangle-exclamation"></i>Suspended</span>
                <strong><?= esc($suspended_accounts) ?></strong>
                <small>Requires attention</small>
            </div>
        </div>

        <div class="customer-viewbar">
            <div class="customer-tabs">
                <a href="<?= esc($statusBase()) ?>" class="<?= $filter_status === '' ? 'active' : '' ?>"><i class="fas fa-users"></i>All Customers</a>
                <a href="<?= esc($statusBase('active')) ?>" class="<?= $filter_status === 'active' ? 'active' : '' ?>"><i class="fas fa-circle-check"></i>Active</a>
                <a href="<?= esc($statusBase('inactive')) ?>" class="<?= $filter_status === 'inactive' ? 'active' : '' ?>"><i class="fas fa-circle-minus"></i>Inactive</a>
                <a href="<?= esc($statusBase('suspended')) ?>" class="<?= $filter_status === 'suspended' ? 'active' : '' ?>"><i class="fas fa-triangle-exclamation"></i>Suspended</a>
            </div>
            <span class="result-count"><?= esc($filtered_accounts) ?> result(s)</span>
        </div>

        <div class="tool-panel">
            <form method="get" action="<?= base_url('customers') ?>" class="row g-3 align-items-end">
                <div class="col-lg-4">
                    <label class="form-label">Search</label>
                    <div class="dashboard-search">
                        <i class="fas fa-magnifying-glass"></i>
                        <input type="text" class="form-control" name="search" placeholder="Name, account, email, phone, meter" value="<?= esc($search_keyword) ?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="">All Status</option>
                        <?php foreach (['active' => 'Active', 'inactive' => 'Inactive', 'suspended' => 'Suspended'] as $value => $label): ?>
                            <option value="<?= esc($value) ?>" <?= $filter_status === $value ? 'selected' : '' ?>><?= esc($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label class="form-label">Connection Type</label>
                    <select class="form-select" name="type">
                        <option value="">All Types</option>
                        <?php foreach (['residential' => 'Residential', 'commercial' => 'Commercial', 'industrial' => 'Industrial'] as $value => $label): ?>
                            <option value="<?= esc($value) ?>" <?= $filter_type === $value ? 'selected' : '' ?>><?= esc($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill"><i class="fas fa-search"></i></button>
                    <a href="<?= base_url('customers') ?>" class="btn btn-outline-secondary"><i class="fas fa-rotate-left"></i></a>
                </div>
            </form>
        </div>

        <div class="data-panel">
            <div class="table-toolbar">
                <div>
                    <h2>Customer Records</h2>
                    <p>Browse, edit, and maintain customer account information.</p>
                </div>
                <span><?= esc($filtered_accounts) ?> shown</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle customer-table">
                    <thead>
                        <tr>
                            <th>Account ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Meter</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($accounts)): ?>
                            <tr><td colspan="7" class="text-center text-muted py-5">No customer accounts found.</td></tr>
                        <?php endif; ?>
                        <?php foreach ($accounts as $account): ?>
                            <tr>
                                <td><strong><?= esc($account['account_number']) ?></strong></td>
                                <td>
                                    <div class="customer-name-cell">
                                        <span><?= esc(strtoupper(substr($account['customer_name'], 0, 1))) ?></span>
                                        <div>
                                            <div class="fw-semibold"><?= esc($account['customer_name']) ?></div>
                                            <small class="text-muted"><?= esc($account['address']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div><?= esc($account['email']) ?></div>
                                    <small class="text-muted"><?= esc($account['phone']) ?></small>
                                </td>
                                <td><?= esc($account['meter_number']) ?></td>
                                <td><span class="type-pill type-<?= esc($account['connection_type']) ?>"><?= esc(ucfirst($account['connection_type'])) ?></span></td>
                                <td><span class="status-pill status-<?= esc($account['status']) ?>"><?= esc(ucfirst($account['status'])) ?></span></td>
                                <td class="text-end">
                                    <a href="<?= base_url('customers/' . $account['id']) ?>" class="btn btn-sm btn-outline-primary" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="<?= base_url('customers/' . $account['id'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fas fa-pen"></i></a>
                                    <form action="<?= base_url('customers/' . $account['id'] . '/delete') ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this customer account?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($pager): ?>
                <div class="customer-pagination">
                    <?= $pager->links('customers', 'default_full') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
