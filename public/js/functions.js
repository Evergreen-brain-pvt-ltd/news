/**Add the multiple title rowwise... */
function add_multiple_title(){
    var row_id = 0;
    $('#tbody').append(`<tr id="${++row_id}">
        <td class="row-index text-center" id="row">
          <input type="text" class="row-index form-control" name="multiple_titles[]" value="">
       </td>
       <td style="width:5px;"><button class="btn btn-danger remove" type="button" ><i class="fa fa-minus"></i></button></td>
           </tr>`);
 }


/**Remove the multiple title rowwise... */
//  function remove_multiple_title(){
//     var row_id = 0;
//     var child = $(this).closest('tr').nextAll();
//     //  console.log(child);
//     child.each(function () {    
//         var id = $(this).attr('id');
//         var child_id = $(this).children('#row').children('input');
//         var remove_id = parseInt(id.substring(1));
//         child_id.html(`${remove_id - 1}`);
//         $(this).attr('id', `${remove_id - 1}`);
//     });
// //   console.log( $(this).closest('tr'));
//     $(this).closest('tr').remove();

//     row_id--;
//  }