<!-- BEGIN: main -->
	<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<td style="width: 60px">{LANG.madvi}</td>
			<td>{LANG.tendvi}</td>
			<td style="width: 150px; text-align: center">{LANG.chucnang}</td>
		</tr>
	</thead>
	<!-- BEGIN: loop -->
	<tbody>
		<tr>
			<td>{DV.madvi}</td>
			<td><a href="{KHAC}">{DV.tendvi}</a></td>
			<td class="center">
				<span class="edit_icon"><a href="{EDIT}">{GLANG.edit}</a></span>
				&nbsp;&nbsp;
				<span class="delete_icon"><a href="{DEL}" onclick="return confirm('{LANG.delete_conf}')">{GLANG.delete}</a></span>
			</td>
		</tr>
	</tbody>
	<!-- END: loop -->
	<tr>
	<td colspan='3'><span class="add_icon"><a href="{DV_ADD}"><b>{LANG.add_donvi}</b></a></span></td>
	</tr>
	</table>
<!-- END: main -->