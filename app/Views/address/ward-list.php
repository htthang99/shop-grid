<div class="ward-list list">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Ward</th>
                <th scope="col">District</th>
                <th scope="col">City</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>
                    <td><?= $item->id; ?></td>
                    <td><?= $item->name; ?></td>
                    <td><?= $item->district->id . ' - ' . $item->district->name; ?></td>
                    <td><?= $item->district->city->id . ' - ' . $item->district->city->name; ?></td>
                    <td><?= $item->created_at; ?></td>
                    <td>
                        <a class="remove-item delete-ward" href="<?= request()->baseUrl() ?>/address/ward/delete" data-id="<?= $item->id ?>" title="Delete <?= $item->name ?>" data-name="<?= $item->name ?>" data-return-url="<?= request()->fullUrl(); ?>">
                            <i class="lni lni-close"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>

<?= $this->insert('address/ward-delete-modal'); ?>