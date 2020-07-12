/***
 *  Check all items in admin datatable
 * 
 */
function check_all(){
    //Find the item checked
    $('input[class="item_checkbox"]:checkbox').each(function(){

        if($('input[class="check_all"]:checkbox:checked').length == 0){
            $(this).prop('checked',false);
        } else {
            $(this).prop('checked',true);
        }
    });
  
}

/**
 *  Delete all Selected items in admin datatable
 */
function deleteAll(){
    // Submit delete form
    $(document).on('click', '.del_all' ,function(){ 
        // Find form 
        $('#form-data').submit();
    });

    // Check all items
    $(document).on('click', '.del_btn' ,function(){
        // Get items checked count
        let item_checked_count = $('input[class="item_checkbox"]:checkbox').filter(':checked').length;

        // if count > 0 
        if(item_checked_count > 0 ){

            // add count as text to record_count div
            $('.record_count').text(item_checked_count);
            // visible not_empty_record
            $('.not_empty_record').removeClass('d-none');
            // d-none empty_record
            $('.empty_record').addClass('d-none');
            
        } else {

            // Make record text empty
            $('.record_count').text('');
            // d-none not_empty_record
            $('.not_empty_record').addClass('d-none');
            // Visible empty_record
            $('.empty_record').removeClass('d-none');
        }

       $('#multi_delete').modal('show');
    });
}