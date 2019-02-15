<?php
 
//   echo '<pre>'; print_R($posts);
if (!empty($posts)): foreach ($posts as $data):
        if ($data['modified'] == '0000-00-00 00:00:00') {
            //$added_on = date(DATE_FORMAT, strtotime($data['created']));
            $added_on = date("m-d-Y H:i:s", $data['created']);
        } else if ($data['created']) {
            //$added_on = date(DATE_FORMAT, strtotime($data['modified']));
            $added_on = date("m-d-Y H:i:s", $data['modified']);
        } else {
            $added_on = 'DDDDD';
        }
        $view_link = site_url('admin/form/view_forms_lead/' . $data['form_id'] . '/' . $data['id']);
        ?>
        <tr  id="Res<?php echo  $data['id']; ?>" onclick="redirect_url('<?php echo $view_link; ?>')"> 
            <td>  <?php echo $data['name']; ?></td>
            <td> <?php echo $data['email']; ?> </td>
            <td> <?php echo $data['contact']; ?> </td>
            <td> <?php echo $added_on; ?></td>
            <td>
                <a href="<?php echo site_url('admin/form/view_forms_lead'); ?>" class="btn   btn-sm custom-btn-circle"><i class="md md-remove-red-eye"></i></a> </td>
        </tr>             

    <?php endforeach;
else: ?>
    <tr> <td colspan="11" align="center" class="noTblData"> <b>No record found </b></td>     </tr>
<?php endif; ?>
<tr> <td colspan="11" >  <?php echo $this->ajax_pagination->create_links(); ?>  </td> </tr>             