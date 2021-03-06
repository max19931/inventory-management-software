<?php $this->load->view('home/head'); ?>

<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">

    <div align="center">
        <div class="inner_mid" >

            <div class="top_bar" >

                <div class="top_bar_left" > Administrative User </div>
                <div class="top_bar_right">

                    <div class="top_menu">
                        <ul>

                            <li>
                                <a href="<?php echo base_url(); ?>user/add" id="add"  title="Add in Website"  ><img src="<?php echo base_url(); ?>image/new.jpg" title="Add new" />
                                    <p> New </p>
                                </a>

                            </li>

                            <li>
                                <a href="javascript:history.go(-1);" title="Go Back">
                                    <img src="<?php echo base_url(); ?>image/goback.png" width="32" height="32" border="0" />
                                    <p> Go Back </p>
                                </a>
                            </li>
                            <div class="clear"> </div>
                        </ul>

                    </div>

                </div>

                <div class="clear"></div>

            </div>

            <?php
            if ($this->session->flashdata('name')) {
                ?>
                <div class="ok"><?php echo$this->session->flashdata('name'); ?></div>
            <?php } ?>
            <div class="down_list">

                <table width="96%" border="0" align="center" cellpadding="1" cellspacing="0" style="color:#333333">

                    <tr style="font-weight:bold; background:url(image/table_top_bg.jpg) repeat-x top #E0E0E0; border:#AFAFAF solid 1px;">
                        <td width="33" height="25" class="table_border" style="border-right:none;" ><div align="center" class="style2">#</div></td>
                        <td width="285" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">User Name</div></td>
                        <td width="129" class="table_border" style="border-right:none;"><div align="center" class="style2">Login ID </div></td>
                        <td width="110" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Type</div></td>
                        <td width="106" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Status</div></td>
                        <td width="86" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Edit</div></td>
                        <td width="90" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Delete</div></td>
                        <td width="102" height="25" class="table_border"><div align="center" class="style2">Publish</div></td>
                    </tr>

                    <?php
                    $cl = "#F1F1F1";
                    $sl = 1;
                    foreach ($all_user as $puser):
                        if ($cl == "#F1F1F1") {
                            $cl = "#FFFFFF";
                        } else {
                            $cl = "#F1F1F1";
                        }
                        ?>

                        <tr bgcolor="<?php echo $cl; ?>">
                            <td width="33" bordercolor="#ff0000"  class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <?php echo $sl; ?>
                                </div></td>

                            <td height="25" align="left" bordercolor="#FF0000"  class="table_border" style="border-top:none; border-right:none; padding-left:5px;">
                                <?php echo $puser['name']; ?>
                            </td>
                            <td align="center" border="#FF0000"  class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <?php echo $puser['login_id']; ?>
                                </div></td>
                            <td height="25" bordercolor="#FF0000" class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <?php
                                    if ($puser['type'] == '1') {
                                        echo "Administrator";
                                    }
                                    if ($puser['type'] == '2') {
                                        echo "Engineer";
                                    }
                                    if ($puser['type'] == '3') {
                                        echo "Entry Operator";
                                    }
                                    ?>
                                </div></td>
                            <td height="25" bordercolor="#FF0000" class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <?php
                                    if ($puser['user_status'] == '1') {
                                        echo "Power User";
                                    }
                                    if ($puser['user_status'] == '2') {
                                        echo "Normal User";
                                    }
                                    ?>
                                </div></td>
                            <td height="25" bordercolor="#FF0000" class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <a href="<?php echo base_url(); ?>user/edit/<?php echo $puser['id']; ?>" onClick="return confirm('Are you sure?');">
                                        <img src="<?php echo base_url(); ?>image/edit.png" width="15" height="16" border="0" />	</a>
                                </div></td>
                            <td height="25" bordercolor="#FF0000" class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <a href="<?php echo base_url(); ?>user/delete/<?php echo $puser['id']; ?>" onClick="return confirm('Are you sure?');">
                                        <img src="<?php echo base_url(); ?>image/delet.png" width="16" height="16" border="0" /></a>
                                </div></td>
                            <td height="25" bordercolor="#FF0000" class="table_border" style="border-top:none; "><div align="center">

                                    <?php if ($puser['status'] == '0') { ?>
                                        <a href="<?php echo base_url(); ?>user/active/<?php echo $puser['id']; ?>" onClick="return confirm('Are you sure?');"><img src="<?php echo base_url(); ?>image/status.png" width="17" height="16" border="0" /></a>
                                    <?php
                                    }
                                    if ($puser['status'] == '1') {
                                        ?>

                                        <a href="<?php echo base_url(); ?>user/inactive/<?php echo $puser['id']; ?>" onClick="return confirm('Are you sure?');"><img src="<?php echo base_url(); ?>image/un_publi.png" width="17" height="16" border="0" / ></a>
    <?php } ?>
                                </div></td>
                        </tr>

<?php  $sl++;
endforeach; ?>

                </table>

                <div align="center">
                    <?php
                    echo $this->pagination->create_links();
                    ?>
                </div>

            </div>

        </div>
    </div>

</div>

<?php $this->load->view('home/footer'); ?>