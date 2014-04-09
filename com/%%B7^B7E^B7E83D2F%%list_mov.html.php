<?php /* Smarty version 2.6.18, created on 2014-04-09 06:23:00
         compiled from list_mov.html */ ?>
<ROOT>
    <RVIDEO>
       <?php if ($this->_tpl_vars['case'] == 1): ?>
        <?php echo $this->_tpl_vars['data']; ?>

        <?php $_from = $this->_tpl_vars['add_data']->videos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['ad']):
?>
        <RV>
            <title><?php echo $this->_tpl_vars['ad']->title; ?>
</title>
            <url>
                http://v.tvnoad.com/ckplayer/video.php?url=<?php echo $this->_tpl_vars['ad']->link; ?>

            </url>
            <l>0</l>
            <pic><?php echo $this->_tpl_vars['ad']->thumbnail; ?>
</pic>
            <vid><?php echo $this->_tpl_vars['k']+1; ?>
</vid>
        </RV>
        <?php endforeach; else: ?>

        <?php endif; unset($_from); ?>

        <?php elseif ($this->_tpl_vars['case'] == 2): ?>

        <?php $_from = $this->_tpl_vars['shows_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['shows']):
?>

        <?php $_from = $this->_tpl_vars['shows']->videos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video']):
?>
        <RV>
            <title><?php echo $this->_tpl_vars['video']->title; ?>
</title>
            <url>
                http://v.tvnoad.com/ckplayer/video.php?url=<?php echo $this->_tpl_vars['video']->link; ?>

            </url>
            <l>0</l>
            <pic><?php echo $this->_tpl_vars['video']->thumbnail; ?>
</pic>
            <vid><?php echo $this->_tpl_vars['k']+1; ?>
</vid>
        </RV>
        <?php endforeach; else: ?>
        子项暂无数据
        <?php endif; unset($_from); ?>

        <?php endforeach; else: ?>
        暂无数据
        <?php endif; unset($_from); ?>

        <?php elseif ($this->_tpl_vars['case'] == 3): ?>
        <?php $_from = $this->_tpl_vars['other_data']->videos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['od']):
?>
        <RV>
            <title><?php echo $this->_tpl_vars['od']->title; ?>
</title>
            <url>
                http://v.tvnoad.com/ckplayer/video.php?url=<?php echo $this->_tpl_vars['od']->link; ?>

            </url>
            <l>0</l>
            <pic><?php echo $this->_tpl_vars['od']->thumbnail; ?>
</pic>
            <vid><?php echo $this->_tpl_vars['k']+1; ?>
</vid>
        </RV>
        <?php endforeach; else: ?>

        <?php endif; unset($_from); ?>
        <?php endif; ?>
    </RVIDEO>
</ROOT>