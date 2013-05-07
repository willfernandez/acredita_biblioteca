<div class="prestamos form">
<?php echo $this->Form->create('Prestamo');?>
	<fieldset>
		<legend><?php __('Edit Prestamo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sancione_id');
		echo $this->Form->input('estado');
		echo $this->Form->input('fecha_prestamo');
		echo $this->Form->input('fecha_entrega');
		echo $this->Form->input('ejemplare_id');
		echo $this->Form->input('usuario_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Prestamo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Prestamo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Prestamos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sanciones', true), array('controller' => 'sanciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sancione', true), array('controller' => 'sanciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ejemplares', true), array('controller' => 'ejemplares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ejemplare', true), array('controller' => 'ejemplares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios', true), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario', true), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>