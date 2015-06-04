<!-- BEGIN: main -->
	<div class="form1">
		<form name="dvi" action="{ACTION}" method="POST">
			<select name="madvi" onchange="dvi.submit()">
				<option value="0">--- {LANG.chon_dv} ---</option>
				<!-- BEGIN: dv -->
				<option value="{LIST_DV.madvi}" {SELECT}>-- {LIST_DV.tendvi}</option>
				<!-- END: dv -->
			</select>
		</form>
	</div>
	<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td style="width: 20px">{LANG.id}</td>
			<td style="width: 150px">{LANG.ten}</td>
			<td>{LANG.donvi}</td>
			<td>{LANG.chucvu}</td>
			<td>{LANG.email}</td>
			<td style="width: 150px; text-align: center">{LANG.chucnang}</td>
		</tr>
	</thead>
	<!-- BEGIN: loop -->
	<tbody>
		<tr>
			<td style="text-align: center">{CBDOAN.id}</td>
			<td>{CBDOAN.hoten}</td>
			<td>{CBDOAN.tendonvi}</td>
			<td>{CBDOAN.chucvu1} -- {CBDOAN.chucvu2} -- {CBDOAN.chucvu3}</td>
			<td><a href="mailto:{CBDOAN.email}">{CBDOAN.email}</a></td>
			<td class="center">
				<span class="edit_icon"><a href="{EDIT}">{GLANG.edit}</a></span>
				&nbsp;&nbsp;
				<span class="delete_icon"><a href="{DEL}" onclick="return confirm('{LANG.delete_conf}')">{GLANG.delete}</a></span>
			</td>
		</tr>
	</tbody>
	<!-- END: loop -->
	</table>
	<span>{PAGE}</span>
<!-- END: main -->