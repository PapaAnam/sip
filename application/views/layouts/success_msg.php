<?php
if($this->session->userdata('success_msg')){
	?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h3 class="text-success"><i class="fa fa-check"></i> Sukses</h3>
		<?php 
		if(is_array($this->session->userdata('success_msg'))){
			foreach ($this->session->userdata('success_msg') as $a) {
				echo $a.'<br>';
			}
		}else{
			echo $this->session->userdata('success_msg');
		}  
		?>
	</div>
	<?php
	$this->session->unset_userdata('success_msg');
}
?>