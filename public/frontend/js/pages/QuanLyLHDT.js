$(document).ready(function () {
    $(".edit").click(function (e) { 
        const id = $(this).attr("id");

        $.get("LHDT/"+id,
            function (data) {
                $('#id_LHDT').val(data['id']);
                $('#LH_TEN_EDIT').val(data['LH_TEN']);
            },
        );
        e.preventDefault();
        
    });
});