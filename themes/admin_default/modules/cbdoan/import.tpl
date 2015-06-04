<!-- BEGIN: main -->
	<!-- BEGIN: loop -->
	<h4>{ERROR}</h4>
	{A}
	<!-- END: loop -->
	<form name="im_dv" action="{ACTION}" method="post" enctype="multipart/form-data">
		<table class="table table-striped table-bordered table-hover">
		<tbody>
			<tr>
				<td rowspan="2" style="width: 150px">{LANG.dsdonvi}</td>
				<td style="width: 300px"><input type="file" name="dv" id="dv"></td>
				<td><input type="submit" name="im_dv" value="{LANG.import}"></td>
			</tr>
			
			<tr>
				<td>{COUNT_DV} <a href="{DEL}&ds=dv" onclick="return confirm('{LANG.deleted_conf}')">({LANG.delete_all})</a></td>
				<td><span style="color: blue; font-size: 14px; font-weight: bold">{IM_DV} {UP_DV}</td>
			</tr>
		</tbody>
	</form>
		
		<tr><td colspan="3" style="height: 10px"></td></tr>
	
	<form name="im_cv" action="{ACTION}" method="post" enctype="multipart/form-data">	
		<tbody class="second">
			<tr>
				<td rowspan="2" style="width: 150px">{LANG.dschucvu}</td>
				<td style="width: 300px"><input type="file" name="cv" id="cv"></td>
				<td><input type="submit" name="im_cv" value="{LANG.import}"></td>
			</tr>
			
			<tr>
				<td>{COUNT_CV} <a href="{DEL}&ds=cv" onclick="return confirm('{LANG.deleted_conf}')">({LANG.delete_all})</a></td>
				<td><span style="color: blue; font-size: 14px; font-weight: bold">{IM_CV} {UP_CV}</td>
			</tr>
		</tbody>
	</form>
	
		<tr><td colspan="3" style="height: 10px"></td></tr>
	
	<form name="im_dscb" action="{ACTION}" method="post" enctype="multipart/form-data">		
		<tbody>
			<tr>
				<td rowspan="2" style="width: 150px">{LANG.dscb}</td>
				<td style="width: 300px"><input type="file" name="cbdoan" id="cbdoan"></td>
				<td><input type="submit" name="im_dscb" value="{LANG.import}"></td>
			</tr>
			
			<tr>
				<td>{COUNT_CB}<a href="{DEL}&ds=cb" onclick="return confirm('{LANG.deleted_conf}')">({LANG.delete_all})</a></td>
				<td><span style="color: blue; font-size: 14px; font-weight: bold">{IM_CB} <!-- BEGIN: ins --><span style="color: red; font-size: 14px; font-weight: bold">({SUSS_INS})</span><!-- END: ins --> 
				{UP_CB}<!-- BEGIN: upd --><span style="color: red; font-size: 14px; font-weight: bold">({SUSS_UPD})</span><!-- END: upd --></td>
			</tr>
		</tbody>
		</table>
	</form>
<!-- END: main -->