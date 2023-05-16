<?php if (!empty($phonebook)) {
    foreach ($phonebook as $d) { ?>
        <tr>
            <td class="col-10">
                <div><?php echo $d->name; ?></div>
                <div class="text-muted ml-2"><?= $d->phone ?></div>
            </td>
            <td class="col-2 align-middle">
                <div class="m-2">
                    <a href="javascript:void(0);" class="" rowID="<?php echo $d->id; ?>" data-type="edit" data-toggle="modal" data-target="#modal-contact"><i class="fas fa-edit text-primary p-2"></i></a>
                    <a href="javascript:void(0);" class="" onclick="return confirm('Are you sure to delete data?')?userAction('hapus', '<?php echo $d->id; ?>'):false;"><i class="fas fa-trash-alt text-danger p-2"></i></a>
                </div>
            </td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <td colspan="7">No contact(s) found...</td>
    </tr>
<?php } ?>