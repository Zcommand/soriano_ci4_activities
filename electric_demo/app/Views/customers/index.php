<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="admin-shell">
    <div class="container-fluid px-4">
        <div class="admin-header">
            <div>
                <p class="eyebrow mb-1">Customer Account Management</p>
                <h1>Electric Customer Records</h1>
                <p class="text-muted mb-0">Logged in as <strong><?= esc($username) ?></strong></p>
            </div>
            <a href="<?= base_url('customers/new') ?>" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Customer
            </a>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success"><?= esc($success) ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>

        <div class="row g-3 mb-4">
            <div class="col-lg-3 col-md-6"><div class="metric-card"><span>Total</span><strong><?= esc($total_accounts) ?></strong></div></div>
            <div class="col-lg-3 col-md-6"><div class="metric-card is-active"><span>Active</span><strong><?= esc($active_accounts) ?></strong></div></div>
            <div class="col-lg-3 col-md-6"><div class="metric-card is-inactive"><span>Inactive</span><strong><?= esc($inactive_accounts) ?></strong></div></div>
            <div class="col-lg-3 col-md-6"><div class="metric-card is-suspended"><span>Suspended</span><strong><?= esc($suspended_accounts) ?></strong></div></div>
        </div>

        <div class="tool-panel">
            <form method="get" action="<?= base_url('customers') ?>" class="row g-3 align-items-end">
                <div class="col-lg-4">
                    <label class="form-label">Search</label>
                    <input type="text" class="form-control" name="search" placeholder="Name, account, email, phone, meter" value="<?= esc($search_keyword) ?>">
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 mb-0">Accounts</h2>
                <span class="text-muted small"><?= esc($filtered_accounts) ?> result(s)</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle customer-table">
                    <thead>
                        <tr>
                            <th>Account</th>
                            <th>Customer</th>
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
                                    <div class="fw-semibold"><?= esc($account['customer_name']) ?></div>
                                    <small class="text-muted"><?= esc($account['address']) ?></small>
                                </td>
                                <td>
                                    <div><?= esc($account['email']) ?></div>
                                    <small class="text-muted"><?= esc($account['phone']) ?></small>
                                </td>
                                <td><?= esc($account['meter_number']) ?></td>
                                <td><span class="badge rounded-pill text-bg-info"><?= esc(ucfirst($account['connection_type'])) ?></span></td>
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
