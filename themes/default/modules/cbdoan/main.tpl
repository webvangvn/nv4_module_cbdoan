<!-- BEGIN: main -->
	<div class="statics">
		<span>{THONGKE}</span>
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
	</div>
	<hr />

	<!-- BEGIN: search -->
	<p><span class="search_icon"><a href="#" id="slick-toggle">{LANG.search}</a></span></p>
	<div id="slickbox" style="display: block; text-align: center" class="box">
		<form name="search" action="{ACTION}" method="post">
			<input type="text" name="key">
			<input type="submit" name="sub_search" value="{LANG.search}">
		</form>
		<font class="searchtip">{LANG.search_tip}</font>
	</div>
	<!-- END: search -->

	<div class="box-notice">
		<div class="notice">{NOTICE}</div>
		{BODYTEXT}
		<div class="gt">{GT_DV}</div>
	</div>
	
	<!-- BEGIN: table -->
	<table class="table table-bordered table-striped">
	<thead>
		<tr align="center">
			<td style="width: 200px">{LANG.ten}</td>
			<td>{LANG.donvi}</td>
			<td>{LANG.maincv}</td>
			<td>{LANG.email}</td>
		</tr>
	</thead>
	<!-- BEGIN: loop -->
	<tbody>
		<tr>
			<td><a href="{DETAIL}" class="tooltip">{CBDOAN.hoten}
			<!-- BEGIN: toplip -->
			<span class="tip">
				<table border="0">
					<tr>
						<td style="width: 100px">
							<img class="tooltip_img margin-right_10 fl" src="{CBDOAN.avt}" width="100px"/>
						</td>
						<td>
							<table border=0>
								<tr>
									<td style="width: 60px" align="right">
										{LANG.ten}
									</td>
									<td class="name">
										<span>{CBDOAN.hoten}</span>
									</td>
								</tr>
								
								<tr>
									<td align="right">
										{LANG.ngsinh}
									</td>
									<td class="name">
										{CBDOAN.ngsinh}
									</td>
								</tr>
								
								<tr>
									<td align="right">
										{LANG.gtinh}
									</td>
									<td class="name">
										{CBDOAN.gtinh}
									</td>
								</tr>
								
								<!-- BEGIN: diachi -->
								<tr>
									<td align="right">
										{LANG.diachi}
									</td>
									<td class="name">
										{CBDOAN.diachi}
									</td>
								</tr>
								<!-- END: diachi -->
								
								<tr>
									<td align="right">
										{LANG.donvi}
									</td>
									<td class="name">
										{CBDOAN.tendonvi}
									</td>
								</tr>
								
							</table>
						</td>
					</tr>
				</table>
               </span>
			<!-- END: toplip -->
			</a></td>
			<td>{CBDOAN.tendonvi}</td>
			<td>{CBDOAN.tenchucvu}</td>
			<td><a href="mailto:{CBDOAN.email}">{CBDOAN.email}</a></td>
		</tr>
	</tbody>
	<!-- END: loop -->
	</table>
	<div class="shadow"></div>
	<!-- END: table -->
	<div class="page">{PAGE}</div>
<!-- END: main -->