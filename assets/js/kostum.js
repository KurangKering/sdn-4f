
var _H = _H || {};

if (_H.StrToObject = function(v) {
    if ("object" == typeof v) return v;
    if ("string" != typeof v) throw console.log(v), "cannot parse non-json-string";
    return "" == v ? v : eval("(" + v + ")")
}, _H.Notify = function(e, t) {
    switch (e) {
        case "success":
        toastr.success(t, "Sukses");
        break;
        case "info":
        toastr.info(t, "Info");
        break;
        case "warning":
        toastr.warning(t, "Peringatan");
        break;
        case "error":
        default:
        toastr.error(t, "Terjadi Kesalahan")
    }
}, _H.Month = function(e) {
    var t = {
        "01": "Januari",
        "02": "Februari",
        "03": "Maret",
        "04": "April",
        "05": "Mei",
        "06": "Juni",
        "07": "Juli",
        "08": "Agustus",
        "09": "September",
        10: "Oktober",
        11: "Nopember",
        12: "Desember"
    };
    return void 0 === e ? t : t[e]
}, _H.IsValidDate = function(e) {
    if (!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(e)) return !1;
    var t = e.split("-"),
    n = parseInt(t[2], 10),
    i = parseInt(t[1], 10),
    o = parseInt(t[0], 10);
    if (o < 1e3 || 3e3 < o || 0 == i || 12 < i) return !1;
    var r = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    return (o % 400 == 0 || o % 100 != 0 && o % 4 == 0) && (r[1] = 29), 0 < n && n <= r[i - 1]
}, _H.DayName = function(e) {
    _H.IsValidDate(e) || console.error(e + " is not valid date");
    return ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][new Date(e).getDay()]
}, _H.ToIndonesianDate = function(e) {
    if (null != e) {
        var t = e.split("-"),
        n = t[0],
        i = t[1];
        return t[2] + " " + _H.Month(i) + " " + n
    }
}, _H.FormatBytes = function(e, t) {
    if (0 == e) return "0 Byte";
    var n = t + 1 || 3,
    i = Math.floor(Math.log(e) / Math.log(1e3));
    return (e / Math.pow(1e3, i)).toPrecision(n) + " " + ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"][i]
}, _H.Message = function(e) {
    var t = "";
    switch (e) {
        case "created":
        t = "Data Anda telah disimpan !";
        break;
        case "not_created":
        t = "Terjadi kesalahan dalam menyimpan data Anda !";
        break;
        case "updated":
        t = "Data Anda telah diperbaharui !";
        break;
        case "not_updated":
        t = "Data Anda tidak dapat diperbaharui !";
        break;
        case "404":
        t = "Halaman tidak ditemukan !";
        break;
        case "deleted":
        t = "Data Anda telah dihapus !";
        break;
        case "not_deleted":
        t = "Terjadi kesalahan dalam menghapus data Anda !";
        break;
        case "restored":
        t = "Data Anda telah dikembalikan !";
        break;
        case "not_restored":
        t = "Terjadi kesalahan dalam mengembalikan data Anda !";
        break;
        case "not_selected":
        t = "Tidak ada item terpilih !";
        break;
        case "existed":
        t = "Data sudah tersedia !";
        break;
        case "empty":
        t = "Data tidak tersedia !";
        break;
        case "required":
        t = "Field harus diisi !";
        break;
        case "not_numeric":
        t = "ID bukan tipe angka";
        break;
        case "keyword_empty":
        t = "Kata kunci pencarian tidak boleh kosong, dan minimal 3 karakter !";
        break;
        case "no_changed":
        t = "Tidak ada data yang berubah !";
        break;
        case "logged_in":
        t = "Log In berhasil. Halaman akan dialihkan dalam 2 detik. Jika tidak dialihkan, silahkan refresh browser Anda!</a>";
        break;
        case "not_logged_in":
        t = "Log In gagal. Nama akun dan/atau kata sandi yang Anda masukan salah.";
        break;
        case "forbidden":
        t = "Akses ditolak!";
        break;
        case "extracted":
        t = "Tema berhasil diextract";
        break;
        case "not_extracted":
        t = "Tema gagal diextract";
        break;
        default:
        t = e
    }
    return t
}, String.prototype.ucwords = function() {
    return this.toLowerCase().replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g, function(e) {
        return e.toUpperCase()
    })
}, _H.Loading = function(e) {
    e ? $("body").addClass("loading") : $("body").removeClass("loading")
}, _H.Preview = function(e) {
    if (e.files && e.files[0]) {
        var t = new FileReader;
        t.onload = function(e) {
            $("#preview").attr("src", e.target.result)
        }, t.readAsDataURL(e.files[0])
    }
}, _H.ExportToExcel = function(e, t, n) {
    n = n || "xlsx", t = t + "-" + (new Date).toISOString().replace(/[\-\:\.]/g, "") + "." + n;
    _H.ConvertHTML(e, n, t), $("#" + e).remove()
}, _H.ConvertHTML = function(e, t, n) {
    var i = XLSX.utils.table_to_book(document.getElementById(e), {
        sheet: "Sheet1"
    }),
    o = XLSX.write(i, {
        bookType: t,
        bookSST: !0,
        type: "binary"
    }),
    r = n || "test." + t;
    try {
        saveAs(new Blob([_H.StringToArrayBuffered(o)], {
            type: "application/octet-stream"
        }), r)
    } catch (e) {
        console.log(e, o)
    }
    return o
}, _H.StringToArrayBuffered = function(e) {
    if ("undefined" != typeof ArrayBuffer) {
        for (var t = new ArrayBuffer(e.length), n = new Uint8Array(t), i = 0; i != e.length; ++i) n[i] = 255 & e.charCodeAt(i);
            return t
    }
    for (t = new Array(e.length), i = 0; i != e.length; ++i) t[i] = 255 & e.charCodeAt(i);
        return t
}, _H.SidebarCollapse = function() {
    $.post(_BASE_URL + "dashboard/sidebar_collapse")
}, toastr.options = {
    closeButton: !0,
    debug: !1,
    newestOnTop: !1,
    progressBar: !0,
    positionClass: "toast-top-right",
    preventDuplicates: !0,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
}, $(document).ready(function() {
    // $(document).find(".select2").select2({
    //     width: "100%"
    // }), 
    // $(document).find("input.date:enabled").datetimepicker({
    //     format: "yyyy-mm-dd",
    //     weekStart: 1,
    //     todayBtn: 1,
    //     autoclose: 1,
    //     todayHighlight: 1,
    //     startView: 2,
    //     minView: 2,
    //     forceParse: 0,
    //     fontAwesome: !0
    // });
    var e = $("#return-to-top");
    $(window).scroll(function() {
        50 <= $(this).scrollTop() ? e.fadeIn(200) : e.fadeOut(200)
    }), e.click(function() {
        $("body,html").animate({
            scrollTop: 0
        }, 500)
    })
}), "undefined" == typeof jQuery)  throw new Error("GridBuilder's JavaScript requires jQuery");