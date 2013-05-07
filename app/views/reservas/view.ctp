<div class="prestamos view">
<h2><?php  __('Prestamo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prestamo['Prestamo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sancione'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($prestamo['Sancione']['id'], array('controller' => 'sanciones', 'action' => 'view', $prestamo['Sancione']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prestamo['Prestamo']['estado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Prestamo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prestamo['Prestamo']['fecha_prestamo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Entrega'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prestamo['Prestamo']['fecha_entrega']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ejemplare'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($prestamo['Ejemplare']['id'], array('controller' => 'ejemplares', 'action' => 'view', $prestamo['Ejemplare']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($prestamo['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $prestamo['Usuario']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prestamo', true), array('action' => 'edit', $prestamo['Prestamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Prestamo', true), array('action' => 'delete', $prestamo['Prestamo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prestamo['Prestamo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prestamos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prestamo', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sanciones', true), array('controller' => 'sanciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sancione', true), array('controller' => 'sanciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ejemplares', true), array('controller' => 'ejemplares', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ejemplare', true), array('controller' => 'ejemplares', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios', true), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario', true), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
