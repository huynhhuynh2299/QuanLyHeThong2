$(document).ready(function () {
    $(".edit").click(function (e) { 
        const id = $(this).attr("id");

        $.get("user/"+id,
            function (data) {
                $('#id_USER').val(data['id']);
                $('#USER_TEN_EDIT').val(data['USER_TEN']);

                $("#id_LOAIUSER_EDIT option").each(function () {
                    if ($(this).val() == data["id_LOAIUSER"]) {
                        $(this).prop("selected", true);
                    }
                });
            },
        );
        e.preventDefault();
        
    });
});