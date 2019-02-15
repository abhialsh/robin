<?php
//   echo '<pre>'; print_R($posts);
 $page = $this->input->post('page');
  $perPage = $this->input->post('per_page');
 
$offset = $perPage * ($page - 1);
$i = $offset;
if (!empty($posts)): foreach ($posts as $data):
        $i++;
        $blocked_form = date(DATE_FORMAT, $data['blocked_form']);
        //$timestampblocked_to = strtotime($data['blocked_to']);
        $blocked_to = date(DATE_FORMAT, $data['blocked_to']);
        $view_link = site_url('admin/apartment/setting/'. $data['id'] . '/' . url_title($data['apt_name']));
        ?>
        <tr id="Res<?php echo $data['id']; ?>" onclick="redirect_url('<?php echo $view_link; ?>')"> 

            <td class="align-middle">  <?php echo $i; ?>  </td>
            <td class="align-middle"> <?php echo $data['apt_name']; ?> </td>
            <td class="align-middle"> <?php echo $blocked_form; ?> </td>
            <td class="align-middle"><?php echo $blocked_to; ?> </td>
            <td class="align-middle"> 
                <?php
                $note = strip_tags(base64_decode($data['note']));
                $note = word_limiter($note, 40);
                echo ucfirst($note);
                ?>

            </td>
            <td class="align-middle">  
                <a href="<?php echo $view_link ; ?>"   class="btn btn-sm custom-btn-circle mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                    <i class="md md-mode-edit"></i></a>
            </td>      
        </tr>             
    <?php endforeach;
else:
    ?>
    <tr> <td colspan="11" align="center" class="noTblData"> <b>No record found </b></td>     </tr>
<?php endif; ?>
<tr> <td colspan="11">  <?php echo $this->ajax_pagination->create_links(); ?>  </td> </tr>             
