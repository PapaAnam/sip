<div style="width: 100%; display: block; height: 70px;">
	<div style="margin-bottom: 20px;">
		<div style="width: 200px; float: left;">
			<img src="<?=isset($is_pdf) ? 'images/logo-dark.png' : base_url('images/logo-dark.png')?>">
			<p style="font-size: 11px; padding-left: 5px;">
				<?=$this->config->item('alamat')?>
			</p>
		</div>
		<?php 
		if(isset($with_header)){
			?>
			<div style="width: 200px; float: right;">
				<p style="font-size: 20px; font-weight: bold;">PAYSLIP</p>
				<p style="font-size: 11px; padding-left: 5px;">
					<?=$this->config->item('website')?>
				</p>
			</div>
			<?php 
		}
		?>
	</div>
</div>