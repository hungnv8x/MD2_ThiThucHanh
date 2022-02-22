<h3>Thêm mặt hàng</h3>
<form action="" method="post">
    <table >
        <tr>
            <td><label>Tên hàng: </label></td>
            <td><input type="text" name="name"> </td>
        </tr>
        <tr>
            <td><label>Loại hàng: </label></td>
            <td><select name="category_id" id="">
                    <?php foreach ($categories  as $category): ?>
                        <option value="<?php echo $category->id?>"><?php echo $category->name?></option>
                    <?php endforeach; ?>
                </select> </td>
        </tr>
        <tr>
            <td><label>Giá: </label></td>
            <td><input type="text" name="price"> </td>
        </tr>
        <tr>
            <td><label>Số lượng: </label></td>
            <td><input type="text" name="quantity"></td>
        </tr>
        <tr>
            <td><label>Mô tả: </label></td>
            <td><textarea name="description"></textarea> </td>
        </tr>
        <tr>
            <td></td>
            <td><button class="btn btn-primary mr-1" >Thêm mặt hàng</button><a href="index.php?page=list" type="button" class="btn btn-primary">Thoát</a></td>
        </tr>
    </table>
</form>


