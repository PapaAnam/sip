<?php
if(validation_errors() != ''){
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Gagal</h3>
		<?=validation_errors()  ?>
	</div>
	<?php
}
?>
<?php
if(isset($error)){
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Gagal</h3>
		<?php 
		if(is_array($error)){
			foreach ($error as $a) {
				echo $a.'<br>';
			}
		}else{
			echo $error;
		}  
		?>
	</div>
	<?php
}
?>
<?php
if($this->session->flashdata('error')){
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Gagal</h3>
		<?php 
		if(is_array($this->session->flashdata('error'))){
			foreach ($this->session->flashdata('error') as $a) {
				echo $a.'<br>';
			}
		}else{
			echo $this->session->flashdata('error');
		}  
		?>
	</div>
	<?php
}
?>