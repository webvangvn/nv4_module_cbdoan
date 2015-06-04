<!-- BEGIN: main -->
	<form name="donvi_edit" action="{ACTION}" method="POST">
	<input name="save" type="hidden" value="1" />
		<table class="table table-striped table-bordered table-hover">
		
		<tbody>
			<tr>
				<td>{LANG.madvi}</td>
			<td><input type="text" name="madvi1" value="{DV.madvi}" readonly="true" style="background:#FFFFCC"></td>
			</tr>
		</tbody>
		
		<tbody class="second">
			<tr>
				<td>{LANG.tendvi}</td>
			<td><input type="text" name="tendvi1" value="{DV.tendvi}"></td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td>{LANG.gt}</td>
				<td><textarea name="gt_dv1" cols="70" rows="5" style="width:300px">{DV.gt_dv}</textarea></td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td><input type="submit" value="{LANG.rec}" name="confirm" /></td>
				<td><b>{ERROR}</b></td>
			</tr>
		</tbody>
		</table>
	</form>
	{D}
<!-- END: main -->