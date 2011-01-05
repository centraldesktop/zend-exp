<?php /* Smarty version Smarty-3.0.6, created on 2010-12-29 18:30:18
         compiled from "/home/siavorskyi/eclipse-workspace/zend-exp/application/views/smarty/folder/view.html" */ ?>
<?php /*%%SmartyHeaderCode:4654845684d1beeba21c3f4-06919788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4a529914dd9e2bd66ff154977d019d0ea11131f' => 
    array (
      0 => '/home/siavorskyi/eclipse-workspace/zend-exp/application/views/smarty/folder/view.html',
      1 => 1293676216,
      2 => 'file',
    ),
    '92ff2d9f12861c467843e80865ad5cbf7929fb42' => 
    array (
      0 => '/home/siavorskyi/eclipse-workspace/zend-exp/application/views/smarty/_common/base-app.html',
      1 => 1293676107,
      2 => 'file',
    ),
    '58ae0fd2acecf68e18496f33c8f02d0de629527a' => 
    array (
      0 => '/home/siavorskyi/eclipse-workspace/zend-exp/application/views/smarty/_common/base.html',
      1 => 1293676072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4654845684d1beeba21c3f4-06919788',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Central Desktop — items in folder
    </title>
    
    <!-- general styles -->
    <!-- general scripts -->
    
    
<!-- application styles -->
<!-- application scripts -->

    <!-- view styles -->
    <!-- view scripts -->


</head>
<body>
    <div style="margin: 20px; background: #ece5c9">
        <div style="background: #e4ce98">
            <?php echo $_smarty_tpl->getVariable('tr')->value->_('This is part of <b>general template base</b>');?>

        </div>
        <div style="padding:1px">
            
<div style="margin: 20px; background: #D0E2D9">
    <div style="background: #90B5A4">
        <?php echo $_smarty_tpl->getVariable('tr')->value->_('This is part of <b>application template base</b>');?>

    </div>
    <div style="padding:1px">
        <div style="margin: 20px;">
            
    <h3 style="display:inline; padding-right:100px;"><?php echo $_smarty_tpl->getVariable('folder')->value['title'];?>
</h3>
    Format: 
    <a href="/folder/<?php echo $_smarty_tpl->getVariable('folder')->value['pk_id'];?>
.html">HTML</a> |
    <a href="/folder/<?php echo $_smarty_tpl->getVariable('folder')->value['pk_id'];?>
.xml">XML</a> |
    <a href="/folder/<?php echo $_smarty_tpl->getVariable('folder')->value['pk_id'];?>
.json">JSON</a>
    <p>
        <b><?php echo $_smarty_tpl->getVariable('tr')->value->_('items in folder');?>
</b>
    </p>
    <ul>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <li>
            <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

            <span style="padding:0 20px">
                <a href="/item/<?php echo $_smarty_tpl->tpl_vars['item']->value['pk_id'];?>
">html</a>
                <a href="/item/<?php echo $_smarty_tpl->tpl_vars['item']->value['pk_id'];?>
.xml">XML</a>
                <a href="/item/<?php echo $_smarty_tpl->tpl_vars['item']->value['pk_id'];?>
.json">JSON</a>
            </span>
            <a href="/item/<?php echo $_smarty_tpl->tpl_vars['item']->value['pk_id'];?>
/delete"><?php echo $_smarty_tpl->getVariable('tr')->value->_('delete');?>
</a>
        </li>
        <?php }} ?>
    </ul>

        </div>
    </div>  
</div>

<?php if (count($_smarty_tpl->getVariable('messages')->value)){?>
<ul style="position:absolute; left:50%; top:0; margin: 0 0 0 -150px; padding: 20px; width:300; background:#fff; border: 1px solid #777;">
    <?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('messages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
?>
    <li>
       [status: <?php echo $_smarty_tpl->tpl_vars['message']->value['status'];?>
] <?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
 
    </li>
    <?php }} ?>
</ul>
<?php }?>
  

        </div>
    </div>
</body>
</html>    