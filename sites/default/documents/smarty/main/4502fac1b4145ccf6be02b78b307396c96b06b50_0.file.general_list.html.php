<?php
/* Smarty version 4.5.5, created on 2025-10-29 17:40:15
  from '/home/customer/www/ryanj95.sg-host.com/public_html/openemr/templates/insurance_numbers/general_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6902517f2b6614_27638830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4502fac1b4145ccf6be02b78b307396c96b06b50' => 
    array (
      0 => '/home/customer/www/ryanj95.sg-host.com/public_html/openemr/templates/insurance_numbers/general_list.html',
      1 => 1761633664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6902517f2b6614_27638830 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/customer/www/ryanj95.sg-host.com/public_html/openemr/library/smarty/plugins/function.xlt.php','function'=>'smarty_function_xlt',),));
?>
<div class="table-responsive">
  <table class="table table-striped">
      <thead>
      <tr>
          <th><?php echo smarty_function_xlt(array('t'=>'Name'),$_smarty_tpl);?>
</th>
          <th>&nbsp;</th>
          <th><?php echo smarty_function_xlt(array('t'=>'Provider'),$_smarty_tpl);?>
 #</th>
          <th><?php echo smarty_function_xlt(array('t'=>'Rendering'),$_smarty_tpl);?>
 #</th>
          <th><?php echo smarty_function_xlt(array('t'=>'Group'),$_smarty_tpl);?>
 #</th>
      </tr>
      </thead>
      <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['providers']->value, 'provider');
$_smarty_tpl->tpl_vars['provider']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['provider']->value) {
$_smarty_tpl->tpl_vars['provider']->do_else = false;
?>
      <tr>
          <td>
              <a href="<?php echo $_smarty_tpl->tpl_vars['CURRENT_ACTION']->value;?>
action=edit&id=default&provider_id=<?php echo attr_url($_smarty_tpl->tpl_vars['provider']->value->id);?>
" onclick="top.restoreSession()">
                  <?php echo text($_smarty_tpl->tpl_vars['provider']->value->get_name_display());?>

              </a>
          </td>
          <td><?php echo smarty_function_xlt(array('t'=>'Default'),$_smarty_tpl);?>
&nbsp;</td>
          <td><?php echo text($_smarty_tpl->tpl_vars['provider']->value->get_provider_number_default());?>
&nbsp;</td>
          <td><?php echo text($_smarty_tpl->tpl_vars['provider']->value->get_rendering_provider_number_default());?>
&nbsp;</td>
          <td><?php echo text($_smarty_tpl->tpl_vars['provider']->value->get_group_number_default());?>
&nbsp;</td>
      </tr>
      <?php
}
if ($_smarty_tpl->tpl_vars['provider']->do_else) {
?>
      <tr>
          <td><?php echo smarty_function_xlt(array('t'=>'No Providers Found'),$_smarty_tpl);?>
</td>
      </tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
  </table>
</div>
<?php }
}
