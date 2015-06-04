<!-- BEGIN: main -->
	<form name="chucvu_edit" action="{ACTION}" method="POST">
		<input name="save" type="hidden" value="1" />
		<table class="table table-striped table-bordered table-hover">
		
		<tbody>
			<tr>
				<td>{LANG.macvu}</td>
			<td><input type="text" name="macvu1" value="{CV.macvu}" readonly="true" style="background:#FFFFCC"></td>
			</tr>
		</tbody>
		
		<tbody class="second">
			<tr>
				<td>{LANG.tenchucvu}</td>
			<td><input type="text" name="tenchucvu1" value="{CV.tenchucvu}"></td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td>{LANG.gt}</td>
				<td><textarea name="gt_cv1" cols="70" rows="5" style="width:300px">{CV.gt_cv}</textarea></td>
			</tr>
		</tbody>
		
		<tbody>
			<tr>
				<td><input type="submit" name="confirm" value="{LANG.rec}" /></td>
				<td><b>{ERROR}</b></td>
			</tr>
		</tbody>
		</table>
	</form>
<!-- END: main -->