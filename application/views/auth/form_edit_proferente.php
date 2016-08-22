<h4></h4>
<p></p>
<?=form_open('auth/buscaCodigo')?>
			<?=$this->session->flashdata('error')?>
				<table class="form">
					<tr>
					<td>
					<?=form_label('Ingrese Codigo','codigo')?>
					</br>
					<?=form_input(array('name' => 'codigo',  'id' => 'codigo'))?>	
				</td>
			</tr>					
</table>				
<?=form_submit('enviar','Enviar')?>
<?=form_close()?>