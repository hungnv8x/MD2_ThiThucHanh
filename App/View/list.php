<h3 style="text-align: center">Danh sách mặt hàng</h3>
<a href="index.php?page=create" type="button" class="btn btn-success mb-3">Thêm mặt hàng</a>
<form class="form-inline my-2 my-lg-0" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

<table class="table mt-3">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tên hàng</th>
        <th scope="col">Loại hàng</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>

        <?php foreach ($products as $key => $product): ?>
        <tr>
        <td><?php echo $key + 1 ?></td>
        <td><?php echo $product->productName ?></td>
        <td><?php echo $product->categoryName ?></td>
        <td>
            <a href="index.php?page=edit&id=<?php echo $product->productId ?>">Chỉnh sửa</a>|
            <a onclick="return confirm('Ban có chắc chắn muốn xóa mặt hàng <?php echo $product->productName ?>')" href="index.php?page=delete&id=<?php echo $product->productId ?>">Xóa</a>
        </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>
