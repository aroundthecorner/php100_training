<?php /* Smarty version 2.6.27, created on 2012-10-13 11:32:47
         compiled from test.tpl */ ?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $this->_tpl_vars['title']; ?>
</title>
	</head>
	<body>
				<h1>
			<?php echo $this->_tpl_vars['content']; ?>

		</h1>
		<p>
		<?php echo $this->_tpl_vars['arr1']['a']; ?>

		</p>
		<p>
		<?php echo $this->_tpl_vars['arr2'][0]; ?>

		</p>
		<p>
		<?php echo $this->_tpl_vars['arr3'][0][0]; ?>

		</p>
		<p>
		<?php echo $this->_tpl_vars['arr4']['aa'][0]; ?>

		</p>
		
		<p style="color:red;">
			<?php $_from = $this->_tpl_vars['arr1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<?php echo $this->_tpl_vars['v']; ?>
<br>
			<?php endforeach; endif; unset($_from); ?>
		</p>
		
		<p style="color:green;">
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arr3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
				<?php echo $this->_tpl_vars['arr3'][$this->_sections['i']['index']][1]; ?>
<br/>
			<?php endfor; endif; ?>
		</p>
		
		
		<p style="color:yellow;">
			<?php if ($this->_tpl_vars['value'] > 15): ?>
				<?php echo $this->_tpl_vars['arr3'][1][1]; ?>
<br/>
			<?php endif; ?>
		</p>
		
	</body>
</html>