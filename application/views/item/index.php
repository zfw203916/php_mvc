<form action="" method="get">
    <input type="text" value="" name="keyword">
    <input type="submit" value="搜索">
</form>
<p><a href="/item/manage">新建</a></p>
<table>
	<tr>
        <th>ID</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
	<?php foreach ($items as $item): ?>
		<tr>
			<td><?php echo $item['id'] ?></td>
		</tr>
		<td>
			<a href="/item/detail/<?php echo $item['id']?>" title="查看详情">
				<?php echo $item['item_name'] ?>
			</a>
		</td>
		<td>
			<a href="/manage/delete/<?php echo $item['id']?>">删除</a>
			<a href="/manage/edite/<?php echo $item['id']?>">编辑</a>
		</td>
	<?php endforeach?>
</table>