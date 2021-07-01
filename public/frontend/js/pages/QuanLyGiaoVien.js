$(document).ready(function () {
    $(".show").click(function (e) {
        const id = $(this).attr("id");

        $.get("hocvien/" + id, function (data) {
            const data_HocVien = data[0];

            // Gán data vào modal qua id
            $("#maso").val(data_HocVien["HV_MASO"]);
            $("#tenhv").val(data_HocVien["HV_HOTEN"]);
            $("#cmnd").val(data_HocVien["HV_CMND"]);
            $("#dantoc").val("");
            $("#hocvan").val("");
            $("#nghenghiep").val("");
            $("#ngaysinh").val(data_HocVien["HV_NGAYSINH"]);
            // xử lý selected
            $("#gioitinh option").each(function () {
                if ($(this).val() == data_HocVien["HV_GIOITINH"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#sodienthoai").val(data_HocVien["HV_SDT"]);

            $("#madoituong").val("");

            $("#madoituong option").each(function () {
                if ($(this).val() == data_HocVien["DT_MASO"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#nguyenquan_tinh option").each(function () {
                if ($(this).val() == data_HocVien["TEN_TINH"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#nguyenquan_huyen option").each(function () {
                if ($(this).val() == data_HocVien["TEN_HUYEN"]) {
                    $(this).prop("selected", true);
                }
            });

            $("#nguyenquan_xa option").each(function () {
                if ($(this).val() == data_HocVien["TEN_XA"]) {
                    $(this).prop("selected", true);
                }
            });
        });
        e.preventDefault();
    });

    $(".js_form_hocvien").submit(function (e) {
        console.log("asdjfh");
        // e.preventDefault();
    });

    // Location
    // Nguyên quán

    // $(".js_nguyenquan_tinh").change(function (e) {
    //     const tinh = $(this).val();
    //     $('#nguyenquan_huyen').removeAttr('disabled');
    //     $('#nguyenquan_xa').removeAttr('disabled');

    //     $.get("location", { tinh: tinh },
    //         function (data) {
    //             let html_huyen = '<option> Mời chọn quận/huyện </option>';
    //             let html_xa = '<option>Mời chọn phường/xã</option>';
    //             let element_huyen = '#nguyenquan_huyen';
    //             let element_xa = '#nguyenquan_xa';

    //             $.each(data, function (index, value) {
    //                 html_huyen += "<option>" + value.TEN_HUYEN + "</option>"
    //             });

    //             $(element_huyen).html('').append(html_huyen);
    //             $(element_xa).html('').append(html_xa)
    //         }
    //     );
    //     e.preventDefault();
    // });

    // $(".js_nguyenquan_huyen").change(function (e) {
    //     const tinh = $(".js_nguyenquan_tinh").val();
    //     const huyen = $(this).val();

    //     $.get("location", { tinh: tinh, huyen: huyen },
    //         function (data) {
    //             let html = '<option>Mời chọn phường/xã</option>';
    //             let element = '#nguyenquan_xa';

    //             $.each(data, function (index, value) {
    //                 html += "<option>" + value.TEN_XA + "</option>"
    //             });

    //             $(element).html('').append(html);
    //         }
    //     );
    //     e.preventDefault();
    // });

    // Thường trú

    // $(".js_thuongtru_tinh").change(function (e) {
    //     const tinh = $(this).val();
    //     $('#thuongtru_huyen').removeAttr('disabled');
    //     $('#thuongtru_xa').removeAttr('disabled');

    //     $.get("location", { tinh: tinh },
    //         function (data) {
    //             let html_huyen = '<option> Mời chọn quận/huyện </option>';
    //             let html_xa = '<option>Mời chọn phường/xã</option>';
    //             let element_huyen = '#thuongtru_huyen';
    //             let element_xa = '#thuongtru_xa';

    //             $.each(data, function (index, value) {
    //                 html_huyen += "<option>" + value.TEN_HUYEN + "</option>"
    //             });
    //             $(element_huyen).html('').append(html_huyen);
    //             $(element_xa).html('').append(html_xa)
    //         }
    //     );
    //     e.preventDefault();
    // });

    // $(".js_thuongtru_huyen").change(function (e) {
    //     const tinh = $(".js_thuongtru_tinh").val();
    //     const huyen = $(this).val();

    //     $.get("location", { tinh: tinh, huyen: huyen },
    //         function (data) {
    //             let html = '<option>Mời chọn phường/xã</option>';
    //             let element = '#thuongtru_xa';

    //             $.each(data, function (index, value) {
    //                 html += "<option>" + value.TEN_XA + "</option>"
    //             });
    //             $(element).html('').append(html);
    //         }
    //     );
    //     e.preventDefault();
    // });
});
