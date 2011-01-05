<?php /* Smarty version Smarty-3.0.6, created on 2010-12-29 16:18:09
         compiled from "/home/siavorskyi/eclipse-workspace/zend-exp/application/views/smarty/error/error.html" */ ?>
<?php /*%%SmartyHeaderCode:9052269894d1bcfc183d033-04814690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f47a97814ccca548f129f6db7df041e6d801eb91' => 
    array (
      0 => '/home/siavorskyi/eclipse-workspace/zend-exp/application/views/smarty/error/error.html',
      1 => 1293668286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9052269894d1bcfc183d033-04814690',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Templated error page</h1>

<h2>Request</h2>
<ul>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('request')->value->getParams(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['param']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
    <li>
        <b><?php echo $_smarty_tpl->tpl_vars['param']->value;?>
:</b> <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
 
    </li>
    <?php }} ?>
</ul>

<h2>Error Message</h2>
<?php echo $_smarty_tpl->getVariable('message')->value;?>


<?php if (isset($_smarty_tpl->getVariable('exception',null,true,false)->value)){?>
    <h2>Exception</h2>
    <p>
        <?php echo $_smarty_tpl->getVariable('exception')->value->getMessage();?>

    </p>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('exception')->value->getTrace(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <b><?php echo $_smarty_tpl->tpl_vars['item']->value['file'];?>
</b><br/>
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
            <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 = <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
 <br/>
        <?php }} ?>
        <br/>
    <?php }} ?>
<?php }?>
