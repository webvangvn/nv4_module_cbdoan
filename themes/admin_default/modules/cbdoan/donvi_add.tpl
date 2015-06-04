<!-- BEGIN: main -->
	<form name="add_dvi" action="{ACTION}" method="POST">
	<input name="save" type="hidden" value="1" />
		<table class="table table-striped table-bordered table-hover">
		<tbody class="second">
			<tr>
				<td>{LANG.tendvi}</td>
			<td><input type="text" name="tendvi" value="{DONVI.tendvi}"></td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td style="width: 200px">{LANG.gt}</td>
				<td><textarea name="gt_dv" cols="70" rows="5" style="width:300px">{DONVI.gt_dv}</textarea></td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td><input type="submit" name="confirm" value="{LANG.add_donvi}" /></td>
				<td><b>{ERROR}</b></td>
			</tr>
		</tbody>
		</table>
	</form>
	<span class="quytac">{LANG.dv_quytac}</span>
<!-- END: main -->