<!-- BEGIN: main -->
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

<div class="notice">{TITLE}</div>
<table class="table table-bordered table-striped">
  <tr>
    <td rowspan="6" style="width: 150px"><img class="tooltip_img margin-right_10 fl" src="{ROW.avt}"/></td>
    <td style="width: 150px"><span class="icon_dot">{LANG.ten}</span></td>
    <td><span class="ten">{ROW.hoten}</span></td>
  </tr>
  
  <tr>
    <td><span class="icon_dot">{LANG.ngsinh}</span></td>
    <td>{ROW.ngsinh}</td>
  </tr>
  
  <tr>
    <td><span class="icon_dot">{LANG.gtinh}</span></td>
    <td><img src="{ROW.gtinh}" width="16px" /></td>
  </tr>
  <!-- BEGIN: nvdoan -->
  <tr>
    <td><span class="icon_dot">{LANG.nvdoan}</span></td>
    <td>{ROW.nvdoan}</td>
  </tr>
  <!-- END: nvdoan -->
  
  <tr>
  <td><span class="icon_dot">{LANG.dang}</span></td>
    <td><img src="{ROW.dang}" /></td>
  </tr>
  
  <!-- BEGIN: nvdang -->
  <tr>
  <td><span class="icon_dot">{LANG.nvdang}</span></td>
    <td>{ROW.nvdang}</td>
  </tr>
  <!-- END: nvdang -->
  
  <!-- BEGIN: quequan -->
  <tr>
    <td><span class="icon_dot">{LANG.quequan}</span></td>
    <td colspan="2">{ROW.quequan}</td>
  </tr>
  <!-- END: quequan -->
  
  <!-- BEGIN: diachi -->
  <tr>
    <td><span class="icon_dot">{LANG.diachi}</span></td>
    <td colspan="2">{ROW.diachi}</td>
  </tr>
  <!-- END: diachi -->
  
  <tr>
    <td><span class="icon_dot">{LANG.donvi}</span></td>
    <td colspan="2">{ROW.tendonvi} <a href="{DV_LINK}">{DV_K}</a></td>
  </tr>

   <tr>
    <td><span class="icon_dot">{LANG.chucvu}</td>
    <td colspan="2">
		<span class="cv1">{ROW.CHUCVU1}</span>
		<!-- BEGIN: cv2 -->
			<span class="cv2">{ROW.CHUCVU2}</span>
		<!-- END: cv2 -->
		
		<!-- BEGIN: cv3 -->
			<span class="cv3">{ROW.CHUCVU3}</span>
		<!-- END: cv3 -->
	</td>
  </tr>
  
  <!-- BEGIN: k_onl -->
  <tr rowspan="3">
    <td rowspan="3"><span class="icon_dot">{LANG.onl}</span></td>
    <td colspan="2">
		<!-- BEGIN: yahoo -->
		<a href="ymsgr:sendIM?{ROW.yahoo}" alt="Yahoo" title="Yahoo"><img border="0" src="http://mail.opi.yahoo.com/online?u={ROW.yahoo}&m=g&t=5"></a>
		<!-- END: yahoo -->
		
		<!-- BEGIN: web -->
		<a href="{ROW.website}" title="Website" target="_blank"><span class="icon_web">&nbsp;</span></a>
		<!-- END: web -->
		
		<!-- BEGIN: email -->
		<a href="mailto:{ROW.email}" title="Email" target="_blank"><span class="icon_email">&nbsp;</span></a>
		<!-- END: email -->

	</td>
  </tr>
  <!-- BEGIN: skype -->
  <tr rowspan="3">
    <td><span class="icon_dot">{LANG.sky}</span></td>
    <td colspan="2">
		<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
		<div id="SkypeButton_Call_{ROW.skype}_1" class="skype">
		  <script type="text/javascript">
			Skype.ui({
			  "name": "chat",
			  "element": "SkypeButton_Call_{ROW.skype}_1",
			  "participants": ["{ROW.skype}"],
			  "imageSize": 30
			});
		  </script>
		</div>
	</td>
  </tr>
  <!-- END: skype -->
  
  <!-- BEGIN: phone -->
  <tr rowspan="3">
    <td><span class="icon_dot">{LANG.phone}</span></td>
    <td colspan="2">{ROW.phone}</td>
  </tr>
  <!-- END: phone -->
  <!-- END: k_onl -->
  
  <!-- BEGIN: tomtat -->
  <tr>
    <td><span class="icon_dot">{LANG.tt}</span></td>
    <td colspan="2">{ROW.tomtat}</td>
  </tr>
  <!-- END: tomtat -->
</table>
<div class="shadow"></div>
<!-- END: main -->