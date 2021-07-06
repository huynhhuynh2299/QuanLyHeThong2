$(document).ready(function () {
    $(".edit").click(function (e) { 
        const id = $(this).attr("id");

        $.get("loaiuser/"+id,
            function (data) {
                $('#id_LOAIUSER').val(data['id']);
                $('#LU_TEN_EDIT').val(data['LU_TEN']);
            },
        );
        e.preventDefault();
        
    });
});