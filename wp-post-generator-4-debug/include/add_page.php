<style>
	.demo {
		border:1px solid #C0C0C0;
		border-collapse:collapse;
		padding:5px;
	}
	.demo th {
		border:1px solid #C0C0C0;
		padding:5px;
		background:#F0F0F0;
	}
	.demo td {
		border:1px solid #C0C0C0;
		padding:5px;
	}
</style>
<h2>ジェネレーター設定</h2>
<form action="" method="post" accept-charset="utf-8">
<table class="demo">
	<thead>
	<tr>
		<th>設定項目</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>ダミーデータ作成期間（半角数字でお願いします。）</td>
		<td><input type="text" name="dummy_data_arr[date]" value=""></td>
	</tr>
	<tr>
		<td>カテゴリー数（半角数字でお願いします。）</td>
		<td><input type="text" name="dummy_data_arr[category]" value=""></td>
	</tr>
	<tr>
		<td>アイキャッチ画像</td>
		<td>
			<input type="radio" name="dummy_data_arr[eyecatch]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[eyecatch]" value="true" disabled> 必要
		</td>
	</tr>
	<tr>
		<td>ポスト内容設定</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>h1</td>
		<td>
			<input type="radio" name="dummy_data_arr[h1]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[h1]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>h2</td>
		<td>
			<input type="radio" name="dummy_data_arr[h2]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[h2]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>h3</td>
		<td>
			<input type="radio" name="dummy_data_arr[h3]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[h3]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>h4</td>
		<td>
			<input type="radio" name="dummy_data_arr[h4]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[h4]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>h5</td>
		<td>
			<input type="radio" name="dummy_data_arr[h5]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[h5]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>h6</td>
		<td>
			<input type="radio" name="dummy_data_arr[h6]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[h6]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>段落(p)</td>
		<td>
			<input type="radio" name="dummy_data_arr[p]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[p]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>ol</td>
		<td>
			<input type="radio" name="dummy_data_arr[ol]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[ol]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>ul</td>
		<td>
			<input type="radio" name="dummy_data_arr[ul]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[ul]" value="true"> 必要
		</td>
	</tr>
	<tr>
		<td>画像（右寄せ・中央・左寄せすべて出力します。）</td>
		<td>
			<input type="radio" name="dummy_data_arr[wizimg]" value="false" checked> 不要
			<input type="radio" name="dummy_data_arr[wizimg]" value="true"> 必要
		</td>
	</tr>
	</tbody>
</table>
	<p><input type="submit" class="button-primary" value="作成"></p>
</form>
