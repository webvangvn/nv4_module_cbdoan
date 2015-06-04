<!-- BEGIN: main -->
	<form name="add_dvi" action="{ACTION}" method="POST">
		<input name="save" type="hidden" value="1" />
		<table class="table table-striped table-bordered table-hover">
		<tbody class="second">
			<tr>
				<td>{LANG.tenchucvu}</td>
			<td><input type="text" name="tenchucvu" value="{CHUCVU.tencvu}"></td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td style="width: 200px">{LANG.gt}</td>
				<td><textarea name="gt_cv" cols="70" rows="5" style="width:300px">{CHUCVU.gt_cv}</textarea></td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td><input type="submit" name="confirm" value="{LANG.add_chucvu}" /></td>
				<td><b>{ERROR}</b></td>
			</tr>
		</tbody>
		</table>
	</form>
	<span class="quytac">{LANG.cv_quytac}</span>
<!-- END: main -->