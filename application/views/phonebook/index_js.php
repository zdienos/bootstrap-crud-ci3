<script>
// Update the members data list
function getUsers(){
    $.post( "<?php echo base_url('listview'); ?>", function( data ){
        $('#contactData').html(data);
    });
}

function userAction(type, id){
    id = (typeof id == "undefined")?'':id;
    var contactData = '', frmElement = '';
    if(type == 'add' || type == 'edit'){
        url = 'simpan';
        frmElement = $("#modal-contact");
        contactData = frmElement.find('form').serialize();
    }else{
        url = 'hapus';
        frmElement = $(".row");
        contactData = 'id='+id;
    }
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(''); ?>'+url,
        dataType: 'JSON',
        data: contactData,
        beforeSend: function(){
            frmElement.find('form').css("opacity", "0.5");
        },
        success:function(res){
            alert(res.pesan);
            if(res.status == 1){
                if(type == 'add'){
                    frmElement.find('form')[0].reset();
                }
                getUsers();
            }
            frmElement.find('form').css("opacity", "");
			$('#modal-contact').modal('hide');
        }
    });
}

// Fill the user's data in the edit form
function editUser(id){
    $.get( "<?php echo base_url('get_by_id'); ?>", {id: id}, function( data ){
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#phone').val(data.phone);
    }, "json");
}

$(function(){
    $('#modal-contact').on('show.bs.modal', function(e){
        var type = $(e.relatedTarget).attr('data-type');
        var userFunc = "userAction('add');";
        $('#hlabel').text('Add New');
        if(type == 'edit'){
            userFunc = "userAction('edit');";
            var rowId = $(e.relatedTarget).attr('rowID');
            editUser(rowId);
            $('#hlabel').text('Edit');
        }
        $('#btn-simpan').attr("onclick", userFunc);
    });
    
    $('#modal-contact').on('hidden.bs.modal', function(){
        $('#btn-simpan').attr("onclick", "");
        $(this).find('form')[0].reset();
    });
});
</script>