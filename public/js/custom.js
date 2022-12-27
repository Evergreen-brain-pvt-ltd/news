$(document).ready(function () {
var rolestable = $('#rolestable').DataTable({
    "processing": true,
    "serverSide": true,
    "scrollX": true,
    "ajax": {
        "url": "roles-details",
        "type": "POST",
        'beforeSend': function (request) {
            request.setRequestHeader("X-CSRF-TOKEN", jQuery('meta[name="csrf-token"]').attr('content'));
        },
    },
    "columnDefs": [
        { "className": "dt-center", "targets": "_all" }
    ],
    "columns": [{
        "data": "sno",
    },
    {
        "data": "name",
    },
    {
        "data": "action",
    },
    ],
});
rolestable.on('click', '.delete', function () {
    $('#userdetails_processing').show();
    element = $(this);
    var userid = $(this).attr('data-id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: 'role-delete',
                data: {
                    id: userid
                },
                dataType: 'json',
                success: function (data) {
                    rolestable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        };
    });
});

var userstable = $('#userstable').DataTable({
    "processing": true,
    "serverSide": true,
    "scrollX": true,
    "ajax": {
        "url": "users-details",
        "type": "POST",
        'beforeSend': function (request) {
            request.setRequestHeader("X-CSRF-TOKEN", jQuery('meta[name="csrf-token"]').attr('content'));
        },
    },
    "columnDefs": [
        { "className": "dt-center", "targets": "_all" }
    ],
    "columns": [{
        "data": "sno",
    },
    {
        "data": "name",
    },
    {
        "data": "email",
    },
    {
        "data": "roles",
    },
    {
        "data": "action",
    },
    ],
});

userstable.on('click', '.delete', function () {
    $('#userdetails_processing').show();
    element = $(this);
    var userid = $(this).attr('data-id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: 'user-delete',
                data: {
                    id: userid
                },
                dataType: 'json',
                success: function (data) {
                    userstable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        };
    });
});

});